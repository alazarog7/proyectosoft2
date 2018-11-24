@extends('layouts.usuario')
@section('cabecera')
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h1>Registro de Usuario</h1></div>

                <div class="card-body">
                    {!! Form::open(['method'=>'POST','action' => 'UsuarioController@store']) !!}
                        <div class="form-group">
                            <label for="ROL">Rol </label>
                            <select class="form-control" name="ROL">
                                @foreach($combo_rol as $rol)
                                    <option value="{{$rol->ID_PARA}}" {{$rol->ID_PARA==old('ROL')?'selected':''}}>{{strtoupper($rol->NOMBRE)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre </label>
                            <input type="text" name="NOMBRE" class="form-control entrada {{$errors->has('NOMBRE')?'is-invalid':''}}"  value="{{old('NOMBRE')}}" placeholder="Nombre" required>
                            @if ($errors->has('NOMBRE'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('NOMBRE') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellidos </label>
                            <input type="text" name="APELLIDO" class="form-control entrada {{$errors->has('APELLIDO')?'is-invalid':''}}" value="{{old('APELLIDO')}}" placeholder="Apellidos" required>
                            @if ($errors->has('APELLIDO'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('APELLIDO') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono </label>
                            <input type="text" name="TELEFONO" class="form-control {{$errors->has('TELEFONO')?'is-invalid':''}}" value="{{old('TELEFONO')}}" placeholder="Telefono">
                            @if ($errors->has('TELEFONO'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('TELEFONO') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" name="EMAIL" class="form-control {{$errors->has('EMAIL')?'is-invalid':''}}" value="{{old('EMAIL')}}" placeholder="Email">
                            @if ($errors->has('EMAIL'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('EMAIL') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="u_alias">Usuario Alias </label>
                            <input type="text" name="USUARIO_ALIAS" class="form-control {{$errors->has('USUARIO_ALIAS')?'is-invalid':''}}"  value="{{old('USUARIO_ALIAS')}}"placeholder="Nombre de usuario" required>
                            @if ($errors->has('USUARIO_ALIAS'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('USUARIO_ALIAS') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" name="PASSWORD" class="form-control {{$errors->has('PASSWORD')?'is-invalid':''}}" id="pass" required >
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