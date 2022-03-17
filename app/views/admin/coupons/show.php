<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-credit-card text-olive"></i> Cupones
        <small>Información sobre el cupón</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/provider"><i class="fa fa-credit-card"></i> Cupones</a></li>
        <li class="active">Ver</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <p>Estado:

                        <?php if($coupon->is_active === 1) : ?>
                        <i class="fa fa-circle text-green" data-toogle="tooltip" title="Activo"></i>
                        <?php else :  ?>
                        <i class="fa fa-circle text-red" data-toogle="tooltip" title="Inactivo"></i>
                        <?php endif ?>
                    </p>
                    <h6 class="text-center">Código:</h6>
                    <h2 class="text-center"><?= $coupon->code ?></h2>
                    
                    <!-- /.box-header -->
                    <div class="box-body">

                        <p>
                            <i class="fa fa-opencart margin-r-5"></i>
                            Ventas realizadas con el cupón:
                            <strong>
                                <?= $coupons_confirmed->count() ?>
                            </strong>
                        </p>

                        <p>
                            <i class="fa fa-usd margin-r-5"></i>
                            Total de descuento:
                            <strong>
                                <?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($coupons_confirmed->sum('total_discount')) ?>
                            </strong>
                        </p>

                        <p>
                            <i class="fa fa-clock-o margin-r-5"></i> Fecha de ingreso: <strong><?= $coupon->created_at->toDateString() ?></strong>
                        </p>
                        
                        <p>
                            <i class="fa fa-clock-o margin-r-5"></i> Expira el:: <strong><?= $coupon->expiration_date ?></strong>
                        </p>
                        
                    </div>
                    <!-- /.box-body -->

                </div><!-- /.box-body -->

            </div><!-- /.box-primary -->

        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Pedidos con el cupón</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                 
                  <?php if($coupon->orders->isEmpty()) : ?>
                    <div class="alert alert-warning alert-dismissible">
                      <h4><i class="icon fa fa-ban"></i> Sin datos!</h4>

                      <p>Al parecer nadie ha utilizado el cupón.</p>
                    </div>
                  <?php else : ?>

                  <p class="lead">A continuación se muestran todos los pedidos con el cupón de descuento aplicado, incluyendo los pedidos abiertos y cancelados por los usuarios.</p>

                  <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th scope="col">N° Pedido</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Dto.</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($coupon->orders as $order) : ?>
                      <tr>
                        <td>
                            <a href="<?= URL_PATH ?>/admin/order/show/<?= $order->id ?>">#<?= $order->id ?></a>
                        </td>
                        <td>
                            <?= $app['SYMBOL'] ?>
                            <?= \app\helpers\Utils::moneyFormat($order->sub_total) ?>
                        </td>
                        <td>
                            <span class="text-red">
                                -<?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($order->dto) ?>
                            </span>
                        </td>
                        <td>
                            <strong>
                                <?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($order->total_amount) ?>
                            </strong>
                        </td>
                        <td>
                            <span class="label <?= $order->status->bg ?>"><?= $order->status->name ?></span>
                        </td>
                        <td>
                            <i class="fa fa-calendar"></i>
                            <?= $order->created_at->toDateString() ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= URL_PATH ?>/admin/order/show/<?= $order->id ?>" class="btn btn-social-icon" data-toggle="tooltip" title="Más información">
                                    <i class="menu-icon fa fa-info-circle text-blue"></i>
                                </a>
                                <a href="<?= URL_PATH ?>/admin/order/print/<?= $order->id ?>" target="_blank" class="btn btn-social-icon" data-toggle="tooltip" title="Imprimir factura">
                                    <i class="menu-icon fa fa-print text-black"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                    <?php endforeach ?>

                    </tbody>
                
                  </table>

                  <?php endif ?>
                
                </div><!-- /.post -->

              </div>
              
              
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

    </div><!-- /.row -->
  
</section>



<!-- PROVIDER-EDIT -->
<script>
/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#provider-id').val(),
        business_name: $('#business_name-edit').val(),
        rut: $('#rut-edit').val(),
        city: $('#city-edit').val(),
        location: $('#location-edit').val(),
        address: $('#address-edit').val(),
        phone: $('#phone-edit').val(),
        file: $('input[type=file]')[0].files[0]
    };

    //console.log(postData);

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('business_name', postData.business_name);
    formData.append('rut', postData.rut);
    formData.append('city', postData.city);
    formData.append('location', postData.location);
    formData.append('address', postData.address);
    formData.append('phone', postData.phone);
    formData.append('file', postData.file);


    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/provider/update',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            //console.log(r);
            if(r == 'error'){

                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Por favor complete los datos requeridos.',
                });

            } else {

                provider_id = r;
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Listo!',
                    text: 'Los datos de su proveedor han sido actualizados.'
                });
               
            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!'
            })
        }
    });

    e.preventDefault();
});
</script>