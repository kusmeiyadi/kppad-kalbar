<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $role = Role::orderBy('created_at', 'DESC')->get();
        return view('admin.role.role', compact('role'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);
        $role = Role::firstOrCreate(['name' => $request->name]);
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Ditambahkan']);
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Dihapus']);
    }
}
