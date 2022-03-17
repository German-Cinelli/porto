<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar producto</h4>
            </div>
            <form id="form-edit" method="POST" enctype="multipart/form-data">
                <div class="modal-body modal-body-edit">
                    
                    <input type="hidden" id="id-edit">

                    <!-- NAME -->
                    <div class="form-group">
                        <label>Nombre: <span class="text-red">(*)</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="text" id="name-edit" class="form-control" placeholder="Ingrese nombre" required>
                        </div>
                    </div>


                    <!-- DESCRIPTION -->
                    <div class="form-group">
                        <label>Descripción: <span class="text-red">(*)</span></label>
                        <textarea id="compose-textarea" class="form-control asd" style="height: 300px">
                            
                        </textarea>
                    </div>


                    <div class="row">

                        <!-- CATEGORY -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Categoría: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select id="category_id-edit" class="form-control select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Seleccione categoría</option>
                                        <?php foreach($categories as $category) : ?>
                                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div><!-- ./input-group -->
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tipo de producto: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <select id="product_type_id-edit" class="form-control select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Seleccione tipo</option>
                                        <?php foreach($product_types as $product_type) : ?>
                                            <option value="<?= $product_type->id ?>"><?= $product_type->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div><!-- ./input-group -->
                            </div>
                        </div>

                        <!-- BRAND -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Marca:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-registered"></i></span>
                                    <input type="text" id="brand-edit" class="form-control" placeholder="Ingrese nombre de marca">
                                </div><!-- ./input-group -->
                            </div><!-- ./form-group -->
                        </div>
                    </div><!-- .row -->


                    <div class="row">

                        <!-- PRICE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" id="price-edit" min="1" class="form-control" placeholder="Ingrese precio" required>
                                </div>
                            </div>
                        </div>

                        <!-- OFFER -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Oferta (%): 
                                    <span class="badge bg-teal" data-toogle="tooltip" title="Digite 0 (Cero) en caso no querer aplicarle un % de descuento a los clientes.">
                                        <i class="fa fa-info"></i>
                                    </span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                    <input type="number" id="offer-edit" min="0" max="80" value="0" class="form-control" placeholder="%" required>
                                </div>
                            </div>
                        </div>
                    
                    </div><!-- .row -->


                    <div class="row">
                    
                         <!-- STOCK -->
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Stock: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-area-chart"></i></span>
                                    <input type="number" id="stock-edit" value="0" min="0" class="form-control" placeholder="Ingrese stock" required>
                                </div>
                            </div>
                        </div>

                        <!-- ALERT-STOCK -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alerta de stock:
                                    <span data-toogle="tooltip" title="Consiste en que el sistema le notificará cuando un producto se está quedando sin stock. Es decir, si ud. define una alerta de stock de 15 para determinado producto, cuando quede dicha cantidad el sistema se lo hará saber. Por defecto es 5.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                                    <input type="number" id="stock_alert-edit" min="0" class="form-control" placeholder="Por defecto es 5">
                                </div>
                            </div>
                        </div>

                        <!-- DELIVERY-DELAY -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Demora de entrega:
                                    <span data-toogle="tooltip" title="Si el producto es a contra-pedido: ingrese la cantidad de días hábiles de demora que tendrá la entrega.">
                                        <i class="fa fa-question-circle text-blue"></i>
                                    </span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                    <input type="number" id="delivery_delay-edit" min="0" value="0" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    
                    <!-- URL -->
                    <div class="form-group">
                        <label>URL: 
                            <span class="badge bg-teal" data-toogle="tooltip" title="Recuerde no ingresar 'Ñ' en la URL personalizada.">
                                <i class="fa fa-info"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-link"></i></span>
                            <input type="text" id="slug-edit" class="form-control" placeholder="Ejemplo: zapatos-de-cuero-para-dama" required>
                        </div>
                    </div>
     
                    <div class="row">

                        <!-- IMAGE -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="clearfix"></div>
                                <label for="exampleInputFile">Imagen principal: <span class="text-red">(*)</span></label>

                                <div id="product-image">
                                            
                                </div>

                                <br>

                                <!--<button type="button"  data-toggle="modal" data-target="#media-modal" class="btn btn btn-default">
                                    Seleccionar imagen principal
                                </button>-->

                                <input type="file" id="file-edit" name="file-edit" value="asd" class="dropify-es" />
                                                    
                            </div><!-- end .form-group -->

                            <div class="product-image">
                                <!-- product images and hidden fields -->
                                <!-- dynamically added after  -->
                            </div>
                        </div><!-- ./col-sm-6 -->
                        
                        <!-- GALLERY -->
                        <div class="col-md-6">
                            <div class="form-group">   
                                <div class="clearfix"></div>
                                <label for="exampleInputFile">Galería:</label>

                                <button id="select-images" type="button" data-toggle="modal" data-target="#media-modal" class="btn btn btn-default">
                                    Seleccionar imágenes
                                </button>
                                                    
                            </div><!-- end .form-group -->

                            <div class="product-images">
                                <!-- product images and hidden fields -->
                                <!-- dynamically added after  -->
                            </div>

                        </div><!-- ./col-md-6 -->
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

<?php include('app/views/admin/images/modal-check.php'); ?>



