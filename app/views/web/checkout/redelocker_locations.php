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


<div class="container mt-5 mb-5">

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
</div>


    <?php if($locations) : ?>
    <div class="container">
        <h2>Has escogido retirar tus productos en una sucursal <span class="text-secondary">Redelocker</span>.</h2>
    </div>
    <!-- SELECT-LOCKER -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                        <div class="card-body">
                            <h3>Seleccione ubicación del Locker <span class="text-danger">(*)</span></h3>

                            <form action="<?= URL_PATH ?>/checkout/redelocker_location" method="POST">

                                <div class="container mb-3">
                                    <select class="form-control border-radius-0 h-auto py-2" name="location" required>
                                        <?php foreach($locations as $location) : ?>
                                        <option value="<?= $location->idUbicacion ?>"><?= $location->calle ?> <?= $location->numero ?></option>
                                        <?php endforeach ?>           
                                    </select>
                                </div>

                                <div class="container">
                                    <div class="row">  
                                        <button type="submit" class="btn btn-outline btn-rounded btn-primary btn-with-arrow mb-2 ml-auto" href="#">
                                            Continuar
                                            <span><i class="fas fa-chevron-right"></i></span>
                                        </button>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php else :  ?>
        <div class="container">
            <div class="alert alert-secondary">
                <h2 class="text-white">
                    <strong><i class="fas fa-exclamation-triangle"></i>
                        Atención!
                    </strong>
                    Hubo un error al cargar las ubicaciones de los Lockers. Dirígete a <a href="<?= URL_PATH ?>/cart" class="alert-link">mi carrito</a> para intentarlo nuevamente.
                    <br>
                    Si el problema persiste <a href="<?= URL_PATH ?>/page/contact" class="alert-link">comunicate con nosotros</a>.
                </h2>
            </div>
        </div>
    <?php endif ?>

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