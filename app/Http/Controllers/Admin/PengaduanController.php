<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\KPPADEmail;
use App\Mail\ProgresMail;
use App\Models\Admin\Admin;
use App\Models\User\Korban;
use App\Models\User\Pelapor;
use App\Models\User\Pengaduan;
use App\Models\User\Status;
use App\Models\User\Terlapor;
use App\Notifications\NewLessonNotification;
use Facades\Yugo\SMSGateway\SMS;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $pengaduans = Pengaduan::with('pelapor:nama_p,id', 'jenis_kasus:id,nama_kasus')
                               ->where('is_approved', 0)
                               ->where('tipe', '=','Pengaduan')
                               ->orderBy('created_at', 'DESC')
                               ->get(['kode','created_at','jenis_kasus_id', 'pelapor_id','id']);
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function accepted(){
        $pengaduans = Pengaduan::with('pelapor:nama_p,id,kontak_p', 'jenis_kasus:id,nama_kasus', 'status:id,pengaduan_id,status,isi,created_at')
                               ->where('is_approved', 1)
                               ->whereHas('status', function(Builder $query) {
                                    $query->where('status', '=', 'VERIFIKASI')
                                          ->orWhere('status', '=', 'PENYIDIKAN')
                                          ->orWhere('status', '=', 'PERSIDANGAN')
                                          ->orWhere('status', '=', 'PENGADILAN')
                                          ->orWhere('status', '=', 'MEDIASI');
                                 })
                               ->orderBy('created_at', 'DESC')
                               ->get(['kode','created_at','jenis_kasus_id', 'pelapor_id','id']);
        return view('admin.pengaduan.accepted', compact('pengaduans'));
    }

    public function rejected(){
        $pengaduans = Pengaduan::with('pelapor:nama_p,id', 'jenis_kasus:id,nama_kasus', 'status:id,pengaduan_id,status,isi,created_at')
                               ->where('is_approved', 2)
                               ->orderBy('created_at', 'DESC')
                               ->get(['kode','created_at','jenis_kasus_id', 'pelapor_id','id']);
        return view('admin.pengaduan.rejected', compact('pengaduans'));
    }

    public function finish(){
        $pengaduans = Pengaduan::with('pelapor:nama_p,id', 'jenis_kasus:id,nama_kasus', 'status:id,pengaduan_id,status,isi,created_at')
                               ->whereHas('status', function(Builder $query) {
                                    $query->where('status', '=', 'SELESAI');
                                 })
                               ->orderBy('created_at', 'DESC')
                               ->get(['kode','created_at','jenis_kasus_id', 'pelapor_id','id']);
        return view('admin.pengaduan.finish', compact('pengaduans'));
    }

    public function update(Request $request){
        $pengaduan        = Pengaduan::where('id', $request->pengaduan_id)->first();
        $status           = Status::where('id', $request->statusid);
        $status_pengaduan = Status::create([
          'pengaduan_id' => $request->pengaduan_id,
          'status'       => $request->status,
          'isi'          => $request->isi,
        ]);
        $status->delete();
        \Mail::to($pengaduan->pelapor->kontak_p)->send(new ProgresMail($pengaduan));
        return back()->withToastSuccess('Pengaduan berhasil diperbaharui!');
    }

    public function show($id){
        $komisioner = Admin::role(['Ketua Komisioner','Wakil Ketua Komisioner','Komisioner'])->get();
        $pengaduan  = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.detail',compact('pengaduan','komisioner'));
    }

    public function approval($id){
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan->is_approved == 0){
            $pengaduan->is_approved = 1;
            $pengaduan->save();
        }
        \Mail::to($pengaduan->pelapor->kontak_p)->send(new KPPADEmail($pengaduan));
        return redirect(route('pengaduan.accepted'))->withToastSuccess('Pengaduan telah diterima');
    }

    public function tolak($id){
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan->is_approved == 0){
            $pengaduan->is_approved = 2;
            $pengaduan->save();
        }
        return redirect(route('pengaduan.rejected'))->withToastSuccess('Pengaduan ditolak');
    }

    public function serahkan(Request $request, $id){
        $this->validate($request,[
            'komisioner' => 'required',
        ]);
        $pengaduan = Pengaduan::find($id);
        $pengaduan->komisioner_id = $request->komisioner;
        $pengaduan->save();
        return redirect()->back();
    }

    public function pasal(Request $request, $id){
        $pengaduan = Pengaduan::find($id);
        $pengaduan->pasal = implode(',',$request->pasal);
        $pengaduan->save();
        return redirect()->back();
    }

    public function email($id){
        $pengaduan = Pengaduan::find($id);
        \Mail::to($pengaduan->pelapor->kontak_p)->send(new ProgresMail($pengaduan));
        toast('Pesan Sudah Terkirim Ke Email Pelapor','success','top-right');
        return redirect()->back();
    }

    public function sms(Request $request){
        SMS::send(['082358177119'], 'Hello, world! How are you today?');
        toast('Pesan Sudah Terkirim Ke Email Pelapor','success','top-right');
        return redirect()->back();
    }

    public function sms_view(){
        return view('sms');
    }

    public function notification(){
        return auth()->user()->unreadNotifications;
    }

    public function markAsRead(Request $request){
        $notification = auth()->user()->unreadNotifications->where('created_at', $request->create_pengaduan);
        if ($notification) {
            $notification->markAsRead();
        }
    }

    public function readPengaduan($pengaduan_id){
        $pengaduan = Pengaduan::find([$pengaduan_id]);
        return view('admin.pengaduan.view',compact('pengaduan'));
    }

    public function allMarkAsread(){
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function readAllPengaduan(){
        $pengaduans = auth()->user()->readNotifications;
        return view('admin.pengaduan.allPengaduan', compact('pengaduans'));
    }

    public function destroy($id){
        $pengaduan = Pelapor::where('id', $id);
        $pengaduan->delete();
        if($pengaduan){
            return redirect()->back()->withToastSuccess('Pengaduan berhasil dihapus');
        }else{
            return redirect()->back()->withToastError('Pengaduan gagal dihapus');
        }
    }

    public function sunting_pelapor(Request $request){
        $pelapor = Pelapor::where('id', $request->pelapor_id);
        $pelapor->update([
                      'id'                => $request->pelapor_id,
                      'nama_p'            => $request->nama_p,
                      'identitas_p'       => $request->identitas_p,
                      'jk_p'              => $request->jk_p,
                      'agama_p'           => $request->agama_p,
                      'tempat_lahir'      => $request->tempat_p,
                      'tanggal_lahir'     => $request->tanggal_p,
                      'kewarganegaraan_p' => $request->kewarganegaraan_p,
                      'kontak_p'          => $request->kontak_p,
                      'alamat_p'          => $request->alamat_p,
                      'relasi_p'          => $request->relasi_p,
                  ]);
        if ($pelapor){
            toast('Success Toast','success'); 
            return back();   
        } else {
            toast('Error Toast','error');    
            return back();
        }
    }

    public function sunting_korban(Request $request){
        $korban = Korban::where('id', $request->korban_id);
        $korban->update([
                     'id'                => $request->korban_id,
                     'nama_k'            => $request->nama_k,
                     'jk_k'              => $request->jk_k,
                     'agama_k'           => $request->agama_k,
                     'status'            => $request->status,
                     'alamat_k'          => $request->alamat_k,
                     'usia_k'            => $request->usia_k,
                     'kewarganegaraan_k' => $request->kewarganegaraan_k,
                 ]);
        if ($korban){
            return back()->withToastSuccess('Pengaduan berhasil');    
        } else {    
            return back()->withToastFailed('Pengaduan gagal');
        }
    }

    public function sunting_terlapor(Request $request){
        $terlapor = Terlapor::where('id', $request->terlapor_id);
        $terlapor->update([
                       'id'                => $request->terlapor_id,
                       'nama_t'            => $request->nama_t,
                       'jk_t'              => $request->jk_t,
                       'usia_t'            => $request->usia_t,
                       'agama_t'           => $request->agama_t,
                       'kontak_t'          => $request->kontak_t,
                       'kewarganegaraan_t' => $request->kewarganegaraan_t,
                       'alamat_t'          => $request->alamat_t,
                   ]);
        return back()->withToastSuccess('Pengaduan berhasil');
    }
}
