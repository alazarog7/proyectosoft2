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
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-group">
                <div class="col-md-5">
                    <input type="text" class="form-control" id="bus-familias" placeholder="Nombre Familia">
                </div>
                <a href="{{route('item.create')}}"style="padding-left: 20px;" ><button class="btn btn-outline-success">Nuevo Item</button></a>
                <div style="padding-left: 10px;">
                    <a href="{{route('familia.create')}}" ><button class="btn btn-outline-success">Nuevo Familia</button></a>
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="familias">
           @foreach($familia as $f)
               <div class="col-md-4 comenzar" style="padding-top: 20px;">
                   <div class="card">
                       <div class="card-header">
                          <strong>
                              {{$f->NOMBRE}}
                          </strong>
                           <a  href="" id="{{$f->ID_ITEM}}" data-target="#modal-regenerar-{{$f->ID_ITEM}}" data-toggle="modal" class="btn btn-success float-right">
                               <i class="fa fa-refresh"></i>
                           </a>
                           @include('item.item-familia-regen')
                       </div>
                       <div class="card-body">
                           @if(isset($f->DESCRIPCION))
                               <p>
                                   {{$f->DESCRIPCION}}
                               </p>
                           @else
                               <p>SIN DESCRIPCION</p>
                           @endif
                       </div>
                       <div class="card-footer">
                           <a href="{{route('item.listFam',[$f->ID_ITEM])}}"  class="btn btn-outline-info  btn-block">VER</a>
                       </div>
                   </div>
               </div>
           @endforeach
        </div>
    </div>


@endsection