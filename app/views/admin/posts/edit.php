
<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar publicación</h4>
            </div>
            <form id="form-edit">
                <div class="modal-body">
                    <input type="hidden" id="id-edit">
                    
                    <div class="row">

                        <!-- TITLE -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Título: <span class="text-red">(*)</span></label>
                                <input type="text" id="title-edit" class="form-control" placeholder="Ingrese tiulo de la publicación" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">
                    
                        <!-- SLUG -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>URL: <span class="text-red">(*)</span>
                                    <span data-toogle="tooltip" title="La URL debe contener palabras clave relacionada a la publicación y no debe repetirse. Tampoco debe incluir la letra 'Ñ' ni espacios, recuerde separar con guiones '-' como indica el ejemplo.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-link"></i></span>
                                    <input type="text" id="slug-edit" class="form-control" placeholder="Ejemplo: liquidacion-imperdible-smart-tv-32-pulgadas" required>
                                </div>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- SLUG -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Producto:
                                    <span data-toogle="tooltip" title="Si su publicación esta relacionada con algun producto y desea que sus clientes tengan un boton para ser redirigidos a él, seleccione un producto de la lista. De lo contrario déjelo en blanco.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <select id="product_id-edit" class="form-control select2" style="width: 100%;" required>
                                    <option value="0" disabled selected>Seleccione producto</option>
                                    <?php foreach($products as $product) : ?>
                                    <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- DESCRIPTION -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción: <span class="text-red">(*)</span></label>
                                <textarea id="description-edit" class="form-control" style="height: 300px">
                            
                                </textarea>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Imagen actual:</label>
                            <div id="post-image">
                                            
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="">Actualizar imagen:</label>
                            <input type="file" id="file-edit" name="file-edit" class="dropify-es" />
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