<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JenisKasus;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisKasusController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $jeniskasuses = JenisKasus::all();
        return view('admin.jenis_kasus.jenis_kasus', compact('jeniskasuses'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'jenis_kasus' => 'required|string|max:100',
        ]);
        $jenis_kasus = JenisKasus::firstOrCreate(['nama_kasus' => $request->jenis_kasus]);
        if($jenis_kasus){
            return redirect()->back()->withToastSuccess('Jenis Kasus telah dibuat');
        }else{
            return redirect()->back()->withToastError('Jenis Kasus gagal dibuat');
        }
    }

    public function destroy($id){
        $jenis_kasus = JenisKasus::findOrFail($id);
        $jenis_kasus->delete();        
        return redirect()->back()->withToastSuccess('Jenis Kasus ' . $jenis_kasus->jenis_kasus. ' telah dihapus!');
    }
}
