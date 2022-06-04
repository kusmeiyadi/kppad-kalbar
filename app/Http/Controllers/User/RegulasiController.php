<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Regulasi;
use Illuminate\Http\Request;


class RegulasiController extends Controller
{
    
      public function index(){
          $regulasis = Regulasi::select('created_at','slug','deskripsi','upload_by','kategori')->orderBy('created_at', 'DESC')->get();          
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function undang(){
          $regulasis = Regulasi::where('kategori','Undang-Undang')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function pemerintah(){
          $regulasis = Regulasi::where('kategori','PERATURAN PEMERINTAH')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function presiden(){
          $regulasis = Regulasi::where('kategori','PERATURAN PRESIDEN')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function menteri(){
          $regulasis = Regulasi::where('kategori','PERATURAN MENTERI')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function daerah(){
          $regulasis = Regulasi::where('kategori','PERATURAN DAERAH')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function bupati(){
          $regulasis = Regulasi::where('kategori','PERATURAN BUPATI')->get();
          return view('user.data.regulasi.regulasi', compact('regulasis'));
      }

      public function show($slug){
          $regulasi = Regulasi::where('slug',$slug)->first();
          $previous = Regulasi::where('id', '<', $regulasi->id)->orderBy('id','desc')->first();
          $next     = Regulasi::where('id', '>', $regulasi->id)->orderBy('id')->first();
          return view('user.data.regulasi.detail', compact('regulasi','previous','next'));
      }

      public function download($slug)
      {
        $regulasi = Regulasi::where('slug', $slug)->firstOrFail();
        $pathToFile = public_path()."\\AdminLTE-3.0.2/dist/file/regulasi\\$regulasi->file";
        return response()->download($pathToFile);
      }

}
