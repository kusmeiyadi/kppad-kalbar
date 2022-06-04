@extends('user._partials.app')
@section('title','Regulasi Anak')
@section('main-content')
<style>
    @media (min-width:356px) {
        .card-columns {
            column-count: 2;
        }
    }

    @media (min-width:576px) {
        .card-columns {
            column-count: 2;
        }
    }

    @media (min-width:768px) {
        .card-columns {
            column-count: 3;
        }
    }

    @media (min-width:992px) {
        .card-columns {
            column-count: 4;
        }
    }

    @media (min-width:1200px) {
        .card-columns {
            column-count: 4;
        }
    }
</style>
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Regulasi Anak
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="m-b-20"><b>Regulasi Terkait Anak</b></h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="dropdown float-right">
                            <button class="dropdown-toggle m-b-20" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Selengkapnya
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="{{ route('regulasi-anak/undang-undang') }}">UNDANG-UNDANG</a>
                                <a class="dropdown-item" href="{{ route('regulasi-anak/pemerintah') }}">PERATURAN
                                    PEMERINTAH</a>
                                <a class="dropdown-item" href="{{ route('regulasi-anak/presiden') }}">PERATURAN
                                    PRESIDEN</a>
                                <a class="dropdown-item" href="{{ route('regulasi-anak/menteri') }}">PERATURAN
                                    MENTERI</a>
                                <a class="dropdown-item" href="{{ route('regulasi-anak/daerah') }}">PERATURAN DAERAH</a>
                                <a class="dropdown-item" href="{{ route('regulasi-anak/bupati') }}">PERATURAN BUPATI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-columns">
                @foreach ($regulasis as $regulasi)
                <div class="card">
                    <img class="card-img-top"
                        src="{{ asset('/AdminLTE-3.0.2/dist/img/regulasi/'.$regulasi->deskripsi.'.png') }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <span class="badge badge-danger">{{
                            $regulasi->kategori
                            }}</span>
                        <h5 class="card-title">
                            <strong><a href="{{ route('regulasi.show',$regulasi->slug) }}" class="text-dark"> {{
                                    $regulasi->deskripsi }}</a></strong>
                        </h5>
                        <p class="card-text"><small>{{ $regulasi->upload_by }} -
                                <span>{{$regulasi->created_at->isoFormat('D
                                    MMMM
                                    Y')
                                    }}</span></small></p>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Unduh: <a href="{{ route('regulasi.download', $regulasi->slug) }}"
                                class="f1-s-2"> {{ $regulasi->deskripsi }}
                            </a></small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection