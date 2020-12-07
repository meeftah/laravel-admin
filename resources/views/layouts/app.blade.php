<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PPDB Al-Fityan Kubu Raya">
    <meta name="twitter:description" content="Al-Fityan Kubu Raya">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Al-Fityan Kubu Raya">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/dashboard/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/dashboard/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/dashboard/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/dashboard/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Meta -->
    <meta name="description" content="Website PPDB Al-Fityan Kubu Raya">
    <meta name="author" content="Tj2OAOhE2wuAr8488hJaROOtpCt3Fr1AEaz+ZdO3Z8w=">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPDB Al-Fityan Kubu Raya | @yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('assets/dashboard/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @stack('styles')

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bracket.css') }}">
</head>

<body>
    @yield('body')

    <script src="{{ asset('assets/dashboard/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/dashboard/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/dashboard/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    @stack('scripts')
</body>

</html>