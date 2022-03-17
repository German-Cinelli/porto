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
            <div class="step">
                <span class="icon"> <i class="fa fa-list-alt"></i> </span>
                <span class="text">Resumen de su compra</span>
            </div> <!-- step.// -->
            <div class="step">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text">Finalizar</span>
            </div> <!-- step.// -->
        </div>

        <br>

<<<<<<< HEAD
        <div class="row">
			<div class="col">
				<p>¿Tienes un cupón? <a href="#" class="text-primary text-color-hover-primary text-uppercase text-decoration-none font-weight-bold" data-toggle="collapse" data-target=".coupon-form-wrapper">Ingresar código</a></p>
			</div>
		</div>

        <div class="row coupon-form-wrapper collapse mb-5">
			<div class="col">
				<div class="card border-width-3 border-radius-0 border-color-hover-dark">
					<div class="card-body">
						<form id="form-coupon">
							<div class="d-flex align-items-center">
								<input type="text" id="code" class="form-control h-auto border-radius-0 line-height-1 py-3 text-uppercase" name="couponCode" placeholder="Ingrese código del cupón..." required />
								<button type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 ws-nowrap btn-px-4 py-3 ml-2">Aplicar Cupón</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        <form action="<?= URL_PATH ?>/checkout/summary" method="POST" role="form" class="needs-validation">
			<div class="row">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<h2 class="text-color-dark font-weight-bold text-5-6 mb-3">Datos de facturación</h2>
					<input type="hidden" id="coupon_code" name="coupon_code">
                    <div class="form-row">
						<div class="form-group col-md-6">
							<label>Nombre <span class="text-color-danger">*</span></label>
							<input type="text" id="name" name="name" value="<?= $customer->name ?>" placeholder="Ingrese nombre" class="form-control border-radius-0 h-auto py-2" required />
						</div>
						<div class="form-group col-md-6">
							<label>Apellido <span class="text-color-danger">*</span></label>
							<input type="text" id="lastname" name="lastname" value="<?= $customer->lastname ?>" placeholder="Ingrese nombre" class="form-control border-radius-0 h-auto py-2" required />
						</div>
					</div>
                    <div class="form-row">
						<div class="form-group col-md-6">
							<label>Email <span class="text-color-danger">*</span></label>
							<input type="mail" id="email" name="email" value="<?= $customer->email ?>" placeholder="Ingrese correo" class="form-control border-radius-0 h-auto py-2" required />
						</div>
						<div class="form-group col-md-6">
							<label>Teléfono / Celular <span class="text-color-danger">*</span></label>
							<input type="number" id="phone" name="phone" value="<?= $customer->phone ?> | <?= $customer->cellphone ?>" placeholder="Ingrese teléfono" class="form-control border-radius-0 h-auto py-2" required />
						</div>
					</div>
                    <div class="form-row">
                        <div class="form-group col">
							<label>Departamento <span class="text-color-danger">*</span></label>
							<div class="custom-select-1">
								<select class="form-control border-radius-0 h-auto py-2" id="city" name="city" required>
                                    <option value="Montevideo">Montevideo</option>
                                    <option value="Montevideo">Artigas</option>
                                    <option value="Canelones">Canelones</option>
                                    <option value="Cerro Largo">Cerro Largo</option>
                                    <option value="Colonia">Colonia</option>
                                    <option value="Durazno">Durazno</option>
                                    <option value="Flores">Flores</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Lavalleja">Lavalleja</option>
                                    <option value="Maldonado">Maldonado</option>
                                    <option value="Paysandú">Paysandú</option>
                                    <option value="Río Negro">Río Negro</option>
                                    <option value="Rivera">Rivera</option>
                                    <option value="Rocha">Rocha</option>
                                    <option value="Salto">Salto</option>
                                    <option value="San José">San José</option>
                                    <option value="Soriano">Soriano</option>
                                    <option value="Tacuarembó">Tacuarembó</option>
                                    <option value="Treinta y Tres">Treinta y Tres</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Barrio <span class="text-color-danger">*</span></label>
							<input type="text" id="location" name="location" value="" placeholder="Ingrese barrio" class="form-control border-radius-0 h-auto py-2" required />
						</div>
					</div>
					<div class="form-row">
                        <div class="form-group col-md-6">
							<label>Dirección <span class="text-color-danger">*</span></label>
							<input type="text" id="address" name="address" value="<?= $customer->address ?>" placeholder="Ingrese dirección" class="form-control border-radius-0 h-auto py-2" required />
						</div>
                        <div class="form-group col-md-6">
							<label>Código postal <span class="text-color-danger">*</span></label>
							<input type="text" id="zipcode" name="zipcode" value="<?= $customer->zipcode ?>" placeholder="Ingrese código postal" class="form-control border-radius-0 h-auto py-2" required />
						</div>
					</div>
                    <div class="form-row mt-3">
						<div class="form-group col">
							<label>Nota</label>
							<textarea id="note" id="note" class="form-control border-radius-0 h-auto py-2" name="orderNotes" rows="5" placeholder="Escribe por si quieres dejarnos alguna nota, es opcional"></textarea>
						</div>
					</div>

					<h2 class="text-color-dark font-weight-bold text-5-6 mb-3">RUT</h2>
                    <div class="form-row">
                        <div class="alert alert-default" role="alert">
                            Si tu compra va dirigida a nombre de una empresa completa los siguientes datos. De lo contrario déjalos vacíos.
                        </div>
                    </div>
                    <div class="form-row">
						<div class="form-group col-md-6">
							<label>Razón social</label>
							<input type="text" id="company" name="company" value="" placeholder="Ingrese razón social" class="form-control border-radius-0 h-auto py-2" />
						</div>
						<div class="form-group col-md-6">
							<label>RUT</label>
							<input type="text" id="rut" name="rut" value="" placeholder="Ingrese RUT" class="form-control border-radius-0 h-auto py-2" />
						</div>
					</div>

				</div>
				<div class="col-lg-5">
					<div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
						<div class="card-body">
							<h4 class="font-weight-bold text-uppercase text-4 mb-3">Su pedido</h4>
							<table class="shop_table cart-totals mb-3">
								<tbody>
									<tr>
										<td colspan="2" class="border-top-0">
											<strong>Productos</strong>
										</td>
									</tr>

                                    <?php foreach($_SESSION['cart'] as $index => $item) : ?>
									<tr>
										<td>
											<strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?= $item['product']->name ?></strong>
                                            <span class="text-1">
                                                <?= $item['quantity'] ?>
                                                x
                                                <?= $app['SYMBOL'] ?>
                                                <?= \app\helpers\Utils::moneyFormat($item['product']->price_final) ?>
                                                <?php if($item['product']->product_type_id == 21) : ?>
                                                        <?php foreach(\app\helpers\Utils::getProduct_canasta($_SESSION['login']->id) as $itm) : ?>
                                                            <br>
                                                            <img width="32" height="32" alt="" class="img-fluid" src="<?= URL_PATH ?><?= $itm->product->image ?>">
                                                            <?= $itm->product->name ?>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                            </span>

                                            <?php if($item['product']->category_id == 7) : ?>
                                                <?php $products_combo = \app\helpers\Utils::getProducts_combo($_SESSION['login']->id) ?>

                                                <?php foreach($products_combo as $p) : ?>
                                                    <br>
                                                    <span class="text-1" style="font-size: 12px">
                                                        <i class="fa fa-angle-right"></i>
                                                        <?= $p->product->name ?>
                                                    </span>
                                                <?php endforeach ?>

                                            <?php endif ?>

										</td>
										<td class="text-right align-top">
											<span class="amount font-weight-medium text-color-grey">
                                                <?= $app['SYMBOL'] ?>
                                                <?= \app\helpers\Utils::moneyFormat(($item['product']->price_final * $item['quantity'])) ?>
                                            </span>
										</td>
									</tr>
                                    <?php endforeach ?>

									<tr class="cart-subtotal">
										<td class="border-top-0">
											<strong class="text-color-dark">Subtotal</strong>
										</td>
										<td class="border-top-0 text-right">
											<strong><span class="amount font-weight-medium"><?= $app['SYMBOL'] ?> <?=  \app\helpers\Utils::moneyFormat($sub_total) ?></span></strong>
										</td>
									</tr>
									<tr class="shipping">
										<td colspan="2">
											<strong class="d-block text-color-dark mb-2">Envío</strong>
														
											<div class="d-flex flex-column">

                                                <?php foreach($shipping_methods as $index => $shipping_method) : ?>
												<label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method<?= $index + 1?>">
													<input 
                                                        id="shipping_method<?= ++$index ?>" 
                                                        name="radio-shipping-method" 
                                                        type="radio" 
                                                        class="mr-2" 
                                                        value="<?= $shipping_method->id ?>" 
                                                        <?php if($shipping_method->id === 4) : ?>
                                                        checked="checked" 
                                                        <?php endif ?>
                                                    />
                                                    <?= $shipping_method->name ?>
                                                    <?php if($shipping_method->cost != 0) : ?>
                                                        (<?= $app['SYMBOL'] ?> <?= \app\helpers\Utils::moneyFormat($shipping_method->cost) ?>)
                                                    <?php else : ?>
                                                        (Sin costo)
