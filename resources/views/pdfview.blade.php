<html>
<head>
    <title>Impresion del hsitorico</title>
</head>
<body>
<div align="center">
<H1>REPORTE DE ITEM</H1>
</div>
<table class="table table-striped" id="tabla">
    <thead>
    <tr>
        <!--<th scope="col">Familia</th>-->
        <th scope="col">Dispositivo</th>
        <th scope="col">Codigo Activo</th>
        <th scope="col">Codigo SAF</th>
        <th scope="col">IP</th>
        <th scope="col">ACCION</th>
        <th scope="col">USUARIO</th>
        <th scope="col">FECHA</th>

    </tr>
    </thead>
    <tbody>
    <!--Registro creado-->
    <tr class="table-success">
        <td>{{$item[(sizeof($item)==1)?0:1]->NOMBRE}}</td>
        <td>{{$item[(sizeof($item)==1)?0:1]->CODIGO_ACTIVO}}</td>
        <td>{{$item[(sizeof($item)==1)?0:1]->CODIGO_SAF}}</td>
        <td>{{$item[(sizeof($item)==1)?0:1]->IP}}</td>
        <td>{{__('CREADO')}}</td>
        <td>{{$item[0]->USUARIO}}</td>
        <td>{{$item[0]->AUD_FECHA}}</td>
    </tr>
    <!--Creado del registro-->
    @for($i = 1; $i < sizeof($item);$i++)
        <!--Si es que existemn modificaiones-->
        <tr class="table-warning">
            <td>{{$item[$i]->NOMBRE}}</td>
            <td>{{$item[$i]->CODIGO_ACTIVO}}</td>
            <td>{{$item[$i]->CODIGO_SAF}}</td>
            <td>{{$item[$i]->IP}}</td>
            <td>{{__('MODIFICADO')}}</td>
            <td>{{$item[$i]->USUARIO}}</td>
            <td>{{$item[$i]->AUD_FECHA}}</td>
        </tr>

    @endfor
    <!--Si es que existio una baja-->
    <tr class="{{isset($item[0]->AUD_BAJA_USUARIO)?'table-danger':'table-success'}}">
        <td>{{$item[0]->NOMBRE}}</td>
        <td>{{$item[0]->CODIGO_ACTIVO}}</td>
        <td>{{$item[0]->CODIGO_SAF}}</td>
        <td>{{$item[0]->IP}}</td>
        @if(isset($item[0]->AUD_BAJA_USUARIO ))
            <td >{{__('ELIMINADO')}}</td>
            <td>{{$item[0]->AUD_BAJA_USUARIO}}</td>
            <td>{{$item[0]->AUD_BAJA_FECHA}}</td>
        @endif
    </tr>
    <!--Modificaciones del registro-->
    <!--Eliminacion del registro si es que existio-->
    </tbody>
</table>
</body>
</html>

