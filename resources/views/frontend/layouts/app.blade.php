<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PPDB - @yield('title')</title>
    <meta name="description" content="PPDB Al-Fityan Kubu Raya">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icons.min.css') }}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css') }}">

    @stack('styles')
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
@include('frontend.partials.headbar')
@yield('content')
@include('frontend.partials.footer')

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{ asset('assets/frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
<!-- Ajax Mail -->
<script src="{{ asset('assets/frontend/js/ajax-mail.js') }}"></script>
@stack('scripts')
<!-- Main JS -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>