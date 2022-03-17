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

<?php if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL) : ?>

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
            <div class="step">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text">Finalizar</span>
            </div> <!-- step.// -->
        </div>

        <br>


        <section class="checkout">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="order-review">
                            <h5>Datos de facturacíon</h5>

                            <div class="term-condition">

                                <div class="term-box">

                                    <div>
                                        <h6><i class="fa fa-truck"></i>Envío: <?= $order->shipping_method->description ?>.</h6>

                                        <?php if($order->shipping_method_id == 2) : ?>
                                            <div class="container">
                                                <i class="fa fa-map-marker"></i> Dirección: <strong><?= $order->shipping_city  . ' - ' . $order->shipping_location ?> | <?= $order->shipping_address ?></strong>
                                                <br>
                                                <i class="fa fa-phone"></i> Teléfono: <strong><?= $order->phone ?></strong>
                                            </div>
                                        <?php endif ?>

                                    </div>

                                    <hr>

                                    <div>
                                        <h6><i class="fa fa-usd"></i>Método de pago: <?= $order->payment_method->name ?>.</h6>

                                        <div class="container">
                                            <i class="fa fa-credit-card"></i> <?= $order->payment_method->description ?>.</strong>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
                <div class="card-body">
                    <h4 class="font-weight-bold text-uppercase text-4 mb-3">Su pedido</h4>
                    <table class="shop_table cart-totals mb-0">
                        <tbody>

                            <?php foreach($order->items as $index => $item) : ?>
                            <tr>
                                <td>
                                    <strong class="d-block text-color-dark line-height-1 font-weight-semibold">
                                        <?= $item->product->name ?>
                                    </strong>
<<<<<<< HEAD
                                    
                                    <?php if($item->product->id == 60) : ?>
                                        
                                        <?php foreach($combo_customer as $i) : ?>
                                            <span class="text-1">
                                                <img width="32px" src="<?= URL_PATH ?><?= $i->product->image ?>" alt="">
                                                <?= $i->product->name ?>
                                            </span>
                                            <br>
                                        <?php endforeach ?>

                                    <?php endif ?>
=======

                                    <?php if($item['product']->category_id == 7) : ?>
                                        <?php $products_combo = \app\helpers\Utils::getProducts_combo($_SESSION['login']->id) ?>

                                            <?php foreach($products_combo as $p) : ?>
                                                <span class="text-1">
                                                    <img width="48px" src="<?= URL_PATH ?><?= $p->product->image ?>" alt="">
                                                    <?= $p->product->name ?>
                                                </span>
                                                <br>
                                            <?php endforeach ?>

                                        <?php endif ?>
                                                
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                                    <span class="text-1">
                                        <?= $item->quantity ?>
                                        x
                                        <?= $app['SYMBOL'] ?>
                                        <?= \app\helpers\Utils::moneyFormat($item->amount) ?>
                                    </span>
                                </td>
                                <td class="border-top-0 text-right">
                                    <?php if($item->product->id == 60) : ?>

                                        <img style="width:80px" src="<?= URL_PATH ?><?= $combo_customer->first()->combo->image ?>" alt="">
                                        
                                    <?php else : ?>

                                        <img style="width:80px" src="<?= URL_PATH ?><?= $item->product->image ?>" alt="">

                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>

                            <tr class="cart-subtotal">
                                <td class="border-top-0">
                                    <strong class="text-color-dark">Subtotal</strong>
                                </td>
                                <td class="border-top-0 text-right">
                                    <strong>
                                        <span class="amount font-weight-medium">
=======

                    <?php if($order->shipping_method_id == 1) : ?>

                    <?php endif ?>

                    <?php if($order->shipping_method_id == 2) : ?>

                    <?php endif ?>

                    <?php if($order->shipping_method_id == 3) : ?>

                    <?php endif ?>

                    <div class="col-md-6">
                        <div class="order-review">
                            <h5>Revisión del pedido</h5>
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
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363
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

                            <?php if($order->payment_method_id == 2) : ?>

                            <form action="<?= URL_PATH ?>/checkout/process_payment" method="POST">
                                <script
                                    src="https://www.mercadopago.com.uy/integrations/v1/web-payment-checkout.js"
                                    data-preference-id="<?= $preference->id ?>">
                                </script>
                            </form>

                            <div class="alert alert-primary mt-3" role="alert">
                                <i class="fa fa-info-circle"></i>
                                Se realiza la conversión de <strong>dólares</strong> a <strong>pesos uruguayos</strong> al momento de efectuar el pago.
                            </div>

                            <?php else : ?>

                            <a href="<?= URL_PATH ?>/checkout/process_order" class="btn btn-danger btn-block">Realizar pedido</a>

                            <?php endif ?>



                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Checkout -->



        <script src="https://www.mercadopago.com/v2/security.js" view="home"></script>

    </div> <!-- container .//  -->

