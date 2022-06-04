<?php

namespace App\Http\Controllers\Admin;

use DB;
use Image;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['role:Ketua Komisioner|Wakil Ketua Komisioner|Staf','permission:lihat pengguna']);
        $this->middleware('permission:sunting pengguna', ['only' => ['edit']]);
        $this->middleware('auth:admin');
    }

    public function index(){
        $users = Admin::orderBy('created_at', 'DESC')->get();
        return view('admin.user.user', compact('users'));
    }

    public function create(){
        $role = Role::orderBy('name', 'ASC')->get();
        return view('admin.user.create', compact('role'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required|string|max:13',
            'password' => 'required|min:6',
            'role'     => 'required|string|exists:roles,name'
        ]);
        $user = Admin::firstOrCreate([
            'email'    => $request->email
        ], [
            'phone'    => $request->phone,
            'name'     => $request->name,
            'password' => bcrypt($request->password),
            'status'   => true
        ]);
        $user->assignRole($request->role);
        return redirect(route('user.index'))->withToastSuccess('User: <strong>' . $user->name . '</strong> Ditambahkan');
    }

    public function edit($id){
        $user = Admin::findOrFail($id);
        $role = Role::orderBy('name', 'ASC')->get();
        return view('admin.user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'email'    => 'required|email',
            'password' => 'nullable|min:6',
        ]);
        $user = Admin::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name'     => $request->name,
            'password' => $password
        ]);
        return redirect(route('user.index'))->withToastSuccess('User: <strong>' . $user->name . '</strong> Diperbaharui');
    }

    public function destroy($id){
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect()->back()->withToastSuccess('User: <strong>' . $user->name . '</strong> Dihapus');
    }

    public function roles(Request $request, $id){
        $user  = Admin::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('admin.user.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id){
        $this->validate($request, [
            'role' => 'required'
        ]);
        $user = Admin::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect(route('users.index'));
    }

    public function rolePermission(Request $request){
        $role          = $request->get('role');
        $permissions   = null;
        $hasPermission = null;
        $roles         = Role::all()->pluck('name');
        if (!empty($role)){
            $getRole = Role::findByName($role);
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();
            $permissions = Permission::all()->pluck('name');
        }
        return view('admin.user.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request){
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role){
        $role = Role::findByName($role);
        $role->syncPermissions($request->permission);
        return redirect()->back()->withToastSuccess('Izin untuk peran disimpan');
        
    }

    public function profile(){
        return view ('admin.setting.index');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        Admin::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        return redirect()->back();
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'image|max:2048',
        ]);
 
        $user = Auth::user();
        if($request->image != ''){
            $path = 'AdminLTE-3.0.2/dist/img/profile/';
            if($user->image != ''  && $user->image != null){
               $file_old = $path.$user->image;
               unlink($file_old);
            }
            $image = $request->file('image');
            $nameImage = $request->file('image')->getClientOriginalName();
    
            $thumbImage = Image::make($image->getRealPath())->resize(160, 160);
            $thumbPath = 'AdminLTE-3.0.2/dist/img/profile/' . $nameImage;
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $nameImage,
                'path' => $thumbPath,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }
        return redirect()->back()->withToastSuccess('Profil berhasil diperbaharui');
    }
}
