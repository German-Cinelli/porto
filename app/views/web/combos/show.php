        <!-- MODAL REPLY -->
        <?php include('app/views/web/products/modal-reply.php') ?>
        
        <!-- simple-lightbox -->
        <link rel="stylesheet" href="<?= URL_PATH ?>/library/simple-lightbox/dist/simple-lightbox.min.css">

        <style>
            .fc-color-picker {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .fc-color-picker > li {
                float: left;
                font-size: 30px;
                margin-right: 5px;
                line-height: 30px;
            }
            .fc-color-picker > li .fa {
                -webkit-transition: -webkit-transform linear 0.3s;
                -moz-transition: -moz-transform linear 0.3s;
                -o-transition: -o-transform linear 0.3s;
                transition: transform linear 0.3s;
            }
            .fc-color-picker > li .fa:hover {
                -webkit-transform: rotate(30deg);
                -ms-transform: rotate(30deg);
                -o-transform: rotate(30deg);
                transform: rotate(30deg);
            }
        </style>

        <style>
            /* HIDE RADIO */
            [type=radio] { 
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* IMAGE STYLES */
            [type=radio] + img {
                cursor: pointer;
            }

            /* CHECKED STYLES */
            [type=radio]:checked + img {
                outline: 10px solid #E74C3C;
            }
        </style>

<div role="main" class="main shop pt-4">

    <div class="container">
        
        <div class="row">
            <div class="col">
                <ul class="breadcrumb breadcrumb-style-2 d-block text-4 mb-4">
                    <li><a href="<?= URL_PATH ?>" class="text-color-default text-color-hover-primary text-decoration-none">Inicio</a></li>
                    <li><a href="<?= URL_PATH ?>/combos" class="text-color-default text-color-hover-primary text-decoration-none">Canastas</a></li>
                    <li>Ver canasta</li>
                </ul>
            </div>
        </div>

        <input id="qty_of_items" type="hidden" value="<?= count($combo->combos_items) ?>">

        <div id="choose" class="row">
			<div class="col">
				<hr class="solid my-5">
				<h1 class="text-center">
                    <span class="inverted px-5"><?= $combo->name ?></span>
                </h1>
                <p class="text-center lead"><?= $combo->description ?></p>
                <p class="text-primary">Precio: 
                    <?= $app['SYMBOL'] ?>
                    <?= \app\helpers\Utils::moneyFormat($combo->price) ?>
                </p>

                <div class="alert alert-tertiary">
					<strong></strong>El botón para <strong>continuar</strong> se encuentra en la parte inferior, presiónalo luego de escoger tus productos.
				</div>

			</div>
		</div>


		<div class="row">
        
			<div class="col">

                
				<div class="tabs tabs-bottom tabs-center tabs-simple">
					<ul class="nav nav-tabs">

                        <?php foreach($combo->combos_items as $index => $item) : ?>
						<li class="nav-item <?php if($index == 0){ echo 'active'; } ?>">
							<a class="nav-link" href="#tab<?= $index+1 ?>" data-toggle="tab">
								<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
									<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
										<span class="box-content p-0 m-0">
											<i id="icon_<?= $index+1 ?>" class="icon-featured fas fa-expand"></i>
										</span>
									</span>
								</span>									
								<p class="mb-0 pb-0"><?= $item->product_type_attribute_value->product_type->name ?></p>
                                <?= ++$index ?>
							</a>
						</li>
                        <?php endforeach ?>

					</ul>
					<div class="tab-content">

                        <?php foreach($combo->combos_items as $index => $item) : ?>
						<div class="tab-pane <?php if($index == 0){ echo 'active'; } ?>" id="tab<?= $index+1 ?>">
							<div class="">
								<h4>Seleccione unidad</h4>
                                
                                <?php $p_av = \app\models\ProductAttributeValue::where('attribute_value_id', $item->product_type_attribute_value->attribute_value_id)->get(); ?>

                                <div id="color-chooser-<?= $i + 1 ?>" class="row">

                                    <?php foreach($p_av as $i) : ?>

                                    <?php if($i->product->product_type_id === $item->product_type_attribute_value->product_type_id) : ?>
                                    
                                    <div class="col-sm-6 col-lg-3">
                                        <label>
                                            <input type="radio" name="radio_<?= $index + 1?>" value="<?= $i->product->id ?>" required>
                                            <img class="img-fluid" style="border: 1px solid black" src="<?= URL_PATH ?><?= $i->product->image ?>" class="img-sm">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h3 class="text-3-4 mt-3 font-weight-normal font-alternative text-transform-none line-height-3 mb-0">
                                                    <span class="d-block text-decoration-none text-color-default line-height-1 text-0 mb-1"><?= $i->product->description ?></span>
                                                        <label class="text-color-dark text-color-hover-primary">
                                                            <?= $i->product->name ?>
                                                        </label>
                                                    </h3>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <?php endif ?>
                                    
                                    <?php endforeach ?>
                                    <?php //$attribute_values = \app\models\AttributeValue::where('id', $item->product_type_attribute_value->attribute_value_id)->first();d($attribute_values->products); ?>

                                </div><!-- ./row -->
                               
						
                                
                            </div>
						</div>
                        <?php endforeach ?>

					</div>
				</div>
			</div>
		</div>

        <?php if(isset($_SESSION['login'])) : ?>

        <form id="form-canasta">

            <div class="row">
                <div class="col">
                    <hr class="solid my-5">
                    <input type="hidden" id="combo_id" value="<?= $combo->id ?>">
                    <button type="submit" class="btn btn-outline btn-rounded btn-primary  btn-with-arrow mb-2">Continuar<span><i class="fas fa-chevron-right"></i></span></button>
                </div>
            </div>

        </form>
														
		<?php else : ?>

            <div class="row">
                <div class="col">
                    <div class="alert alert-secondary">
                        Debes <a class="text-white" href="<?= URL_PATH ?>/auth"><strong>iniciar sesión</strong></a> para poder continuar eligiendo tus productos.
                    </div>
                </div>
            </div>

        <?php endif ?>

        

    </div>

</div>


<script>
    var qty = $('#qty_of_items').val();
    
    for (let i = 1; i <= qty; i++) {
        $('input[type=radio][name=radio_' + i + ']').change(function() {
            if($(this).is(':checked')){
                $('#icon_' + i).removeClass('fa-expand');
                $('#icon_' + i).addClass('fa-check text-success');
            }
        });
    }
</script>


<script>
    // btn-submit-add
    $('#form-canasta').submit(function(e){
        //console.log(qty);

        var combo_id = $('#combo_id').val();
        var items = [];

        for (let i = 1; i <= qty; i++) {
            if($('input[type=radio][name=radio_' + i + ']:checked').val() != undefined){
                items.push($('input[type=radio][name=radio_' + i + ']:checked').val());
            }
        }

        const postData = {
            combo_id: combo_id,
            items: items
        };

        if(parseInt(qty) == parseInt(postData.items.length)){

            console.log(postData);
           
            $.post(URL_PATH + '/combo/check_chosen_products', postData, function(r){
                console.log(r);
                switch (r) {
                    case 'is_already_in_the_cart':
                        /* Alert-warning */
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención!',
                            text: 'Ya tienes una canasta en tu carrito.',
                            footer: `<a href="${URL_PATH}/cart">Ver carrito</a>`
                        });
                        
                        break;

                    case 'ok':
<<<<<<< HEAD
                        /* Alert-success */
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto!',
                            text: 'Canasta añadida al carrito.'
=======
                        /* Alert-warning */
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto!',
                            text: 'La canasta se añadió a tu carrito.',
                            footer: `<a href="${URL_PATH}/cart">Ver carrito</a>`
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                        });
                        
                        break;

                    case 'error':

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Atención!',
<<<<<<< HEAD
                            text: 'Ocurrió un error, por favor recargue la página para intentarlo nuevamente.',
=======
                            text: 'Ocurrió un error, por favor recargue la página e intentelo nuevamente.',
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                            showConfirmButton: false,
                            timer: 4000
                        });
                
                    default:
                        break;
                }
                        
            });
            
        } else {

            window.location.href = '#choose'; 

            /* Alert-warning */
            Swal.fire({
                icon: 'warning',
                title: 'Atención!',
                text: 'Faltan seleccionar productos.',
                showConfirmButton: false,
                timer: 4000
            });

            
        }

        e.preventDefault();
    });
</script>