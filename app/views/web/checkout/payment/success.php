<style>
    button.mercadopago-button {
        display: block;
        width: 100%;
    }
</style>

<style>
/* ================= TRACKING ============== */
.tracking-wrap {
  position: relative;
  background-color: #ddd;
  height: 7px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 60px;
  margin-top: 50px; }
  .tracking-wrap .step {
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative; }
  .tracking-wrap .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px; }
  .tracking-wrap .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd; }
  .tracking-wrap .text {
    display: block;
    margin-top: 7px; }
  .tracking-wrap .step.active .icon {
    background: #3167eb;
    color: #fff; }
  .tracking-wrap .step.active .text {
    font-weight: 400;
    color: #000; }
  .tracking-wrap .step.active:before {
    background: #3167eb; }
</style>

<style>
.underline-decoration {
    -webkit-text-decoration: hotpink underline;
    text-decoration: hotpink underline;
    text-decoration-color: #449fff;
}
</style>

<section class="section-content padding-y bg">
    <div class="container">

        <!-- TRACKING -->
        <h1 class="display-4 text-center text-primary">Tu compra</h1>

        <div class="tracking-wrap">
            <div class="step active">
                <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                <span class="text"> Carrito</span>
            </div> <!-- step.// -->
            <div class="step active">
                <span class="icon"> <i class="fa fa-map"></i> </span>
                <span class="text"> Datos de facturación</span>
            </div> <!-- step.// -->
            <div class="step active">
                <span class="icon"> <i class="fa fa-list-alt"></i> </span>
                <span class="text">Resumen de su compra</span>
            </div> <!-- step.// -->
            <div class="step active">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text">Finalizar</span>
            </div> <!-- step.// -->
        </div>

        <br>

        <!-- Alert -->
        <section class="checkout">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="order-review">
                            <h5 class="text-center">¡Muchas gracias por tu compra! <i class="fa fa-thumbs-o-up text-primary"></i></h5>

                            <p class="lead text-center">Tu pedido será precesado.</p>

                            <p class="lead text-center"><?= $order->shipping_method->message ?></p>

                            <?php if($order->shipping_method_id == 2) : ?>
                            <div class="container mt-3 text-center">
                                <i class="fa fa-map-marker"></i> Dirección: <strong><?= $order->shipping_city  . ' - ' . $order->shipping_location ?> | <?= $order->shipping_address ?></strong>
                            </div>
                            <?php endif ?>

                         </div>
                    </div>

                    <div class="col-md-6">
                        <div class="order-review">
                            <h5>Productos adquiridos</h5>
                            <div class="review-box">
                                <ul class="list-unstyled">
                                    <li>Producto <span>Precio</span></li>
                                            
                                    <?php foreach($order->items as $index => $item) : ?>
                                            
                                    <li class="d-flex justify-content-between">
                                        <div class="pro">
                                            <img src="<?= URL_PATH ?><?= $item->product->image ?>" alt="">
                                            <p><?= $item->product->name ?></p>
                                            <span><?= $item->quantity ?> x <?= $item->unit_price ?></span>
                                        </div>
                                        <div class="prc">
                                            <p><?= $app['SYMBOL'] ?>
                                                <?= \app\helpers\Utils::moneyFormat(($item->unit_price * $item->quantity), $app['SYMBOL']) ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php endforeach ?>

                                    <li></li>

                                    
                                    <li>Subtotal 
                                        <span>
                                            <?= $app['SYMBOL'] ?>
                                            <?= \app\helpers\Utils::moneyFormat($order->sub_total) ?>
                                        </span>
                                    </li>
                                    <li>Costo de envío 
                                        <span class="ord-shipping-cost">
                                            <?= $app['SYMBOL'] ?>
                                            <?= \app\helpers\Utils::moneyFormat($order->shipping_cost) ?>
                                            </span>
                                        </li>
                                    <li>Total 
                                        <span class="ord-total">
                                            <?= $app['SYMBOL'] ?> 
                                            <?= \app\helpers\Utils::moneyFormat($order->total_amount) ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                    </div>

                </div>

            </div>
        </section>
        <!-- End Alert -->

    </div> <!-- container .//  -->

</section>