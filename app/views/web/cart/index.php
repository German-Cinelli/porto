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
            <div class="step">
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

        


        <!-- Shopping Cart -->
<<<<<<< HEAD
        <div role="main" class="main shop pb-4">

				<div class="container">
					<div class="row pb-4 mb-5">
						<div class="col-lg-8 mb-5 mb-lg-0">
							<form method="post" action="">
								<div class="table-responsive">
									<table class="shop_table cart">
										<thead>
											<tr class="text-color-dark">
												<th class="product-thumbnail" width="15%">
													&nbsp;
												</th>
												<th class="product-name text-uppercase" width="30%">
													Producto
												</th>
												<th class="product-price text-uppercase" width="15%">
													Precio
												</th>
												<th class="product-quantity text-uppercase" width="20%">
													Cantidad
												</th>
												<th class="product-subtotal text-uppercase text-right" width="20%">
													Monto
												</th>
											</tr>
										</thead>
										<tbody>

                                            <?php foreach($_SESSION['cart'] as $index => $item) : ?>
                                            
                                            <tr class="cart_table_item">
												<td class="product-thumbnail">
													<div class="product-thumbnail-wrapper">
														<a href="<?= URL_PATH ?>/cart/remove/<?= $index ?>" class="product-thumbnail-remove" title="Remove Product">
															<i class="fas fa-times"></i>
														</a>
                                                        
                                                        <?php if($item['product']->id == 60) : ?>
														<a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>" class="product-thumbnail-image" title="Photo Camera">
															<img width="90" height="90" alt="" class="img-fluid" src="<?= URL_PATH ?><?= \app\helpers\Utils::getCanasta_imagen($_SESSION['login']->id) ?>">
														</a>
                                                        <?php else : ?>
                                                        <a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>" class="product-thumbnail-image" title="Photo Camera">
															<img width="90" height="90" alt="" class="img-fluid" src="<?= URL_PATH ?><?= $item['product']->image ?>">
														</a>
                                                        <?php endif ?>
                                                        
													</div>
												</td>
												<td class="product-name">
													<a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>" class="font-weight-bold text-color-dark text-color-hover-primary text-decoration-none"><?= $item['product']->name ?></a>
<<<<<<< HEAD
                                                    <?php if($item['product']->product_type_id == 21) : ?>
                                                        <?php foreach(\app\helpers\Utils::getProduct_canasta($_SESSION['login']->id) as $itm) : ?>
                                                            <br>
                                                            <img width="32" height="32" alt="" class="img-fluid" src="<?= URL_PATH ?><?= $itm->product->image ?>">
                                                            <?= $itm->product->name ?>
                                                        <?php endforeach ?>
=======
                                                    <br>
                                                    <?php if($item['product']->category_id == 7) : ?>
                                                        <?php $products_combo = \app\helpers\Utils::getProducts_combo($_SESSION['login']->id) ?>

                                                        <?php foreach($products_combo as $p) : ?>
                                                            <span style="font-size: 12px">
                                                                <i class="fa fa-angle-right"></i>
                                                                <?= $p->product->name ?>
                                                            </span>
                                                            <br>
                                                        <?php endforeach ?>

>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                                                    <?php endif ?>
                                                </td>
												<td class="product-price">
													<span class="amount font-weight-medium text-color-grey">
                                                        <?= $app['SYMBOL']; ?>
                                                        <?= \app\helpers\Utils::moneyFormat($item['product']->price_final) ?>
                                                    </span>
												</td>
												<td class="product-quantity">
													<div class="quantity float-none m-0">
														<input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary btn-quantity-minus" value="-" data-index="<?= $index ?>" data-product-id="<?= $item['product']->id ?>" data-quantity="<?= $item['quantity'] ?>">
														<input type="text" class="input-text qty text" title="Qty" value="<?= $item['quantity'] ?>" name="quantity" min="1" step="1" max="20" readonly>
														<input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary btn-quantity-plus" value="+" data-index="<?= $index ?>" data-product-id="<?= $item['product']->id ?>" data-quantity="<?= $item['quantity'] ?>">
													</div>
												</td>
												<td class="product-subtotal text-right">
													<span class="amount text-color-dark font-weight-bold text-4">
                                                        <?= $app['SYMBOL']; ?>
                                                        <?= \app\helpers\Utils::moneyFormat($item['product']->price_final * $item['quantity']) ?>
                                                    </span>
												</td>
											</tr>

                                            <?php endforeach ?>

										</tbody>
									</table>
                                    
								</div>
							</form>
						</div>
						<div class="col-lg-4">
							<div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
								<div class="card-body">
									<h4 class="font-weight-bold text-uppercase text-4 mb-3">Resumen</h4>
									<table class="shop_table cart-totals mb-4">
										<tbody>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Subtotal</strong>
												</td>
												<td class="border-top-0 text-right">
													<strong>
                                                        <span class="amount font-weight-medium">
                                                            <?= $app['SYMBOL']; ?>
                                                            <?= \app\helpers\Utils::moneyFormat($sub_total, $app['SYMBOL']) ?>
                                                        </span>
                                                    </strong>
												</td>
											</tr>
=======
        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="t-pro">Producto</th>
                                        <th class="t-price">Precio unitario</th>
                                        <th class="t-qty">Cantidad</th>
                                        <th class="t-total">Precio</th>
                                        <th class="t-rem"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php foreach($_SESSION['cart'] as $index => $item) : ?>
                                    <tr>
                                    
                                        <td class="t-pro d-flex">
                                            <div class="t-img">
                                                <a href=""><img width="100px" src="<?= URL_PATH ?><?= $item['product']->image ?>" alt=""></a>
                                            </div>
                                            <div class="t-content">
                                                <p class="t-heading"><a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>"><?= $item['product']->name ?></a></p>
                                                <br>
                                                <ul class="list-unstyled col-sz">
                                                    <li><p>Marca : 
                                                        <?php if($item['product']->brand) : ?>
                                                            <span><?= $item['product']->brand ?></span>
                                                        <?php else : ?>
                                                            <span>Sin especificar</span>
                                                        <?php endif ?>
                                                        
                                                    </p></li>
                                                    <li><p>Categoría : <span><?= $item['product']->category->name ?></span></p></li>
                                                </ul>
                                            </div>
                                        </td>
                                        
                                        <td class="t-price">
                                            <p class="lead">
                                                <?= $app['SYMBOL'] ?>
                                                <?= \app\helpers\Utils::moneyFormat($item['product']->price_final, $app['SYMBOL']) ?> <small>c/u</small>
                                            </p>
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363
                                            
                                            <?php if($item['product']->offer > 0) : ?>
                                                <p class="text-muted">
                                                    <?= $app['SYMBOL'] ?>
                                                    <del><?= \app\helpers\Utils::moneyFormat($item['product']->price, $app['SYMBOL']) ?></del>
                                                </p>
                                            <?php endif ?>
                                        </td>
                                           
                                       
                                        <td class="t-qty">
                                            <div class="qty-box">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus btn-quantity-minus" data-index="<?= $index ?>" data-product-id="<?= $item['product']->id ?>" data-quantity="<?= $item['quantity'] ?>">
                                                    <input type="number" step="1" min="1" max="20" value="<?= $item['quantity'] ?>" class="qty text" size="4" readonly>
                                                    <input type="button" value="+" class="plus btn-quantity-plus" data-index="<?= $index ?>" data-product-id="<?= $item['product']->id ?>" data-quantity="<?= $item['quantity'] ?>">
                                                </div>
                                            </div>
                                        </td>

                                        <td class="t-total">
                                            <?= $app['SYMBOL'] ?>
                                            <?= \app\helpers\Utils::moneyFormat(($item['product']->price_final * $item['quantity']), $app['SYMBOL']) ?>
                                        </td>

                                        <td class="t-rem"><a href="<?= URL_PATH ?>/cart/remove/<?= $index ?>"><i class="fa fa-trash-o"></i></a></td>
                                    
                                    </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="crt-sumry">
                            <h5>Resumen de su compra</h5>
                            <ul class="list-unstyled">
                                <li>Subtotal 
                                    <span>
                                        <?= $app['SYMBOL']; ?>
                                        <?= \app\helpers\Utils::moneyFormat($sub_total, $app['SYMBOL']) ?>
                                    </span>
                                </li>
                            </ul>
                            <div class="cart-btns text-right">

                                <?php if(isset($_SESSION['login'])) : ?>

                                    <?php if(\app\helpers\Utils::orderPending() == TRUE) : ?>

                                        <div class="alert alert-primary" role="alert">
                                            <i class="fa fa-warning"></i>
                                            Tienes un pedido pendiente! 
                                            Puedes <a href="<?= URL_PATH ?>/checkout/summary" class="alert-link">continuarlo</a> ó <a href="<?= URL_PATH ?>/checkout/cancel_order" class="alert-link">cancelarlo</a>.
                                        </div>      

                                    <?php else : ?>

                                        <a href="<?= URL_PATH ?>/product">
                                            <button type="button" class="btn btn-outline-dark">Seguir viendo</button>
                                        </a>

                                        <a href="<?= URL_PATH ?>/checkout">
                                            <button type="button" id="pay" class="chq-out"> Continuar</button>
                                        </a>

                                    <?php endif ?>

                                <?php else : ?>
                                    <br>
                                    Para comprar es necesario que <a href="<?= URL_PATH ?>/auth" class="text-primary">inicie sesión</a>.
                                <?php endif ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shopping Cart -->

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
                                Para hacerlo dirigete a nuestro <a class="text-primary" href="<?= URL_PATH ?>/product">catálogo</a>
                            </span>
                            
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