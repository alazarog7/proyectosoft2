<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-regenerar-{{$item->ID_ITEM}}">
    {!!Form::open(array('action'=>'ItemController@regenerarPassword','method'=>'POST'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Regenerar Passwords</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ID_FAMILIA" value="{{$item->ID_FAMILIA}}">
                <div class="form-check">
                    <label class="form-check-label">
                        <div class="form-group">
                            <input type="radio" class="form-check-input" name="FAMILIA" value="igual" checked>Mismo por Familia
                        </div>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <div class="form-group">
                            <input type="radio" class="form-check-input" name="FAMILIA" value="diferente">Diferente por Familia
                        </div>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
