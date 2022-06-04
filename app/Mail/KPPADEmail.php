<?php

namespace App\Mail;

use App\Models\User\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KPPADEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $pengaduan;

    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('khimshin11@mgmail.com', 'KPPAD Kalimantan Barat')
                    ->subject('KPPAD Verifikasi Pengaduan')
                    ->view('admin.pengaduan.email');
    }
}
