@extends('admin._partials.app')
@section('title', 'User')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah User Baru</h1>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah User</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                @if (session('error'))
                @alert(['type' => 'danger'])
                {!! session('error') !!}
                @endalert
                @endif
                <div class="card-body">
                    <form role="form" action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="phone" name="phone"
                                class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}"
                                required>
                                <option value="">Pilih</option>
                                @foreach ($role as $row)
                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('role') }}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success float-right">
                Simpan
            </button>
        </div>
    </div>
    </form>
    <br>
</section>
@endsection