=======
        <section class="checkout">
            <form action="<?= URL_PATH ?>/checkout/summary" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p><u class="underline-decoration text-uppercase" style="font-size:20px"><b>Datos de facturación</b></u></p>
                            <input type="hidden" id="coupon_code" name="coupon_code">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>Nombre
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="name" name="name" value="<?= $customer->name ?>" placeholder="Ingrese nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Apellido
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="lastname" name="lastname" value="<?= $customer->lastname ?>" placeholder="Ingrese apellido" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="email" name="email" value="<?= $customer->email ?>" placeholder="Ingrese correo" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Teléfono/Celular
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="phone" name="phone" value="<?= $customer->cellphone ?>" placeholder="Ingrese N° telefónico" required>
                                </div>

                                <div class="col-md-6 contry">
                                    <label>Departamento
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="country" id="city" name="city" required>
                                        <option value="Montevideo">Montevideo</option>
                                        <option value="Montevideo">Artigas</option>
                                        <option value="Canelones">Canelones</option>
                                        <option value="Cerro Largo">Cerro Largo</option>
                                        <option value="Colonia">Colonia</option>
                                        <option value="Durazno">Durazno</option>
                                        <option value="Flores">Flores</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Lavalleja">Lavalleja</option>
                                        <option value="Maldonado">Maldonado</option>
                                        <option value="Paysandú">Paysandú</option>
                                        <option value="Río Negro">Río Negro</option>
                                        <option value="Rivera">Rivera</option>
                                        <option value="Rocha">Rocha</option>
                                        <option value="Salto">Salto</option>
                                        <option value="San José">San José</option>
                                        <option value="Soriano">Soriano</option>
                                        <option value="Tacuarembó">Tacuarembó</option>
                                        <option value="Treinta y Tres">Treinta y Tres</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Barrio
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="location" name="location" value="" placeholder="Ingrese barrio" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Dirección
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="address" name="address" value="<?= $customer->address ?>" placeholder="Ingrese dirección" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Código postal
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="zipcode" name="zipcode" value="" placeholder="Ingrese código postal" required>
                                </div>

                                <div class="col-md-12">
                                    <p><u class="underline-decoration text-uppercase" style="font-size:20px"><b>Envío</b></u></p>
                                    <ul class="list-unstyled mt-3">
                                        <?php foreach($shipping_methods as $index => $shipping_method) : ?>
                                            <li>
                                                <input
                                                    type="radio"
                                                    id="radio-shipping<?= $index + 1?>"
                                                    value="<?= $shipping_method->id ?>"
                                                    name="radio-shipping-method"
                                                    required
                                                    <?php if($shipping_method->id == 2) : ?>
                                                    checked="checked"
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363
                                                    <?php endif ?>
                                                >
                                                <label for="radio-shipping<?= $index + 1?>"><?= $shipping_method->name ?>.</label>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>

                                <!--<div class="container">
                                    <p><u class="underline-decoration text-uppercase" style="font-size:20px"><b>RUT</b></u></p>
                                    <div class="alert alert-dark mt-3" role="alert">
                                        Si tu compra va dirigida a nombre de una empresa completa los siguientes datos.
                                    </div>
                                </div>-->

                                <!--<form id="form-rut">
                                    <div class="col-md-6">
                                        <label>Razón social</label>
                                        <input type="text" id="company" name="company" value="" placeholder="Ingrese razón social">
                                    </div>
                                    <div class="col-md-6">
                                        <label>RUT</label>
                                        <input type="text" id="rut" name="rut" value="" placeholder="Ingrese RUT">
                                    </div>
                                </form>-->

                                    
                                <div class="col-md-12">
                                    <label>Nota</label>
                                    <textarea id="note" name="note" placeholder="Escribe por si quieres dejarnos alguna nota, es opcional."></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="order-review">
                                        <h5>Revisión del pedido</h5>
                                        <div class="review-box">
                                            <ul class="list-unstyled">
                                                <li>Producto <span>Precio</span></li>

                                                <?php foreach($_SESSION['cart'] as $index => $item) : ?>

                                                <li class="d-flex justify-content-between">
                                                    <div class="pro">
                                                        <img src="<?= URL_PATH ?><?= $item['product']->image ?>" alt="">
                                                        <p><?= $item['product']->name ?></p>
                                                        <span><?= $item['quantity'] ?> x <?= $item['product']->price_final ?></span>
                                                    </div>
                                                    <div class="prc">
                                                        <p>
                                                            <?= $app['SYMBOL'] ?>
                                                            <?= \app\helpers\Utils::moneyFormat(($item['product']->price_final * $item['quantity']), $app['SYMBOL']) ?>
                                                        </p>
                                                    </div>
                                                </li>
                                                <?php endforeach ?>

                                                <li>Subtotal <span class="ord-total"><?= $app['SYMBOL'] ?> <?=  \app\helpers\Utils::moneyFormat($sub_total) ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="pay-meth">
                                        <h5>Método de pago</h5>
                                        <div class="pay-box">
                                            <ul class="list-unstyled">

                                                <?php foreach($payment_methods as $index => $payment_method) : ?>
                                                <li>

                                                    <input
                                                        type="radio"
                                                        id="radio-payment<?= $index + 1?>"
                                                        name="radio-payment-type"
                                                        value="<?= $payment_method->id ?>"
                                                        <?php if($payment_method->id == 1) : ?>
                                                        checked="checked"
                                                        <?php endif ?>
                                                        required
                                                    >
                                                    <label for="radio-payment<?= $index + 1?>">
                                                        <span><i class="fa fa-circle"></i></span>
                                                        <?= $payment_method->name ?>
                                                    </label>
                                                    <p><?= $payment_method->description ?>.</p>
                                                </li>
                                                <?php endforeach ?>

                                                </ul>
                                            </div>
                                    </div>
                                    <button type="submit" id="btn-submit" name="button" class="ord-btn">Continuar</button>
                                    <p>Al finalizar tu compra aceptas nuestras <a href="<?= URL_PATH ?>/page/preguntas_frecuentes" class="text-primary" target="_blank">políticas de garantía</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- End Checkout -->

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

