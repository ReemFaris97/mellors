<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard - @yield('title')</title>
    @yield('header')
    @include('admin.layout.styles')
</head>

<body class="fixed-left">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>

    </ul>
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
  <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @auth
                        <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="fa fa-bell"> </i>
                                <span
                                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                                    data-count="9">9</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0 text-center">
                                        <span class="grey darken-2 text-center"> الرسائل</span>
                                    </h6>
                                </li>
                                <li class="scrollable-container ps-container ps-active-y media-list w-100">
                                    <a href="">
                                        <div class="media">
                                            <div class="media-body">
                                                <h6 class="media-heading text-right ">عنوان الاشعار </h6>
                                                <p class="notification-text font-small-3 text-muted text-right"> نص الاشعار</p>
                                                <small style="direction: ltr;">
                                                    <p class=" text-muted text-right"
                                                          style="direction: ltr;"> 20-05-2020 - 06:00 pm
                                                    </p>
                                                    <br>

                                                </small>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                    href=""> جميع الاشعارات </a>
                                </li>
                            </ul>
                        </li>
                    @endauth

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
                            <form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

    </div>
    <footer class="footer text-right">
        Mellors Entertainment Saudi
    </footer>
    @include('admin.layout.scripts')
    @include('sweetalert::alert')
    @yield('footer')
    @stack('scripts')
    <script src="{{asset('_admin/assets/summernote.js')}}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{asset('_admin/assets/js/pusherNotifications.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 100,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture']],
            ]
        });

    });
    </script>
    <script>
    $(".select2").select2({
        tagsl: true,
        // dropdownParent: $('#modal), // if select in modal
        theme: "bootstrap",
    });
    </script>
<script>
  
    

</script>

</body>

</html>