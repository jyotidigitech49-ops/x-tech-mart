<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $fallbackTitle = trim($__env->yieldContent('title', 'XTechMart - Technology Products and Solutions'));
        $metaTitle = $pageMeta['title'] ?? null;
        $metaDescription = $pageMeta['description']
            ?? 'Explore printers, scanners, desktops, thin clients, and technology solutions with XTechMart.';
        $metaCanonical = $pageMeta['canonical'] ?? request()->url();
        $metaType = $pageMeta['type'] ?? 'website';
        $metaImage = $pageMeta['image'] ?? asset('assets/images/products_banners/pr01.png');
        $metaRobots = $pageMeta['robots'] ?? 'index, follow';
        $documentTitle = $metaTitle ?: $fallbackTitle;
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="XTechMart">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="robots" content="{{ $metaRobots }}">
    <link rel="canonical" href="{{ $metaCanonical }}">

    <meta property="og:site_name" content="XTechMart">
    <meta property="og:type" content="{{ $metaType }}">
    <meta property="og:title" content="{{ $documentTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $metaCanonical }}">
    <meta property="og:image" content="{{ $metaImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $documentTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">

    <title>{{ $documentTitle }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/style.css') }}?v=20260804-5" rel="stylesheet">
    <link href="{{ asset('themes/xtechmart/css/header.css') }}?v=20260804-1" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('themes/xtechmart/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('themes/xtechmart/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/xtechmart/js/aos.js') }}"></script>
    <script src="{{ asset('themes/xtechmart/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/xtechmart/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/xtechmart/js/main.js') }}?v=20260804-2"></script>
    @stack('scripts')
</body>
</html>
