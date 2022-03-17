<!-- modal-create-product_type -->
<?php include('app/views/admin/products/modals/create_product_type.php') ?>

<!-- modal-assign_value -->
<?php include('app/views/admin/products/modals/assign_value.php') ?>

<!-- modal-create-attribute_value -->
<?php include('app/views/admin/products/modals/create_attribute_value.php') ?>

<!-- Estilos para seleccionar imágenes -->
<style>
    #librayr a{
        float:left;
        position:relative;
        border: 1px solid #e7e7e7;
    }

    .product-img{
        float:left;
        position:relative;
        border: 1px solid #e9e9e9;
        margin-right: 10px;
    }

    .product-img .btn{
        position: absolute;
        right: 0;
        bottom: 0;
    }

    #librayr img{
        width: 100px;
    }

    #librayr input{
        position:absolute;
        right: 0;
        bottom: 0;
    }

    #librayr a:hover{
        border: 1px solid red;
    }

    .product-images img{
        width: 100px;
    }

    .product-images-edit img{
        width: 100px;
    }

</style>

<style>

    .checkbox label:after {
    content: '';
    display: table;
    clear: both;
    }

    .checkbox .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
    }

    .checkbox .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 15%;
    }

    .checkbox label input[type="checkbox"] {
    display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon {
    opacity: 0;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
    opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled+.cr {
    opacity: .5;
    }

</style>


<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-tags text-olive"></i> Productos
        <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-tags"></i> Productos</a></li>
        <li class="active">Añadir nuevo</li>
    </ol>
</section>



 <!-- Main content -->
<section class="content container-fluid">

    <?php $can_insert_product = \app\helpers\Utils::CanInsertProduct() ?>

    <?php if($can_insert_product) : ?>

    <div class="callout callout-danger">
        <h4>
            <i class="fa fa-warning"></i>
            Atención
        </h4>

        <p>Ha superado el limite para ingresar nuevos productos. Para continuar ingresando por favor comuníquese con nosotros.</p>
    </div>

    <?php endif ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Añadir nuevo producto</h3>
        </div><!-- /.box-header -->

        <form action="<?= URL_PATH ?>/admin/product/store" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
        

                <!-- NAME -->
                <div class="form-group">
                    <label>Nombre: <span class="text-red">(*)</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese nombre" required>
                    </div>
                </div>


                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label>Descripción: <span class="text-red">(*)</span></label>
                    <div class="form-group">
                        <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">
                            *Borre ésto e ingrese la descripción del producto*
                        </textarea>
                    </div>
                </div>


                <div class="row">

                    <!-- CATEGORY -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Categoría: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                <select name="category_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Seleccione categoría</option>
                                    <?php foreach($categories as $category) : ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div><!-- ./input-group -->
                        </div>
                    </div>

                     <!-- PRODUCT-TYPE -->
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tipo de producto: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <select id="product_type_id" name="product_type_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Seleccione tipo</option>
                                    <?php foreach($product_types as $product_type) : ?>
                                        <option value="<?= $product_type->id ?>"><?= $product_type->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="input-group-addon">
                                    <a href="#" id="product_type_refresh" class="btn btn-xs bg-orange remove" data-toggle="tooltip" title="Refrescar">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-primary remove" data-toggle="modal" data-target="#modal-create-product_type">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </span>
                            </div><!-- ./input-group -->
                        </div>
                    </div>

                    <!-- PRODUCT-TYPE -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Valor: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <select id="attribute_value_id" name="attribute_value_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Seleccione valor</option>
                                </select>
                                <span class="input-group-addon">

                                    <!-- BTN-REMOVE -->
                                    <a href="#" id="attribute_value_remove" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remover valor relacionado al tipo de producto">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- BTN-VINCULAR VALOR A UN PRODUCT_TYPE -->
                                    <a href="#" id="btn-assign_value" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-create-product_type_attribute_value">
                                        <i class="fa fa-random"></i>
                                    </a>

                                    <!-- BTN-REFRESH ATTRIBUTE_VALUE -->
                                    <a href="#" id="attribute_value_refresh" class="btn btn-xs bg-orange remove" data-toggle="tooltip" title="Refrescar">
                                        <i class="fa fa-refresh"></i>
                                    </a>

                                    <!-- BTN-ADD -->
                                    <a href="#" id="btn-add_attribute_value" class="btn btn-xs btn-primary remove" data-toggle="modal" data-target="#modal-create-attribute_value">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </span>
                            </div><!-- ./input-group -->
                        </div>
                    </div>

                     

                </div><!-- ./row -->


                <div class="row">

                    <!-- PRICE -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Precio: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" name="price" min="1" class="form-control" placeholder="Ingrese precio" required>
                            </div>
                        </div>
                    </div>

                    <!-- OFFER -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Oferta (%): <span class="text-red">(*)</span>
                                <span data-toogle="tooltip" title="Digite 0 (Cero) en caso no querer aplicarle un % de descuento a los clientes.">
                                    <i class="fa fa-question-circle text-blue"></i>
                                </span> 
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span>
                                <input type="number" name="offer" value="0" min="0" max="80" class="form-control" placeholder="%" required>
                            </div>
                        </div>
                    </div>

                    <!-- MARCA -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Marca:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-registered"></i></span>
                                <input type="text" name="brand" class="form-control" placeholder="Ingrese nombre de marca">
                            </div>
                        </div>
                    </div>

                </div><!-- ./row -->

                <div class="row">
                
                    <!-- STOCK -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Stock: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-area-chart"></i></span>
                                <input type="number" name="stock" value="0" min="0" class="form-control" placeholder="Ingrese stock" required>
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
                                <input type="number" name="stock_alert" min="0" value="5" class="form-control" placeholder="Por defecto es 5">
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
                                <input type="number" name="delivery_delay" min="0" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                
                </div>


                <!-- URL -->
                <div class="form-group">
                    <label>URL: <span class="text-red">(*)</span>
                        <span data-toogle="tooltip" title="La URL debe estar relacionada con el nombre del producto y no debe repetirse. No debe incluir la letra 'Ñ' ni espacios, recuerde separar con guiones '-' como indica el ejemplo.">
                            <i class="fa fa-question-circle text-blue"></i>
                        </span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-link"></i></span>
                        <input type="text" name="slug" class="form-control" placeholder="Ejemplo: mouse-gamer-logitech-g403" required>
                    </div>
                </div>

                <br>
            

                <!-- IMAGES -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="clearfix"></div>
                            <label for="exampleInputFile">Imagen principal: <span class="text-red">(*)</span></label>
                            <input type="file" name="file" value="asd" class="dropify-es" />        
                        </div><!-- end .form-group -->

                        <div class="product-image">
                            <!-- product images and hidden fields -->
                            <!-- dynamically added after  -->
                        </div>
                    </div><!-- ./col-sm-6 -->
                
                    <div class="col-sm-6">
                        <div class="form-group">  
                            <div class="clearfix"></div>
                            <label for="exampleInputFile">Galería:</label>

                            <button type="button" data-toggle="modal" data-target="#media-modal" class="btn btn btn-default">
                                Seleccionar imágenes
                            </button>
                                                
                        </div><!-- end .form-group -->

                        <div class="product-images col-md-12">
                            <!-- product images and hidden fields -->
                            <!-- dynamically added after  -->
                        </div>
                    </div><!-- ./col-sm-6 -->

                </div><!-- ./row -->


            </div><!-- ./box -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

        </div><!-- ./modal-body -->

    </form>

    <?php include('app/views/admin/images/modal-check.php'); ?>

</section>


<!-- Cargar imagenes para añadir a la galería -->
<script src="<?= URL_PATH ?>/assets/app/image/list.js"></script>

<!-- Subir imagenes -->
<script src="<?= URL_PATH ?>/assets/app/image/add.js"></script>

<!-- Listar imagenes -->
<script>
    $(document).ready(function(){

        fetchImages();
        //fetchImagesForRadio();
    });
</script>

<!-- Escoger imagenes previamente cargadas -->
<script src="<?= URL_PATH ?>/assets/app/image/choose-images.js"></script>



<script>
    function getValues(product_type_id){
        $.post(URL_PATH + '/admin/masterproduct/getValues', {product_type_id}, function(r){
            response = JSON.parse(r);
            //console.log(response);
            if(r == 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Ocurrió algo inesperado al tratar de recuperar la información.',
                });
            } else {

                $("#attribute_value_id").empty();
                for (let i = 0; i < response.length; i++) {

                    $("#attribute_value_id").append(new Option(response[i].attribute_value.tag, response[i].attribute_value_id));
                    
                }
                
            }
            
        })
    }
