
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Manager System</title>

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style>
        body {
            background-image: url('{{ asset('./photo-1432888498266-38ffec3eaf0a.png') }}') !important;
            background-size:cover !important;
            background-repeat: no-repeat !important;
            height: 100% !important;
            overflow: hidden !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box-body{
            border-radius: 15px;
            background-color: rgba(0,0,0,0.7);
            color: #fff;
            font-size: 18px;
            font-weight: 500;
        }
        .login-logo{
            color: #000;
            font-size: 36px;
            font-weight: 500;
            background-color: rgba(255,255,255,0.8);
            border-radius: 15px;
        }
    </style>
</head>
<body class="login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="../../index2.html"><b>Task Manager System</b></a>
    </div><!-- end of login lgo -->

    <div class="login-box-body">
        <p class="login-box-msg">Register Form</p>

        <form action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}

            @include('partials._errors')
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="@lang('site.name')">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('site.password_confirmation')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.register')</button>

        </form><!-- end of form -->

    </div><!-- end of login body -->

</div><!-- end of login-box -->


{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

</body>
</html>
