<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-bolt text-olive"></i> Banners
        <small></small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/offer"><i class="fa fa-bolt"></i> Destacados</a></li>
        <li class="active">Ver</li>
    </ol>
</section>



<!-- Main content -->
<section class="content container-fluid">

    <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-info">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                            Banners
                        </a>
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="box-body">
                            Usted podrá destacar <strong><?= \app\helpers\Utils::getQuantity_of_banners() ?></strong> productos en la página inicial. Será lo que primero vean los visitantes al ingresar al sitio en forma de carrousel.
                            <br><br>
                            Cada banner contendrá:
                            <ul>
                                <li>La imagen principal del producto</li>
                                <li>Un título en rojo</li>
                                <li>Una breve descripción</li>
                            </ul>
                            
                            Podrá <a href="#add-featured-product">añadir banners</a> en cualquier momento.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-info">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                            Productos destacados
                        </a>
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="box-body">
                            De todos los productos que tiene en venta a disposición de sus clientes, podrá destacar todos aquellos que usted desee.
                            Éstos productos se verán en la primer sección de la página de inicio y a los laterales en distintas secciones del sitio.
                            <br><br>
                            Para <a href="<?= URL_PATH ?>/admin/product">añadir productos destacados</a>, diríjase
                            al producto sobre el cual desea destacar y pulse sobre el ícono <i class="fa fa-star-o text-yellow"></i>.
                            <br><br>
                            Para remover esta característica solo basta pulsar sobre el ícono <i class="fa fa-star text-yellow"></i>.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- ./row -->

    
    <!-- PRODUCTOS DESTACADOS -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Banners</h3>
        </div><!-- /.box-header -->

        <div class="box-body">

            <!-- FIRST PRODUCT -->

            <?php foreach($featured_products as $product) : ?>

            <div class="col-sm-6">
                    
                <div class="row margin-bottom">
                    
                    <div class="col-sm-6">
                        <img class="img-responsive" src="<?= URL_PATH ?><?= $product->product->image ?>" alt="Photo">
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <?php if(count($product->product->images) > 0) : ?>

                                        <?php foreach($product->product->images as $image) : ?>
                                            <img class="img-responsive" src="<?= URL_PATH ?><?= $image->path ?>" alt="Photo">
                                        <?php endforeach ?>

                                        <?php endif ?>

                                    </div>
                            
                                </div>
                            </div>
                        </div><!-- /.row --> <br>
                    </div><!-- /.col -->

                    

                    <ul>
                        <li>Producto: 
                            <span class=""><?= $product->product->name ?></span>
                        </li>
                        <li>Titulo: 
                            <span class="text-red"><?= $product->title ?></span>
                        </li>
                        <li>
                            Descripción:
                            <span class=""><?= $product->description ?></span>
                        </li>
                    </ul>

                    <a href="<?= URL_PATH ?>/admin/offer/delete/<?= $product->id ?>" class="btn btn-danger">Remover</a>
                    
                </div><!-- /.row -->
                
                  
            </div><!-- col-sm-6 -->

            <?php endforeach ?>

        </div><!-- ./box-body -->

    </div><!-- ./box-primary -->


    <!-- CREAR PRODUCTO DESTACADO -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 id="add-featured-product" class="box-title">Añadir nuevo banner</h3>
        </div><!-- /.box-header -->

        <div class="box-body">

            <form action="#" id="form-create">
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">
                                    Producto
                                    <span class="text-red">(*)</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                    <select id="product_id" class="form-control select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Seleccione un producto</option>
                                        <?php foreach($products as $product) : ?>
                                            <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div><!-- ./input-group -->
                            </div>
                        </div>

                    </div><!-- ./row -->
            
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Título: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="title" class="form-control" placeholder="Ingrese título" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripción breve: <span class="text-red">(*)</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                                    <input type="text" id="description" class="form-control" placeholder="Ingrese descripción" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php if(count($featured_products) == \app\helpers\Utils::getQuantity_of_banners()) : ?>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="">
                                        <i class="fa fa-warning text-orange"></i> 
                                        Debe seleccionar un producto destacado para remover 
                                        <span class="text-red">(*)</span>
                                        <span data-toogle="tooltip" title="Si ve ésto es porque ud. ya tiene 2 productos destacados para mostrar. Si desea añadir uno nuevo debe seleccionar uno para remover.">
                                            <i class="fa fa-question-circle text-blue"></i>
                                        </span> 
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-remove"></i></span>
                                        <select id="remove-product_id" class="form-control select2" style="width: 100%;" required>
                                            <option value="" disabled selected>Seleccione un producto</option>
                                            <?php foreach($featured_products as $product) : ?>
                                                <option value="<?= $product->product->id ?>"><?= $product->product->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div><!-- ./input-group -->
                                </div>
                            </div>

                        </div><!-- ./row -->
                        
                    <?php endif ?>

                
                </div><!-- ./modal-body -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Añadir
                    </button>
                </div>

            </form>

        </div><!-- ./box-body -->

    </div><!-- ./box-primary -->

</section>


<!-- FEATURED_PRODUCT-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        remove_product_id = 0;
        if($('#remove-product_id').val()){
            remove_product_id = $('#remove-product_id').val();
        }

        const postData = {
            product_id: $('#product_id').val(),
            title: $('#title').val(),
            description: $('#description').val(),
            remove_product_id: remove_product_id,
        };

        //console.log(postData);

        $.post(URL_PATH + '/admin/offer/create', postData, function(r) {
            //console.log(r);

            if(r == 'error'){

                Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'Ha ocurrido un error, por favor recárgue la página e inténtelo nuevamente.',
                });

            } else {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Correcto!',
                    text: 'Los productos destacados se han actualizado',
                    showConfirmButton: false,
                    footer: `Haga <a href="${URL_PATH}" target="_blank"> clic aquí </a> para ver el resultado.`,
                    timer: 6000
                })  

                setTimeout(function(){ 
                    window.location.reload(false); 
                }, 5850);
                
            }

        });
                    

        e.preventDefault();
    });
</script>