<!-- Modal -->
<div class="modal fade" id="modal-manage-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Gestionar pedido</h4>
            </div>
            <form id="form-change-status">
                <div class="modal-body">

                    <input type="hidden" id="order-id" value="<?= $order->id ?>">

                    <!-- NAME -->
                    <div class="form-group">
                        <label>Modifique el estado de un pedido: <span class="text-red">(*)</span></label>
                        <input type="hidden" name="order_id" value="<?= $order->id ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <select id="select-status" class="form-control select2" style="width: 100%;" required>
                                <option value="4" data-status-name="<?= $order->status->name ?>">Preparar pedido - Pago</option>
                                <option value="8" data-status-name="<?= $order->status->name ?>">Pendiente de envío</option>
                                <option value="10" data-status-name="<?= $order->status->name ?>">Concretado</option>
                            </select>
                        </div>
                    </div>
                       
                </div><!-- ./modal.body -->

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Aplicar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->