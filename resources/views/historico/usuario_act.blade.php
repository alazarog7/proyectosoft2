@extends('layouts.usuario')
@section('cabecera')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/item.js')}}"></script>
    <script src="{{asset('js/busquedas.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group-append">
                    <input type="text" id="bus-historico" class="form-control">
                    <button class="btn btn-outline-success" id="btn-bus-historico"><i class="fa fa-search"></i></button>
                    <a href="{{route('pdfItemPriv',$codigo)}}" onclick="return {{sizeof($privilegio)>0?'true':'false'}}" class="btn btn-outline-success"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped" id="tabla">
                <thead>
                <tr>
                    <!--<th scope="col">Familia</th>-->
                    <th scope="col">ITEM</th>
                    <th scope="col">USUARIO</th>
                    <th scope="col">PRIVILEGIO</th>
                    <th scope="col">AUTOR REGISTRO</th>
                    <th scope="col">FECHA REGISTRO</th>
                    <th scope="col">AUTOR BAJA</th>
                    <th scope="col">FECHA BAJA</th>
                </tr>
                </thead>
                <tbody id="my_table">
                @for($i = 0; $i < sizeof($privilegio);$i++)
                    <!--Si es que existemn modificaiones-->
                    <tr class="{{isset($privilegio[$i]->AUD_BAJA_FECHA)?'table-danger':'table-warning'}}">
                        <td>{{$privilegio[$i]->NOMBRE}}</td>
                        <td>{{$privilegio[$i]->USUARIO}}</td>
                        <td>{{$privilegio[$i]->PRIVILEGIO}}</td>
                        <td>{{$privilegio[$i]->AUTOR_REG}}</td>
                        <td>{{$privilegio[$i]->AUD_FECHA}}</td>
                        <td>{{$privilegio[$i]->AUTOR_BAJ}}</td>
                        <td>{{$privilegio[$i]->AUD_BAJA_FECHA}}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection