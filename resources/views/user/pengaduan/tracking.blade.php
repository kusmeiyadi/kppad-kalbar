@extends('user._partials.app')
@section('title', 'Monitoring Pengaduan')
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.html" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Monitoring Pengaduan
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="m-b-20"><b> Monitoring Pengaduan </b></h1>
                <form action="/search" method="get">
                    <div class="input-group col-lg-6">
                        <input type="search" name="search" class="form-control font-weight-bold"
                            placeholder="Masukkan kode disini">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info" name="button"> CARI </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection