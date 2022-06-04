@extends('user._partials.app')
@section('title','Beranda')
@section('main-content')
<div class="container">
    <div class="bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            <span class="text-uppercase cl2 p-r-8">
                Kegiatan:
            </span>
            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                data-out="fadeOutDown">
                @foreach($kegiatans as $kegiatan)
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{ $kegiatan->created_at->isoFormat('D,
                    MMMM
                    Y, H:mm') }} {{ $kegiatan->title }} Deskripsi: {{ $kegiatan->description }}
                </span>
                @endforeach
            </span>
        </div>
    </div>
</div>
<section class="bg12 p-t-40 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 align-self-center">
                <h2 class="f3-l-1">Selamat Datang di KPPAD Kalimantan Barat</h2>
                <br>
                <p class="f3-m-1 text-justify">Komisi Perlindungan dan Pengawasan Anak Daerah Kalimantan Barat atau
                    disingkat dengan
                    <strong>(KPPAD)</strong> merupakan organisasi
                    yang bertugas untuk melindungi dan mengawasi kemungkinan berbagai kejahatan anak.
                </p>
                <br>
                <p class="f3-m-1 text-justify">Laporkan berbagai kasus terkait pelanggaran hak anak pada website ini,
                    ayo lindungi
                    penerus generasi bangsa.</p>
                <br>
                <a href="{{ route('user.pengaduan-online') }}" class="btn btn-success mr-2">Laporkan!</a>
                <a href="{{ route('register') }}" class="btn btn-info">Daftar Akun</a>
            </div>
            <div class="col-lg-5">
                <div class="bg-img1 size-a-3 how1 pos-relative"
                    style="background-image: url('{{ asset('magnews2/images/KPPADKalbarLogo.png') }}');">
                </div>
            </div>
        </div>
</section>
@endsection