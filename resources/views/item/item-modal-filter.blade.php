<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-item-buscador">
    {!!Form::open(array('action'=>'ItemController@index','method'=>'GET'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Familia">Familia</label>
                    <!--<input type="text" name="familia" class="form-control" placeholder="Todos">-->
                    <select name="familia" id="" class="form-control">
                        <option value=""></option>
                        @foreach($item as $i)
                            @if($i->FK_CPD_PARA_IP_ITEM_PI==1)
                                <option value="{{$i->NOMBRE}}">{{$i->NOMBRE}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Item">Item</label>
                    <input type="text" name="item" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="Codigo_Activo">Codigo Activo</label>
                    <input type="text" name="cod_activo" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="IP">IP</label>
                    <input type="text" name="ip" class="form-control" placeholder="Todos">
                </div>
                <div class="form-group">
                    <label for="Codigo_Saf">Codigo Saf</label>
                    <input type="text" name="codigo_saf" class="form-control" placeholder="Todos">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Aplicar Filtro</button>
                <button type="submit" class="btn btn-outline-info">Aplicar filtro</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
