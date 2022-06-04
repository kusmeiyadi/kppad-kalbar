@extends('admin._partials.app')
@section('title', 'Pengaduan Detail')
@section('headSection')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
<script src="https://unpkg.com/sweetalert2@7.26.29/dist/sweetalert2.all.js"></script>
<style type="text/css">
    li:hover>.edit {
        display: inline;
    }

    .edit {
        display: none;
    }

    td>input[type=text] {
        border: none;
    }

    td>input[type=text]:focus {
        border: none;
    }
</style>
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('pengaduan-masuk.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengaduan Detail | <b><span>{{ $pengaduan->kode }}</span></b></h3>
            <div class="card-tools">
                @foreach ($pengaduan->status as $status)
                {{ $status->status }}
                @endforeach
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{ $pengaduan->jenis_kasus->nama_kasus }}</h4>
                            <div class="post">
                                <h6><span><b>Pelapor:</b>
                                        <li class="list-unstyled">
                                            {{ $pengaduan->pelapor->nama_p }} | {{ $pengaduan->pelapor->kontak_p }} | {{
                                            $pengaduan->pelapor->jk_p }}
                                            @if($pengaduan->is_approved == 1)
                                            <a href="#" data-pelaporid="{{ $pengaduan->pelapor->id }}"
                                                data-toggle="modal" data-target="#modal-info"
                                                class="edit text-secondary float-right"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            @endif
                                            <div class="modal fade" id="modal-info">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">{{ $pengaduan->pelapor->nama_p }} |
                                                                Pelapor</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('sunting.pelapor', $pengaduan->pelapor->id) }}"
                                                            method="post">
                                                            @method('patch')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-sm">
                                                                    <input type="text" id="pelaporid" name="pelapor_id"
                                                                        hidden>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nama Lengkap</th>
                                                                            <td><input type="text" name="nama_p"
                                                                                    value="{{ $pengaduan->pelapor->nama_p }}">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th><label for="identitas_p">No.
                                                                                        Identitas</label></th>
                                                                                <td><input type="text"
                                                                                        name="identitas_p"
                                                                                        value="{{ $pengaduan->pelapor->identitas_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label for="jk_p">Jenis
                                                                                        Kelamin</label></th>
                                                                                <td>
                                                                                    <input type="text" name="jk_p"
                                                                                        value="{{ $pengaduan->pelapor->jk_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Agama</label></th>
                                                                                <td>
                                                                                    <input type="text" name="agama_p"
                                                                                        value="{{ $pengaduan->pelapor->agama_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th><label>Tempat/Tanggal Lahir</label>
                                                                                </th>
                                                                                <td>
                                                                                    <input type="text" name="tempat_p"
                                                                                        value="{{ $pengaduan->pelapor->tempat_lahir }}">/
                                                                                    <input type="date" name="tanggal_p"
                                                                                        value="{{ Carbon\Carbon::parse($pengaduan->pelapor->tanggal_lahir)->isoFormat('D, MMMM Y') }}
                                                                                    ">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Kewarganegaraan</label></th>
                                                                                <td>
                                                                                    <input type="text"
                                                                                        name="kewarganegaraan_p"
                                                                                        value="{{ $pengaduan->pelapor->kewarganegaraan_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label
                                                                                        for="kontak_p">Kontak</label>
                                                                                </th>
                                                                                <td>
                                                                                    <input type="text" name="kontak_p"
                                                                                        value="{{ $pengaduan->pelapor->kontak_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Alamat</label></th>
                                                                                <td>
                                                                                    <input type="text" name="alamat_p"
                                                                                        value="{{ $pengaduan->pelapor->alamat_p }}">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Hubungan dengan
                                                                                        korban</label></th>
                                                                                <td>
                                                                                    @isset($pengaduan->pelapor->relasi_p)
                                                                                    {{ $pengaduan->pelapor->relasi_p }}
                                                                                    @endisset
                                                                                    @empty($pengaduan->pelapor->relasi_p)
                                                                                    Tidak ada hubungan relasi
                                                                                    @endempty
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-outline-light"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-light">Perbaharui</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </li>
                                    </span>
                                </h6>
                                @foreach($pengaduan->pelapor->korban as $korban)
                                <h6>
                                    <span>
                                        <b>Korban:</b>
                                        <ol>
                                            <li>
                                                <a href="#">{{ $korban->nama_k }}</a> | {{ $korban->usia_k }} | {{
                                                $korban->jk_k }}
                                                @if($pengaduan->is_approved == 1)
                                                <a href="#" data-korbanid="{{ $korban->id }}" data-toggle="modal"
                                                    data-target="#modal-secondary"
                                                    class="edit text-secondary float-right"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                @endif
                                                <div class="modal fade" id="modal-secondary">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{ $korban->nama_k }} | Korban
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form action="{{ route('sunting.korban', $korban->id) }}"
                                                                method="post">
                                                                @method('patch')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-sm">
                                                                        <input type="text" id="korbanid"
                                                                            name="korban_id" hidden>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama Lengkap</th>
                                                                                <td><input type="text" name="nama_k"
                                                                                        value="{{ $korban->nama_k }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class=" form-group">
                                                                                    <th>Agama</th>
                                                                                    <td><input type="text"
                                                                                            name="agama_k"
                                                                                            value="{{ $korban->agama_k }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class=" form-group">
                                                                                    <th>Status</th>
                                                                                    <td>
                                                                                        <input type="text" name="status"
                                                                                            value="{{ $korban->status }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class=" form-group">
                                                                                    <th>Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="alamat_k"
                                                                                            value="{{ $korban->alamat_k }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class=" form-group">
                                                                                    <th>Identitas Kelahiran</th>
                                                                                    <td> Tidak ada
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Kewarganegaraan</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="kewarganegaraan_k"
                                                                                            value="{{ $korban->kewarganegaraan_k }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class=" form-group">
                                                                                    <th>Sekolah / Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="sekolah_k" value="">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                    <div class=" modal-footer justify-content-between">
                                                                        <button type="button"
                                                                            class="btn btn-outline-light"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-outline-light">Perbaharui</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </li>
                                        </ol>
                                    </span>
                                </h6>
                                @endforeach
                                @foreach($pengaduan->pelapor->terlapor as $terlapor)
                                <h6>
                                    <span>
                                        <b>Terlapor:</b>
                                        <ol>
                                            <li>
                                                <a href="#">{{ $terlapor->nama_t }}</a>
                                                | {{ $terlapor->usia_t }} | {{ $terlapor->jk_t }}
                                                @if($pengaduan->is_approved == 1)
                                                <a href="#" data-terlaporid="{{ $terlapor->id }}" data-toggle="modal"
                                                    data-target="#modal-success"
                                                    class="edit text-secondary float-right"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                @endif
                                                <div class="modal fade" id="modal-success">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{ $terlapor->nama_t }} |
                                                                    Terlapor</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('sunting.terlapor', $terlapor->id) }}"
                                                                method="post">
                                                                @method('patch')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-sm">
                                                                        <input type="text" id="terlaporid"
                                                                            name="terlapor_id" hidden>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama Lengkap</th>
                                                                                <td><input type="text" name="nama_t"
                                                                                        value="{{ $terlapor->nama_t }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Jenis Kelamin</th>
                                                                                <td><input type="text" name="jk_t"
                                                                                        value="{{ $terlapor->jk_t }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Usia</th>
                                                                                    <td>
                                                                                        <input type="text" name="usia_t"
                                                                                            value="{{ $terlapor->usia_t }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Agama</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="agama_t"
                                                                                            value="{{ $terlapor->agama_t }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Kontak</th>
                                                                                    <td>
                                                                                        @isset($terlapor->kontak_t)
                                                                                        {{ $terlapor->kontak_t }}
                                                                                        @endisset
                                                                                        @empty($terlapor->kontak_t)
                                                                                        Belum ada data
                                                                                        @endempty
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Kewarganegaraan</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="kewarganegaraan_t"
                                                                                            value="{{ $terlapor->kewarganegaraan_t }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="alamat_t"
                                                                                            value="{{ $terlapor->alamat_t }}">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button"
                                                                            class="btn btn-outline-light"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-outline-light">Perbaharui</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </li>
                                        </ol>
                                    </span>
                                </h6>
                                @endforeach
                                <h6><b><span>Kronologi kejadian</span></b></h6>
                                <p>
                                    {{ $pengaduan->kronologi }}
                                </p>
                            </div>
                            <div class="post">
                                <h4>Barang Bukti</h4>
                                @foreach($pengaduan->bukti as $bukti)
                                <img src="{{ asset('/bukti/'.$bukti->filenames) }}" width="50px" height="50"
                                    alt="bukti-pengaduan" class="img-thumbnail">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-center mt-5 mb-3">
                        <h5 class="mt-5 text-muted">Persetujuan</h5>
                        @if($pengaduan->is_approved == 0)
                        <button type="button" class="btn btn-sm btn-success"
                            onclick="approvePost({{ $pengaduan->id }})">
                            <i class="fas fa-check"></i>
                            <span>Terima</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="tolak({{ $pengaduan->id }})">
                            <i class="fas fa-times"></i>
                            <span>Tolak</span>
                        </button>
                        <form method="post" action="{{ route('pengaduan.approve',$pengaduan->id) }}" id="approval-form"
                            style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        <form method="post" action="{{ route('pengaduan.tolak',$pengaduan->id) }}" id="tolak-form"
                            style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        @elseif($pengaduan->is_approved == 1)
                        <button type="button" class="btn btn-sm btn-success" disabled>
                            <i class="fas fa-check"></i>
                            <span>Diterima</span>
                        </button>
                        @elseif($pengaduan->is_approved == 2)
                        <button type="button" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-times"></i>
                            <span>Ditolak</span>
                        </button>
                        @endif
                    </div>
                    @if($pengaduan->is_approved == 1)
                    <h5 class="mt-5 text-muted">Serahkan Kasus ini kepada Komisioner :</h5>
                    @if($pengaduan->komisioner_id == 5)
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{
                                $pengaduan->komisioner->name }}</a>
                        </li>
                    </ul>
                    @elseif($pengaduan->komisioner_id == 4)
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{
                                $pengaduan->komisioner->name }}</a>
                        </li>
                    </ul>
                    @elseif($pengaduan->komisioner_id == 3)
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{
                                $pengaduan->komisioner->name }}</a>
                        </li>
                    </ul>
                    @elseif($pengaduan->komisioner_id == 2)
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{
                                $pengaduan->komisioner->name }}</a>
                        </li>
                    </ul>
                    @elseif($pengaduan->komisioner_id == 1)
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{
                                $pengaduan->komisioner->name }}</a>
                        </li>
                    </ul>
                    @elseif($pengaduan->komisioner_id == 0)
                    <form action="{{ route('pengaduan.serahkan',$pengaduan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <select class="custom-select" name="komisioner">
                                @foreach($komisioner as $kms)
                                <option value="{{$kms->id}}">{{ $kms->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-check"></i>
                                <span>Terapkan</span>
                            </button>
                        </div>
                    </form>
                    @endif
                    <h5 class="mt-5 text-muted">Jenis kasus yang dilaporkan: </h5>
                    <form action="{{ route('pengaduan.pasal', $pengaduan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!-- checkbox -->
                                @php
                                if (empty($pengaduan->pasal))
                                {
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox1" value="option1">
                                    <label for="customCheckbox1" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox2" value="option2">
                                    <label for="customCheckbox2" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox3" value="option3">
                                    <label for="customCheckbox3" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                }
                                else
                                {
                                $pasal=explode(',',$pengaduan->pasal);
                                if(in_array('option1', $pasal))
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox1" value="option1" checked>
                                    <label for="customCheckbox1" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                else
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox1" value="option1">
                                    <label for="customCheckbox1" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                if(in_array('option2', $pasal))
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox2" value="option2" checked>
                                    <label for="customCheckbox2" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                else
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox2" value="option2">
                                    <label for="customCheckbox2" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                if(in_array('option3', $pasal))
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox3" value="option3" checked>
                                    <label for="customCheckbox3" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                else
                                echo '<div class="custom-control custom-checkbox">
                                    <input name="pasal[]" class="custom-control-input" type="checkbox"
                                        id="customCheckbox3" value="option3">
                                    <label for="customCheckbox3" class="custom-control-label">Pasal ..... UU No. 35
                                        Tahun 2014</label>
                                </div>';
                                }
                                @endphp
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Terapkan</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footerSection')
<script>
    $('#modal-info').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var pelaporid = button.data('pelaporid')
    var modal = $(this)
    modal.find('.modal-body #pelaporid').val(pelaporid);
});

$('#modal-secondary').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var korbanid = button.data('korbanid')
    var modal = $(this)
    modal.find('.modal-body #korbanid').val(korbanid);
});

$('#modal-success').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var terlaporid = button.data('terlaporid')
    var modal = $(this)
    modal.find('.modal-body #terlaporid').val(terlaporid);
});
</script>
<script>
    function approvePost(id) {
    swal({
        title: 'Apakah Kamu Yakin?',
        text: "Kamu menerima pengaduan ini ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, terima pengaduan!',
        cancelButtonText: 'Tidak, batal!',
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approval-form').submit();
        } else if (
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Dibatalkan',
                'Pengaduan masih dalam status pending :)',
                'info'
            )
        }
    })
}

function tolak(id) {
    swal({
        title: 'Apakah Kamu Yakin?',
        text: "Kamu menolak pengaduan ini ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, tolak pengaduan!',
        cancelButtonText: 'Tidak, batal!',
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('tolak-form').submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Dibatalkan',
                'Pengaduan masih dalam status pending :)',
                'info'
            )
        }
    })
}

</script>
@endsection