@extends('admin._partials.app')
@section('title', 'Pengaduan')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
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
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Pengaduan yang sudah selesai</h3>
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
                                <th>Kode</th>
                                <th>Permasalahan</th>
                                <th>Pelapor</th>
                                <th>Korban</th>
                                <th>Terlapor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td align="center">{{ $loop->iteration }}.</td>
                                <td>
                                    <dt>{{ $pengaduan->kode }}</dt>
                                </td>
                                <td>{{ $pengaduan->jenis_kasus->nama_kasus }}</td>
                                <td>{{ $pengaduan->pelapor->nama_p }}</td>
                                <td>
                                    @foreach($pengaduan->pelapor->korban as $korban)
                                    {{ $korban->nama_k }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pengaduan->pelapor->terlapor as $terlapor)
                                    {{ $terlapor->nama_t }}
                                    @endforeach
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('pengaduan-masuk.show',$pengaduan->id) }}"
                                            data-toggle="tooltip" data-placement="bottom" title="detail"><i
                                                class="far fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('pengaduan.email',$pengaduan->id) }}" data-toggle="tooltip"
                                            data-placement="bottom" title="kirim email"><i
                                                class="far fa-paper-plane"></i></a>
                                        <form action="{{ route('pengaduan-masuk.destroy', $pengaduan->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip"
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
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $('#update').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var title = button.data('mytitle')
    var description = button.data('mydescription')
    var statusid = button.data('statusid')
    var pengaduanid = button.data('pengaduanid')

    var modal = $(this)

    modal.find('.modal-body #title').val(title);
    modal.find('.modal-title #title').val(title);
    modal.find('.modal-body #description').val(description);
    modal.find('.modal-body #statusid').val(statusid);
    modal.find('.modal-body #pengaduanid').val(pengaduanid);
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
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

if ($('.format-date').length > 0) {
    $('.format-date').each(function() {
        var ini = $(this);
        var tgl = ini.text();
        //moment.locale('id');
        if (moment(tgl, 'YYYY-MM-DD', true).isValid() || moment(tgl, 'YYYY-MM-DD HH:mm:ss', true).isValid()) {
            var formatTgl = moment(tgl).format('LL');
            ini.html(formatTgl);
        }
    });
}

</script>
@endsection