</section>

<?php else : ?>


        <div class="container">
            <section class="section-content padding-y bg">
                <div class="container my-3">

                    <div class="card p-3 text-center m-5">
                        <div class="card-title">
                            <h3 class="text-muted">Mi carrito <i class="icon text-primary fa fa-shopping-cart"></i></h3>
                        </div>
                        <h1 class="display-4 text-muted">No añadiste ningun producto al carrito <i class="icon text-warning fa fa-warning"></i></h1>
                        <p class="text-center">
                            <span class="text-dark">
                                Para hacerlo dirigete a nuestro catálogo de productos haciendo
                            </span>
                            <a class="text-primary" href="<?= URL_PATH ?>/product">clic aquí.</a>
                        </p>
                    </div>


                </div>
            </section>
        </div>

<?php endif ?>



<script>

    $('.select_quantity').on('change', function() {
        var id = $(this).attr('id');
        var quantity = $(this).val();

        $('.price').html('{Precio unitario * Cantidad}');

        console.log('Index:' + id);
        console.log('Cantidad: ' + quantity);
    });

    /* Button pay */
    $('#paykkk').on('click', function(e) {
        Swal.fire({
            title: `Alto ahi!`,
            text: "Ésto es solo un software de demostración. Si desea más información contáctenos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6495ed',
            cancelButtonColor: '#c0c0c0',
            confirmButtonText: 'Deseo contactarme',
            cancelButtonText: 'Cerrar',
        }).then((result) => {
            if (result.value) {

                window.open('https://www.sevencrows.uy/contact');

            }

        });

        e.preventDefault();
    });
</script>


    <!-- BTN-PLUS -->
    <script>
		$('.btn-quantity-plus').on('click', function (e) {

            var index = $(this).attr("data-index");
        	var product_id = $(this).attr("data-product-id");
			var quantity = $(this).attr("data-quantity");

			const postData = {
                index: index,
                product_id: product_id,
				quantity: quantity
            };

            //console.log(postData);

            if(postData.quantity < 0){
				Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'La cantidad no puede ser cero.',
                    showConfirmButton: false,
                    timer: 2000
                });

                setTimeout(function(){
                    window.location.reload();
                }, 2500);

			} else {

				$.post(URL_PATH + '/cart/plusQuantity', postData, function(r) {
                    console.log(r);

                    switch (r) {
                        case 'out_of_stock':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Agotado!',
                                text: 'Ya no tenemos stock de éste producto. Hemos removido el producto de su carrito.',
                                showConfirmButton: false,
                                timer: 5200
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 5200);

                            break;


                        case 'error':

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal',
                                text: 'Inténtelo nuevamente.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;


                        case 'insufficient_stock':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: 'No fue posible añadir más cantidad debido a que no tenemos suficiente stock al que deseas comprar.',
                            });

                            break;

                        case 'not_zero':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: 'No puedes disminuir más la cantidad.',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            break;


                        case 'ok':

                            Swal.fire({
                                icon: 'success',
                                title: 'Cantidad agregada!',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;

                        default:

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal',
                                text: 'Inténtelo nuevamente.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;
                    }



				});

			}






            e.preventDefault();
        });
	</script>


    <!-- BTN-MINUS -->
    <script>
		$('.btn-quantity-minus').on('click', function (e) {

            var index = $(this).attr("data-index");
        	var product_id = $(this).attr("data-product-id");
			var quantity = $(this).attr("data-quantity");

			const postData = {
                index: index,
                product_id: product_id,
				quantity: quantity
            };

            //console.log(postData);

            if(postData.quantity < 0){
				Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'La cantidad no puede ser cero.'
                });
			} else {

				$.post(URL_PATH + '/cart/minusQuantity', postData, function(r) {
					console.log(r);
					switch (r) {
                        case 'out_of_stock':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Agotado!',
                                text: 'Ya no tenemos stock de éste producto. Hemos removido el producto de su carrito.',
                                showConfirmButton: false,
                                timer: 5200
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 5200);

                            break;


                        case 'error':

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal',
                                text: 'Inténtelo nuevamente.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;


                        case 'insufficient_stock':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: 'No fue posible añadir más cantidad debido a que no tenemos suficiente stock al que deseas comprar.',
                            });

                            break;

                        case 'not_zero':

                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: 'No puedes disminuir más la cantidad.',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            break;


                        case 'ok':

                            Swal.fire({
                                icon: 'success',
                                title: 'Cantidad disminuida!',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;

                        default:

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal',
                                text: 'Inténtelo nuevamente.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);

                            break;
                    }

				});

			}






            e.preventDefault();
        });
	</script>
