@extends('layouts.instalacion')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CERTIFICADOS</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Llave Privada</label>
                                <textarea name="" id="" class="form-control" rows="25" readonly></textarea>

                            </div>
                            <div class="col-md-6">
                                <label for="">Llave Publica</label>
                                <textarea name="" id="" class="form-control" rows="25" readonly></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Siguiente">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection