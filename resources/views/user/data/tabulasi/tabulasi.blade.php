@extends('user._partials.app')
@section('title','Tabulasi Data')
@section('main-content')
<style>
    .ribbon {
        display: block;
        overflow: hidden;
    }

    .ribbon span {
        text-align: center;
        display: block;
        background-color: #ea4335;
        position: absolute;
        color: #fff;
        -webkit-transform: none;
        transform: none;
        bottom: 91px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
</style>
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Tabulasi Data
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="card">
            <div class="card-header bg-transparent">
                <h1 class="card-title"><strong> Tabulasi Data Perlindungan Anak </strong></h1>
            </div>
            <div class="card-body">
                <table id="example3"
                    class="table table-bordered table-striped table-hover dataTable dtr-inline text-nowrap display"
                    role=grid>
                    <thead>
                        <tr>
                            <th class="text-center align-middle" rowspan="2">#</th>
                            <th rowspan="2" class="align-middle">Klaster/Bidang</th>
                            <th style="border: 0cm">
                                Tahun
                            </th>
                        </tr>
                        <tr>
                            @foreach ($pengaduans as $pengaduan)
                            <th> {{ $pengaduan->year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_kasus as $kasus)
                        <tr>
                            <th class="text-center">{{ $loop->iteration }}.</th>
                            <td>{{ $kasus->nama_kasus }}</td>
                            @foreach ($pengaduans as $pengaduan)
                            <td>
                                @if ($kasus->id == 14)
                                {{ $pengaduan->ksl }}
                                @endif
                                @if ($kasus->id == 13)
                                {{ $pengaduan->abk }}
                                @endif
                                @if ($kasus->id == 12)
                                {{ $pengaduan->kf }}
                                @endif
                                @if ($kasus->id == 11)
                                {{ $pengaduan->pr }}
                                @endif
                                @if ($kasus->id == 10)
                                {{ $pengaduan->pa }}
                                @endif
                                @if ($kasus->id == 9)
                                {{ $pengaduan->nap }}
                                @endif
                                @if ($kasus->id == 8)
                                {{ $pengaduan->pen }}
                                @endif
                                @if ($kasus->id == 7)
                                {{ $pengaduan->per }}
                                @endif
                                @if ($kasus->id == 6)
                                {{ $pengaduan->hka }}
                                @endif
                                @if ($kasus->id == 5)
                                {{ $pengaduan->tr }}
                                @endif
                                @if ($kasus->id == 4)
                                {{ $pengaduan->abh }}
                                @endif
                                @if ($kasus->id == 3)
                                {{ $pengaduan->kp }}
                                @endif
                                @if ($kasus->id == 2)
                                {{ $pengaduan->kf }}
                                @endif
                                @if ($kasus->id == 1)
                                {{ $pengaduan->ks }}
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center align-middle"></th>
                            <th class="align-middle">Jumlah</th>
                            @foreach ($pengaduans as $pengaduan)
                            <th> {{ $pengaduan->total }}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection