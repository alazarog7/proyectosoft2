
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

    @yield('cabecera')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a9055;">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ITEM
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(session()->get('ROL') == 7)
                            <a class="dropdown-item" href="{{route('privilegio.index')}}">MIS ITEMS</a>
                        @endif
                        @if(session()->get('ROL') == 6)
                            <a class="dropdown-item" href="{{route('item.index')}}">NUEVOS ITEMS</a>
                        @endif
                    </div>
                </li>
                @if(session()->get('ROL') == 6)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            USUARIO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('usuario.create')}}">REGISTRO</a>
                            <a class="dropdown-item" href="{{route('usuario.index')}}">REGISTRADOS</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            HISTORICO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('historico.item')}}">ITEM</a>
                            <a class="dropdown-item" href="{{route('historico.user')}}">PRIVILEGIO</a>
                        </div>
                    </li>

                @endif
            </ul>

            <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item active">
                    <a class="nav-link" href="#">{{ __('PERFIL')}}<span class="sr-only">(current)</span></a>
                </li>-->
                <li class="nav-item active">
                    <a class="nav-link" href="#">{{ strtoupper(\Illuminate\Support\Facades\Auth::user()->NOMBRE." ".\Illuminate\Support\Facades\Auth::user()->APELLIDO)}}<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('salir')}}">
                        {{ __('CERRAR SESION') }}
                    </a>
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
