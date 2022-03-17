<!-- Modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Añadir método de envío</h4>
            </div>
            <form id="form-create">
                <div class="modal-body">


                    <div class="row">

                        <!-- BUSINESS_NAME -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre: <span class="text-red">(*)</span></label>
                                <input type="text" id="name" class="form-control" placeholder="Ingrese nombre" required>
                            </div>
                        </div>

                        
                         <!-- RUT -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Costo: <span class="text-red">(*)</span></label>
                                <input type="number" id="cost" class="form-control" placeholder="Ingrese costo" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripción <span class="text-red">(*)</span></label>
                                <textarea class="form-control" id="description" rows="4" placeholder="Descripción del método de envío..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mensaje <span class="text-red">(*)</span></label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Mensaje a desplegar al finalizar el pago..."></textarea>
                            </div>
                        </div>

                    </div><!-- ./row -->
                    
                </div><!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   