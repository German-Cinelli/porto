<section class="section-content padding-y my-5">

    <div class="container">
        
        <?php if($orders->isEmpty()) : ?>

            <div class="card p-3 text-center m-5">
                <div class="card-title">
                    <h1 class="display-4 text-muted">Mis compras <i class="icon text-primary fa fa-shopping-cart"></i></h1>
                </div>
                <h1 class="display-4 text-muted">Aún no ha realizado ninguna compra <i class="icon text-warning fa fa-warning"></i></h1>
                <p class="text-center">Para empezar a comprar puedes dirigirte a nuestro <a class="text-primary" href="<?= URL_PATH ?>/product#catalog">catálogo de productos.</a></p>
            </div>

        <?php else :  ?>

        <h1 class="display-4 text-muted text-center">Mis compras <i class="icon text-primary fa fa-shopping-cart text-center"></i></h1>

        <?php foreach($orders as $index => $order) : ?>
        <div class="card my-3">
            <div class="card-header">
                Fecha: <b><?= $order->created_at ?></b>
                <br>
                Estado: <b><?= $order->status->name ?></b> <i class="fa fa-question-circle text-primary" data-toggle="tooltip" title="<?= $order->status->description ?>"></i>

            </div>
            <div class="card-body">
                        
                <table class="table table-borderless table-shopping-cart table-hover">
                    <thead class="thead-dark text-muted">
                        <tr class="text-uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio unitario</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col" class="text-right" width="60"> </th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php foreach($order->items as $index =>$item) : ?>

                    <tr>
                        <td><?= ++$index ?></td>
                        <td>
                            <!--<img width="44px" src="?= URL_PATH ?>?= $item->product->image ?>" alt="">-->
                            <?= $item->product->name ?>
                        </td>
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

                <div class="col-md-6 pull-right">
                    <p class="lead"></p>

                    <div class="table-responsive">
                            <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>
                                <?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($order->sub_total) ?>
                            </td>
                        </tr>
                        <tr>
                        <th>Costo envío:</th>
                            <td>
                                <?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($order->shipping_cost) ?>
                            </td>
                        </tr>
                        <tr class="bg-blue bg-primary text-white">
                            <th>Total:</th>
                            <td>
                                <strong>
                                    <?= $app['SYMBOL'] ?>
                                    <?= \app\helpers\Utils::moneyFormat($order->total_amount) ?>
                                    </strong>
                                </td>
                        </tr>
                        </table>
                    </div>

                    <div class="text-right">
                        <span class="text-uppercase">
                        <footer class="blockquote-footer">
                            <?= \app\helpers\Utils::number_to_words($order->total_amount) ?>
                            <?= $app['CURRENCY'] ?>.</footer>
                        </span>
                    </div>
                </div>

            </div>
        </div><!-- ./card -->
     <?php endforeach ?>

     <?php endif ?>
                
    </div><!-- ./container -->

</section>