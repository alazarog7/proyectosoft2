<!-- <%@ Page Language="C#" AutoEventWireup="true" CodeBehind="wfAutenticacionv2.aspx.cs" Inherits="AnhTalleresGnvV3Presentacion.Sitio.Persona.wfAutenticacionv2" %> -->

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SISTEMA DE GESTION DE CUENTAS PRIVILEGIADAS</title>
    <link rel="shortcut icon" href="{{asset('imagenes/loguito.ico')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/hydro_login.css')}}"/>
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" media="screen">
</head>
<body>

<div class="wrapper">

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <img src="{{asset('css/logos/anh_logo.png')}}" class="div_left img_anh_logo"/><img src="{{asset('css/logos/hydro_logo.png')}}" class="div_right img_hydro_logo"/>
            <br><br><br><br><br><br>
            <div class="containerlg">
                <img src="{{asset('css/logos/nacho.png')}}" class="div_left img_nacho_logo"/>
                <div class="div_nombre_sistema">
                    Bienvenido al sistema:
                    <br/><br/>
                    <div class="hydro_div_line_short">
                        <span class="hydro_nombre_sistema">cuentas</span>
                        <br/>
                        <span class="hydro_nombre_sistema_sub">privilegiadas</span>
                    </div>
                </div>
                <div class="form_line">
                    {!! Form::open(['method'=>'GET','action'=>'ItemController@index']) !!}
                    <button type="submit" class="btnLogin" ValidationGroup="loginUsuario">Instalar <i class="icons icons-ok-circle icon-style2"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <div class="wraper_footer">
        Agencia Nacional de Hidrocarburos | Av. 20 de Octubre Nro. 2685 | NIT: 120919027 | La Paz, Bolivia<br/>
        Linea Gratuita: 800-10-6006 | Tel: (591)-2-2614000 | Fax: (591)-2-2434007 | Email: contacto @ anh.gob.bo<br/>
        Desarrollo y mantenimiento: Dirección de Tecnologías de Información y Comunicación<br/>
        AGENCIA NACIONAL DE HIDROCARBUROS ® | 2018
    </div>
</div>



</body>

</html>


