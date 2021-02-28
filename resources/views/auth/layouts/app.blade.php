<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/template/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="{{ asset('assets/template/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/template/adminlte/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    @yield('content')

    <!-- jQuery -->
    <link rel="stylesheet" href="{{ asset('assets/template/adminlte/plugins/jquery/jquery.min.js') }}">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
    <!-- AdminLTE App -->
    <link rel="stylesheet" href="{{ asset('assets/template/adminlte/js/adminlte.min.js') }}">
</body>

</html>
