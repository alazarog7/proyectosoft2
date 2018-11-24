@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">

    <!--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">-->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">x
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/item.js')}}"></script>
    <script src="{{asset('js/busquedas.js')}}"></script>
    <style>
        tr{
            width: 100%;
            height:10px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-group">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="bus-device" placeholder="Nombre Item">
                </div>
                <a href="{{route('item.create')}}"style="padding-left: 20px;" ><button class="btn btn-outline-success">Nuevo Item</button></a>
            </div>
        </div>
        <br>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="nombre-item"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                       <FORM>
                           <div class="form-group">
                               <label for="">CODIGO ACTIVO</label>
                               <input type="text" id="cod_act" class="form-control" disabled>
                           </div>
                           <div class="form-group">
                               <label for="">CODIGO SAF</label>
                               <input type="text" id="cod_saf" class="form-control" disabled>
                           </div>
                           <div class="form-group">
                               <label for="">IP</label>
                               <input type="text" id="ip" class="form-control" disabled>
                           </div>
                           <div class="form-group">
                               <label for="">USUARIO</label>
                               <input type="text" id="usuario" class="form-control" disabled>
                           </div>
                           <div class="form-group">
                               <label for="">PASSWORD</label>
                               <input type="text" id="pass" class="form-control" >
                           </div>
                       </FORM>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">CERRAR</button>
                    </div>
                </div>
            </div>
        </div>



            <table class="table table-striped">
                <thead>
                <tr>
                    <!--<th scope="col">Familia</th>-->
                    <th scope="col">Dispositivo</th>
                    <th scope="col">Codigo Activo</th>
                    <th scope="col">Codigo SAF</th>
                    <th scope="col">IP</th>
                    <!--<th scope="col">
                        <a href="" data-target="#modal-item-buscador" class="btn btn-success btn-lg" data-toggle="modal"><i class="fa fa-search"></i></a>

                    </th>-->

                </tr>
                </thead>
                <tbody id="my_table">
                @foreach($lista as $i)
                <tr>
                    <!--<td>{{strtoupper($i->FAMILIA)}}</td>-->
                    <td>{{strtoupper($i->NOMBRE)}}</td>
                    <td>{{strtoupper($i->CODIGO_ACTIVO)}}</td>
                    <td>{{strtoupper($i->CODIGO_SAF)}}</td>
                    <td>{{$i->IP}}</td>
                    <td>
                        <a href="{{route('item.show',[$i->ID_ITEM])}}"  data-toggle="modal" data-target="#myModal" class="btn btn-outline-info btn-md boton-ver-item"><i class="fa fa-eye"></i></a>
                        <a href="{{route('item.edit',[$i->ID_ITEM])}}"  class="btn btn-outline-success btn-md"><i class="fa fa-pencil"></i></a>
                        <a href="" data-target="#modal-delete-{{$i->ID_ITEM}}" data-toggle="modal"><button class="btn btn-outline-danger btn-md"><i class="fa fa-trash"></i></button></a>
                        @include('item.item-modal-vigente')
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>


@endsection