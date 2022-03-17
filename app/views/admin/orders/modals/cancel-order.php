<!-- Modal -->
<div class="modal fade" id="modal-cancel-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Cancelar un pedido</h4>
            </div>
            <form id="form-cancel-order">
                <div class="modal-body">

                    <p>Tras la cancelación de un pedido, el stock de los productos que figuran en la venta serán actualizados.</p>

                    <input type="hidden" id="id-cancel-order">

                    <!-- NAME -->
                    <div class="form-group">
                        <label>Indique el motivo de cancelación: <span class="text-red">(*)</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <select id="select-reason" name="" class="form-control select2" style="width: 100%;" required>
                                <option value="" disabled selected>Seleccione motivo</option>
                                <option value="El cliente cambió de idea">El cliente cambió de idea.</option>
                                <option value="Uno o más productos no están disponibles">Uno o más productos no están disponibles.</option>
                                <option value="Presenta incosistencia en los importes">Presenta incosistencia en los importes.</option>
                                <option value="Esto fue una venta de prueba">Esto fue una venta de prueba.</option>
                                <option value="Otro motivo">Otro motivo.</option>
                            </select>
                        </div>
                    </div>
                       

                </div><!-- ./modal.body -->

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Cancelar pedido</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->