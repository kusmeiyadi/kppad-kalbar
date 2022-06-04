@extends('user._partials.app')
@section('title','Verifikasi Email')
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <span class="breadcrumb-item f1-s-3 cl9">
                Email Verifikasi
            </span>
        </div>
    </div>
</div>
<section class="bg12 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifikasi Email Kamu') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                        @endif

                        {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                        {{ __('Jika Anda tidak menerima email') }},
                        <a href="{{ route('verification.resend') }}"
                            onclick="event.preventDefault(); document.getElementById('email-form').submit();">{{
                            __('klik di sini untuk kirim ulang') }}
                        </a>.

                        <form id="email-form" action="{{ route('verification.resend') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection