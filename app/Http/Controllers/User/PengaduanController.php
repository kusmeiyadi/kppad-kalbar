<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Admin;
use App\Models\Admin\JenisKasus;
use App\Models\User\Bukti;
use App\Models\User\Korban;
use App\Models\User\Pelapor;
use App\Models\User\Pengaduan;
use App\Models\User\Status;
use App\Models\User\Terlapor;
use App\Notifications\NewPengaduanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
  
    public function index(){
        $jenis_kasus = JenisKasus::select('nama_kasus','id')->orderBy('nama_kasus', 'ASC')->get();
        return view('user.pengaduan.index', compact('jenis_kasus'));
    }

    public function store(Request $request){
        $this->validate($request,[
          'kronologi'           => 'required',
          'provinsi'            => 'required',
          'kabupaten'           => 'required',
          'jenis_kasus'         => 'required',
          'kronologi'           => 'required',
          'file'                => 'mimes:pdf,doc,docx',
          'nama_p'              => 'required',
          'kontak_p'            => 'required',
          'tempat_lahir'        => 'required',
          'tanggal_lahir'       => 'required',
          'identitas_p'         => 'required',
          'jk_p'                => 'required',
          'alamat_p'            => 'required',
          'nama_k.*'            => 'required',
          'usia_k.*'            => 'required',
          'usia_k.0'            => 'required',
          'jk_k.*'              => 'required',
          'jk_k.0'              => 'required',
          'status.*'            => 'required',
          'status.0'            => 'required',
          'kewarganegaraan_k.*' => 'required',
          'usia_t.*'            => 'min:0|max:99',
        ],[
          'nama_p.required' => 'Nama pelapor wajib diisi.',
          'kontak_p.required' => 'Email pelapor wajib diisi.',
          'alamat_p.required' => 'Alamat pelapor wajib diisi.',
          'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
          'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
          'nama_k.*.required' => 'Nama korban wajib diisi.',
          'usia_k.*.required' => 'Usia korban wajib diisi.',
          'usia_k.0.required' => 'Usia korban wajib diisi.',
          'kewarganegaraan_k.*.required' => 'Kewarganegaraan korban wajib diisi.',
          'status.*.required' => 'Pendidikan korban wajib diisi.',
          'status.0.required' => 'Pendidikan korban wajib diisi.',
          'kronologi.required' => 'Kronologis kejadian wajib diisi.',
        ]);
        if ($request->hasFile('file')) {
            $fileName = $request->file->store('public');
        }
        $pelapor = Pelapor::create([
          'nama_p'            => $request->nama_p,
          'kontak_p'          => $request->kontak_p,
          'identitas_p'       => $request->identitas_p,
          'jk_p'              => $request->jk_p,
          'agama_p'           => $request->agama_p,
          'tempat_lahir'      => $request->tempat_lahir,
          'tanggal_lahir'     => $request->tanggal_lahir,
          'alamat_p'          => $request->alamat_p,
          'kewarganegaraan_p' => $request->kewarganegaraan_p,
        ]);
        if (count($request->nama_k) > 0)
        {
          foreach ($request->nama_k as $korban=>$k){
            $korban = Korban::create([
              'nama_k'            => $request->nama_k[$korban],
              'pelapor_id'        => $pelapor->id,
              'jk_k'              => $request->jk_k[$korban],
              'agama_k'           => $request->agama_k[$korban],
              'status'            => $request->status[$korban],
              'usia_k'            => $request->usia_k[$korban],
              'kewarganegaraan_k' => $request->kewarganegaraan_k[$korban],
            ]);
          }
        }
        if (count($request->nama_t) > 0)
        {
          foreach ($request->nama_t as $terlapor=>$t){
            $terlapor = Terlapor::create([
              'nama_t'            => $request->nama_t[$terlapor],
              'pelapor_id'        => $pelapor->id,
              'jk_t'              => $request->jk_t[$terlapor],
              'usia_t'            => $request->usia_t[$terlapor],
              'agama_t'           => $request->agama_t[$terlapor],
              'kontak_t'          => $request->kontak_t[$terlapor],
              'kewarganegaraan_t' => $request->kewarganegaraan_t[$terlapor],
              'alamat_t'          => $request->nama_t[$terlapor],
            ]);
          }
        }
        $pengaduan = Pengaduan::create([
          'kode'           => $request->kode,
          'pelapor_id'     => $pelapor->id,
          'jenis_kasus_id' => $request->jenis_kasus,
          'user_id'        => 99,
          'slug'           => Str::slug($request->provinsi),
          'kronologi'      => $request->kronologi,
          'provinsi'       => $request->provinsi,
          'kabupaten'      => $request->kabupaten,
          'tipe'           => 'Pengaduan',
          'updated_at'     => now()->addHours($request->expire_date),
          // 'file' => $fileName,
        ]);
        $status_pengaduan = Status::create([
          'pengaduan_id' => $pengaduan->id,
        ]);
        $user = Admin::where('id','!=',2)->get();
        Notification::send($user, new NewPengaduanNotification(Pengaduan::latest('id')->first()));
        if($pengaduan && $pelapor && $korban && $terlapor && $status_pengaduan && $user){
          return back()->withToastSuccess('Pengaduan anda telah terkirim');
        } else {
          return back()->withToastError('Pengaduan anda gagal terkirim');
        }
    }

    public function bukti($id){
        $data = Pengaduan::find($id);
        return view('bukti', compact('data'));
    }

    public function upload(Request $request){
        $this->validate($request, [
                'filenames'   => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip,jpg,png,jpeg,svg,gif|max:1024'
        ]);
        if ($files = $request->file('filenames')) {
            $destinationPath = public_path('/bukti/');
            foreach($files as $img) {
               $bukti =$img->getClientOriginalName();
               $img->move($destinationPath, $bukti);
               $bukti_model = Bukti::create([
                 'pengaduan_id' => $request->id,
                 'filenames'    => $bukti,
               ]);
            }
        }
        return back()->withToastSuccess('File berhasil di upload');
    }
}
