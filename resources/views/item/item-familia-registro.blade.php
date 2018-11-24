
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
                <div class="card-header"><h1>Familia</h1></div>

                <div class="card-body">
                                {!! Form::open(['method'=>'POST','action' => 'FamiliaController@store']) !!}
                                    <div class="form-group">
                                        <label for="">Nombre de Familia</label>
                                        <input type="text" class="form-control {{$errors->has('NOMBRE')?'is-invalid':''}}" onkeyup="
                                                                                                                                      var start = this.selectionStart;
                                                                                                                                      var end = this.selectionEnd;
                                                                                                                                      this.value = this.value.toUpperCase();
                                                                                                                                      this.setSelectionRange(start, end);
                                                                                                                                    " placeholder="Nombre" name="NOMBRE">
                                        @if ($errors->has('NOMBRE'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('NOMBRE') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripcion</label>
                                        <textarea class="form-control" name="DESCRIPCION"></textarea>

                                    </div>
                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                    <button type="reset" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection