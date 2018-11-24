<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-alta-{{$u->ID_USUA}}">
    {!!Form::open(array('action'=>array('UsuarioController@altaRegistro',$u->ID_USUA),'method'=>'post'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirme si esta seguro  dar Alta al usuario</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
