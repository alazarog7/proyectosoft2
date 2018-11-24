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
                    <a href="{{route('pdfItem',$codigo)}}"  class="btn btn-outline-success"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped" id="tabla">
                <thead>
                <tr>
                    <!--<th scope="col">Familia</th>-->
                    <th scope="col">Dispositivo</th>
                    <th scope="col">Codigo Activo</th>
                    <th scope="col">Codigo SAF</th>
                    <th scope="col">IP</th>
                    <!--<th scope="col">PASSWORD</th>-->
                    <th scope="col">ACCION</th>
                    <th scope="col">USUARIO</th>
                    <th scope="col">FECHA</th>

                </tr>
                </thead>
                <tbody  id="my_table">
                <!--Registro creado-->
                                <tr class="table-success">
                                    <td>{{$item[(sizeof($item)==1)?0:1]->NOMBRE}}</td>
                                    <td>{{$item[(sizeof($item)==1)?0:1]->CODIGO_ACTIVO}}</td>
                                    <td>{{$item[(sizeof($item)==1)?0:1]->CODIGO_SAF}}</td>
                                    <td>{{$item[(sizeof($item)==1)?0:1]->IP}}</td>
                                    <!--<td>{{$item[(sizeof($item)==1)?0:1]->PASSWORD}}</td>-->
                                    <td>{{__('CREADO')}}</td>
                                    <td>{{$item[0]->USUARIO}}</td>
                                    <td>{{$item[0]->AUD_FECHA}}</td>
                                </tr>
                <!--Creado del registro-->
                        @for($i = 1; $i < sizeof($item);$i++)
                            <!--Si es que existemn modificaiones-->
                                <tr class="table-warning">
                                    <td>{{$item[$i]->NOMBRE}}</td>
                                    <td>{{$item[$i]->CODIGO_ACTIVO}}</td>
                                    <td>{{$item[$i]->CODIGO_SAF}}</td>
                                    <td>{{$item[$i]->IP}}</td>
                                    <!--<td>{{$item[$i]->PASSWORD}}</td>-->
                                    <td>{{__('MODIFICADO')}}</td>
                                    <td>{{$item[$i]->USUARIO}}</td>
                                    <td>{{$item[$i]->AUD_FECHA}}</td>
                                </tr>

                        @endfor
                                    <!--Si es que existio una baja-->
                                    <tr class="{{isset($item[0]->AUD_BAJA_USUARIO)?'table-danger':'table-success'}}">
                                        <td>{{$item[0]->NOMBRE}}</td>
                                        <td>{{$item[0]->CODIGO_ACTIVO}}</td>
                                        <td>{{$item[0]->CODIGO_SAF}}</td>
                                        <td>{{$item[0]->IP}}</td>
                                        <!--<td>{{$item[0]->PASSWORD}}</td>-->
                                        @if(isset($item[0]->AUD_BAJA_USUARIO ))
                                            <td >{{__('ELIMINADO')}}</td>
                                            <td>{{$item[0]->AUD_BAJA_USUARIO}}</td>
                                            <td>{{$item[0]->AUD_BAJA_FECHA}}</td>
                                        @endif
                                    </tr>
                <!--Modificaciones del registro-->
                <!--Eliminacion del registro si es que existio-->
                </tbody>
            </table>
        </div>
    </div>
@endsection