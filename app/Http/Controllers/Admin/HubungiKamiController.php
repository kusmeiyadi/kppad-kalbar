<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Hubungi_kami;

class HubungiKamiController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $hubungis = Hubungi_kami::all();
        return view('admin.hubungi-kami.index', compact('hubungis'));
    }

    public function show($id){
        $hubungi  = Hubungi_kami::findOrFail($id);
	    return response()->json([
	      'data' => $hubungi
	    ]);
    }
}