<!-- COUPON-APPLY -->
<script>
    // btn-submit-add
    $('#form-coupon').submit(function(e){

        const postData = {
            code: $('#code').val()
        };

        console.log(postData);

        $.post(URL_PATH + '/checkout/coupon', postData, function(r) {
			console.log(r);
			switch (r) {
                case 'error':
                            
                    Swal.fire({
                        icon: 'error',
                        title: 'Atención!',
                        text: 'Se produjo un error, vuelva a ingresar su código.',
                        showConfirmButton: false,
                        timer: 4000
                    });

                    break;


                case 'not_exists':
                            
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención',
                        text: 'El cupón ingresado no existe.',
                        showConfirmButton: false,
                        timer: 3500
                    });
                            
                    break;


                case 'expired':
                            
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención',
                        text: 'El cupón ingresado ha expirado.',
                        showConfirmButton: false,
                        timer: 3500
                    });
                            
                    break;

                case 'limit_exceeded':
                            
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: 'Parece que el cupón ha superado el límite de usos, lo sentimos mucho!'
                    });
                                    
                    break;
                    
                default:
                    var coupon = JSON.parse(r);
                    console.log(coupon)

                    Swal.fire({
                        icon: 'success',
                        title: 'Cupón válido',
                        html: '<strong>' + coupon.description + '</strong>' + '<br>Continúa al siguiente paso para poder aplicar el cupón.',
                    });

                    $('#coupon_code').val(coupon.code);

                    break;
            }
		
		});


        e.preventDefault();
    });
</script>


<script>

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
