<!-- Modal -->
<div class="modal fade" id="modal-assign-value">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Asignar valor a un producto maestro</h4>
            </div>
            <form id="form-assign-value">
                <div class="modal-body">


                    <div class="row">

                        <input id="form-assign-value-product_type_id" type="hidden" value="" required>

                        <!-- ATTRIBUTE_VALUES -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Valor: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <select id="attribute_value_id-assign" class="form-control select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Seleccione atributo</option>
                                        <?php foreach($attribute_values as $attribute_value) : ?>
                                            <option value="<?= $attribute_value->id ?>"><?= $attribute_value->tag ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="input-group-addon">

                                        <!-- BTN-REFRESH ATTRIBUTE_VALUE -->
                                        <a href="#" id="attribute_value_refresh-2" class="btn btn-xs bg-orange remove" data-toggle="tooltip" title="Refrescar">
                                            <i class="fa fa-refresh"></i>
                                        </a>

                                    </span>
                                </div><!-- ./input-group -->
                            </div>
                        </div>

                    </div><!-- ./row -->
                    
                </div><!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Asignar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   