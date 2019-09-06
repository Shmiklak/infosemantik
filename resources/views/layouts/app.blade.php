<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#013c7c">

    <title>{{ App\getPageTitle(request()->path()) }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

    <meta property="og:title" content="{{ App\getPageTitle(request()->path()) }}">
    <meta name="description" content="{{ App\getPageDescription(request()->path()) }}">
    <meta name="keywords" content="{{ App\getPageKeywords(request()->path()) }}">
    <meta property="og:site_name" content="{{ $settings->site_name }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:description" content="{{ App\getPageDescription(request()->path()) }}">
    <meta property="og:image" content="/{{ $settings->logo }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->--}}
    <link rel="stylesheet" href="/vendor/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/style.css?v=1.45"><!-- js -->
    <script src="/vendor/jquery-3.3.1/jquery.min.js"></script>
    <script src="/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="/vendor/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/number.js"></script>
    <script src="/js/main.js?v=1.15"></script>
    <script src="/vendor/svg4everybody-2.1.9/svg4everybody.min.js"></script>
    <script>svg4everybody();</script><!-- font - fontawesome -->
    <link rel="stylesheet" href="/vendor/fontawesome-5.6.1/css/all.min.css"><!-- font - stroyka -->
    <link rel="stylesheet" href="/fonts/stroyka/stroyka.css">
    @stack('styles')
</head>
<body class="@auth @if(auth()->user()->is_admin == 1)
    is-admin @endif @endauth">
@auth
    @if(auth()->user()->is_admin == 1)
        <div class="admin-panel">
            <a href="{{ route('admin.index') }}">Панель управления</a>
            <a href="{{ route('logout') }}" class="right">Выйти</a>
        </div>
    @endif
@endauth
<section class="loader">
    <div class="cssload-spin-box"></div>
</section>

@include('layouts.header')

@yield('content')

@include('layouts.footer')
@auth
    @if(auth()->user()->is_admin == 1)
        @include('seo')
    @endif
@endauth

@stack('scripts')
</body>
</html>
