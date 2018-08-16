<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Control') }}</title>

    
    <!-- Bootstrap CSS-->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Fontastic Custom icon font-->
    <link href=" {{ asset('css/fontastic.css')}} " rel="stylesheet" >
    <!-- Google fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" rel="stylesheet" type="text/css">
    <!-- theme stylesheet-->
    <link href="{{ asset('css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    
</head>
<body>
    <div class="page"> 
        <header class="header">
            @include('layouts.partials.dash_navbar')
        </header> 
        <div class="page-content d-flex align-items-stretch">
            @include('layouts.partials.dash_sidebar')
            <div class="content-inner">
                @yield('content')
                @include('layouts.partials.dash_footer')
            </div>
        </div>
    </div>

    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
    
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>
    
</body>
</html>
