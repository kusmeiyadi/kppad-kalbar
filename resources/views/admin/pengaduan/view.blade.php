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
            @foreach($pengaduan as $penga)
            <h3 class="card-title">Pengaduan Detail | <b><span>{{ $penga->kode }}</span></b></h3>
            @endforeach
            <div class="card-tools">
                @foreach ($penga->status as $status)
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
                            @foreach($pengaduan as $penga)
                            <h4>{{ $penga->jenis_kasus->nama_kasus }}</h4>
                            <div class="post">
                                <h6><span><b>Pelapor :</b>
                                        <li class="list-unstyled">
                                            {{ $penga->pelapor->nama_p }} | {{ $penga->pelapor->kontak_p }}
                                            | {{
                                            $penga->pelapor->jk_p }}
                                            <a href="#" data-pelaporid="{{ $penga->pelapor->id }}" data-toggle="modal"
                                                data-target="#modal-info" class="edit text-secondary float-right"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <div class="modal fade" id="modal-info">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-info">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">{{ $penga->pelapor->nama_p
                                                                }} |
                                                                Pelapor</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('sunting.pelapor', $penga->pelapor->id) }}"
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
                                                                                    value="{{ $penga->pelapor->nama_p }}"
                                                                                    class="bg-info"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th><label for="identitas_p">No.
                                                                                        Identitas</label></th>
                                                                                <td><input type="text"
                                                                                        name="identitas_p"
                                                                                        value="{{ $penga->pelapor->identitas_p }}"
                                                                                        class="bg-info"></td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label for="jk_p">Jenis
                                                                                        Kelamin</label></th>
                                                                                <td>
                                                                                    <input type="text" name="jk_p"
                                                                                        value="{{ $penga->pelapor->jk_p }}"
                                                                                        class="bg-info">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Agama</label></th>
                                                                                <td>
                                                                                    <input type="text" name="agama_p"
                                                                                        value="{{ $penga->pelapor->agama_p }}"
                                                                                        class="bg-info">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th><label>Tempat/Tanggal
                                                                                        Lahir</label>
                                                                                </th>
                                                                                <td>
                                                                                    <input type="text" name="tempat_p"
                                                                                        value="{{ $penga->pelapor->tempat_lahir }}"
                                                                                        class="bg-info">/
                                                                                    <input type="date" name="tanggal_p"
                                                                                        value="{{ Carbon\Carbon::parse($penga->pelapor->tanggal_lahir)->isoFormat('D, MMMM Y') }}
                                                                                " class="bg-info">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Kewarganegaraan</label>
                                                                                </th>
                                                                                <td>
                                                                                    <input type="text"
                                                                                        name="kewarganegaraan_p"
                                                                                        value="{{ $penga->pelapor->kewarganegaraan_p }}"
                                                                                        class="bg-info">
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
                                                                                        value="{{ $penga->pelapor->kontak_p }}"
                                                                                        class="bg-info">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Alamat</label></th>
                                                                                <td>
                                                                                    <input type="text" name="alamat_p"
                                                                                        value="{{ $penga->pelapor->alamat_p }}"
                                                                                        class="bg-info">
                                                                                </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <div class="form-group">
                                                                                <th> <label>Hubungan dengan
                                                                                        korban</label></th>
                                                                                <td>
                                                                                    @isset($penga->pelapor->relasi_p)
                                                                                    {{ $penga->pelapor->relasi_p
                                                                                    }}
                                                                                    @endisset
                                                                                    @empty($penga->pelapor->relasi_p)
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
                                @foreach($penga->pelapor->korban as $korban)
                                <h6>
                                    <span>
                                        <b>Korban:</b>
                                        <ol>
                                            <li>
                                                <a href="#">{{ $korban->nama_k }}</a> | {{ $korban->usia_k }} | {{
                                                $korban->jk_k }}
                                                <a href="#" data-korbanid="{{ $korban->id }}" data-toggle="modal"
                                                    data-target="#modal-secondary"
                                                    class="edit text-secondary float-right"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <div class="modal fade" id="modal-secondary">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-secondary">
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
                                                                                        value="{{ $korban->nama_k }}"
                                                                                        class="bg-secondary"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Agama</th>
                                                                                    <td><input type="text"
                                                                                            name="agama_k"
                                                                                            value="{{ $korban->agama_k }}"
                                                                                            class="bg-secondary"></td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Status</th>
                                                                                    <td>
                                                                                        <input type="text" name="status"
                                                                                            value="{{ $korban->status }}"
                                                                                            class="bg-secondary">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="alamat_k"
                                                                                            value="{{ $korban->alamat_k }}"
                                                                                            class="bg-secondary">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
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
                                                                                            value="{{ $korban->kewarganegaraan_k }}"
                                                                                            class="bg-secondary">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Sekolah / Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="sekolah_k" value=""
                                                                                            class="bg-secondary">
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
                                @foreach($penga->pelapor->terlapor as $terlapor)
                                <h6>
                                    <span>
                                        <b>Terlapor:</b>
                                        <ol>
                                            <li>
                                                <a href="#">{{ $terlapor->nama_t }}</a>
                                                | {{ $terlapor->usia_t }} | {{ $terlapor->jk_t }}
                                                <a href="#" data-terlaporid="{{ $terlapor->id }}" data-toggle="modal"
                                                    data-target="#modal-success"
                                                    class="edit text-secondary float-right"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <div class="modal fade" id="modal-success">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-success">
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
                                                                                        value="{{ $terlapor->nama_t }}"
                                                                                        class="bg-success"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Jenis Kelamin</th>
                                                                                <td><input type="text" name="jk_t"
                                                                                        value="{{ $terlapor->jk_t }}"
                                                                                        class="bg-success"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Usia</th>
                                                                                    <td>
                                                                                        <input type="text" name="usia_t"
                                                                                            value="{{ $terlapor->usia_t }}"
                                                                                            class="bg-success">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Agama</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="agama_t"
                                                                                            value="{{ $terlapor->agama_t }}"
                                                                                            class="bg-success">
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
                                                                                            value="{{ $terlapor->kewarganegaraan_t }}"
                                                                                            class="bg-success">
                                                                                    </td>
                                                                                </div>
                                                                            </tr>
                                                                            <tr>
                                                                                <div class="form-group">
                                                                                    <th>Alamat</th>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="alamat_t"
                                                                                            value="{{ $terlapor->alamat_t }}"
                                                                                            class="bg-success">
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
                                    {{ $penga->kronologi }}
                                </p>
                            </div>
                            <div class="post">
                                <h4>Barang Bukti</h4>
                                @foreach($penga->bukti as $bukti)
                                <img src="{{ asset('/bukti/'.$bukti->filenames) }}" width="50px" height="50"
                                    alt="bukti-pengaduan" class="img-thumbnail">
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-center mt-5 mb-3">
                        <h5 class="mt-5 text-muted">Persetujuan</h5>
                        @if($penga->is_approved == 0)
                        <button type="button" class="btn btn-sm btn-success" onclick="approvePost({{ $penga->id }})">
                            <i class="fas fa-check"></i>
                            <span>Terima</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="tolak({{ $penga->id }})">
                            <i class="fas fa-times"></i>
                            <span>Tolak</span>
                        </button>
                        <form method="post" action="{{ route('pengaduan.approve',$penga->id) }}" id="approval-form"
                            style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        <form method="post" action="{{ route('pengaduan.tolak',$penga->id) }}" id="tolak-form"
                            style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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