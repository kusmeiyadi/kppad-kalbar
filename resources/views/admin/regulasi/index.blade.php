@extends('admin._partials.app')
@section('title', 'Regulasi')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Regulasi Anak</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('regulasi.index') }}
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
                    <h3 class="card-title">Regulasi</h3>
                    <div class="card-tools">
                        <a href="{{ route('regulasi.create') }}">
                            Tambah Regulasi
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
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Diupload oleh</th>
                                <th>Nama File</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regulasis as $regulasi)
                            <tr>
                                <td align="center">
                                    <dt>{{ $loop->iteration }}.</dt>
                                </td>
                                <td>{{ $regulasi->deskripsi }}</td>
                                <td>{{ $regulasi->kategori }}</td>
                                <td>{{ $regulasi->upload_by }}</td>
                                <td>{{ $regulasi->file }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm btn-flat"
                                            href="{{ route('regulasi.edit',$regulasi->id) }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Sunting">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form id="delete-form-{{ $regulasi->id }}" method="post"
                                            action="{{ route('regulasi.destroy',$regulasi->id) }}"
                                            style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a class="btn btn-danger btn-sm btn-flat" data-toggle="tooltip"
                                            data-placement="bottom" title="Hapus" href="" onclick="
                      if(confirm('Kamu yakin akan menghapus file ini ?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $regulasi->id }}').submit();
                      }

                      else {
                        event.preventDefault();
                      }

                      ">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
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
</script>
@endsection