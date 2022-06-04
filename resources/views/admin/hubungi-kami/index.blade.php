@extends('admin._partials.app')
@section('title', 'Hubungi Kami')
@section('headSection')
<link rel="stylesheet">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Hubungi Kami</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('hubungi-kami.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Hubungi Kami</h3>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Isi pesan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hubungis as $hubungi)
                            <tr>
                                <td align="center">{{ $loop->iteration }}.</td>
                                <td>
                                    {{ $hubungi->nama }}
                                </td>
                                <td>
                                    {{ $hubungi->email }}
                                </td>
                                <td>{{ $hubungi->subjek }}</td>
                                <td>{{ str_limit($hubungi->isi_pesan,60) }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm btn-flat" id="modal-show"
                                            data-toggle="modal" data-target='#show' data-nama="{{ $hubungi->nama }}"
                                            data-email="{{ $hubungi->email }}" data-subjek="{{ $hubungi->subjek }}"
                                            data-isi_pesan="{{ $hubungi->isi_pesan }}" data-id=" {{ $hubungi->id }}"><i
                                                class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Detail data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="companydata" method="">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="text" id="email" name="email" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="subjek" class="col-form-label">Subjek:</label>
                                    <input type="text" id="subjek" name="subjek" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Isi pesan:</label>
                                    <textarea class="form-control" id="isi_pesan" name="isi_pesan" rows="5"
                                        readonly></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
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
<script>
    $('#show').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var email = button.data('email')
        var subjek = button.data('subjek')
        var isi_pesan = button.data('isi_pesan')

        var modal = $(this)

        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #subjek').val(subjek);
        modal.find('.modal-body #isi_pesan').val(isi_pesan);
    });
</script>
@endsection