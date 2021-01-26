<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Meta -->
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="Tj2OAOhE2wuAr8488hJaROOtpCt3Fr1AEaz+ZdO3Z8w=">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('assets/dashboard/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/lib/toastr/css/toastr.min.css') }}">

    @stack('styles')

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bracket.css') }}">
</head>

<body>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    @yield('body')

    <script src="{{ asset('assets/dashboard/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/dashboard/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/dashboard/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/dashboard/lib/toastr/js/toastr.min.js') }}"></script>
    @stack('scripts')
    @include('dashboard.partials.notifications')
</body>

</html>