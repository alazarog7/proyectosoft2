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

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped" id="tabla">
                <thead>
                <tr>
                    <th scope="col">Familia</th>
                    <th scope="col">Dispositivo</th>
                    <th scope="col">Codigo Activo</th>
                    <th scope="col">Codigo SAF</th>
                    <th scope="col">IP</th>

                </tr>
                </thead>
                <tbody id="my_table">
                @foreach($items as $i)
                    <tr>
                        <td>{{strtoupper($i->FAMILIA)}}</td>
                        <td>{{strtoupper($i->NOMBRE)}}</td>
                        <td>{{strtoupper($i->CODIGO_ACTIVO)}}</td>
                        <td>{{strtoupper($i->CODIGO_SAF)}}</td>
                        <td>{{$i->IP}}</td>
                        <td>
                            <a href="{{route('historico.showitem',$i->ID_ITEM)}}"  class="btn btn-outline-success btn-lg"><i class="fa fa-eye"></i></a>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection