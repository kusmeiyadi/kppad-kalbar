@extends('user._partials.app')
@section('title','Hubungi Kami')
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <span class="breadcrumb-item f1-s-3 cl9">
                Hubungi Kami
            </span>
        </div>
    </div>
</div>
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        Hubungi Kami
    </h2>
</div>
<section class="bg12 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-8 p-b-80">
                <div class="p-r-10 p-r-0-sr991">
                    <form action="{{ route('user.hubungi-kami/kirim') }}" method="Post">
                        @csrf
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input
                            class="form-control bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20 @error('nama') is-invalid @enderror"
                            type="text" name="nama" placeholder="Nama Lengkap">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input
                            class="form-control bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20 @error('email') is-invalid @enderror"
                            type="email" name="email" placeholder="Alamat Email">
                        @error('subjek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input
                            class="form-control bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20 @error('subjek') is-invalid @enderror"
                            type="text" name="subjek" placeholder="Subjek">
                        @error('pesan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <textarea
                            class="form-control bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20 @error('pesan') is-invalid @enderror"
                            name="pesan" placeholder="Isi Pesan" style="resize: none"></textarea>
                        @error('g-recaptcha-response')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {!! NoCaptcha::display() !!}
                        {!! NoCaptcha::renderJs() !!}
                        <button class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                            KIRIM
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">
                    <div class="p-b-23">
                        <ul class="p-t-35">
                            <li class="flex-wr-sb-s p-b-22">
                                <p class="f1-s-7"> Alamat: </p>
                                <p class="f1-s-2 cl3">
                                    Jl. Daeng Abdul Hadi No. 146 Akcaya, Pontianak Selatan, Kota Pontianak, Kalimantan
                                    Barat 78116
                                </p>
                            </li>
                            <li class="flex-wr-sb-s p-b-22">
                                <p class="f1-s-7"> Telepon: </p>
                                <a href="#" class="size-w-3 f1-s-2 cl3 hov-cl10 trans-03">
                                    (0561) 8180563
                                </a>
                            </li>
                            <li class="flex-wr-sb-s p-b-22">
                                <p class="f1-s-7"> Pengaduan: </p>
                                <a href="#" class="size-w-3 f1-s-2 cl3 hov-cl10 trans-03">
                                    (021) xxxxxxxx
                                </a>
                            </li>
                            <li class="flex-wr-sb-s p-b-22">
                                <p class="f1-s-7"> WhatsApp Pengaduan: </p>
                                <a href="https://api.whatsapp.com/send?phone=628125463200&text=hi"
                                    class="size-w-3 f1-s-2 cl3 hov-cl10 trans-03">
                                    +628125463200
                                </a>
                            </li>
                            <li class="p-b-22">
                                <p class="f1-s-7"> Email: </p>
                                <a href="#" class="size-w-3 f1-s-2 cl3 hov-cl10 trans-03">
                                    kppadkalbar@gmail.com
                                </a>
                            </li>
                            <li class="p-b-22">
                                <p class="f1-s-7"> Web: </p>
                                <a href="#" class="size-w-3 f1-s-2 cl3 hov-cl10 trans-03">
                                    kppad.go.id
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection