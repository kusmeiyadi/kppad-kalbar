<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FastKegiatan;
use App\Models\Admin\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $fastEvents = FastKegiatan::all();
        return view('admin.jadwal.index',compact('fastEvents'));
    }
}
