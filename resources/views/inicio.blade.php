@extends('layouts.login')
@section('content')
    {!! Form::open(['method'=>'POST','action' => 'LoginController@ingresar','class'=>'form']) !!}
    <div class="form_line">
        <i class="icons icons-user icon-style"></i><input class="loginInput" type="text" id="UserName" name="usuario"/>
    </div>
    <div class="form_line">
        <i class="icons icons-keys icon-style"></i><input class="loginInput" type="password" id="UserPass" name="pass"/>
    </div>
    <div class="form_line">
        <button type="submit" class="btnLogin" ValidationGroup="loginUsuario">Entrar <i class="icons icons-ok-circle icon-style2"></i></button>
    </div>
    {!! Form::close() !!}
@endsection