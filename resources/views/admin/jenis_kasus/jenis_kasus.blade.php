@extends('admin._partials.app')
@section('title', 'Jenis Kasus')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Jenis Kasus</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('jenis-kasus.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <form role="form" action="{{ route('jenis-kasus.store') }}" method="POST">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Jenis Kasus</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jenis_kasus">Jenis Kasus</label>
                                    <input type="text" name="jenis_kasus"
                                        class="form-control {{ $errors->has('jenis_kasus') ? 'is-invalid':'' }}"
                                        id="jenis_kasus" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success float-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jenis Kasus</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Jenis Kasus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jeniskasuses as $row)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}.</th>
                                <td>{{ $row->nama_kasus }}</td>
                                <td align="center">
                                    <form action="{{ route('jenis-kasus.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button data-toggle="tooltip" data-placement="bottom" title="hapus"
                                            class="btn btn-danger btn-sm btn-flat"
                                            onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
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
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endsection