<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-shopping-cart text-olive"></i> Compras
        <small>de <a target="_blank" href="<?= URL_PATH ?>/admin/user/show/<?= $user->id ?>"><?= $user->name ?> <?= $user->lastname ?></a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/user/show/"<?= $user->id ?>><i class="fa fa-dashboard"></i> Cliente</a></li>
        <li class="active">Compras</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de compras realizadas</h3>
            <div class="btn-group pull-right">
               
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="products" class="table">
                <thead>
                    <tr>
                        <th scope="col">N° Pedido</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Fecha de compra</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($orders as $order) : ?>
                  <tr>
                    <td>#<?= $order->id ?></td>
                    <td><?= $order->total_amount ?></td>
                    <td><?= $order->created_at ?></td>
                    <td><span class="label bg-yellow">Pendiente</span> / <span class="label bg-green">Entregado</span></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= URL_PATH ?>/admin/order/show/<?= $order->id ?>" class="btn btn-social-icon" data-toggle="tooltip" title="Ver">
                                <i class="menu-icon fa fa-eye text-blue"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon" data-toggle="tooltip" title="Imprimir factura">
                                <i class="menu-icon fa fa-print text-red"></i>
                            </a>
                        </div>
                    </td>
                  </tr>
                <?php endforeach ?>

                </tbody>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>

<script>
    
</script>