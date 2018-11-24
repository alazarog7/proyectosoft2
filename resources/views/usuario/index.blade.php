@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/item.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('usuario.create')}}"><button class="btn btn-success">Nuevo Usuario</button></a>
        </div>
        <br>
        <div class="row ">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">
                        <a href="" data-target="#modal-buscador" data-toggle="modal" class="btn btn-success btn-lg">
                            <i class="fa fa-search"></i>
                        </a>
                        @include('usuario.usuario-filtro-modal')
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($usuario as $u)
                    <tr>
                        <td>{{strtoupper($u->NOMBRE)}}</td>
                        <td>{{strtoupper($u->APELLIDO)}}</td>
                        <td>{{strtoupper($u->TELEFONO)}}</td>
                        <td>{{$u->EMAIL}}</td>
                        <td>{{$u->ROL}}</td>
                        <td><a href="{{route('usuario.edit',[$u->ID_USUA])}}"  class="btn btn-outline-success btn-lg"><i class="fa fa-pencil"></i></a>
                        @if($u->ID_PARA == 7)
                            <a href="{{route('privilegio.show',[$u->ID_USUA])}}" class="btn btn-outline-info btn-lg">
                                    <i class="fa fa-key"></i>
                            </a>
                        @endif
                        @if($u->AUD_ESTADO==1)
                            <a href="" data-target="#modal-delete-{{$u->ID_USUA}}" data-toggle="modal" class="btn btn-outline-danger btn-lg">
                                    <i class="fa fa-trash"></i>
                            </a>
                            @include('usuario.usuario-modal-eliminar')
                        @endif
                    <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection