@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nombre<input type="text" class="form-control"></th>
                    <th scope="col">Apellido<input type="text" class="form-control"></th>
                    <th scope="col">Fono<input type="text" class="form-control"></th>
                    <th scope="col">Email<input type="text" class="form-control"></th>
                    <th scope="col">Vigencia</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-success">
                    <td>Juan</td>
                    <td>Perez</td>
                    <td>2546754</td>
                    <td>j.perez@anh.gob</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                    <td>
                        <a href="{{route('privilegio')}}"><button type="button" class="btn btn-success btn-lg">
                                <i class="fa fa-key"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Perez</td>
                    <td>2546754</td>
                    <td>j.perez@anh.gob</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>d
                        <button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                    <td>
                        <a href="{{route('privilegio')}}"><button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-key"></i>
                        </button>
                        </a>
                    </td>
                </tr>
                <tr class="table-success">
                    <td>Juan</td>
                    <td>Perez</td>
                    <td>2546754</td>
                    <td>j.perez@anh.gob</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-key"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection