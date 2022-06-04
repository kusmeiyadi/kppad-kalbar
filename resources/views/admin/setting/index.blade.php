@extends('admin._partials.app')
@section('title', 'Profil')
@section('headSection')
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('profil') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if (Auth::user()->path == NULL)
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('AdminLTE-3.0.2/dist/img/profile/user-default-160x160.png') }}"
                                alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset(Auth::user()->path) }}"
                                alt="User profile picture">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                        <p class="text-muted text-center">@foreach (Auth::user()->getRoleNames() as $role)
                            {{ $role }}
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#password"
                                    data-toggle="tab">Password</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#pengaturan" data-toggle="tab">Pengaturan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="password">
                                <form class="form-horizontal" method="POST" action="{{ route('change.password') }}"
                                    id="form-password">
                                    @csrf
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    <div class="form-group row">
                                        <label for="current_password" class="col-sm-3 col-form-label">Password
                                            sekarang</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password" placeholder="Password sekarang">
                                            <span class="text-danger error-text current_password_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-3 col-form-label">Password baru</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password" placeholder="Password baru">
                                            <span class="text-danger error-text new_password_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_confirm_password" class="col-sm-3 col-form-label">Konfirmasi
                                            password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="new_confirm_password"
                                                name="new_confirm_password" placeholder="Konfirmasi password">
                                            <span class="text-danger error-text new_confirm_password_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="pengaturan">
                                <form class="form-horizontal" method="post" action="{{ route('change.profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">No. Handphone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footerSection')
<script src="{{ asset('AdminLTE-3.0.2/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection