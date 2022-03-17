<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar cupón</h4>
            </div>
            <form id="form-edit" method="POST">
                <div class="modal-body modal-body-edit">
                    
                    <input type="hidden" id="id-edit">

                    <div class="row">
                    
                        <!-- CODE -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Código: <span class="text-red">(*)</span></label>
                                <input type="text" id="code-edit" class="form-control" min="8" placeholder="Ingrese código" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    
                        <!-- DESCRIPTION -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción: <span class="text-red">(*)</span>
                                    <span data-toogle="tooltip" title="Aquí ingresará el mensaje que se despliegue cuando un usuario aplica un cupón. Ejemplos: 1) Ahora tendrás un descuento del 25% de tu compra. 2) Ahora tendrás un descuento de $200 con tu compra superior a $1500.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <input type="text" id="description-edit" class="form-control" placeholder="Ingrese descripción" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <!-- DISCOUNT_TYPE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de descuento: <span class="text-red">(*)</span></label>
                                <select id="discount_type_id-edit" class="form-control" required>
                                    <?php foreach($discount_types as $discount_type) : ?>
                                    <option value="<?= $discount_type->id ?>"><?= $discount_type->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        
                         <!-- DISCOUNT -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Monto descuento: <span class="text-red">(*)</span>
                                    <span data-toogle="tooltip" title="El monto de descuento es un valor relativo, puede ser apreciado en pesos o en porcentaje. Depende del tipo de descuento escogido.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <input type="number" id="discount-edit" class="form-control" placeholder="Ingrese descuento" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- EXPIRATION_DATE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha expiración: <span class="text-red">(*)</span></label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="expiration_date-edit" placeholder="Seleccione fecha" required>
                                </div>
                            </div>
                        </div>
                        
                         <!-- LIMIT_USAGE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Límite de usos: <span class="text-red">(*)</span></label>
                                <input type="number" id="limit_usage-edit" class="form-control" placeholder="Ingrese límite" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- MIN_VALUE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Monto mínimo: <span class="text-red">(*)</span>
                                    <span data-toogle="tooltip" title="Si quiere que el cupón de descuento se aplique a partir de un monto mínimo ingrese esa cantidad.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <input type="number" id="min_value-edit" class="form-control" value="0" placeholder="Ingrese monto mínimo">
                            </div>
                        </div>

                        
                         <!-- MIN_ITEM -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Items mínimo: <span class="text-red">(*)</span>
                                    <span data-toogle="tooltip" title="Ingrese si desea que el cupon deba aplicarse a partir de cierta cantidad mínima de productos.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <input type="number" id="min_item-edit" class="form-control" value="0" placeholder="Ingrese ctd mínima de productos">
                            </div>
                        </div>

                    </div><!-- ./row -->



                </div><!-- ./modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



