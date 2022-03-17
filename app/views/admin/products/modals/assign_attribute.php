<!-- Modal -->
<div class="modal fade" id="modal-assign-attribute">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Asignar atributo</h4>
            </div>
            <form id="form-assign-attribute">
                <div class="modal-body">

                    <input type="hidden" id="product_id" value="<?= $product->id ?>">

                    <!-- NAME -->
                    <div class="form-group">
                        <label for="">Atributo: <span class="text-red">(*)</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <select id="attribute_value_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" disabled selected>Seleccione atributo</option>
                                <?php foreach($product->product_type->attribute_values as $attribute_value) : ?>
                                    <option value="<?= $attribute_value->id ?>"><?= $attribute_value->name ?><?= $attribute_value->attribute->description ?></option>
                                <?php endforeach ?>
                            </select>
                        </div><!-- ./input-group -->
                    </div>

                </div><!-- ./modal.body -->

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->