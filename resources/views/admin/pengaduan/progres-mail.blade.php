<h3><strong>Halo, {{ $pengaduan->pelapor->nama_p }}!</strong></h3>
<p align="justify">Terima kasih telah melaporkan kasus ini untuk menjaga generasi muda kita di masa depan. kode
    pengaduan anda <strong>{{ $pengaduan->kode }}</strong> </p>

<p align="justify">isi @foreach ($pengaduan->status as $status)
    {{ $status->status }}
    @endforeach
    @foreach ($pengaduan->status as $status)
    {{ $status->isi }}
    @endforeach
</p>

<p>Salam hangat,</p>
<p><strong>KPPAD</strong></p>
<p>Kalimantan Barat</p>