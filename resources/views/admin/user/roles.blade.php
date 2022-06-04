@extends('admin._partials.app')
@section('title', 'Set Role')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mengatur Peran</h1>
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
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Mengatur Peran</h3>
                </div>
                <form action="{{ route('users.set_role', $user->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($roles as $row)
                                        <input type="radio" name="role" {{ $user->hasRole($row) ? 'checked':'' }}
                                        value="{{ $row }}"> {{ $row }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success float-right">
                Terapkan
            </button>
        </div>
    </div>
    </form>
</section>
@endsection