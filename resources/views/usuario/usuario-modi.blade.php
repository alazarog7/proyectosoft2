@extends('layouts.usuario')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3><img src="{{asset('imagenes/perfil.png')}}" width="40px" height="40px">{{$usuario[0]->USUARIO_ALIAS}}</h3></div>

                <div class="card-body">
                    {!! Form::open(['method'=>'PATCH','action' => ['UsuarioController@update',$usuario[0]->ID_USUA]]) !!}
                    <div class="form-group">
                        <label for="ROL">Rol </label>
                        <select class="form-control {{$errors->has('ROL')?'is-invalid':''}}" name="ROL">
                            @foreach($combo_rol as $rol)
                                <option value="{{$rol->ID_PARA}}" {{$usuario[0]->FK_PARA_IP_ROL_RI==$rol->ID_PARA?'selected':''}}>{{strtoupper($rol->NOMBRE)}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ROL'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>Solo existe, un administrador no puede ser usuario</strong>
                            </span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" name="NOMBRE" value="{{$usuario[0]->NOMBRE}}" class="form-control {{$errors->has('NOMBRE')?'is-invalid':''}}"  placeholder="Nombre" required>
                        @if ($errors->has('NOMBRE'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('NOMBRE') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellidos </label>
                        <input type="text" name="APELLIDO" value="{{$usuario[0]->APELLIDO}}" class="form-control {{$errors->has('APELLIDO')?'is-invalid':''}}" placeholder="Apellidos" required>
                        @if ($errors->has('APELLIDO'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('APELLIDO') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono </label>
                        <input type="text" name="TELEFONO" value="{{$usuario[0]->TELEFONO}}" class="form-control {{$errors->has('TELEFONO')?'is-invalid':''}}" placeholder="Telefono">
                        @if ($errors->has('TELEFONO'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('TELEFONO') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" name="EMAIL" value="{{$usuario[0]->EMAIL}}" class="form-control {{$errors->has('EMAIL')?'is-invalid':''}}" placeholder="Email">
                        @if ($errors->has('EMAIL'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('EMAIL') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <!--<div class="form-group">
                        <label for="u_alias">Usuario Alias </label>
                        <input type="text" name="USUARIO_ALIAS" value="{{$usuario[0]->USUARIO_ALIAS}}" class="form-control {{$errors->has('USUARIO_ALIAS')?'is-invalid':''}}" placeholder="Apellidos" required>
                        @if ($errors->has('USUARIO_ALIAS'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('USUARIO_ALIAS') }}</strong>
                                    </span>
                        @endif
                    </div>-->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" name="PASSWORD" class="form-control {{$errors->has('PASSWORD')?'is-invalid':''}}" id="pass">
                        @if ($errors->has('PASSWORD'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('PASSWORD') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection