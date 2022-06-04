<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Hubungi_kami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
	
    public function index(){
    	return view('user.hubungi_kami.index');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'nama' 		=> 'required',
    		'email' 	=> 'required|email',
    		'subjek' 	=> 'required',
    		'pesan'		=> 'required',
            'g-recaptcha-response' => 'required|captcha',
    	]);
    	$hubungi_kami = Hubungi_kami::create([
    		'nama'	    => $request->nama,
    		'email'     => $request->email,
    		'subjek'    => $request->subjek,
    		'isi_pesan' => $request->pesan
    	]);
    	return redirect(route('user.hubungi-kami'));
    }
}
