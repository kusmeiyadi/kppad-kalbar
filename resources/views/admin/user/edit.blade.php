@extends('admin._partials.app')
@section('title', 'User')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sunting User</h1>
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
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Sunting User</h3>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required readonly>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                            <small id="passwordHelp" class="form-text text-muted">Biarkan kosong, jika tidak ingin
                                mengganti password.</small>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success float-right">
                Perbaharui
            </button>
        </div>
    </div>
    </form>
</section>
@endsection