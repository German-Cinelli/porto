<<<<<<< HEAD
        <?php $products_in_slider = \app\helpers\Utils::productsInSlider() ?>


        <?php if(count($products_in_slider) > 0) : ?>
            
        <section class="section mt-5 mb-3 border-0">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-lg-7">
								
						<div class="owl-carousel owl-theme nav-inside" data-plugin-options="{'delay': 500, 'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': true}">
							
                            <?php for($i = 0 ; $i < $products_in_slider->count() ; $i++) : ?>
                            <div class="text-center">

                                <div class="row">
                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <span class="text-color-primary"><?= $products_in_slider[$i]->title ?></span>
                                        <h2 class="font-weight-semibold text-10"><?= $products_in_slider[$i]->product->name ?></h2>
                                        <p class="lead lead-2 mb-0"><?= $products_in_slider[$i]->description ?></p>
                                        <div class="container">
                                            <a type="button" class="btn btn-outline btn-sm btn-rounded btn-secondary btn-with-arrow mt-5 mb-1" href="<?= URL_PATH ?>/product/show/<?= $products_in_slider[$i]->product->slug ?>">
                                                Más información
                                                <span>
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div><!-- ./col-5 -->
                                            
                                        
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <img src="<?= URL_PATH ?><?= $products_in_slider[$i]->product->image ?>" width="200px" class="img-fluid" alt="" />
                                    </div><!-- ./col-7 -->

                                    

                                </div><!-- ./row -->

                            </div><!-- ./text-center -->
                            <?php endfor ?>

                            <div class="text-center">
                                

                                <div class="row">
                                        
                                    <div class="col-lg-7 col-md-6 col-sm-12">
                                        <span class="text-color-primary"></span>
                                        <h2 class="font-weight-semibold text-10"><?= $blog->title ?></h2>
                                        <p class="lead lead-2 mb-0"><?= $blog->description ?></p>
                                        <a type="button" class="btn btn-outline btn-rounded btn-secondary  btn-with-arrow mt-5" href="<?= URL_PATH ?>/blog/show/<?= $blog->slug ?>">
                                            Más información
                                            <span>
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div><!-- ./col-5 -->
                                            
                                        
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <img src="<?= URL_PATH ?><?= $blog->image ?>" width="200px" class="img-fluid" alt="" />
                                    </div><!-- ./col-7 -->

                                </div><!-- ./row -->

                            </div><!-- ./text-center -->

						</div><!-- ./owl-carousel -->

					</div>
				</div>
			</div>
		</section>

        <?php endif ?>


        <div role="main" class="main shop pt-4">

			<div class="container">

                <h2 class="text-primary text-center">
                    <i class="fa fa-star text-warning"></i>
                        LO MÁS DESTACADO
                    <i class="fa fa-star text-warning"></i>
                </h2>

				<div class="masonry-loader masonry-loader-showing">
					<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

                        <?php foreach($featured_products as $product) : ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="product mb-0">
                                    <div class="product-thumb-info border-0 mb-3">

                                        <div class="product-thumb-info-badges-wrapper">
                                            <?php if(\app\helpers\Utils::productIsNew($product->created_at) == true) :?>
                                            <span class="badge badge-ecommerce badge-success">NUEVO</span>
                                            <?php endif ?>

                                            <?php if($product->offer > 0) : ?>
                                            <span class="badge badge-ecommerce badge-danger">- <?= $product->offer ?>%</span>
                                            <?php endif ?>
                                        </div>

                                        <div class="addtocart-btn-wrapper">
                                            <a href="#" class="btn-cart-add text-decoration-none addtocart-btn" data-product-id="<?= $product->id ?>" data-tooltip data-original-title="Añadir al carrito">
                                                <i class="icons icon-bag"></i>
                                            </a>
                                        </div>
                                            
                                        <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>">
                                            <div class="product-thumb-info-image product-thumb-info-image-effect">
                                                <img alt="" class="img-fluid" src="<?= URL_PATH ?><?= $product->image ?>">

                                                    <?php if(isset($product->images[1])) : ?>
                                                        <img alt="" class="img-fluid" src="<?= URL_PATH ?><?= $product->images[1]->path ?>">
                                                    <?php else : ?>
                                                        <img alt="" class="img-fluid" src="<?= URL_PATH ?><?= $product->images[0]->path ?>">
                                                    <?php endif ?>

                                            </div>
                                        </a>
=======
<?php $products_in_slider = \app\helpers\Utils::productsInSlider() ?>

<?php if(count($products_in_slider) > 0) : ?>

<!-- Slider Area 2 -->
<section class="slider-area2">
    <div class="slider-wrapper owl-carousel">

    <?php for($i = 0 ; $i < $products_in_slider->count() ; $i++) : ?>
        <div class="slider-item slider1">
            <div class="slider-table">
                <div class="slider-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-0">
                                <div class="img1 wow fadeInRight effect" data-wow-duration="1s" data-wow-delay="0s">
                                    <img src="<?= URL_PATH ?><?= $products_in_slider[$i]->product->image ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="slider-box">
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                        <h4><?= $products_in_slider[$i]->title ?></h4>
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.6s">
                                        <h1><?= $products_in_slider[$i]->product->name ?></h1>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.7s">
                                        <p><?= $products_in_slider[$i]->description ?></p>
                                    </div>
                                    <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.8s">
                                        <a href="<?= URL_PATH ?>/product/show/<?= $products_in_slider[$i]->product->slug ?>">Ver producto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor ?>

    </div>
</section>
<!-- End Slider Area 2 -->

<?php endif ?>

<!-- Service Area -->
<!--<section class="service-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="service-box d-flex">
                    <div class="sr-img">
                        <img src="?= URL_PATH ?>/assets/ecommerce-template/images/service-1.png" alt="">
                    </div>
                    <div class="">
                        <h6>Free Shipping</h6>
                        <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box d-flex">
                    <div class="sr-img">
                        <img src="?= URL_PATH ?>/assets/ecommerce-template/images/service-2.png" alt="">
                    </div>
                    <div class="">
                        <h6>Money Back Guarantee</h6>
                        <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box d-flex">
                    <div class="sr-img">
                        <img src="?= URL_PATH ?>/assets/ecommerce-template/images/service-3.png" alt="">
                    </div>
                    <div class="">
                        <h6>Secure Payment</h6>
                        <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- End Service Area -->

<!-- Full Banner -->
<section class="f-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="f-bnr-img">
                    <a href="<?= URL_PATH ?>/product/equipos_gamer"><img src="<?= URL_PATH ?>/assets/dist/images/banner-1.jpg" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="f-bnr-img">
                    <a href="<?= URL_PATH ?>/product/equipos_gamer"><img src="<?= URL_PATH ?>/assets/dist/images/banner-2.jpg" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Full Banner -->

<!-- Product Area-->
<section class="product-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Más vendidos -->
                        <?php include('app/views/web/layouts/products/most-selling-products.php') ?>
                    </div>

                    <!-- Destacados -->
                    <div class="col-md-12">
                        <?php include('app/views/web/layouts/products/featured-products.php') ?>
                    </div>

                    <div class="col-md-12">
                        <!-- Le podrá interesar -->
                        <?php include('app/views/web/layouts/products/interest-products.php') ?>
                    </div>

                    <div class="col-md-12">
                        <div class="nw-ltr">
                            <div class="sec-title">
                                <h6>Newsletter</h6>
                            </div>
                            <div class="nw-box">
                                <p>Suscribirse para recibir nuestras últimas noticias, ofertas y promociones.</p>
                                <form id="form-newsletter" class="nw-form" action="#">
                                    <input type="email" id="newsletter-input" name="email" placeholder="Ingrese su correo..." required>
                                    <button type="submit" name="button">Suscribirme</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-md-12 padding-fix-l20">
                        <div class="ftr-product">
                            <div class="tab-box d-flex justify-content-between">
                                <div class="sec-title">
                                    <h5>Nuestros productos</h5>
                                </div>
                                <!-- Nav tabs -->
                                <!--<ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#all">Todos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#elec">Electronics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#smart">Smartphones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#shoe">Shoes</a>
                                    </li>
                                </ul>-->
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <div class="tab-slider owl-carousel">

                                        <?php foreach($products as $product) : ?>
                                            
                                        <div class="tab-item">
                                            <div class="tab-heading">
                                                <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                            </div>
                                            <div class="tab-img">
                                                
                                                    <img class="main-img img-fluid" src="<?= URL_PATH ?><?= $product->image ?>" alt="">
                                                    <?php if(count($product->images) > 0) : ?>
                                                        <img class="sec-img img-fluid" src="<?= URL_PATH ?><?= $product->images[0]->path ?>" alt="">
                                                    <?php endif ?>
                                                    
                                                    <?php if($product->offer > 0) : ?>
                                                        <span class="sale">- <?= $product->offer ?>%</span>
                                                    <?php endif ?>
                                                    <div class="layer-box">
                                                        <div class="add-favorite">
                                                            <input type="hidden" value="<?= $product->id ?>">
                                                            <a href="#" class="it-fav btn-favorite-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="left" title="Me gusta"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-fav.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="img-content d-flex justify-content-between">
                                                <div>
                                                    <ul class="list-unstyled list-inline price">
                                                        <li class="list-inline-item text-danger">
                                                            <?= $app['SYMBOL'] ?>
                                                            <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                                                        </li>
                                                        <?php if($product->offer > 0) : ?>
                                                        <li class="list-inline-item">
                                                            <?= $app['SYMBOL'] ?>
                                                            <?= \app\helpers\Utils::moneyFormat($product->price) ?>
                                                        </li>
                                                        <?php else : ?>
                                                        <li class="list-inline-item"></li>
                                                        <?php endif ?>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn-cart-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="top" title="Añadir al carrito"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-cart.png" alt=""></a>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/product/category/<?= $product->category->slug ?>" class="t"><?= $product->category->name ?></a></li>
                                            </ul>
                                        </div>
                                        <?php endforeach ?>
                                        
                                    </div>
                                </div>
                                
                            </div>
<<<<<<< HEAD
                        <?php endforeach ?>
                                                
					</div>

				</div>
			</div>
        </div>

        <hr class="pattern pattern-2 tall">

        <?php if(count($combos) > 0) : ?>

        <div role="main" class="main shop pt-4">

				<div class="container">

					<div class="row">
						
						<div class="col-lg-12">
                            <h2 class="text-primary text-center">CANASTAS</h2>
                            <p class="lead">Vos elegis los productos! Adquiriendo una canasta ahorras muchisimo más que comprando los productos por separado.</p>

							<div class="masonry-loader masonry-loader-showing mt-3">
								<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
									
                                    <?php foreach($combos as $combo) : ?>
									<div class="col-sm-6">
										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="product-thumb-info-badges-wrapper">
                                                <?php if(\app\helpers\Utils::productIsNew($combo->created_at) == true) :?>
                                                <span class="badge badge-ecommerce badge-success">NUEVO</span>
                                                <?php endif ?>
												</div>

												<div class="addtocart-btn-wrapper">
													<a href="<?= URL_PATH ?>/combo/show/<?= $combo->slug ?>" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="Adquirir">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="<?= URL_PATH ?>/combo/show/<?= $combo->slug ?>">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="<?= URL_PATH ?><?= $combo->image ?>">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1"><?= $combo->description ?></a>
													<h3 class="text-3-4 font-weight-normal font-alternative text-transform-none line-height-3 mb-0">
                                                        <a href="<?= URL_PATH ?>/combo/show/<?= $combo->slug ?>" class="text-color-dark text-color-hover-primary"><?= $combo->name ?></a>
                                                    </h3>
												</div>
												
											</div>
											
											<p class="price text-5 mb-3">
                                                <?= $app['SYMBOL'] ?>
                                                <?= \app\helpers\Utils::moneyFormat($combo->price) ?>
											</p>
										</div>
									</div>
                                    <?php endforeach ?>


								</div>
								
							</div>
						</div>
					</div>
				</div>

			</div>

            <hr class="pattern pattern-2 tall">

            <?php endif ?>

            <div class="container py-4">

