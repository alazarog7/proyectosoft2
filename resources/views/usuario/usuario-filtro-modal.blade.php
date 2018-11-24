<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-buscador">
    {!!Form::open(array('action'=>'UsuarioController@index','method'=>'GET'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="Apellido">Apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="Fono">Telefono</label>
                    <input type="text" name="fono" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">

                    <label for="Rol">Rol</label>
                    <select   name="rol" class="form-control">
                        <option value="0">Todos</option>
                        @foreach($rol as $r)
                            <option value="{{$r->ID_PARA}}">{{$r->NOMBRE}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-info">Aplicar filtro</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
