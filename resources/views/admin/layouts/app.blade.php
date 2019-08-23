<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель управления</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/admin/vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/admin/vendor/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    @stack('styles')
    <link rel="stylesheet" href="/css/admin/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/css/admin/skins/skin-blue.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="/css/admin/custom.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>I</b>nf</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Info</b>semantik</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/avatars/admin.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/images/avatars/admin.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->name }}
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a data-toggle="modal" data-target="#change-password" class="btn btn-default btn-flat">Изменить пароль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Выйти</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings') }}"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        @include('admin.layouts.menu')
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong><a href="https://datasite.uz" target="_blank">DataSite Technology</a></strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>

<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="change-password">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Изменить пароль</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Пароль</label>
                        <input class="form-control" type="password" name="password" id="newpassword">
                    </div>
                    <div class="form-group">
                        <label>Повторите пароль</label>
                        <input class="form-control" type="password" name="repeatpassword" id="repeatpassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary update-password pull-left">
                        Обновить
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script src="/js/admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/js/admin/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/admin/adminlte.min.js"></script>
<script src="/js/admin/custom.js"></script>
@stack('scripts')

</body>
</html>
