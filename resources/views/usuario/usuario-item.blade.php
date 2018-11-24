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
            <table class="table " id="my_table">
                <thead>
                <tr>
                    <th scope="col">Familia</th>
                    <th scope="col">Dispositivo</th>
                    <th scope="col">Leer</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Regenerar</th>
                </tr>
                </thead>
                <tbody id="tabla">
                @foreach($items as $item)
                    <tr class="fila {{$item->ID_ITEM}}">
                        <td>{{$item->FAMILIA}}</td>
                        <td>{{$item->NOMBRE}}</td>
                        <td>
                            <a href=""  id="{{$item->ID_ITEM}}-{{3}}" data-target="#modal-pass-{{$item->ID_ITEM}}" data-toggle="modal" class="btn btn-outline-info btn-lg privilegio"><i class="fa fa-eye"></i></a>
                            @include('usuario.usuario-item-modal-pass')
                        </td>
                        <td>
                            <a href="{{route('privilegio.edit',[$item->ID_ITEM])}}" id="{{$item->ID_ITEM}}-{{4}}" class="btn btn-outline-success btn-lg privilegio">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a  href="" id="{{$item->ID_ITEM}}-{{5}}" data-target="#modal-regenerar-{{$item->ID_ITEM}}" data-toggle="modal" class="btn btn-outline-success btn-lg privilegio regenerar {{$item->FAMILIA}}">
                                <i class="fa fa-refresh"></i>
                            </a>
                            @include('usuario.usuario-modal-item-regen')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if(session()->get('ROL')==7)
    <script>
        $('.fila').hide();
        $('.privilegio').hide();
        var data = [
                @foreach($privilegio as $p)
                    ['{{$p->FK_CPD_ITEM_II_USIT_II."-".$p->FK_CPD_PARA_IP_USIT_PI}}',[{{$p->FK_CPD_ITEM_II_USIT_II}}]],
                @endforeach
               ];
        $.each(data,function (index,value) {
            $('.'+value[1]).show();
            $('#'+value[0]).show();
        });
        //$('.regenerar:not(:first)').remove();
        //$('.hola').show();
    </script>
    @endif
@endsection