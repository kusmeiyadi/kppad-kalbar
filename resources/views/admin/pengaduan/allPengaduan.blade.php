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
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Pengaduan Masuk</h3>
                    <div class="card-tools">
                        <a href="{{ route('non-pengaduan.index') }}">
                            Non-pengaduan
                        </a>
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
                                <th>Jenis kasus</th>
                                <th>Pelapor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduans as $pengaduan)
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
                                <td>{{ $pengaduan->created_at }}</td>
                                <td>{{ $pengaduan->kabupaten }}</td>
                                <td>{{ $pengaduan->data['pengaduan']['created_at'] }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('pengaduan-masuk.show',$pengaduan->data['pengaduan']['id']) }}"
                                            data-toggle="tooltip" data-placement="bottom" title="detail"><i
                                                class="far fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('pengaduan.email',$pengaduan->data['pengaduan']['id']) }}"
                                            data-toggle="tooltip" data-placement="bottom" title="kirim email"><i
                                                class="far fa-paper-plane"></i></a>
                                        <form action="{{ route('pengaduan-masuk.destroy', $pengaduan->created_at) }}"
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
<!-- DataTables -->
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endsection