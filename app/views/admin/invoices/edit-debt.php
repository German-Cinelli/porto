<!-- Modal -->
<div class="modal fade" id="modal-edit-debt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Abonar factura - Deuda: <?= \app\helpers\Utils::moneyFormat($invoice->debt, $app['SYMBOL']) ?></h4>
            </div>
            <form id="form-create" action="<?= URL_PATH ?>/admin/invoice/pay_debt/<?= $invoice->id ?>" method="POST">
                <div class="modal-body">

                    <div class="row">


                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Ingrese monto a abonar: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" name="amount" min="1" class="form-control" placeholder="Ingrese monto" required>
                                </div>
                            </div>
                            
                        </div>

                    </div><!-- ./row -->
                    
                </div><!-- ./modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Pagar</button>
                </div>

            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   