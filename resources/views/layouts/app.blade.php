<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sarab">
    <meta name="description" content="Sarab - Fast Food & Restaurant HTML Template">
    <title>@yield('title', 'Sarab - Fast Food & Restaurant HTML Template')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/style.css') }}?v=20260801-1" rel="stylesheet">
    <link href="{{ asset('themes/sarab/css/header.css') }}?v=20260730-1" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('themes/sarab/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('themes/sarab/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/sarab/js/aos.js') }}"></script>
    <script src="{{ asset('themes/sarab/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/sarab/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/sarab/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
