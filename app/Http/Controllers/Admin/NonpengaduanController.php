<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\KPPADEmail;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;


class NonpengaduanController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $pengaduans = Pengaduan::with('pelapor:nama_p,id', 'jenis_kasus:id,nama_kasus')
                               ->where('tipe', '=', 'Non-pengaduan')
                               ->orderBy('created_at', 'DESC')
                               ->get(['slug','created_at','jenis_kasus_id', 'pelapor_id','id']);
        return view('admin.pengaduan.non-pengaduan', compact('pengaduans'));
    }

    public function create(){
        return view('admin.pengaduan.addnon-pengaduan');
    }

    public function store(Request $request){

        // menyimpan data file yang diupload ke variabel $file
          $file          = $request->file('pdf-file');
          $nama_file     = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
          $tujuan_upload = 'regulasi_pdf';
          $file->move($tujuan_upload,$nama_file);

        $nonpengaduan = Pengaduan::create([
          'jenis_kasus_id' => $request->jenis_kasus,
          'slug'           => Str::slug($request->link),
          'kronologi'      => $request->link,
          'tipe'           => 'Non-pengaduan',
          'file'           => $nama_file,
        ]);

        // Convert PDF to Image
        $pdf_file    = public_path()."\\regulasi_pdf\\$nama_file";
        $output_path = public_path()."\\regulasi_images\\$request->deskripsi.png";
        // Ghostscript
        Ghostscript::setGsPath("C:\Program Files\gs\gs9.53.3\bin\gswin64c.exe");
        $pdf         = new PDF($pdf_file);
        $pdf->setOutputformat('png')->saveImage($output_path);

        alert()->success('Data telah', 'Berhasil')->persistent('Close');
        return redirect(route('regulasi.index'));
    }
}
