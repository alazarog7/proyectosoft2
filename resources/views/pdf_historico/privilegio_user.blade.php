<html>
<head>
    <title>Impresion del hsitorico</title>
</head>
<body>
<div align="center">
    <H1>REPORTE DE PRIVILEGIO</H1>
    <h3>USUARIO: {{$privilegio[0]->USUARIO}}</H3>
</div>
<table class="table table-striped" id="tabla">
    <table class="table table-striped" id="tabla">
        <thead>
        <tr>
            <!--<th scope="col">Familia</th>-->
            <th scope="col">ITEM</th>
            <th scope="col">USUARIO</th>
            <th scope="col">PRIVILEGIO</th>
            <th scope="col">AUTOR REGISTRO</th>
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col">AUTOR BAJA</th>
            <th scope="col">FECHA BAJA</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < sizeof($privilegio);$i++)
            <!--Si es que existemn modificaiones-->
            <tr class="{{isset($privilegio[$i]->AUD_BAJA_FECHA)?'table-danger':'table-warning'}}">
                <td>{{$privilegio[$i]->NOMBRE}}</td>
                <td>{{$privilegio[$i]->USUARIO}}</td>
                <td>{{$privilegio[$i]->PRIVILEGIO}}</td>
                <td>{{$privilegio[$i]->AUTOR_REG}}</td>
                <td>{{$privilegio[$i]->AUD_FECHA}}</td>
                <td>{{$privilegio[$i]->AUTOR_BAJ}}</td>
                <td>{{$privilegio[$i]->AUD_BAJA_FECHA}}</td>
            </tr>
        @endfor
        </tbody>
    </table>>
</body>
</html>

