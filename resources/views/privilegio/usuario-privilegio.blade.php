@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/componentes/switch.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{asset('js/busquedas.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
                    <h3>
                        <img src="{{asset('imagenes/perfil.png')}}" width="40px" height="40px">
                        {{strtoupper($usuario->NOMBRE." ".$usuario->APELLIDO)}}
                    </h3>

        </div>

        <br>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Familia <button class=" btn btn-outline-success btn-sm" id="btn-bus-familia"><i class="fa fa-search"></i></button>
                        <div class="input-group-append">
                            <select name="bus-familia" id="bus-familia" class="form-control">
                                <option></option>
                                @foreach($items as $item)
                                    <option value="{{$item->FAMILIA}}">{{$item->FAMILIA}}</option>
                                @endforeach
                            </select>
                            <button class=" btn btn-outline-success btn-sm" id="btn-bus-familia-hide"><i class="fa fa-minus"></i></button>
                        </div>
                    </th>
                    <th scope="col">Dispositivo
                        <button class=" btn btn-outline-success btn-sm" id="btn-bus-dispositivos"><i class="fa fa-search"></i></button>
                        <div class="input-group-append">
                            <input type="text" class="form-control" id="bus-dispositivo">
                            <button class=" btn btn-outline-success btn-sm" id="btn-bus-dispositivos-hide"><i class="fa fa-minus"></i></button>
                        </div>
                    </th>
                    <th scope="col">Leer</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Regenerar</th>
                </tr>
                </thead>
                <tbody id="my_table">
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->FAMILIA}}</td>
                        <td>{{$item->NOMBRE}}</td>
                        @foreach($ope as $o)
                            <td>
                                {!! Form::open(array('method'=>'POST','action'=>array(
                                                                            'PrivilegioController@asignarPrivilegio',
                                                                             $usuario->ID_USUA,
                                                                             $item->ID_ITEM,
                                                                             $o->ID_PARA))) !!}
                                    <div class="form-group">
                                        <input type="hidden" id="{{$item->ID_ITEM."-".$o->ID_PARA}}-valor" name="accion" value="0">
                                        <input type="hidden" id="{{$item->ID_ITEM."-".$o->ID_PARA}}-reg" name="usit" value="0">
                                        <input type="submit" id="{{$item->ID_ITEM."-".$o->ID_PARA}}-selector" class="btn btn-outline-danger" value="HABILITAR">
                                    </div>
                                {!! Form::close() !!}
                            </td>
                        @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var data=[
            @foreach($privilegio as $p)
                    ['{{$p->FK_CPD_ITEM_II_USIT_II."-".$p->FK_CPD_PARA_IP_USIT_PI}}',[{{$p->ID_USIT}}]],
            @endforeach
        ];
        $.each(data,function (index,value) {
            $('#'+value[0]+'-valor').val(1);
            $('#'+value[0]+'-selector').val('DESHABILITAR');
            $('#'+value[0]+'-selector').toggleClass('btn-outline-danger btn-outline-success');
            $('#'+value[0]+'-reg').val(value[1]);
            //console.log(value[0]+'-valor');
            //console.log(value[0]+'-selector');
        })
    </script>


@endsection