<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Regulasi;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

class RegulasiController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $regulasis = Regulasi::all();
        return view('admin.regulasi.index', compact('regulasis'));
    }

    public function create(){
        return view('admin.regulasi.regulasi');
    }

    public function store(Request $request){
        $messages = [
          'unique' => 'Judul regulasi sudah ada pada sistem'
        ];

        $this->validate($request,[
          'deskripsi' => 'required|unique:regulasi',
          'kategori'  => 'required',
          'pdf-file'  => 'required|file',
        ],$messages);
        // menyimpan data file yang diupload ke variabel $file
	      $file          = $request->file('pdf-file');
	      $nama_file     = time()."_".$file->getClientOriginalName();
      	// isi dengan nama folder tempat kemana file diupload
	      $tujuan_upload = 'AdminLTE-3.0.2/dist/file/regulasi';
	      $file->move($tujuan_upload,$nama_file);

        $regulasi = Regulasi::create([
          'deskripsi' => $request->deskripsi,
          'slug'      => Str::slug($request->deskripsi),
          'kategori'  => $request->kategori,
          'upload_by' => 'KPPAD',
          'file'      => $nama_file
        ]);

        $pdf_file    = public_path()."\\AdminLTE-3.0.2/dist/file/regulasi\\$nama_file";
        $output_path = public_path()."\\AdminLTE-3.0.2/dist/img/regulasi\\$request->deskripsi.png";
        // Ghostscript
        Ghostscript::setGsPath("C:\Program Files\gs\gs9.53.3\bin\gswin64c.exe");
        $pdf         = new PDF($pdf_file);
        $pdf->setOutputformat('png')->saveImage($output_path);

        alert()->success('Data telah', 'Berhasil')->persistent('Close');
        return redirect(route('regulasi.index'));
    }

    public function edit($id){
        $messages = [
          'unique' => 'Judul regulasi sudah ada pada sistem'
        ];
        $regulasi = Regulasi::findOrFail($id);
        return view('admin.regulasi.edit', compact('regulasi'));
    }

    public function update(Request $request, $id){
        $regulasi = Regulasi::find($id);
        $messages = [
          'unique' => 'Judul regulasi sudah ada pada sistem'
        ];

        if($request->file != ''){
            $path = 'AdminLTE-3.0.2/dist/file/regulasi';
            if($regulasi->file != ''  && $regulasi->file != null){
               $file_old = $path.$regulasi->file;
               unlink($file_old);
            }
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $regulasi->update(['file' => $filename]);
        } else {
            $regulasi->update([
              'deskripsi' => $request->deskripsi,
              'slug'      => Str::slug($request->deskripsi),
              'kategori'  => $request->kategori,
              'upload_by' => 'KPPAD'
            ]);
        }
        return redirect(route('regulasi.index'));
    }

    public function destroy($id){
        $regulasi = Regulasi::findOrFail($id);
        File::delete('regulasi_pdf/'.$regulasi->file);
        $regulasi->delete();
        return redirect(route('regulasi.index'))->withToastSuccess('Regulasi telah dihapus');
    }
}
