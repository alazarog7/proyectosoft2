
<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-delete-{{$i->ID_ITEM}}">
    {!!Form::open(array('action'=>array('ItemController@destroy',$i->ID_ITEM),'method'=>'delete'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if($i->AUD_ESTADO == 1)
                    <p>Confirme si esta seguro de dar baja al item</p>
                @else
                    <p>Confirme si esta seguro de dar alta al item</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
