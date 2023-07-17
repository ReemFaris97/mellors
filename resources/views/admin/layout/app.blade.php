<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
{{--@dd(notifications()[0]->data)--}}

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
<!-- <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>

</ul> -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">


        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#
                    " class="logo">
                <img src="{{asset('/_admin/assets/images/logo1.png')}}" alt="Mellors-img" title="Mellors" class="image">

            </a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <h4 class="page-title">@yield('title') </h4>
                    </li>
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @auth
                        <li>
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                            <i class="fa fa-bell"> </i>
                                            <span
                                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                                                data-count="{{notifications()->count()}}">{{notifications()->count()}}</span>
                                        </a>

                                        <ul class="dropdown-menu" style="width:300px">
                                            <li class="dropdown-menu-header">Messages</li>
                                            @forelse(notifications() as $not)

                                            <li class="">
                                                <a href="#" class="media">
                                                    <div class="media-body">
{{--                                                        <h6 class="media-heading">Title</h6>--}}
                                                        <p class="notification-text font-small-3 text-muted"> {{ data_get($not->data,'title')}}</p>
                                                    </div>
                                                    <span style="direction: ltr;"
                                                          class="date"> {{$not->created_at}}</span>
                                                </a>

                                            </li>
                                            @empty
                                                <div>not found notifications</div>
                                            @endforelse
                                            <li role="separator" class="divider"></li>
                                            <li class="dropdown-menu-footer">
                                                <a class="dropdown-item text-muted text-center" href="#"> all
                                                    notifications </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
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
<script type="module" src="{{asset('_admin/assets/js/pusherNotifications.js')}}"></script>
<script type="text/javascript" src="{{asset('_admin/assets/js/laravel-echo.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
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
