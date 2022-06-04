<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('user._partials.head')
</head>

<body class="bg12">
    @include('user._partials.navbar')
    @section('main-content')
    @show
    @include('user._partials.footer')
</body>

</html>