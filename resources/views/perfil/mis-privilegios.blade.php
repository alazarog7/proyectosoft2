@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">

        <br>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Familia<input type="text" class="form-control"></th>
                    <th scope="col">Dispositivo<input type="text" class="form-control"></th>
                    <th scope="col">Password</th>
                    <th scope="col">Leer</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Regenerar</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-success">
                    <td>Camaras</td>
                    <td>Cam1</td>
                    <td>*********</td>
                    <td>
                        <button class="btn btn-success">Leer</button>
                    </td>
                    <td>
                        <button class="btn btn-info">Actualizar</button>
                    </td>
                    <td>
                        <a href="" data-target="#modal-regenerar" data-toggle="modal"><button class="btn btn-danger">Regenerar</button></a>
                        @include('perfil.modal-reg')
                    </td>
                </tr>
                <tr class="">
                    <td>Camaras</td>
                    <td>Cam2</td>
                    <td>*********</td>
                    <td>
                        <button class="btn btn-success">Leer</button>
                    </td>
                    <td>
                        <button class="btn btn-info">Actualizar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Regenerar</button>
                    </td>
                </tr>
                <tr class="table-success">
                    <td>Camaras</td>
                    <td>Cam3</td>
                    <td>*********</td>
                    <td>
                        <button class="btn btn-success">Leer</button>
                    </td>
                    <td>
                        <button class="btn btn-info">Actualizar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Regenerar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection