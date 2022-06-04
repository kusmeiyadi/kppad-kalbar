<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title') | KPPAD Kalbar</title>
    @include('admin._partials.head')
</head>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin._partials.navbar')
        @include('admin._partials.sidebar')
        <div class="content-wrapper">
            @section('main-content')
            @show
        </div>
        @include('admin._partials.footer')
    </div>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.0.2/dist/js/adminlte.min.js') }}"></script>
    @include('sweetalert::alert')
    @section('footerSection')
    @show
</body>

</html>