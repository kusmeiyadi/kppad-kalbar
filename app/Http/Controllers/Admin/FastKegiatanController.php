<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FastKegiatanRequest;
use App\Models\Admin\FastKegiatan;
use Illuminate\Http\Request;

class FastKegiatanController extends Controller
{
  public function __construct(){
      $this->middleware('auth:admin');
  }

  public function destroy(Request $request){
      FastKegiatan::where('id',$request->id)->delete();
      return response()->json(true);
  }

  public function store(FastKegiatanRequest $request){
      FastKegiatan::create($request->all());

      return response()->json(true);
  }

  public function update(FastKegiatanRequest $request){
      $event = FastKegiatan::where('id', $request->id)->first();
      $event->fill($request->all());
      $event->save();
      return response()->json(true);
  }
}
