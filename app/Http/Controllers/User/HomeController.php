<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin\Kegiatan;
use Carbon\Carbon;

class HomeController extends Controller
{
      
    public function index(){
      $dateFrom = Carbon::now()->subDays(7);
      $dateTo   = Carbon::now();
      $kegiatans = Kegiatan::select('created_at','title','description')->whereBetween('created_at', [$dateFrom, $dateTo])
      ->orderBy('created_at', 'desc')
      ->get();
      return view('user.home', compact('kegiatans'));
    }
}
