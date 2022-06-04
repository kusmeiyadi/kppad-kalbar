@extends('admin._partials.app')
@section('title', 'User')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('user.create') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.create') }}">
                            Tambah User
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                {{-- <th class="text-center">Status</th> --}}
                                @can('sunting pengguna')
                                <th></th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $row)
                            <tr>
                                <td align="center">
                                    <dt>{{ $loop->iteration }}.</dt>
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    @foreach ($row->getRoleNames() as $role)
                                    <label for="" class="badge badge-info">{{ $role }}</label>
                                    @endforeach
                                </td>
                                {{-- <td align="center">
                                    @if ($row->status)
                                    <label class="badge badge-success">Aktif</label>
                                    @else
                                    <label for="" class="badge badge-default">Suspend</label>
                                    @endif
                                </td> --}}
                                @can('sunting pengguna')
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="{{ route('user.roles', $row->id) }}" data-toggle="tooltip"
                                            data-placement="bottom" class="btn btn-info btn-sm btn-flat"
                                            title="Atur sebagai"><i class="fa fa-user-secret"></i></a>
                                        <a href="{{ route('user.edit', $row->id) }}" data-toggle="tooltip"
                                            data-placement="bottom" class="btn btn-warning btn-sm btn-flat"
                                            title="Sunting"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('user.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button data-toggle="tooltip" data-placement="bottom"
                                                class="btn btn-danger btn-sm btn-flat" title="Hapus"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endcan
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
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
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function() {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
    });
});
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection