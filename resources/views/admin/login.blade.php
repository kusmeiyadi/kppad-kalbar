@include('admin._partials.head')
<title>Admin Log In | KPPAD Kalbar</title>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>KPPAD</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Log in to start your session</p>
                <form method="POST" action="{{ route('admin.login') }}" class="ui large form">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" class="form-control" type="password" placeholder="Password"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''
                                    }}>
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> --}}
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Log In') }}
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <p class="mb-1">
                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                    @endif
                </p> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('AdminLTE-3.0.2/dist/js/adminlte.min.js') }}"></script>
</body>

</html>