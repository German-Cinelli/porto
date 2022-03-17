<!-- modal-edit-debt -->
<?php include('app/views/admin/invoices/edit-debt.php') ?>

<style>
  .table-responsive {
    height:150px;
  }
</style>

<section class="content-header">
    <h1>
      <i class="menu-icon fa fa-shopping-cart text-olive"></i> Facturas
      <small>Información de factura</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/invoice"><i class="fa fa-list-alt"></i> Facturas</a></li>
        <li class="active">Info</li>
    </ol>
</section>

<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Factura N° 
            <span class="text-red">#<?= $invoice->id ?></span> | 
             Fecha: <?= $invoice->date ?>
             <input id="invoice-id" type="hidden" value="<?= $order->id ?>">
             <input id="provider-business_name" type="hidden" value="<?= $provider->business_name ?>">
          </h3>
            <div class="btn-group pull-right">

                <?php if($invoice->status_id == 11) : ?>
                  <a href="#" class="btn-pay btn btn-danger" data-toggle="modal" data-target="#modal-edit-debt">
                    <span class="fa fa-usd"></span> Abonar
                  </a>
                <?php endif ?>

                <!-- title="Si ud. pagó a su proveedor el total o una parte de la deuda s" -->
            
                <a href="<?= URL_PATH ?>/admin/invoice/print/<?= $invoice->id ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir factura</a>
              
                
                
                <a href="<?= URL_PATH ?>/admin/invoice" class="btn btn-primary" data-toggle="tooltip" title="Volver">
                    <span class="fa fa-arrow-left"></span>
                </a>  
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        

        <div class="box-body">
       
          <p class="box-title">
            Proveedor:  
            <a href="<?= URL_PATH ?>/admin/provider/show/<?= $provider->id ?>"><?= $provider->business_name ?></a>  
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
                <td><?= $item->product->name ?></td>
                <td>
                  <?= $app['SYMBOL'] ?>
                  <?= \app\helpers\Utils::moneyFormat($item->unit_price) ?>
                </td>
                <td>x<?= $item->quantity ?></td>
                <td>
                  <?= $app['SYMBOL'] ?>
                  <?= \app\helpers\Utils::moneyFormat($item->quantity * $item->unit_price) ?>
                </td>
              </tr>
              
              <?php endforeach ?>
            
            </tbody>
          </table>

          <hr>
          
          <br>

          <div class="col-sm-12 col-md-6 col-lg-6 text-right">
            <p class="lead"></p>

            <div class="">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>
                    <?= $app['SYMBOL'] ?>
                    <?= \app\helpers\Utils::moneyFormat($invoice->sub_total) ?>
                  </td>
                </tr>
                <tr class="bg-blue">
                  <th>Total:</th>
                  <td>
                    <strong>
                      <?= $app['SYMBOL'] ?>
                      <?= \app\helpers\Utils::moneyFormat($invoice->total_amount) ?></strong></td>
                </tr>
              </table>
            </div>

            <div class="bg-info text-right">
              <span class="text-uppercase">
                <?= \app\helpers\Utils::number_to_words($invoice->total_amount) ?> <?= $app['CURRENCY'] ?>.
              </span>
            </div>
          
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 text-center">

            <?php if($invoice->debt == 0) : ?>
              <div class="alert alert-success alert-dismissible">
                <h3><i class="icon fa fa-check"></i> Factura paga!</h3>
              </div>
              
            <?php else : ?>

              <input type="text" class="knob" value="<?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt) ?>" data-fgColor="#e42f2f" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-readonly="true">
              <div class="alert alert-danger alert-dismissible">
                <h3><i class="icon fa fa-warning"></i> Has pagado el <?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt) ?>% del total de la factura.</h3>
                <h4>Deuda:
                  <?= $app['SYMBOL'] ?>
                  <?= \app\helpers\Utils::moneyFormat($invoice->debt, $app['SYMBOL']) ?>
                </h4>
              </div>
              
            <?php endif ?>
    
          </div>

          

          

        </div><!-- ./box-body -->
        

        <!-- PAYMENTS-HISTORY -->
        <?php if(!$payments->isEmpty()) : ?>

        <div class="container">
          <h3 class="lead">Historial de pagos</h3>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Monto abonado</th>
                <th>Deuda</th>
                <th>Fecha de pago</th>
              </tr>
            </thead>
            <tbody>
            
              <?php foreach($payments as $index => $payment) : ?>

              <tr>
                <td><?= ++$index ?></td>
                <td><?= \app\helpers\Utils::moneyFormat($payment->payment, '$') ?></td>
                <td><?= \app\helpers\Utils::moneyFormat($payment->debt, '$') ?></td>
                <td><?= $payment->created_at ?></td>
              </tr>
              
              <?php endforeach ?>
            
            </tbody>
          </table>

        </div><!-- ./container -->
         
        <?php endif ?>


     </div><!-- ./box-primary -->

</section>