</script>



<!-- PRODUCT-TYPE-REFRESH -->
<script>
    $('#product_type_refresh').on('click', function(e){

        $.post(URL_PATH + '/admin/productmaster/getProduct_types', function(r){
            response = JSON.parse(r);
            console.log(response);
            
            if(r == 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Ocurrió algo inesperado al tratar de recuperar la información.',
                });
            } else {

                $("#product_type_id").empty();
                for (let i = 0; i < response.length; i++) {

                    $("#product_type_id").append(new Option(response[i].name, response[i].id));
                    
                }
                
            }
            
        })

        e.preventDefault();
    });
</script>


<!-- PRODUCT-TYPE ON CHANGE EVENT -->
<script>
    $('#product_type_id').on('change', function(e){

        var product_type_id = $('select[name=product_type_id] option').filter(':selected').val();

        getValues(product_type_id);

        e.preventDefault();
    });
</script>


<!-- PRODUCT_TYPE-CREATE -->
<script>
    // btn-submit-add
    $('#form-create-product_type').submit(function(e){

        const postData = {
            name: $('#name').val()
        };
        console.log(postData);

        $.post(URL_PATH + '/admin/masterproduct/create_product_type', postData, function(r){
            console.log(r);
            
            if(r == 'error'){

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Si el problema persiste recargue la página para intentarlo nuevamente.',
                });

            } else {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Creado con éxito!',
                    showConfirmButton: false,
                    timer: 2100
                });

                $.post(URL_PATH + '/admin/productmaster/getProduct_types', function(r){
                    response = JSON.parse(r);
                    console.log(response);
                    
                    if(r == 'error'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Ocurrió algo inesperado al tratar de recuperar la información.',
                        });
                    } else {

                        $("#attribute_value_id").empty();
                        $("#product_type_id").empty();
                        for (let i = 0; i < response.length; i++) {

                            $("#product_type_id").append(new Option(response[i].name, response[i].id));
                            
                        }
                        
                    }
                    
                })

                $('#form-create-product_type').trigger('reset');
                $('#modal-create-product_type').modal('hide');
                
            }
            
        })

        e.preventDefault();
    });
</script>


<!-- Remover attribute_value con respecto a un product_type-->
<script>
    $('#attribute_value_remove').on('click', function(e){
        
        var product_type_id = $('#product_type_id').val();
        var product_type_name = $( "#product_type_id option:selected" ).text();

        var attribute_value_id = $('#attribute_value_id').val();
        var attribute_value_name = $( "#attribute_value_id option:selected" ).text();

        const postData = {
            product_type_id: product_type_id,
            attribute_value_id: attribute_value_id
        };

        console.log(postData);
        
        if(product_type_id != null && attribute_value_id != null){

            Swal.fire({
                title: "Atención!",
                text: `¿Desea eliminar el valor ${attribute_value_name} para el tipo de producto ${product_type_name}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '##757575',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.value) {

                    $.post(URL_PATH + '/admin/masterproduct/delete_prodct_type_attribute_value', postData, function(r){
                        if(r == 'deleted'){
                            /* Alert-success */
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Registro eliminado!',
                                showConfirmButton: false,
                                timer: 1900
                            })  

                            $("#attribute_value_id option[value='" + attribute_value_id + "']").remove();

                        } else {
                            /* Alert-failed */
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error!',
                                text: 'Por favor recargue la página e intentelo nuevamente.'
                            })
                        }

                        $('#products').DataTable().ajax.reload(); 
                    });

                }

            });

        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Atención!',
                text: 'Debe seleccionar al menos un tipo de producto junto con el valor.'
            })
        }

        e.preventDefault();
    });
</script>



<!-- Modal para asignar un atributo a un product_type -->
<script>
    $('#btn-assign_value').on('click', function(e){

        var product_type_id = $('#product_type_id').val();
        var product_type_name = $( "#product_type_id option:selected" ).text();

        if(product_type_id != null){
            $('#modal-assign-value').modal('show');
            $('#form-assign-value-product_type_id').val(product_type_id);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Atención!',
                text: 'Para la asignación de un atributo debe escoger un producto maestro de la lista.'
            })
        }
        
        e.preventDefault();
    });
</script>


<!-- MODAL-ASSIGN-VALUE SUBMIT -->
<script>
    // btn-submit-add
    $('#form-assign-value').submit(function(e){

        const postData = {
            product_type_id: $('#form-assign-value-product_type_id').val(),
            attribute_value_id: $('#attribute_value_id-assign').val()

        };

        console.log(postData);

        $.post(URL_PATH + '/admin/masterproduct/create_product_type_attribute_value', postData, function(r){
            console.log(r);
            
            switch (r) {
                case 'exists':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'Ya existe un registro con el valor seleccionado',
                    });
                    break;

                case 'error':
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Recargue la página e inténtelo nuevamente.',
                    });
                    break;

                case 'saved':
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Creado con éxito!',
                        showConfirmButton: false,
                        timer: 1900
                    });

                    break;

                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Recargue la página e inténtelo nuevamente.',
                    });
                    break;
            }
            
        })

        //getValues(product_type_id);
        $('#form-assign-value-product_type_id').trigger('reset');
        $('#modal-assign-value').modal('hide');

        e.preventDefault();
    });
</script>


<script>
    $('#attribute_value_refresh').on('click', function(e){

        var product_type_id = $('select[name=product_type_id] option').filter(':selected').val();

        getValues(product_type_id);

        e.preventDefault();
    });
</script>

<script>
    $('#attribute_value_refresh-2').on('click', function(e){

        $.post(URL_PATH + '/admin/masterproduct/getValues_all', function(r){
            response = JSON.parse(r);
            console.log(response);
            if(r == 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Ocurrió algo inesperado al tratar de recuperar la información.',
                });
            } else {

                $("#attribute_value_id-assign").empty();
                for (let i = 0; i < response.length; i++) {

                    $("#attribute_value_id-assign").append(new Option(response[i].tag, response[i].id));
                    
                }
                
            }
            
        })

        e.preventDefault();
    });
</script>


<!-- CREATE-ATTRIBUTE_VALUE -->
<script>
    // btn-submit-add
    $('#form-create-attribute_value').submit(function(e){

        const postData = {
            attribute_id: $('#input-attribute_id').val(),
            name: $('#input-value').val()
        };
        console.log(postData);

        $.post(URL_PATH + '/admin/masterproduct/create_attribute_value', postData, function(r){
            console.log(r);
            
            switch (r) {
                case 'exists':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'Ya existe un registro con el valor seleccionado',
                    });
                    break;

                case 'error':
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Recargue la página e inténtelo nuevamente.',
                    });
                    break;

                case 'saved':
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Creado con éxito!',
                        showConfirmButton: false,
                        timer: 1900
                    });

                    $('#form-create-attribute_value').trigger('reset');
                    $('#modal-create-attribute_value').modal('hide');

                    break;

                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Recargue la página e inténtelo nuevamente.',
                    });
                    break;
            }
            
        })

        e.preventDefault();
    });
</script>