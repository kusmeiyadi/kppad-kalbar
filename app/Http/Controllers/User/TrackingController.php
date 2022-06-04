<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\JenisKasus;
use App\Models\User\Korban;
use App\Models\User\Pelapor;
use App\Models\User\Pengaduan;
use App\Models\User\Terlapor;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(){
      	return view('user.pengaduan.tracking');
    }

    public function search(Request $request){
        $search = $request->search;
        $pengaduans = Pengaduan::where('kode',$search)->get();
        return view('user.pengaduan.result')->with('pengaduans', $pengaduans);
    }
}
