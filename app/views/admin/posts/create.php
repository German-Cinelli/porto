<!-- Modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title">Añadir publicación</h4>
            </div>
            <form id="form-create">
                <div class="modal-body">


                    <div class="row">

                        <!-- TITLE -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Título: <span class="text-red">(*)</span></label>
                                <input type="text" id="title" class="form-control" placeholder="Ingrese título de la publicación" required>
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
                                    <input type="text" id="slug" class="form-control" placeholder="Ejemplo: liquidacion-imperdible-smart-tv-32-pulgadas" required>
                                </div>
                            </div>
                        </div>

                    </div><!-- .row -->


                    <div class="row">

                        <!-- SLUG -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Producto:
                                    <span data-toogle="tooltip" title="Si su publicación esta relacionada con algun producto y desea que sus clientes tengan un boton para ser redirigidos a él, seleccione un producto de la lista. De lo contrario déjelo en blanco.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <select id="product_id" class="form-control select2" style="width: 100%;" required>
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
                                <textarea id="description" class="form-control" style="height: 300px">
                            
                                </textarea>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Contenido embebido:
                                    <span data-toogle="tooltip" title="Inserte código embebido si quiere hacer referencia a un recurso de una fuente externa, por ejemplo un video de Youtube.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <textarea class="form-control" id="embedded_content" rows="5"></textarea>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                    
                        <div class="col-md-12">
                        <label for="">Imagen ilustrativa:</label>
                        <input type="file" id="file" name="file" class="dropify-es" />
                        </div>
                    
                    </div><!-- ./row -->

                    
                </div><!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   