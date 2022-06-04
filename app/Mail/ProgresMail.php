<?php

namespace App\Mail;

use App\Models\User\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProgresMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    public function build()
    {
      return $this->from('khimshin11@mgmail.com', 'KPPAD Kalimantan Barat')
                    ->subject('KPPAD Verifikasi Pengaduan')
                    ->view('admin.pengaduan.progres-mail');
    }
}
