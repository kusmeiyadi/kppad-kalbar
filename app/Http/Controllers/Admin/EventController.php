<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanRequest;
use App\Models\Admin\Kegiatan;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function __construct(){
      $this->middleware('auth:admin');
  }

  public function loadEvents(Request $request){
      $returnedColumns = ['id','title','start','end','color','description'];
      $start           = (!empty($request->start)) ? ($request->start) : ('');
      $end             = (!empty($request->end)) ? ($request->end) : ('');
      $events          = Kegiatan::whereBetween('start', [$start,$end])->get($returnedColumns);
      return response()->json($events);
  }

  public function store(KegiatanRequest $request){
      Kegiatan::create($request->all());
      return response()->json(true);
  }

  public function update(KegiatanRequest $request){
      $event = Kegiatan::where('id', $request->id)->first();
      $event->fill($request->all());
      $event->save();
      return response()->json(true);
  }

  public function destroy(Request $request){
      Kegiatan::where('id',$request->id)->delete();
      return response()->json(true);
  }
}
