@extends('layouts.usuario')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h1>Modificacion de Item</h1></div>

                <div class="card-body">
                    {!! Form::open(['method'=>'PATCH','action' => ['ItemController@update',$item->ID_ITEM]]) !!}
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" name="NOMBRE" class="form-control {{$errors->has('NOMBRE')?'is-invalid':''}}" value="{{$item->NOMBRE}}" placeholder="Nombre" required>
                        @if ($errors->has('NOMBRE'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('NOMBRE') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="codigo_activo">Codigo Activo</label>
                        <input type="text" name="CODIGO_ACTIVO" class="form-control {{$errors->has('CODIGO_ACTIVO')?'is-invalid':''}}" value="{{$item->CODIGO_ACTIVO}}"  placeholder="Apellidos" required>
                        @if ($errors->has('CODIGO_ACTIVO'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('CODIGO_ACTIVO') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="codigo_saf">Codigo SAF</label>
                        <input type="text" name="CODIGO_SAF" class="form-control {{$errors->has('CODIGO_SAF')?'is-invalid':''}}" value="{{$item->CODIGO_SAF}}"  placeholder="Telefono">
                        @if ($errors->has('CODIGO_SAF'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('CODIGO_SAF') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ip">IP </label>
                        <input type="text" name="IP" class="form-control {{$errors->has('IP')?'is-invalid':''}}" value="{{$item->IP}}"  placeholder="IP">
                        @if ($errors->has('IP'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('IP') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="usuario_alias">USUARIO ALIAS </label>
                        <input type="text" name="USUARIO_ALIAS" class="form-control {{$errors->has('USUARIO_ALIAS')?'is-invalid':''}}" value="{{$item->USUARIO_ALIAS}}"  placeholder="USUARIO_ALIAS">
                        @if ($errors->has('USUARIO_ALIAS'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('USUARIO_ALIAS') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <?php $descrypt = new \App\Library\RSACrypt();?>
                        <input type="text" name="PASSWORD" class="form-control {{$errors->has('PASSWORD')?'is-invalid':''}}"  value="{{$descrypt->desencriptado(base64_decode($item->PASSWORD))}}" id="pass"  >
                        @if ($errors->has('PASSWORD'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('PASSWORD') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-success" value="Registrar">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection