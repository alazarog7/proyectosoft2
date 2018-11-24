
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--<title>{{ config('app.name', 'Adminitración de cuentas privilegiadas') }}</title>-->
    <title>{{ __('CPD-ANH') }}</title>
    <link rel="shortcut icon" href="{{asset('imagenes/loguito.ico')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Configuraciones en la cabecera-->
    <link href="{{ asset('css/barra_cabecera.css') }}" rel="stylesheet">

<!--<link href=" {{asset('hydro_bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">-->
<!--<link href=" {{asset('hydro_bootstrap/css/hydro.css')}}" rel="stylesheet" media="screen">-->
    <!--<script src="http://code.jquery.com/jquery.js"></script>-->
<!--<script src="{{asset('hydro_bootstrap/js/bootstrap.min.js')}}"></script>-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{asset('imagenes/loguito.ico')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/hydro_login.css')}}"/>
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" media="screen">
    @yield('cabecera')
</head>
<body>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
