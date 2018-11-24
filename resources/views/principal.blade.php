@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/item.js')}}"></script>
@endsection
@section('content')
   <!-- <h1>Bienvenido al sistema de gestion de cuentas privilegiadas {{session()->get('ROL')}}</h1>-->

@endsection