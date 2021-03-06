<script>
    function okModalMensajeGlobal(){
        $('#modalMensajeGlobal').modal('toggle');
    }


    function modalMsj(mensaje) {
        $("#labelMsjGlobal").html(mensaje);
        $("#modalMensajeGlobal").modal({
            "backdrop": "static",
            "keyboard": true,
            "show": true
        });
    }

    function okModalMensajeGlobalInfo(){
        $('#modalMensajeGlobalInfo').modal('toggle');
    }


    function modalMsjInfo(mensaje) {
        $("#labelMsjGlobalInfo").html(mensaje);
        $("#modalMensajeGlobalInfo").modal({
            "backdrop": "static",
            "keyboard": true,
            "show": true
        });
    }



</script>

<div id="modalMensajeGlobal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">Alerta</h4>

            </div>
            <!-- dialog buttons -->
            <div onload="okModalMensajeGlobalInfo()" class="modal-body">
                <label id="labelMsjGlobal"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalMensajeGlobalInfo" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">Informaci&oacute;n</h4>

            </div>
            <!-- dialog buttons -->
            <div onload="okModalMensajeGlobalInfo()" class="modal-body">
                <label id="labelMsjGlobalInfo"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

