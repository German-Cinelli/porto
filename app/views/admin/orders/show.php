<style>
  .table-responsive {
    height:150px;
  }
</style>

<!-- modal-manage-order-->
<?php include('app/views/admin/orders/modals/manage-order.php') ?>

<section class="content-header">
    <h1>
      <i class="menu-icon fa fa-opencart text-olive"></i> Ventas
      <small>Información de una venta</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
        <li class="active">Info</li>
    </ol>
</section>

<section class="content container-fluid">


    <?php if($order->trashed()) : ?>
      <!-- ALERT ORDER-CANCELED -->
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Atención!</h4>
        Ésta venta ha sido cancelada el día 
        < <i class="fa fa-calendar"></i> <b><?= $order->canceled_order[0]->created_at->toDateString() ?></b> > a las 
        < <i class="fa fa-clock-o"></i> <b><?= $order->canceled_order[0]->created_at->toTimeString() ?></b> >.
        <br>
        Motivo: <b><?= $order->canceled_order[0]->reason ?></b>.
      </div>
    <?php endif ?>
      
      
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Venta N° 
            <span class="text-red">#<?= $order->id ?></span> | 
             <?= $order->created_at ?>
             <input id="order-id" type="hidden" value="<?= $order->id ?>">
             <input id="customer-name" type="hidden" value="<?= $user->name ?> <?= $user->lastname ?>">
          </h3>
            <div class="btn-group pull-right">
            
                <a href="<?= URL_PATH ?>/admin/order/print/<?= $order->id ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
              
                <?php if($order->status_id === 4 || $order->status_id === 8 || $order->status_id === 10) : ?>
                <a href="#" class="btn-manage-status btn btn-success" data-toggle="modal" data-target="#modal-manage-order" data-status-id="<?= $order->status_id ?>">
                  <span class="fa fa-sort-amount-asc"></span>
                  Modificar estado
                </a>
                <?php endif ?>
                
                <a href="<?= URL_PATH ?>/admin/order" class="btn btn-primary" data-toggle="tooltip" title="Volver">
                    <span class="fa fa-arrow-left"></span>
                </a>  
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
       
          <p class="box-title">
            Cliente:  
              <?php if($user->role_id == 3) : ?>
                <?= $order->full_name ?>
              <?php else : ?>
                <a href="<?= URL_PATH ?>/admin/user/show/<?= $user->id ?>"><?= $user->email ?></a> 
              <?php endif ?>
          </p>
          <p>
            Estado:
            <span class="label <?= $order->status->bg ?>">
              <?= $order->status->name ?>
            </span>
          </p>
          <p>mercadopago_payment_id:
            <strong><?= $order->mercadopago_payment_id ?></strong>
          </p>
          <p>mercadopago_merchant_order_id:
            <strong><?= $order->mercadopago_merchant_order_id ?></strong>
          </p>
          <p>
            Método de pago:
            <strong><?= $order->payment_method->name ?></strong>
          </p>
          <p>
            Método de envío:
            <strong><?= $order->shipping_method->name ?></strong>
          </p>
          <p>
            Nota:
            <strong><?= $order->note ?></strong>
          </p>
          
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Precio</th>
              </tr>
            </thead>
            <tbody>
            
              <?php foreach($items as $index => $item) : ?>
              <tr>
                <td><?= ++$index ?></td>
                <td>
                  <?= $item->product->name ?>
                  <?php if($item->product->product_type_id == 21) : ?>
                    <strong>Produtos ID: <?= $item->canasta ?></strong>
                  <?php endif ?>
                </td>
                <td>
                  <?= $app['SYMBOL'] ?>
                  <?= \app\helpers\Utils::moneyFormat($item->unit_price, '$') ?>
                </td>
                <td>x<?= $item->quantity ?></td>
                <td>
                  <?= $app['SYMBOL'] ?>
                  <?= \app\helpers\Utils::moneyFormat($item->quantity * $item->unit_price, '$') ?>
                </td>
              </tr>
              
              <?php endforeach ?>
            
            </tbody>
          </table>

          <hr>

          <div class="col-sm-12 col-md-6 col-lg-6 text-right">
            <p class="lead"></p>

            <div class="">
              <table class="table table-responsive">

                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>
                    <?= $app['SYMBOL'] ?>
                    <?= \app\helpers\Utils::moneyFormat($order->sub_total, '$') ?>
                  </td>
                </tr>
    
                <tr>
                <th>Costo envío:</th>
                  <td>
                    <?= $app['SYMBOL'] ?>
                    <?= \app\helpers\Utils::moneyFormat($order->shipping_cost, '$') ?>
                  </td>
                </tr>

                <tr>
                  <th>Descuento:</th>
                  <td>
                    <span class="text-red">
                      <?= $app['SYMBOL'] ?>
                      -<?= \app\helpers\Utils::moneyFormat($order->dto, '$') ?>
                    </span>
                  </td>
                </tr>

                <tr class="bg-blue">
                  <th>Total:</th>
                  <td>
                    <strong>
                      <?= $app['SYMBOL'] ?>
                      <?= \app\helpers\Utils::moneyFormat($order->total_amount, $app['SYMBOL']) ?>
                    </strong>
                  </td>
                </tr>

              </table>
            </div>

            <div class="bg-info text-right">
              <span class="text-uppercase">
                <?= \app\helpers\Utils::number_to_words($order->total_amount) ?> <?= $app['CURRENCY'] ?>.
              </span>
            </div>
          
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6">
          
            <h3>Envío:</h3>
            <img src="<?= URL_PATH ?><?= $order->shipping_method->icon ?>" width="50px"  alt="">
            <p><?= $order->shipping_method->description ?></p>
            <hr>
            <?php if($order->shipping_method_id == 2) : ?>
              <h4>Datos:</h4>
              <p><?= $order->full_name ?></p>
              <p><?= $order->shipping_address ?> <?= $order->shipping_location ?>, <?= $order->shipping_city ?></p>
            <?php endif ?>
            <?php if($order->shipping_method_id == 4) : ?>
              <h4>Identificador de ubicación:</h4>
              <p class="lead"><?= $order->redelocker_location_id ?></p>
            <?php endif ?>

          </div>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>

