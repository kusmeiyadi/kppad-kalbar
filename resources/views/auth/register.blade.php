@extends('user._partials.app')
@section('title','Daftar Akun')
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <span class="breadcrumb-item f1-s-3 cl9">
                Daftar Akun
            </span>
        </div>
    </div>
</div>
<section class="bg12 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Akun') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                    }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK')
                                    }}</label>
                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                        name="nik" value="{{ old('nik') }}" required>

                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                    __('Confirm
                                    Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror"
                                        value="true" name="terms" id="keep-signed" {{ !old('terms') ?: 'checked' }}>
                                    <label class="form-check-label">
                                        {{ __('Saya setuju dengan') }}
                                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                                            {{ __('Syarat & Ketentuan') }}
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Syarat & Ketentuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><strong>Syarat & Ketentuan di KPPAD Kalbar</strong></li>
                                    <li class="text-justify">1. Dengan mendaftarkan akun di website ini maka anda
                                        bersedia mematuhi syarat
                                        dan ketentuan yang berlaku.</li>
                                    <li class="text-justify">2. Anda tidak boleh melaporkan data palsu dan
                                        menyalahgunakan website ini dengan
                                        cara apapun yang dapat mengganggu pengguna lain untuk menggunakan Layanan atau
                                        Situs Web lunak orang lain, bahan-bahan yang menghina, atau materi atau data
                                        yang melanggar hukum apapun .</li>
                                    <li class="text-justify">3. Setiap pihak berjanji akan menjaga menjaga kerahasiaan
                                        semua Informasi
                                        Rahasia pihak lainnya berkenaan dengan ketentuan ini. Setiap pihak tidak akan,
                                        tanpa persetujuan tertulis dari pihak yang lain, mengungkapkan atau memberi
                                        Informasi Rahasia kepada siapapun, atau menggunakannya untuk kepentingan
                                        sendiri, selain sebagaimana dimaksud oleh ketentuan ini.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection