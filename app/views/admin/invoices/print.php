<?php $app = \app\helpers\Utils::getConfig(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">

<style>
  @page { 
    margin-top: 0; 
    margin-bottom: 0;
  }
</style>

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
          
            
            <img class="" width="300px;" src="<?= URL_PATH ?>/assets/img/logo.png" alt="">
            <span class="pull-right"><i class="#fa #fa-globe"></i> <?= $app['COMPANY_NAME'] ?></span>
            
            <!--<small class="pull-right">Date: 2/10/2014</small>-->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          De
          <address>
            <strong><?= $provider->business_name ?></strong><br>
            Localidad: <?= $provider->location ?>, <?= $provider->city ?><br>
            Dirección: <?= $provider->address ?><br>
            Teléfono: <?= $provider->phone ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura #<?= $invoice->id ?></b><br>
          <br>
          <!--<b>Pedido N°:</b> 4F3S8J<br>-->
          <b>Emisión:</b> <?= $invoice->date ?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
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
                <td><?= \app\helpers\Utils::moneyFormat($item->unit_price, '$') ?></td>
                <td>x<?= $item->quantity ?></td>
                <td><?= \app\helpers\Utils::moneyFormat($item->amount, '$') ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6 pull-right">
          <p class="lead"></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Sub total:</th>
                <td><?= \app\helpers\Utils::moneyFormat($invoice->sub_total, $app['SYMBOL']) ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><strong><?= \app\helpers\Utils::moneyFormat($invoice->total_amount, $app['SYMBOL']) ?></strong></td>
              </tr>
            </table>
            <div class="bg-info text-right">
            <span class="text-uppercase">
              <?= \app\helpers\Utils::number_to_words($invoice->total_amount) ?> <?= $app['CURRENCY'] ?>.
            </span>
          </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?= URL_PATH ?>/admin/invoice/print/<?= $invoice->id ?>" class="btn btn-default"><i class="fa fa-print"></i> Imprimir factura</a>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
