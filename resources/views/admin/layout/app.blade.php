<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Dashboard - @yield('title')</title>
    @yield('header')
    @include('admin.layout.styles')
</head>

<body class="fixed-left">

<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->


        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title">@yield('title') </h4>
                    </li>
                </ul>


            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!-- User -->
            <div class="user-box">
                <div class="user-img">

                    <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                </div>
                <h5><a href="#">{{auth()->user()->name}}</a></h5>
                <ul class="list-inline">

                    <li>
                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                           onclick="event.preventDefault(); document.getElementById('logout_form').submit()">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                        <form id="logout_form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End User -->

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    @include('admin.layout.nav')
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
</div>
<!-- Start content -->
<div class="content-page">

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <footer class="footer text-right">
        Mellors entertainment saudi
    </footer>
</div>
@include('admin.layout.scripts')

@yield('footer')
@stack('scripts')
</body>
</html>
