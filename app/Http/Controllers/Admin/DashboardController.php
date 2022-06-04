<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\JenisKasus;
use App\Models\User\Pengaduan;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $pengaduan = Pengaduan::where('tipe', '=', 'Pengaduan')->count();
        $nonpengaduan = Pengaduan::where('tipe', '=', 'Non-pengaduan')->count();
        $approved = Pengaduan::where('tipe', '=', 'Pengaduan')->where('is_approved', 0)->count();
        $finish = Pengaduan::whereHas('status', function(Builder $query) {
                                    $query->where('status', '=', 'SELESAI');
                                 })->count();
        $record = Pengaduan::select(DB::raw("COUNT(*) as count"), DB::raw("jenis_kasus_id as jenis_kasus"))
                           ->groupBy('jenis_kasus')
                           ->orderBy('jenis_kasus')
                           ->get();
        $jenis_kasus = JenisKasus::select('id','nama_kasus')->get();
        $data = [];
 
        foreach($jenis_kasus as $row) {
            foreach($record as $item){
                if($item->jenis_kasus == $row->id){
                    $data['label'][] = $row->nama_kasus;
                    $data['data'][] = (int) $item->count;
                }
            }
        }
 
        $data['chart_data'] = json_encode($data);
        return view('admin.dashboard', compact('pengaduan','nonpengaduan','approved','finish'), $data);
    }
}