<script>

    $('.btn-change-status').on('click', function(e){
       var id = $('#order-id').val();
       var customer_name = $('#customer-name').val();

        Swal.fire({
            title: `¿Desea concretar el pedido N° #${id}?`,
            text: `Confirme si su cliente '${customer_name} ya recibió su pedido.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, confirmar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/order/confirm_shipment', {id}, function(r){
                    //console.log(r);
                    if(r == 'confirmed'){
                        /* Alert-success */
                        Swal.fire({
                          icon: 'success',
                          title: 'Acción exitosa!',
                          text: 'El pedido figurará como concretado.',
                          showConfirmButton: false,
                          timer: 2600
                        })
                        
                        setTimeout(function(){ 
                          location.reload()
                        }, 2700);

                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un error!',
                            text: 'Por favor recargue la página e inténtelo nuevamente.'
                        })
                    }
                    
                });
                
            }

        });

        e.preventDefault();
    })
</script>


<script>
  $('.btn-manage-status').on('click', function(e){
    var status_id = $(this).attr("data-status-id");
    //console.log(status_id);

    /* Seleccionar estado */
    $("#select-status option[value='" + status_id + "']").prop("selected", true);
            
    $('.select2').trigger('change');
  })
</script>


<!-- CHANGE-STATUS -->
<script>
  $('#form-change-status').submit(function(e){
        var order_id = $('#order-id').val();
        var status_id = $('#select-status').val();

        var option = $( "#select-status option:selected" ).text();

        const postData = {
            order_id:  order_id,
            status_id:  status_id
        };

        console.log(postData)

        Swal.fire({
            title: `¿Desea modificar el estado del pedido #${status_id} a ${option}?`,
            //text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, modificar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/order/change_status', postData, function(r){
                    console.log(r)
                    if(r == 'error'){
                        
                      Swal.fire({
                          position: 'center',
                          icon: 'error',
                          title: 'Algo salió mal!',
                          text: 'Recargue la página e intentelo nuevamente.',
                          showConfirmButton: false,
                          timer: 3500
                      });
                    } else {

                      $('#modal-manage-order').modal('hide');
                        
                      Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Correcto!',
                          text: 'Se ha modificado el estado del pedido.',
                          showConfirmButton: false,
                          timer: 2500
                      });

                      setTimeout(function(){
                        window.location.reload(false); 
                      }, 2700);


                    }
                    
                    
                });
                
            }

        });

        e.preventDefault();
    })
</script>