<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Pengaduan;
use App\Models\Admin\JenisKasus;
use DB;

class TabulasiController extends Controller
{
    
    public function index(){
        $jenis_kasus = JenisKasus::all();
        $pengaduans = Pengaduan::select('jenis_kasus_id', DB::raw("(DATE_FORMAT(created_at, '%Y')) as year"))
        ->selectRaw('count(id) as total')
        ->selectRaw("count(case when jenis_kasus_id = '1' then 1 end) as ks")
        ->selectRaw("count(case when jenis_kasus_id = '2' then 1 end) as kf")
        ->selectRaw("count(case when jenis_kasus_id = '3' then 1 end) as kp")
        ->selectRaw("count(case when jenis_kasus_id = '4' then 1 end) as abh")
        ->selectRaw("count(case when jenis_kasus_id = '5' then 1 end) as tr")
        ->selectRaw("count(case when jenis_kasus_id = '6' then 1 end) as hka")
        ->selectRaw("count(case when jenis_kasus_id = '7' then 1 end) as per")
        ->selectRaw("count(case when jenis_kasus_id = '8' then 1 end) as pen")
        ->selectRaw("count(case when jenis_kasus_id = '9' then 1 end) as nap")
        ->selectRaw("count(case when jenis_kasus_id = '10' then 1 end) as pa")
        ->selectRaw("count(case when jenis_kasus_id = '11' then 1 end) as pr")
        ->selectRaw("count(case when jenis_kasus_id = '12' then 1 end) as kf")
        ->selectRaw("count(case when jenis_kasus_id = '13' then 1 end) as abk")
        ->selectRaw("count(case when jenis_kasus_id = '14' then 1 end) as ksl")
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y')"))
        ->get();
        return view ('user.data.tabulasi.tabulasi', compact('pengaduans','jenis_kasus'));
    }
}
