@extends('admin._partials.app')
@section('title', 'User')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perizinan Peran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('roles.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('user.add_permission') }}" method="post">
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Perizinan Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama perizinan</label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success float-right">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Beri izin ke Peran</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.roles_permission') }}" method="GET">
                        <div class="form-group">
                            <label for="">Roles</label>
                            <div class="input-group">
                                <select name="role" class="form-control">
                                    @foreach ($roles as $value)
                                    <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':''
                                        }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-append">
                                    <button class="btn btn-info">Cek</button>
                                </span>
                            </div>
                        </div>
                    </form>
                    {{-- jika $permission tidak bernilai kosong --}}
                    @if (!empty($permissions))
                    <form action="{{ route('user.setRolePermission', request()->get('role')) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="pill" role="tab"
                                        aria-controls="tab_1" aria-selected="true">Perizinan</a>
                                </li>
                            </ul>
                            <div class="card-body bg-light mb-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab_1">
                                        @php $no = 1;
                                        @endphp
                                        @foreach ($permissions as $key => $row)
                                        <input type="checkbox" name="permission[]" class="minimal-red"
                                            value="{{ $row }}" {{-- CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA
                                            CHECKED --}} {{ in_array($row, $hasPermission) ? 'checked' :'' }}>
                                        {{ $row }}
                                        <br>
                                        @if ($no++%4 == 0)
                                        <br>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-send"></i> Berikan Izin
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection