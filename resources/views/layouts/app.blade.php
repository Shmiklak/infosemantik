<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Infosemantik</title>
    <link rel="icon" type="image/png" href="/images/favicon.png"><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
    <link rel="stylesheet" href="/vendor/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/style.css?v=1"><!-- js -->
    <script src="/vendor/jquery-3.3.1/jquery.min.js"></script>
    <script src="/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="/vendor/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/number.js"></script>
    <script src="/js/main.js"></script>
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
@stack('scripts')
</body>
</html>
