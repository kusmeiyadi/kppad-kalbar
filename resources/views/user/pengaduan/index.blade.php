@extends('user._partials.app')
@section('title','Pengaduan Online')
@section('head')
<link href="{{ asset('ednews/plugin-frameworks/select2.css') }}" rel="stylesheet">
<style type="text/css">
    .header:after {
        content: "\f106";
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        padding-left: 5px;
    }

    .hidden {
        display: none !important;
    }

    .header.collapsed:after {
        content: "\f107";
    }

    .box {
        position: relative;
        background: #ffffff;
    }

    .box-header {
        color: #444;
        display: flex;
        width: auto;
    }

    .box-body {
        flex: 0;
    }

    .box-tools {
        flex: 0;
    }

    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        border-radius: 10px;
        color: #92b0b3;
        position: relative;
        height: 150px;
    }

    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 100%;
        top: 30px;
        font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
        position: absolute;
        outline: none !important;
        width: 100%;
        height: 150px;
        cursor: pointer;
        opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #F5FFFA;
    }

    .preview-zone .box {
        box-shadow: none;
        border-radius: 0;
        margin-bottom: 0;
        margin-right: auto;
    }
</style>
@endsection
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Pengaduan Online
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="modal fade" id="verifikasiEmail" tabindex="-1" role="dialog" aria-labelledby="verifikasiEmailTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Maaf, anda belum memverifikasi email anda. Mohon cek di email anda.
                        </p>
                        <p>
                            {{ __('Jika anda tidak menerima email') }} <a href="{{ route('verification.resend') }}">{{
                                __('klik di sini untuk kirim ulang') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Login untuk melapor</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email
                                    ') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{
                                    __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Log In') }}
                            </button>
                            <div class="text-center p-t-20">
                                <span>Belum punya akun? <a href="{{ route('register') }}">Buat
                                        akun</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="pengaduan" method="post" action="{{ route('user.pengaduan-online-kirim') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @php
                    $random = Str::random(6);
                    @endphp
                    <div class="card ms-auto">
                        <div class="card-header text-center">
                            <h5><strong>Form Pengaduan Online</strong></h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="kode" value="#{{ $random }}">
                            <input type="hidden" name="expire_date" value="72">
                            <input type="hidden" name="provinsi" value="Kalimantan Barat">
                            <div class="form-group">
                                <label class="f1-s-5" for="kabupaten">Kabupaten/Kota<span
                                        style="color:#B94A48;">*</span></label>
                                <select class="form-control form-control-sm" name="kabupaten" id="kabupaten">
                                    <option value="KAB. BENGKAYANG" {{ old('kabupaten')=="KAB. BENGKAYANG" ? 'selected'
                                        : '' }}>
                                        KAB. BENGKAYANG </option>
                                    <option value="KAB. KAPUAS HULU" {{ old('kabupaten')=="KAB. KAPUAS HULU"
                                        ? 'selected' : '' }}>
                                        KAB. KAPUAS HULU </option>
                                    <option value="KAB. KAYONG UTARA" {{ old('kabupaten')=="KAB. KAYONG UTARA"
                                        ? 'selected' : '' }}>
                                        KAB. KAYONG UTARA </option>
                                    <option value="KAB. KETAPANG" {{ old('kabupaten')=="KAB. KETAPANG" ? 'selected' : ''
                                        }}>
                                        KAB.
                                        KETAPANG </option>
                                    <option value="KAB. KUBU RAYA" {{ old('kabupaten')=="KAB. KUBU RAYA" ? 'selected'
                                        : '' }}>
                                        KAB.
                                        KUBU RAYA </option>
                                    <option value="KAB. LANDAK" {{ old('kabupaten')=="KAB. LANDAK" ? 'selected' : '' }}>
                                        KAB.
                                        LANDAK </option>
                                    <option value="KAB. MELAWI" {{ old('kabupaten')=="KAB. MELAWI" ? 'selected' : '' }}>
                                        KAB.
                                        MELAWI </option>
                                    <option value="KAB. MEMPAWAH" {{ old('kabupaten')=="KAB. MEMPAWAH" ? 'selected' : ''
                                        }}>
                                        KAB.
                                        MEMPAWAH </option>
                                    <option value="KAB. SAMBAS" {{ old('kabupaten')=="KAB. SAMBAS" ? 'selected' : '' }}>
                                        KAB.
                                        SAMBAS </option>
                                    <option value="KAB. SANGGAU" {{ old('kabupaten')=="KAB. SANGGAU" ? 'selected' : ''
                                        }}> KAB.
                                        SANGGAU </option>
                                    <option value="KAB. SEKADAU" {{ old('kabupaten')=="KAB. SEKADAU" ? 'selected' : ''
                                        }}> KAB.
                                        SEKADAU </option>
                                    <option value="KAB. SINTANG" {{ old('kabupaten')=="KAB. SINTANG" ? 'selected' : ''
                                        }}> KAB.
                                        SINTANG </option>
                                    <option value="KOTA PONTIANAK" {{ old('kabupaten')=="KOTA PONTIANAK" ? 'selected'
                                        : '' }}>
                                        KOTA
                                        PONTIANAK </option>
                                    <option value="KOTA SINGKAWANG" {{ old('kabupaten')=="KOTA SINGKAWANG" ? 'selected'
                                        : '' }}>
                                        KOTA SINGKAWANG </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="f1-s-5" for="jenis_kasus">Jenis kasus<span
                                        style="color:#B94A48;">*</span></label>
                                <select onchange="yesnoCheck(this);" class="form-control form-control-sm"
                                    id="jenis_kasus" name="jenis_kasus">
                                    @foreach ($jenis_kasus as $row)
                                    <option value="{{ $row->id }}" {{ old('jenis_kasus')==$row->id ? 'selected'
                                        : '' }}>
                                        {{
                                        $row->nama_kasus }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="ifYes" class="form-group"
                                style="display: {{ old('jenis_kasus_kdll') ? 'block' : 'none' }}">
                                <input type="text" class="form-control form-control-sm" name="jenis_kasus_kdll"
                                    autofocus autocomplete="jenis_kasus_kdll" placeholder="Konsultasi dan lain-lain">
                            </div>
                            <h5 class="p-tb-15">
                                <a class="f1-m-3 cl2 hov-cl10 header collapsed" data-toggle="collapse" href="#pelapor"
                                    aria-expanded="false" aria-controls="pelapor">
                                    <strong>PELAPOR</strong>
                                </a>
                            </h5>
                            <div class="how-bor3">
                                <div class="collapse multi-collapse {{ $errors->has('jk_p') ? 'show' : '' }} {{ $errors->has('tempat_lahir') ? 'show' : '' }} {{ $errors->has('tanggal_lahir') ? 'show' : '' }} {{ $errors->has('kontak_p') ? 'show' : '' }} {{ $errors->has('alamat_p') ? 'show' : '' }}"
                                    id="pelapor">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="nama_p" class="f1-s-5"> Nama Lengkap<span
                                                    style="color:#B94A48;">*</span></label>
                                            <input type="text" class="form-control form-control-sm" name="nama_p"
                                                id="nama_p" value="{{ old('nama_p') ?? Auth::user()->name ?? '' }}"
                                                autocomplete="nama_p" autofocus readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="f1-s-5" for="identitas_p">NIK<span
                                                    style="color:#B94A48;">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="identitas_p"
                                                id="identitas_p"
                                                value="{{ old('identitas_p') ?? Auth::user()->nik ?? '' }}"
                                                autocomplete="identitas_p" autofocus readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="f1-s-5" for="jk_p">Jenis Kelamin<span
                                                    style="color:#B94A48;">*</span></label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jk_p" id="jk_pria_p"
                                                    class="form-check-input @error('jk_p') is-invalid @enderror"
                                                    value="Pria" {{ (old('jk_p')=='Pria' ) ? 'checked' : '' }}>
                                                <label for="jk_pria_p" class="form-check-label">Pria</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jk_p" id="jk_wanita_p"
                                                    class="form-check-input @error('jk_p') is-invalid @enderror"
                                                    value="Wanita" {{ (old('jk_p')=='Wanita' ) ? 'checked' : '' }}>
                                                <label for="jk_wanita_p" class="form-check-label">Wanita</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="agama_p" class="f1-s-5">Agama<span
                                                    style="color:#B94A48;">*</span></label>
                                            <select class="form-control form-control-sm" name="agama_p" id="agama_p">
                                                <option value="Islam" {{ old('agama_p')=="Islam" ? 'selected' : '' }}>
                                                    Islam </option>
                                                <option value="Kristen Katolik" {{ old('agama_p')=="Kristen Katolik"
                                                    ? 'selected' : '' }}> Kristen Katolik </option>
                                                <option value="Kristen Protestan" {{ old('agama_p')=="Kristen Protestan"
                                                    ? 'selected' : '' }}> Kristen Protestan </option>
                                                <option value="Hindu" {{ old('agama_p')=="Hindu" ? 'selected' : '' }}>
                                                    Hindu </option>
                                                <option value="Budha" {{ old('agama_p')=="Budha" ? 'selected' : '' }}>
                                                    Budha </option>
                                                <option value="Konghucu" {{ old('agama_p')=="Konghucu" ? 'selected' : ''
                                                    }}> Konghucu </option>
                                                <option value="Bahai" {{ old('agama_p')=="Bahai" ? 'selected' : '' }}>
                                                    Bahai </option>
                                                <option value="Kepercayaan Lainnya" {{
                                                    old('agama_p')=="Kepercayaan Lainnya" ? 'selected' : '' }}>
                                                    Kepercayaan Lainnya </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="f1-s-5" for="kewarganegaraan_p">
                                                Kewarganegaraan<span style="color:#B94A48;">*</span></label>
                                            <select class="form-control form-control-sm" name="kewarganegaraan_p"
                                                id="kewarganegaraan_p">
                                                <option value="WNI" {{ old('kewarganegaraan_p')=="WNI" ? 'selected' : ''
                                                    }}>WNI
                                                </option>
                                                <option value="WNA" {{ old('kewarganegaraan_p')=="WNA" ? 'selected' : ''
                                                    }}>WNA
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="f1-s-5" for="tempat_lahir">Tempat Lahir<span
                                                    style="color:#B94A48;">*</span></label>
                                            <input
                                                class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                                type="text" name="tempat_lahir" id="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir" autofocus>
                                            @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="f1-s-5" for="tanggal_lahir">Tanggal Lahir<span
                                                    style="color:#B94A48;">*</span></label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                                value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir"
                                                autofocus>
                                            @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="f1-s-5" for="kontak_p">Email<span
                                                    style="color:#B94A48;">*</span></label>
                                            <input class="form-control form-control-sm" type="email" name="kontak_p"
                                                id="kontak_p" value="{{ old('kontak_P') ?? Auth::user()->email ?? '' }}"
                                                autocomplete="kontak_p" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamat_p" class="f1-s-5">Alamat<span
                                                    style="color:#B94A48;">*</span></label>
                                            <textarea id="alamat_p" name="alamat_p" rows="2"
                                                class="form-control form-control-sm @error('alamat_p') is-invalid @enderror"
                                                style="resize: none">{{old('alamat_p')}}</textarea>
                                            @error('alamat_p')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="p-tb-15">
                                <a class="f1-m-3 cl2 hov-cl10 header collapsed" data-toggle="collapse" href="#korban"
                                    aria-expanded="false" aria-controls="korban">
                                    <strong>KORBAN</strong>
                                </a>
                            </h5>
                            <div class="how-bor3">
                                <div class="collapse multi-collapse {{ $errors->any() ? 'show' : '' }}" id="korban">
                                    <div id="korban">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="nama_k[0]">Nama Lengkap<span
                                                        style="color:#B94A48;">*</span></label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nama_k.*') is-invalid @enderror"
                                                    name="nama_k[0]" id="nama_k[0]" value="{{ old('nama_k.0') }}">
                                                @error('nama_k.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="jk_k[0]">Jenis Kelamin<span
                                                        style="color:#B94A48;">*</span></label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="jk_k[0]" id="jk_pria_k[0]"
                                                        class="form-check-input @error('jk_k.*') is-invalid @enderror"
                                                        value="Pria" {{ (old('jk_k.0')=='Pria' ) ? 'checked' : '' }}>
                                                    <label for="jk_pria_k[0]" class="form-check-label">Pria</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="jk_k[0]" id="jk_wanita_k[0]"
                                                        class="form-check-input @error('jk_k.*') is-invalid @enderror"
                                                        value="Wanita" {{ (old('jk_k.0')=='Wanita' ) ? 'checked' : ''
                                                        }}>
                                                    <label for="jk_wanita_k[0]" class="form-check-label">Wanita</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="usia_k[0]" class="f1-s-5">Usia<span
                                                        style="color:#B94A48;">*</span></label>
                                                <select
                                                    class="form-control form-control-sm @error('usia_k.*') is-invalid @enderror"
                                                    id="usia_k[0]" name="usia_k[0]">
                                                    <option selected="true" disabled="disabled"> Pilihan
                                                    </option>
                                                    @for ($u=0; $u<=17; $u+=1) <option value="{{ $u }}" {{
                                                        old('usia_k.0')=="$u" ? 'selected' : '' }}>{{ $u }}
                                                        </option>
                                                        @endfor
                                                </select>
                                                @error('usia_k.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="agama_k[]">Agama<span
                                                        style="color:#B94A48;">*</span></label>
                                                <select class="form-control form-control-sm" name="agama_k[]"
                                                    id="agama_k[]">
                                                    <option value="Islam" {{ old('agama_k')=="Islam" ? 'selected' : ''
                                                        }}>
                                                        Islam </option>
                                                    <option value="Kristen Katolik" {{ old('agama_k')=="Kristen Katolik"
                                                        ? 'selected' : '' }}>
                                                        Kristen Katolik </option>
                                                    <option value="Kristen Protestan" {{
                                                        old('agama_k')=="Kristen Protestan" ? 'selected' : '' }}>
                                                        Kristen Protestan </option>
                                                    <option value="Hindu" {{ old('agama_k')=="Hindu" ? 'selected' : ''
                                                        }}>
                                                        Hindu </option>
                                                    <option value="Budha" {{ old('agama_k')=="Budha" ? 'selected' : ''
                                                        }}>
                                                        Budha </option>
                                                    <option value="Konghucu" {{ old('agama_k')=="Konghucu" ? 'selected'
                                                        : '' }}> Konghucu </option>
                                                    <option value="Bahai" {{ old('agama_k')=="Bahai" ? 'selected' : ''
                                                        }}>
                                                        Bahai </option>
                                                    <option value="Kepercayaan Lainnya" {{
                                                        old('agama_k')=="Kepercayaan Lainnya" ? 'selected' : '' }}>
                                                        Kepercayaan Lainnya </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="kewarganegaraan_k[]">
                                                    Kewarganegaraan<span style="color:#B94A48;">*</span>
                                                </label>
                                                <select class="form-control form-control-sm" name="kewarganegaraan_k[]"
                                                    id="kewarganegaraan_k[]">
                                                    <option value="WNI" {{ old('kewarganegaraan_k.0')=="WNI"
                                                        ? 'selected' : '' }}>WNI
                                                    </option>
                                                    <option value="WNA" {{ old('kewarganegaraan_k.0')=="WNA"
                                                        ? 'selected' : '' }}>WNA
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="status[0]">Pendidikan<span
                                                        style="color:#B94A48">*</span></label>
                                                <select name="status[0]"
                                                    class="form-control form-control-sm @error('status.0') is-invalid @enderror"
                                                    id="status[0]">
                                                    <option selected="true" disabled="disabled"> Pilihan
                                                    </option>
                                                    <option value="Belum Sekolah"> Belum Sekolah </option>
                                                    <option value="TK/PAUD/Sederajat"> TK/PAUD/Sederajat </option>
                                                    <option value="SD Sederajat"> SD Sederajat </option>
                                                    <option value="SMP Sederajat"> SMP Sederajat </option>
                                                    <option value="SMA Sederajat"> SMA Sederajat </option>
                                                </select>
                                                @error('status.0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 m-t-20">
                                                <a href="javascript:;" id="addRow"
                                                    class="addRow btn btn-danger btn-sm btn-flat"><i
                                                        class="fa fa-plus-circle"></i><b> Tambah</b></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="how-bor3"></div>
                                </div>
                            </div>
                            <h5 class="p-tb-15">
                                <a class="f1-m-3 cl2 hov-cl10 header collapsed" data-toggle="collapse" href="#terlapor"
                                    aria-expanded="false" aria-controls="terlapor">
                                    <strong> TERLAPOR </strong>
                                </a>
                            </h5>
                            <div class="how-bor3">
                                <div class="collapse multi-collapse" id="terlapor">
                                    <div id="terlapor">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="nama_t[0]" class="f1-s-5">Nama Lengkap</label>
                                                <input id="nama_t[0]" type="text" class="form-control form-control-sm"
                                                    name="nama_t[0]" value="{{ old('nama_t.0') }}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="usia_t[0]" class="f1-s-5">Usia</label>
                                                <input id="usia_t[0]" type="number"
                                                    class="form-control form-control-sm @error('usia_t.*') is-invalid @enderror"
                                                    type="text" name="usia_t[0]" min="1" max="99"
                                                    value="{{ old('usia_t.0') }}">
                                                <small id=" passwordHelpInline" class="text-muted">
                                                    Tahun.
                                                </small>
                                                @error('usia_t.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="f1-s-5">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="jk_t[0]" id="jk_pria_t[0]"
                                                        class="form-check-input @error('jk_t.*') is-invalid @enderror"
                                                        value="Pria" {{ (old('jk_t.0')=='Pria' ) ? 'checked' : '' }}>
                                                    <label for="jk_pria_t[0]" class="form-check-label">Pria</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="jk_t[0]" id="jk_wanita_t[0]"
                                                        class="form-check-input @error('jk_t.*') is-invalid @enderror"
                                                        value="Wanita" {{ (old('jk_t.0')=='Wanita' ) ? 'checked' : ''
                                                        }}>
                                                    <label for="jk_wanita_t[0]" class="form-check-label">Wanita</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="f1-s-5" for="agama_t[0]"> Agama </label>
                                                <select class="form-control form-control-sm" name="agama_t[0]"
                                                    id="agama_t[0]">
                                                    <option value="Islam" {{ old('agama_t')=="Islam" ? 'selected' : ''
                                                        }}>
                                                        Islam </option>
                                                    <option value="Kristen Katolik" {{ old('agama_t')=="Kristen Katolik"
                                                        ? 'selected' : '' }}>
                                                        Kristen Katolik </option>
                                                    <option value="Kristen Protestan" {{
                                                        old('agama_t')=="Kristen Protestan" ? 'selected' : '' }}>
                                                        Kristen Protestan </option>
                                                    <option value="Hindu" {{ old('agama_t')=="Hindu" ? 'selected' : ''
                                                        }}>
                                                        Hindu </option>
                                                    <option value="Budha" {{ old('agama_t')=="Budha" ? 'selected' : ''
                                                        }}>
                                                        Budha </option>
                                                    <option value="Konghucu" {{ old('agama_t')=="Konghucu" ? 'selected'
                                                        : '' }}> Konghucu </option>
                                                    <option value="Bahai" {{ old('agama_t')=="Bahai" ? 'selected' : ''
                                                        }}>
                                                        Bahai </option>
                                                    <option value="Kepercayaan Lainnya" {{
                                                        old('agama_t')=="Kepercayaan Lainnya" ? 'selected' : '' }}>
                                                        Kepercayaan Lainnya </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="kewarganegaraan_t[]">
                                                    Kewarganegaraan
                                                </label>
                                                <select class="form-control form-control-sm" name="kewarganegaraan_t[]"
                                                    id="kewarganegaraan_t[]">
                                                    <option value="WNI" {{ old('kewarganegaraan_t.0')=="WNI"
                                                        ? 'selected' : '' }}>WNI
                                                    </option>
                                                    <option value="WNA" {{ old('kewarganegaraan_t.0')=="WNA"
                                                        ? 'selected' : '' }}>WNA
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="f1-s-5" for="kontak_t[0]">Email</label>
                                                <input class="form-control form-control-sm" type="email"
                                                    name="kontak_t[0]" id="kontak_t[0]" value="{{ old('kontak_t.0') }}">
                                            </div>
                                            <div class=" form-group col-md-4">
                                                <label class="f1-s-5" for="alamat_t[0]"> Alamat </label>
                                                <textarea id="alamat_t[0]" name="alamat_t[0]" rows="2"
                                                    class="form-control"
                                                    style="resize: none">{{ old('alamat_t.0') }}</textarea>
                                            </div>
                                            <div class="form-group col-md-2 m-t-20">
                                                <a href="javascript:;" id="addRow_t"
                                                    class="addRow_t btn btn-danger btn-sm btn-flat"><i
                                                        class="fa fa-plus-circle"></i> <b> Tambah</b></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="how-bor3"></div>
                                </div>
                            </div>
                            <div class="form-group m-t-15">
                                <label class="f1-s-5 m-b-5" for="kronologi">Kronologis kejadian<span
                                        style="color:#B94A48;">*</span></label>
                                <textarea id="kronologi" name="kronologi" rows="5" cols="40"
                                    class="form-control form-control-sm @error('kronologi') is-invalid @enderror"
                                    style="resize: none;"></textarea>
                                @error('kronologi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="f1-s-5">Unggah File (Jika kronologi tidak cukup diatas)</label>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="fa fa-2x fa-file-pdf"></i>
                                        <p> Klik upload atau Drop file disini (file .pdf) </p>
                                        <p> Maksimum upload size: 2.05MB </p>
                                    </div>
                                    <input type="file" name="file" class="dropzone @error('file') is-invalid @enderror"
                                        accept="application/msword, application/pdf">
                                </div>
                                <div class="preview-zone m-t-10 hidden">
                                    <div class="box">
                                        <div class="box-header">
                                            <div class="box-body"></div>
                                            <div class="box-tools">
                                                <button type="button" class="m-l-2 f1-s-5 remove-preview">
                                                    <i class="cl12 fa fa-times-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="size-a-20 bg10 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20"
                            type="submit"><b>SELESAI
                                DAN KIRIM</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    function yesnoCheck(that) {
    if (that.value == "14") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
<script>
    $("#kabupaten").select2();
$("#jenis_kasus").select2();

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var htmlPreview =
                '<p class="f1-s-5">' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
}

$(".dropzone").change(function() {
    readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
});

</script>
<script type="text/javascript">
    var i = 0;
var t = 0;
$('.addRow').on('click', function() {
    i++;
    $('#korban').append(
        '<div class="how-bor3 m-t-10">' +
            '<div class="form-row">' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="nama_k[' + i + ']">Nama Lengkap<span style="color:#B94A48;">*</span></label>' +
                    '<input type="text" class="form-control form-control-sm" id="nama_k[' + i + ']" name="nama_k[' + i + ']" required>' +
                '</div>' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5">Jenis Kelamin<span style="color:#B94A48;">*</span></label>' +
                    '<div class="form-check form-check-inline">' +
                        '<input type="radio" name="jk_k[' + i + ']" id="jk_pria[' + i + ']" value="Pria" class="form-check-input" required>' +
                        '<label for="jk_pria[' + i + ']" class="form-check-label">Pria</label>' +
                    '</div>' +
                    '<div class="form-check form-check-inline">' +
                        '<input type="radio" name="jk_k[' + i + ']" id="jk_wanita[' + i + ']" value="Wanita" class="form-check-input" required>' +
                        '<label for="jk_wanita[' + i + ']" class="form-check-label">Wanita</label>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="usia_k[' + i + ']">Usia<span style="color:#B94A48;">*</span></label>' +
                    '<select name="usia_k[' + i + ']" class="form-control form-control-sm" id="usia_k[' + i + ']" required>' +
                        '<option value="" selected="true" disabled="disabled">Pilihan</option>' +
                        '<option value="0">0</option>' +
                        '<option value="1">1</option>' +
                        '<option value="2">2</option>' +
                        '<option value="3">3</option>' +
                        '<option value="4">4</option>' +
                        '<option value="5">5</option>' +
                        '<option value="6">6</option>' +
                        '<option value="7">7</option>' +
                        '<option value="8">8</option>' +
                        '<option value="9">9</option>' +
                        '<option value="10">10</option>' +
                        '<option value="11">11</option>' +
                        '<option value="12">12</option>' +
                        '<option value="13">13</option>' +
                        '<option value="14">14</option>' +
                        '<option value="15">15</option>' +
                        '<option value="16">16</option>' +
                        '<option value="17">17</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="agama_k[' + i + ']">Agama<span style="color:#B94A48;">*</span></label>' +
                    '<select class="form-control form-control-sm" name="agama_k[' + i + ']" id="agama_k[' + i + ']" required>' +
                        '<option value="Islam">Islam</option>' +
                        '<option value="Kristen Katolik">Kristen Katolik</option>' +
                        '<option value="Kristen Protestan">Kristen Protestan</option>' +
                        '<option value="Hindu">Hindu</option>' +
                        '<option value="Budha">Budha</option>' +
                        '<option value="Konghucu">Konghucu</option>' +
                        '<option value="Bahai">Bahai</option>' +
                        '<option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>' +
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="form-row">' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="kewarganegaraan_k[' + i + ']">Kewarganegaraan</label>' +
                    '<select class="form-control form-control-sm" name="kewarganegaraan_k[' + i + ']" id="kewarganegaraan_k[' + i + ']" required>' +
                        '<option value="WNI">WNI</option>' +
                        '<option value="WNA">WNA</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="status[' + i + ']">Pedidikan <span style="color:#B94A48">*</span></label>' +
                    '<select name="status[' + i + ']" class="form-control form-control-sm" id="status[' + i + ']" required>' +
                        '<option value="" selected="true" disabled="disabled">Pilihan</option>' +
                        '<option value="Belum Sekolah">Belum Sekolah</option>' +
                        '<option value="TK/PAUD/Sederajat">TK/PAUD/Sederajat</option>' +
                        '<option value="SD Sederajat">SD Sederajat</option>' +
                        '<option value="SMP Sederajat">SMP Sederajat</option>' +
                        '<option value="SMA Sederajat">SMA Sederajat</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-md-3 m-t-20">' +
                    '<a href="javascript:;" class="remove btn btn-sm btn-danger btn-flat"><i class="fa fa-minus-circle"></i><b> Hapus</b></a>' +
                '</div>' +
            '</div>' +
        '</div>');
});

$('.addRow_t').on('click', function() {
    t++;
    $('#terlapor').append(
        '<div class="how-bor3 m-t-10">' +
            '<div class="form-row">' +
                '<div class="form-group col-md-3">' +
                    '<label for="nama_t[' + t + ']" class="f1-s-5"> Nama Lengkap </label>' +
                    '<input id="nama_t[' + t + ']" type="text" class="form-control form-control-sm" name="nama_t[' + t + ']">' +
                '</div>' +
                '<div class="form-group col-md-1">' +
                    '<label for="usia_t[' + t + ']" class="f1-s-5">Usia</label>' +
                    '<input id="usia_t[' + t + ']" type="number" class="form-control form-control-sm" name="usia_t[' + t + ']" min="1" max="99">' +
                    '<small id=" passwordHelpInline" class="text-muted">Tahun.</small>' +
                '</div>' +
                '<div class="form-group col-md-4">' +
                    '<label class="f1-s-5">Jenis Kelamin <span style="color:#B94A48;">*</span></label>' +
                    '<div class="form-check form-check-inline">' +
                        '<input type="radio" name="jk_t[' + t + ']" id="jk_t[' + t + ']" value="Pria" class="form-check-input">' +
                        '<label for="jk_t[' + t + ']" class="form-check-label">Pria</label>' +
                    '</div>' +
                    '<div class="form-check form-check-inline">' +
                        '<input type="radio" name="jk_t[' + t + ']" id="jk_t[' + t + ']" value="Wanita" class="form-check-input">' +
                        '<label for="jk_t[' + t + ']" class="form-check-label">Wanita</label>' +
                    '</div>' +
                '</div>' +
                '<div class="form-group col-md-4">' +
                    '<label class="f1-s-5" for="agama_t[' + t + ']">Agama</label>' +
                    '<select class="form-control form-control-sm" name="agama_t[' + t + ']" id="agama_t[' + t + ']">' +
                        '<option value="Islam">Islam</option>' +
                        '<option value="Kristen Katolik">Kristen Katolik</option>' +
                        '<option value="Kristen Protestan">Kristen Protestan</option>' +
                        '<option value="Hindu">Hindu</option>' +
                        '<option value="Budha">Budha</option>' +
                        '<option value="Konghucu">Konghucu</option>' +
                        '<option value="Bahai">Bahai</option>' +
                        '<option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>' +
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="form-row">' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="kewarganegaraan_t[' + t + ']">Kewarganegaraan</label>' +
                    '<select class="form-control form-control-sm" name="kewarganegaraan_t[' + i + ']" id="kewarganegaraan_t[' + i + ']" required>' +
                            '<option value="WNI">WNI</option>' +
                            '<option value="WNA">WNA</option>' +
                    '</select>' +
                '</div>' +
                '<div class="form-group col-md-3">' +
                    '<label class="f1-s-5" for="kontak_t[' + t + ']">Email</label>' +
                    '<input class="form-control form-control-sm" type="text" name="kontak_t[' + t + ']" id="kontak_t[' + t + ']">' +
                '</div>' +
                '<div class="form-group col-md-4">' +
                    '<label class="f1-s-5" for="alamat_t[' + t + ']">Alamat</label>' +
                    '<textarea id="alamat_t[' + t + ']" name="alamat_t[' + t + ']" rows="2" class="form-control" style="resize: none"></textarea>' +
                '</div>' +
                '<div class="form-group col-md-2 m-t-20">' +
                    '<a href="javascript:;" class="remove btn btn-danger btn-sm btn-flat"><i class="fa fa-minus-circle"></i> <b> Hapus</b></a>' +
                '</div>' +
            '</div>' +
        '</div>');
});
$('.remove').live('click', function() {
    var last = $('div div').length;
    if (last == 1) {
        alert("you can not remove last row");
    } else {
        $(this).parent().parent().parent().remove();
    }
});
</script>
@endsection
@section('footer')
@if($errors->has('email') || $errors->has('password'))
<script>
    $(function() {
        $('#exampleModalCenter').modal({
            show: true
        });
    });
</script>
@endif
@if(Auth::guest())
<script>
    setTimeout(function(){
        $('#exampleModalCenter').modal({
            backdrop: 'static',
            keyboard: false,
            show: true,
            });
          }, 2000);

        $('#pengaduan').click(function(e){
            $("#exampleModalCenter").modal("show");
            return false;
        });
</script>
@else
@if(Auth::user()->email_verified_at == NULL)
<script>
    setTimeout(function(){
        $('#verifikasiEmail').modal({
            backdrop: 'static',
            keyboard: false,
            show: true,
            });
          }, 2000);

        $('#pengaduan').click(function(e){
            $("#verifikasiEmail").modal("show");
            return false;
        });
</script>
@endif
@endif
@endsection