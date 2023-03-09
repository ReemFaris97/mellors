<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login </title>
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('_admin/assets/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @include('admin.layout.styles')
</head>

<body>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="text-center">
            <img src="{{asset('_admin/assets/images/logo1.png')}}" class="logo_im">
            <h5 class="text-muted m-t-0 font-600">تسجيل الدخول للوحة تحكم </h5>
        </div>
        <div class="m-t-40 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Sign in to start your session</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" action="{{route('login')}}" method="post" id="form">
                    @csrf
                    <div class="form-group ">

                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
        </div>
        <!-- end card-box-->


    </div>
    <!-- end wrapper page -->

    @include('admin.layout.scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\Auth\LoginRequest::class, '#form'); !!}
</body>

</html>