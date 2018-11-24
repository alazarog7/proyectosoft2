<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-pass-{{$item->ID_ITEM}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Usuario Alias: <strong>{{$item->USUARIO_ALIAS}}</strong></p>
                <?php $valor = new \App\Library\RSACrypt();?>
                <p>Password: <strong>{{$valor->desencriptado(base64_decode($item->PASSWORD))}}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
