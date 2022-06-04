@extends('admin.layouts.app')
@section('title', 'Non-pengaduan')
@section('headSection')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css" integrity="sha512-4o2NtfcBGIT0SbOTpWLYovl07cIaliKIQpUXvEPvyOgBF/01xY1TXm5F1B+X48/zhhFLIw2oBTsE0rjcwEOwJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Non-pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('non-pengaduan.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Non-pengaduan</h3>
                    <div class="card-tools">
                       <a href="{{ route('non-pengaduan.tambah') }}">
                            Tambah Non-pengaduan
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Minimize">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">#</th>
                                <th>Permasalahan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td align="center">{{ $loop->iteration }}.</td>
                                <td>{{ $pengaduan->slug }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{ route('pengaduans.show',$pengaduan->id) }}" data-toggle="tooltip" data-placement="bottom" title="detail"><i class="far fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('pengaduan.email',$pengaduan->id) }}" data-toggle="tooltip" data-placement="bottom" title="kirim email"><i class="far fa-paper-plane"></i></a>
                                        <form action="{{ route('pengaduans.destroy', $pengaduan->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="hapus"><i class="fas fa-trash"></i></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js" integrity="sha512-hX6rgGqXX6Ajh6Y+bZ+P/0ZkUBl3fQMY6I1B51h5NDOu7XE1lVgdf2VqygjozLX8AufHvWAzOuC0WVMb4wJX4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js" integrity="sha512-T970v+zvIZu3UugrSpRoyYt0K0VknTDg2G0/hH7ZmeNjMAfymSRoY+CajxepI0k6VMFBXxgsBhk4W2r7NFg6ag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
