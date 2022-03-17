<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-star text-olive"></i> Producto
        <small>Ver información</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-star"></i> Productos</a></li>
        <li class="active">Ver</li>
    </ol>
</section>

<style>
    .carousel-inner > .item > img {
        margin: 0 auto;
    }
</style>

<!-- assign-attribute-->
<?php include('app/views/admin/products//modals/assign_attribute.php') ?>

<!-- change-attribute-->
<?php include('app/views/admin/products//modals/change_attribute.php') ?>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <?php if($product->is_deleted == NULL) : ?>
                    <span data-toggle="tooltip" title="El producto se mostrará en el catálogo de productos."><i class="fa fa-circle text-green"></i> Activo</span>
                    <?php else : ?>
                    <span data-toggle="tooltip" title="El producto no se está mostrarando en el catálogo de productos."><i class="fa fa-circle text-red"></i> Inactivo</span>
                    <?php endif ?>

                    <?php if($sold != NULL) : ?>
                        <span class="pull-right" data-toggle="tooltip" title="Se ha vendido <?= $sold ?> veces."><i class="fa fa-shopping-cart"></i> <?= $sold ?></span>
                    <?php else : ?>
                        <span class="pull-right" data-toggle="tooltip" title="Aún no se ha vendido éste producto."><i class="fa fa-shopping-cart"></i> 0</span>
                    <?php endif ?>
                    <a href="<?= URL_PATH ?><?= $product->image ?>" class="img-modal"><img class="img-responsive" src="<?= URL_PATH ?><?= $product->image ?>" alt="Product"></a>
                        
                    <h3 class="profile-username text-center"><?= $product->name ?></h3>
                    <div class="text-right">
                        
                    </div>
                    
                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-cubes"></i> Categoría:</strong>
                        <span class="text-muted">
                                                        
                            <?php if(isset($product->category->name)) : ?>
                                <?= $product->category->parent->name ?> / <?= $product->category->name ?>
                            <?php else : ?>
                                <?= 'Sin categoría' ?>
                            <?php endif ?> 
                                                        
                        </span>
                        
                        <br><br>
                        <strong><i class="fa fa-tag"></i> Tipo de producto:</strong>
                        <span class="text-muted">
                                                        
                            <?= $product->product_type->name ?>
                            
                            <?php if($product->attribute_values->first()) : ?>
                                <strong>
                                <?= $product->attribute_values->first()->name ?>
                                <?= $product->attribute_values->first()->attribute->description ?>
                                </strong>
                                - <a href="#" data-toggle="modal" data-target="#modal-change-attribute">Cambiar atributo</a>
                            <?php else : ?>
                                - <a class="text-red" href="#" data-toggle="modal" data-target="#modal-assign-attribute">Asignar atributo</a>
                            <?php endif ?>
                                                        
                        </span>

                        <br><br>
                        <strong><i class="fa fa-registered"></i> Marca:</strong>
                        <?php if($product->brand == NULL) : ?>
                            <span class="text-muted">Sin especificar</span>
                        <?php else : ?>
                        <span class="text-muted"><?= $product->brand ?></span>
                        <?php endif ?>

                        <hr>

                        <strong><i class="fa fa-dollar margin-r-5"></i> Precio:</strong>
                        <span class="text-muted">
                            <?= $app['SYMBOL'] ?>
                            <?= \app\helpers\Utils::moneyFormat($product->price) ?>
                        </span>
                        <br><br>
                        <strong><i class="fa fa-bar-chart margin-r-5"></i> Oferta:</strong>
                        <?php if($product->offer == 0) : ?>
                            <span class="text-muted">Sin oferta</span>
                        <?php else :?>
                            <span class="text-muted label bg-red"><?= $product->offer ?>%</span>
                        <?php endif ?>
                        <br><br>
                        <strong><i class="fa fa-dollar margin-r-5"></i> Precio de venta:</strong>
                        <span class="text-muted text-green">
                            <?= $app['SYMBOL'] ?>
                            <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                        </span>

                        <br><br>
                    
                        <strong><i class="fa fa-clock-o margin-r-5"></i> Registrado el...</strong>
                        <p class="text-muted"><?= $product->created_at ?></p>
                     
                        <strong><i class="fa fa-clock-o margin-r-5"></i> Última modificación...</strong>
                        <p class="text-muted"><?= $product->updated_at ?></p>
                        
                    </div>
                    <!-- /.box-body -->

                    <!-- BUTTON-BUY -->
                    <?php if($product->deleted_at == NULL) : ?>
                        <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>" target="_blank" class="btn btn-linkedin btn-block"><b>Ver en el catálogo</b></a>
                    <?php else : ?>
                        <button target="_blank" class="btn btn-danger btn-block disabled"><b>Ver en el catálogo</b></button>
                    <?php endif ?>
                    

                </div><!-- /.box-body -->

            </div><!-- /.box-primary -->

        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-info-circle"></i> Info</a></li>
                    <!--<li><a href="#settings" data-toggle="tab">Imágenes</a></li>-->
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                    </div><!-- ./active -->
                    
                    <div class="box-body box-profile">
                        <h2 class="text">Descripción del producto</h2>
                                    
                        <h4 class="text-muted"><?= $product->description ?></h4>

                    </div><!-- /.box-body -->
                    
                    <div id="gallery">
                        <div class="box-body box-profile">
                            <h2 class="text">Galería de imágenes</h2>

                            <?php if($product->images->isEmpty()) : ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> Atención!</h4>
                                    El producto no tiene galería de imágenes. Para añadirle dirígase al listado 
                                    de productos y edite sobre el ícono <i class="fa fa-edit"></i>.
                                </div>
                            <?php else : ?>
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php foreach($product->images as $index => $image) : ?>
                                            <li data-target="#carousel-example-generic" data-slide-to="<?= $index ?>" 
                                                <?php if($index == 0) : ?>
                                                class="active"
                                                <?php endif ?>
                                                >
                                            </li>
                                        <?php endforeach ?>
                                    </ol>
                                    <div class="carousel-inner bg-black">

                                    
                                            
                                    <?php foreach($product->images as $index => $image) : ?>
                                        <div class="item <?php if($index == 0){ echo 'active'; } ?>">
                                            <img width="250px" src="<?= URL_PATH ?><?= $image->path ?>" alt="First slide">

                                            <div class="carousel-caption text-black">
                                                        
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                        
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <span class="fa fa-angle-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <span class="fa fa-angle-right"></span>
                                    </a>
                                </div>
                            <?php endif ?>
                                    
                            

                        </div><!-- /.box-body -->
                    </div><!-- /.gallery -->

                </div><!-- /.tab-content -->
            </div><!-- /.nav -->

            <div class="tab-pane" id="settings">
                
            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->

</section>

<script>
    /* Show image in modal */
    $('.img-modal').on('click', function(e){
        var href = $(this).attr('href');
        //console.log(href);
        Swal.fire({
            //title: 'Sweet!',
            //text: 'Modal with a custom image.',
            imageUrl: href,
            imageWidth: 300,
            imageHeight: 300,
            imageAlt: 'Calzado',
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#535353'
        })

        e.preventDefault();
    })

</script>


<script>
    // btn-submit-add
    $('#form-assign-attribute').submit(function(e){
        
        const postData = {
            product_id: $('#product_id').val(),
            attribute_value_id: $('#attribute_value_id').val()
        };

        console.log(postData);
    
        $.post(URL_PATH + '/admin/product/assign_attribute', postData, function(r) {
            console.log(r);
            switch (r) {
                case 'error':
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor recargue la página e inténtelo nuevamente.',
                    });
                    break;

                case 'success':
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Listo!',
                        showConfirmButton: false,
                        timer: 2100
                    });

                    $('#modal-assign-attribute').modal('hide');

                    setTimeout(function(){
                        window.location.reload(false); 
                      }, 2150);

                    break;
                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor recargue la página e inténtelo nuevamente.',
                    });

                    break;
            }
            
        });
    
        e.preventDefault();
    });
</script>


<script>
    // btn-submit-add
    $('#form-change-attribute').submit(function(e){
        
        const postData = {
            product_id: $('#product_id_change').val(),
            attribute_value_id: $('#attribute_value_id_change').val()
        };

        console.log(postData);
    
        $.post(URL_PATH + '/admin/product/change_attribute', postData, function(r) {
            console.log(r);
            switch (r) {
                case 'error':
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor recargue la página e inténtelo nuevamente.',
                    });
                    break;

                case 'success':
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Listo!',
                        showConfirmButton: false,
                        timer: 2100
                    });

                    $('#modal-change-attribute').modal('hide');

                    setTimeout(function(){
                        window.location.reload(false); 
                      }, 2150);

                    break;
                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor recargue la página e inténtelo nuevamente.',
                    });

                    break;
            }
            
        });
    
        e.preventDefault();
    });
</script>