<?php $app = \app\helpers\Utils::getConfig(); ?>
<?php Carbon\Carbon::setLocale('es') ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $app['COMPANY_NAME'] ?> | <?= $title ?></title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= URL_PATH ?>/assets/dist/your_logo.png" type="image/x-icon" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/bootstrap.min.css" type="text/css">

	<!-- Fontawesome Icon -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/font-awesome.min.css" type="text/css">

	<!-- Animate Css -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/animate.css" type="text/css">

	<!-- Owl Slider -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/owl.carousel.min.css" type="text/css">

	<!-- Custom Style -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/normalize.css" type="text/css">
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/style.css" type="text/css">
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/ecommerce-template/css/assets/responsive.css" type="text/css">
	
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/dist/css/popup-style.css">
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/dist/css/bootnavbar.css" type="text/css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= URL_PATH ?>/library/sweetalert2/dist/sweetalert2.min.css"></link>
	
</head>
<body class="alternative-font-4">

	<div class="body">

		<!-- jQuery JS -->
		<script src="<?= URL_PATH ?>/assets/e/vendor/jquery/jquery.min.js"></script>

		<?php  if(isset($verified_user)) : ?>
			<input id="verified_user" type="hidden" value="1">
		<?php endif ?>
		<?php  if(isset($token_expired)) : ?>
			<input id="token_expired" type="hidden" value="1">
		<?php endif ?>
		
		<input type="hidden" id="url_path" value="<?= URL_PATH ?>">

		<!-- NAVBAR -->
		<?php include('app/views/web/layouts/navbar.php') ?>

		<!-- HEADER -->
		<?php include('app/views/web/layouts/header.php') ?>

		<!-- ASIDE -->
		<?php //include('app/views/web/layouts/aside.php') ?>

		
		<!--------------------------
			| Your Page Content Here |
			-------------------------->
		
		<?php 
			if(isset($include)){
				include($include); 
			}
		?>


		<!-- FOOTER -->
		<?php include('app/views/web/layouts/footer.php') ?>


	</div><!-- body -->




		
	<!-- Bootstrap -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/popper.min.js"></script>
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/bootstrap.min.js"></script>

	<!-- Owl Slider -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/owl.carousel.min.js"></script>

	<!-- Wow Animation -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/wow.min.js"></script>

	<!-- Price Filter -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/price-filter.js"></script>

	<!-- Mean Menu -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/assets/jquery.meanmenu.min.js"></script>

	<!-- Custom JS -->
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/plugins.js"></script>
	<script src="<?= URL_PATH ?>/assets/ecommerce-template/js/custom.js"></script>


	<script src="<?= URL_PATH ?>/assets/dist/js/bootnavbar.js"></script>
	<script>
        $(function () {
            $('#main_navbar').bootnavbar();
        })
    </script>

	<script src="<?= URL_PATH ?>/assets/dist/js/ir_arriba.js"></script>
    <script src="<?= URL_PATH ?>/assets/dist/js/popup.js"></script>

	<script src="<?= URL_PATH ?>/assets/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>


	<!-- SweetAlert2 -->
	<script src="<?= URL_PATH ?>/library/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<!-- iCheck -->
	<script src="<?= URL_PATH ?>/assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>


	<script>
		const URL_PATH = $('#url_path').val();
	</script>

	<!-- iCheck -->
	<!--<script>
		$(function () {
			//Enable iCheck plugin for checkboxes
			//iCheck for checkbox and radio inputs
			$('.mailbox-messages input[type="checkbox"]').iCheck({
			checkboxClass: 'icheckbox_flat-blue',
			radioClass: 'iradio_flat-blue'
			});

			//Enable check and uncheck all functionality
			$(".checkbox-toggle").click(function () {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
				$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
			} else {
				//Check all checkboxes
				$(".mailbox-messages input[type='checkbox']").iCheck("check");
				$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
			}
			$(this).data("clicks", !clicks);
			

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
				})
				//Red color scheme for iCheck
				$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass   : 'iradio_minimal-red'
				})
				//Flat red color scheme for iCheck
				$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass   : 'iradio_flat-green'
				})

			});
		});
	</script>-->

	<!-- BTN-FAVORITE -->
	<script>
		$('.btn-favorite-add').on('click', function (e) {
			
        	var product_id = $(this).attr("data-product-id");

			const postData = {
                product_id: product_id
            };

            //console.log(postData);
                

            $.post(URL_PATH + '/favorite/add', postData, function(r) {
                //console.log(r);
                switch (r) {
                    case 'saved':

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Listo!',
							title: 'El producto ha sido añadido a tu lista de favoritos.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                            
                        break;

                    case 'not_logged':

                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Atención!',
                            text: 'Debes iniciar sesión para poder añadir productos a la lista de favoritos.',
                            footer: `<a href="${URL_PATH}/auth" class="text-primary">Clic aquí para hacerlo</a>`,
                            showConfirmButton: false
                        });
                            
                        break;

					case 'already_exists':

                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Atención!',
                            text: 'El producto ya se encuentra en tu lista de favoritos.',
                            footer: `<a href="${URL_PATH}/favorite" class="text-primary">Ver mis productos favoritos</a>`,
                            showConfirmButton: false
                        });
                            
                        break;

                    case 'error':

                        Swal.fire({
                            icon: 'error',
                            title: 'Algo salió mal!',
                            text: 'Recargue la página e inténtelo nuevamente.'
                        });
                            
                        break;
                    
                    default:

                        Swal.fire({
                            icon: 'error',
                            title: 'Algo salió mal!',
                            text: 'Recargue la página e inténtelo nuevamente.'
                        });

                        break;
                }
                    
            });

            e.preventDefault();
        });
	</script>


	<!-- BTN-ADD-TO-CART -->
	<script>
		$('.btn-cart-add').on('click', function (e) {
			
        	var product_id = $(this).attr("data-product-id");
			var quantity = 1;

			if($("#quantity").val() == undefined){
				quantity = 1;
			} else {
				quantity = $("#quantity").val();
			}

			const postData = {
                product_id: product_id,
				quantity: quantity
            };

            //console.log(postData);

			if(postData.quantity < 0){
				Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal!',
                    text: 'Recargue la página e inténtelo nuevamente.'
                });
			} else {

				$.post(URL_PATH + '/cart/add', postData, function(r) {
					//console.log(JSON.parse(r));

					switch (r) {
						case 'out_of_stock':
							Swal.fire({
								icon: 'warning',
								title: 'Atención',
								text: 'No tenemos stock de éste producto.',
							});
							break;

						case 'is_already_in_the_cart':
							Swal.fire({
								icon: 'warning',
								title: 'Atención',
								text: 'Ya se encuentra en tu carrito.',
							});
							break;
						case 'error':
							Swal.fire({
								icon: 'error',
								title: 'Algo salió mal',
								text: 'Por favor recargue la página e inténtelo nuevamente.',
							});
							break;
						case 'insufficient_stock':
							Swal.fire({
								icon: 'warning',
								title: 'Atención',
								text: 'El stock disponible para éste producto es menor a la cantidad que deseas. Por favor seleccione una menor cantidad',
							});
							break;
					
						default:
							var object = JSON.parse(r);
							//console.log(object);
							var lastElement = object.slice(-1)[0];
							var lastIndex = (object.length - 1);
							//console.log(lastElement.product.name);
							var count = Object.keys(object).length;
							Swal.fire({
								position: 'center',
								icon: 'success',
								title: 'Producto añadido al carrito!',
								footer: `<a href="${URL_PATH}/cart" class="text-primary">Ver carrito</a>`,
								showConfirmButton: false,
								timer: 2500
							});  

							$('.notify').html('').html(count);

							var cart_item = document.querySelector('#cart-item');

							cart_item.innerHTML = `
								<li class="item">
									<a href="${URL_PATH}/product/show/${lastElement.product.slug}" title="${lastElement.product.name}" class="product-image"><img src="${URL_PATH}${lastElement.product.image}"></a>
									<div class="product-details">
										<p class="product-name">
											<a href="${URL_PATH}/product/show/${lastElement.product.slug}">${lastElement.product.name} </a>
										</p>
										<p class="qty-price">
											1 x ${lastElement.product.price_final} <small>c/u</small>
										</p>
										<a href="${URL_PATH}/cart/remove/${lastIndex}" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
									</div>
								</li>
							`;
							break;
					}
		
				});

			}
            
            e.preventDefault();
        });
	</script>

</body>
</html>
