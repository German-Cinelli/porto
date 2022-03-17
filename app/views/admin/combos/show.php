<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-th-large text-olive"></i> Canasta
        <small>Ver información</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/combo"><i class="fa fa-th-large"></i> Canastas</a></li>
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

                    <?php if($combo->status == 1) : ?>
                    <span data-toggle="tooltip" title="La canasta se mostrará en el catálogo."><i class="fa fa-circle text-green"></i> Activo</span>
                    <?php else : ?>
                    <span data-toggle="tooltip" title="La canasta no se está mostrarando en el catálogo."><i class="fa fa-circle text-red"></i> Inactivo</span>
                    <?php endif ?>

                   
                    <a href="<?= URL_PATH ?><?= $combo->image ?>" target="_blank" class="img-modal"><img class="img-responsive" src="<?= URL_PATH ?><?= $combo->image ?>" alt="Product"></a>
                        
                    <h3 class="profile-username text-center"><?= $combo->name ?></h3>
                    <div class="text-right">
                        
                    </div>
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>Producto - Atributo:</p>

                        <ul>
                        <?php foreach($combo->combos_items as $item) : ?>
                            <li><?= $item->product_type_attribute_value->product_type->name ?> - <?= $item->product_type_attribute_value->attribute_value->tag ?></li>
                        <?php endforeach ?>
                        </ul>

                        <hr>

                        <strong><i class="fa fa-dollar margin-r-5"></i> Precio:</strong>
                        <span class="text-muted">
                            <?= $app['SYMBOL'] ?>
                            <?= \app\helpers\Utils::moneyFormat($combo->price) ?>
                        </span>
                        <br><br>
                        <strong><i class="fa fa-clock-o margin-r-5"></i> Registrado el...</strong>
                        <p class="text-muted"><?= $combo->created_at ?></p>
                     
                        <strong><i class="fa fa-clock-o margin-r-5"></i> Última modificación...</strong>
                        <p class="text-muted"><?= $combo->updated_at ?></p>
                        
                    </div>
                    <!-- /.box-body -->
                    

                </div><!-- /.box-body -->

            </div><!-- /.box-primary -->

        </div><!-- /.col-md-3 -->
        

        <div class="col-md-9">
        
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-info-circle"></i> Info</a></li>
                    <!--<li><a href="#settings" data-toggle="tab">Imágenes</a></li>-->
                </ul>

                <div class="btn-group pull-right">
                    <a href="<?= URL_PATH ?>/admin/combo" class="btn btn-primary">
                        <span class="fa fa-list-ol"></span>
                        Listar canastas
                    </a>
                </div><!-- /.btn-group -->

                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                    </div><!-- ./active -->
                    
                    
                    <div class="box-body box-profile">
                        <h2 class="text">Descripción del combo</h2>
                                    
                        <h4 class="text-muted"><?= $combo->description ?></h4>

                    </div><!-- /.box-body -->
                    
                    <div id="gallery">
                        <div class="box-body box-profile">
                            <h3 class="text">Ventas</h3>

                            <table id="example2" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">N° Pedido</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    

                                </tbody>
                            
                            </table>

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