<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('web_assets/vendor/bootstrap5/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('web_assets/vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/vendor/owlcarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/vendor/magnific/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/css/main.css')}}">

    <title>@yield('title')</title>

    @yield('customHeader')
</head>

<body>
    <!-- Navbar -->
    @include('web.common.navbar')

    {{-- Main content --}}
    @yield('main')

    <!-- Footer -->
    @include('web.common.footer')

    <script src="{{asset('web_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/bootstrap5/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('web_assets/js/main.js')}}"></script>

    @yield('customJS')
</body>

</html>