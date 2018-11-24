
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

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h1>Item</h1></div>

                <div class="card-body">
                    {!! Form::open(['method'=>'POST','action' => 'ItemController@store']) !!}

                            <div class="form-group">
                                <label for="">Familia</label>
                                <select class="form-control" name="FAMILIA">
                                    @foreach($item as $i)
                                        @if($i->FK_CPD_PARA_IP_ITEM_PI==1)
                                            <option value="{{$i->ID_ITEM}}">{{$i->NOMBRE}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Codigo Activo</label>
                                        <input type="text" class="form-control {{$errors->has('CODIGO_ACTIVO')?'is-invalid':''}}" placeholder="" value="{{old('CODIGO_ACTIVO')}}" name="CODIGO_ACTIVO">
                                        @if ($errors->has('CODIGO_ACTIVO'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('CODIGO_ACTIVO') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control {{$errors->has('NOMBRE')?'is-invalid':''}}" placeholder="" value="{{old('NOMBRE')}}" name="NOMBRE">
                                        @if ($errors->has('NOMBRE'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('NOMBRE') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">IP</label>
                                        <input type="text" class="form-control {{$errors->has('IP')?'is-invalid':''}}" placeholder=""  value="{{old('IP')}}" name="IP">
                                        @if ($errors->has('IP'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('IP') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Codigo SAF</label>
                                        <input type="text" class="form-control {{$errors->has('CODIGO_SAF')?'is-invalid':''}}" placeholder=""  value="{{old('CODIGO_SAF')}}" name="CODIGO_SAF">
                                        @if ($errors->has('CODIGO_SAF'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('CODIGO_SAF') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="">Usuario</label>
                                        <input type="text" class="form-control {{$errors->has('PASSWORD')?'is-invalid':''}}" placeholder=""  value="{{old('USUARIO_ALIAS')}}" name="USUARIO_ALIAS">
                                        @if ($errors->has('USUARIO_ALIAS'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('USUARIO_ALIAS') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="form-control {{$errors->has('PASSWORD')?'is-invalid':''}}" placeholder=""  value="{{old('PASSWORD')}}" name="PASSWORD">
                                        @if ($errors->has('PASSWORD'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('PASSWORD') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="button" class="btn btn-warning btn-block" id="gpass" value="GENERAR">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Confirmar</button>
                            <button type="reset" class="btn btn-info" data-dismiss="modal">Cancelar</button>


                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection