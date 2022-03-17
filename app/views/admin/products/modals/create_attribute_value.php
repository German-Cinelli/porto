<!-- Modal -->
<div class="modal fade" id="modal-create-attribute_value">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Añadir valor</h4>
            </div>
            <form id="form-create-attribute_value">
                <div class="modal-body">


                    <div class="row">

                        <!-- ATTRIBUTE -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Atributo: <span class="text-red">(*)</span></label>
                                <select id="input-attribute_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <?php foreach($attributes as $attribute) : ?>
                                        <option value="<?= $attribute->id ?>"><?= $attribute->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- NAME -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Valor: <span class="text-red">(*)</span></label>
                                <input type="text" id="input-value" class="form-control" placeholder="Ingrese valor" required>
                            </div>
                        </div>

                    </div><!-- ./row -->
                    
                </div><!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   