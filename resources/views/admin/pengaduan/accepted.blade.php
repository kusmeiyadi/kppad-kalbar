@extends('admin._partials.app')
@section('title', 'Pengaduan')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Pengaduan</h1>
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
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-navy">
                <div class="card-header">
                    <h3 class="card-title">Pengaduan yang sudah di terima</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Minimize">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">#</th>
                                <th>Masuk</th>
                                <th>Kode</th>
                                <th>Jenis Kasus</th>
                                <th>Pelapor</th>
                                <th class="text-center">Progres</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td align="center">{{ $loop->iteration }}.</td>
                                <td>
                                    <dt>
                                        @if($pengaduan->created_at->diffInDays() <= 9 ) <span class="badge bg-info">
                                            {{ $pengaduan->created_at->diffForHumans(Carbon\carbon::now()) }}
                                            </span>
                                            @elseif($pengaduan->created_at->diffInDays(Carbon\carbon::now()) <= 11)
                                                <span class="badge bg-warning">
                                                {{ $pengaduan->created_at->diffForHumans(Carbon\carbon::now()) }}
                                                </span>
                                                @elseif($pengaduan->created_at->diffInDays(Carbon\carbon::now()) >= 14)
                                                <span class="badge bg-danger">
                                                    {{ $pengaduan->created_at->diffForHumans(Carbon\carbon::now()) }}
                                                </span>
                                                @endif
                                    </dt>
                                </td>
                                <td>
                                    <dt>{{ $pengaduan->kode }}</dt>
                                </td>
                                <td>{{ $pengaduan->jenis_kasus->nama_kasus }}</td>
                                <td>{{ $pengaduan->pelapor->nama_p }}</td>
                                <td>
                                    @foreach($pengaduan->status as $status)
                                    <button type="button" class=" 
                                    @if ($status->status == 'VERIFIKASI')
                                         btn btn-flat btn-sm btn-outline-warning
                                    @elseif ($status->status == 'PENYIDIKAN')
                                         btn btn-flat btn-sm btn-outline-secondary
                                    @elseif ($status->status == 'PERSIDANGAN')
                                         btn btn-flat btn-sm btn-outline-danger
                                    @elseif ($status->status == 'PENGADILAN')
                                         btn btn-flat btn-sm btn-outline-info
                                    @elseif ($status->status == 'MEDIASI')
                                         btn btn-flat btn-sm btn-outline-primary
                                    @elseif ($status->status == 'SELESAI')
                                         btn btn-flat btn-sm btn-outline-success     
                                    @endif" data-mytitle="{{ $status->status }}"
                                        data-pelapor="{{ $pengaduan->pelapor->kontak_p }}"
                                        data-mydescription="{{ $status->isi }}" data-statusid="{{ $status->id }}"
                                        data-pengaduanid="{{ $status->pengaduan_id }}" data-toggle="modal"
                                        data-target="#update">
                                        {{ $status->status }}
                                    </button>
                                    <div class="modal fade" id="update">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="title">{{ $pengaduan->kode }} | {{
                                                        $status->status }}
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('pengaduan-masuk.update', $status->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <input type="text" id="statusid" name="statusid" hidden>
                                                        <input type="text" id="pengaduanid" name="pengaduan_id" hidden>
                                                        <div class="form-group">
                                                            <label for="title">Progres</label>
                                                            <select class="form-control" id="title" name="status">
                                                                <option value="VERIFIKASI" <?php if($status->
                                                                    status=='VERIFIKASI'){?> selected="selected"
                                                                    <?php }?>>VERIFIKASI
                                                                </option>
                                                                <option value="PENYIDIKAN" <?php if($status->
                                                                    status=='PENYIDIKAN'){?> selected="selected"
                                                                    <?php }?>>PENYIDIKAN
                                                                </option>
                                                                <option value="PERSIDANGAN" <?php if($status->
                                                                    status=='PERSIDANGAN'){?> selected="selected"
                                                                    <?php }?>>PERSIDANGAN
                                                                </option>
                                                                <option value="PENGADILAN" <?php if($status->
                                                                    status=='PENGADILAN'){?> selected="selected"
                                                                    <?php }?>>PENGADILAN
                                                                </option>
                                                                <option value="MEDIASI" <?php if($status->
                                                                    status=='MEDIASI'){?> selected="selected"
                                                                    <?php }?>>MEDIASI
                                                                </option>
                                                                <option value="SELESAI" <?php if($status->
                                                                    status=='SELESAI'){?> selected="selected"
                                                                    <?php }?>>SELESAI
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Pelapor</label>
                                                            <input type="text" id="pelapor" name="pelapor">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="isi">Isi</label>
                                                            <textarea id="description" name="isi"
                                                                class="form-class textarea"
                                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Perbaharui
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm btn-flat"
                                            href="{{ route('pengaduan-masuk.show',$pengaduan->id) }}"
                                            data-toggle="tooltip" data-placement="bottom" title="detail"><i
                                                class="far fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm btn-flat"
                                            href="{{ route('pengaduan.email',$pengaduan->id) }}" data-toggle="tooltip"
                                            data-placement="bottom" title="kirim email"><i
                                                class="far fa-paper-plane"></i></a>
                                        <form action="{{ route('pengaduan-masuk.destroy', $pengaduan->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="tooltip"
                                                data-placement="bottom" title="hapus"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footerSection')
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $('#update').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var title = button.data('mytitle')
    var description = button.data('mydescription')
    var pelapor = button.data('pelapor')
    var statusid = button.data('statusid')
    var pengaduanid = button.data('pengaduanid')

    var modal = $(this)

    modal.find('.modal-body #title').val(title);
    modal.find('.modal-title #title').val(title);
    modal.find('.modal-body #pelapor').val(pelapor);
    modal.find('.modal-body #description').val(description);
    modal.find('.modal-body #statusid').val(statusid);
    modal.find('.modal-body #pengaduanid').val(pengaduanid);
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

  $(function () {
    $('.textarea').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    })
  });

$(function() {
    $("#example1").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ]
    });
});
</script>
@endsection