=======
                        </div>
                    </div>
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363

                    <div class="col-md-12 padding-fix-l20">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="banner">
                                    <a href="#"><img src="images/banner-1.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner">
                                    <a href="#"><img src="images/banner-2.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="ftr-product">
                            <div class="tab-box d-flex justify-content-between">
                                <div class="sec-title">
                                    <h5>Productos recientes</h5>
                                </div>
                                
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <div class="tab-slider owl-carousel">

                                        <?php foreach($new_products as $product) : ?>
                                            
                                        <div class="tab-item">
                                            <div class="tab-heading">
                                                <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                            </div>
                                            <div class="tab-img">
                                                <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>">
                                                    <img class="main-img img-fluid" src="<?= URL_PATH ?><?= $product->image ?>" alt="">
                                                    <?php if(count($product->images) > 0) : ?>
                                                        <img class="sec-img img-fluid" src="<?= URL_PATH ?><?= $product->images[0]->path ?>" alt="">
                                                    <?php endif ?>
                                                    
                                                    <span class="new">Nuevo</span>
                                                </a>
                                            </div>
                                            <div class="img-content d-flex justify-content-between">
                                                <div>
                                                    <ul class="list-unstyled list-inline price">
                                                        <li class="list-inline-item text-danger">
                                                            <?= $app['SYMBOL'] ?>
                                                            <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                                                        </li>
                                                        <?php if($product->offer > 0) : ?>
                                                        <li class="list-inline-item">
                                                            <?= $app['SYMBOL'] ?>
                                                            <?= \app\helpers\Utils::moneyFormat($product->price) ?>
                                                        </li>
                                                        <?php else : ?>
                                                        <li class="list-inline-item"></li>
                                                        <?php endif ?>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn-cart-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="top" title="Añadir al carrito"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-cart.png" alt=""></a>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/product/category/<?= $product->category->slug ?>"><?= $product->category->name ?></a></li>
                                            </ul>
                                        </div>
                                        <?php endforeach ?>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-12 padding-fix-l20">
                        <div class="banner-two">
                            <a href="#"><img src="?= URL_PATH ?>/assets/ecommerce-template/images/banner-3.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>-->

<<<<<<< HEAD
            <?php if(count($most_selling_products) > 0) : ?>
            <div role="main" class="container">
=======
                    <?php if(count($posts) > 0) : ?>
                    <div class="col-md-12 padding-fix-l20">
                        <div class="hm-blog">
                            <div class="sec-title">
                                <h5>Últimas publicaciones</h5>
                            </div>
                            <div class="blog-slider owl-carousel">
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082

                                <?php foreach($posts as $post) : ?>
                                
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>"><img src="<?= URL_PATH ?><?= $post->image ?>" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="blog-content">
                                        <h6><a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>"><?= $post->title ?></a></h6>
                                        <ul class="list-unstyled list-inline">
                                            <!--<li class="list-inline-item"><i class="fa fa-user-o"></i>@SevenCrows</li>-->
                                            <li class="list-inline-item"><i class="fa fa-calendar"></i><?= $post->created_at->diffForHumans() ?></li>
                                        </ul>
                                        <p><?= \app\helpers\Utils::limitTextWords($post->description, 80) ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->

<script>
    // btn-submit-add
    $('#form-newsletter').submit(function(e){

<<<<<<< HEAD
            <?php if(count($most_selling_products) > 0) : ?>
            <div role="main" class="container">
=======
        const postData = {
            email: $('#newsletter-input').val()
        };
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363

        console.log(postData);

        $.post(URL_PATH + '/newsletter', postData, function(r) {
			console.log(r);
			switch (r) {
                case 'error':
                            
                    Swal.fire({
                        icon: 'error',
                        title: 'Atención!',
                        text: 'Se produjo un error al suscribirse, recargue la página para intentarlo nuevamente.',
                        showConfirmButton: false,
                        timer: 5000
                    });

                    break;


                case 'success':
                            
                    Swal.fire({
                        icon: 'success',
                        title: 'Suscripto!',
                        text: 'Recibirás en tu correo electrónico boletines de información, noticias, ofertas y promociones.',
                        showConfirmButton: false,
                        timer: 7000
                    });
                            
                    break;
            }
		
		});

<<<<<<< HEAD
			</div>
            <?php endif ?>
<<<<<<< HEAD
=======
=======
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082

        e.preventDefault();
    });
</script>