		<style>
			.product-item {
				transition: all .4s;
			}
		</style>


		<!-- Category Area -->
		<section class="category">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Algunas categorías -->
                        <?php include('app/views/web/layouts/categories/some-categories.php') ?>
                       
                        <!-- Rango de precio -->
                        <?php include('app/views/web/layouts/products/price-range.php') ?>
                        
                    </div>

                    <div class="col-md-9">
                        <div class="product-box">
                            <div class="cat-box d-flex justify-content-between">
                                <!-- Nav tabs -->
                                <div class="view">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="sortby">
                                    <span>Ordenar por</span>
                                    <select class="sort-box">
                                        <option>+ Precio</option>
                                        <option>- Precio</option>
                                    </select>
                                </div>
                                <div class="show-item">
                                    <span>Ver</span>
                                    <select class="show-box">
                                        <option>12</option>
                                        <option>24</option>
                                        <option>36</option>
                                    </select>
                                </div>
                                <div class="page">
                                    <p>Página 1 de 20</p>
                                </div>
                            </div>
							
							<?php if($products->isEmpty()) : ?>

							<div class="alert alert-info">
								No se encontraron productos para la categoría 
								<b><?= $cat->name ?></b>.
								Diriǵete a nuestra página principal haciendo <a class="text-primary" href="<?= URL_PATH ?>">clic aquí</a>. 
							</div>

							<?php else : ?>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel">
                                    <div class="row">

										<?php foreach($products as $product) : ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="tab-item">
                                                <div class="tab-img">
                                                    <input type="hidden" id="product_id" value="<?= $product->id ?>">
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
                                                <div class="tab-heading">
                                                    <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                                </div>
                                                <div class="img-content d-flex justify-content-between">
                                                    <div>
                                                        <ul class="list-unstyled list-inline price">
															<li class="list-inline-item"><span class="text-danger"><?= \app\helpers\Utils::moneyFormat($product->price_final, $app['SYMBOL']) ?><span></li>
                                                            <?php if($product->offer > 0) : ?>
																<li class="list-inline-item"><?= \app\helpers\Utils::moneyFormat($product->price, $app['SYMBOL']) ?></li>
															<?php else : ?>
																<li class="list-inline-item"></li>
															<?php endif ?>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn-cart-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="top" title="Añadir al carrito"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-cart.png" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php endforeach ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list" role="tabpanel">
                                    <div class="row">

										<?php foreach($products as $product) : ?>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="tab-item2">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="tab-img">
                                                            <img class="main-img img-fluid" src="<?= URL_PATH ?><?= $product->image ?>" alt="">
                                                            <img class="sec-img img-fluid" src="<?= URL_PATH ?>/assets/ecommerce-template/images/tab-16.png" alt="">
                                                            <?php if($product->offer > 0) : ?>
																<span class="sale">- <?= $product->offer ?>%</span>
															<?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="item-heading d-flex justify-content-between">
                                                            <div class="item-top">
                                                                <input type="hidden" id="product_id" value="<?= $product->id ?>">
                                                                <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                                            </div>
                                                            <div class="item-price">
                                                                <ul class="list-unstyled list-inline price">
																	<li class="list-inline-item"><?= \app\helpers\Utils::moneyFormat($product->price_final, $app['SYMBOL']) ?></li>
																	<?php if($product->offer > 0) : ?>
																		<li class="list-inline-item"><?= \app\helpers\Utils::moneyFormat($product->price, $app['SYMBOL']) ?></li>
																	<?php else : ?>
																		<li class="list-inline-item"></li>
																	<?php endif ?>
                                                                </ul>
                                                            </div>
                                                        </div>
														<ul class="list-unstyled list-inline cate">
                                                            <li class="list-inline-item">Categoría: <a href="<?= URL_PATH ?>/product/category/<?= $product->category->slug ?>"><?= $product->category->name ?></a></li>
															<li class="list-inline-item">
                                                            <?php if($product->brand) : ?>
                                                                Marca: <?= $product->brand ?>
                                                            <?php else : ?>
                                                                Marca: Sin especificar
                                                            <?php endif ?>
                                                            </li>
                                                        </ul>
                                                        <br>
                                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime explicabo natus ab debitis ipsa voluptatem quam eligendi! Quia cupiditate obcaecati ipsam exercitationem laboriosam dolorum soluta.</p>
                                                        <br>
                                                        <div class="item-content">
                                                            <div class="btn-group">
                                                                <a href="#" class="it-cart btn-cart-add" data-product-id="<?= $product->id ?>"><span class="it-img"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-cart.png" alt=""></span><span class="it-title">Añadir al carrito</span></a>
                                                                <div class="add-favorite">
                                                                    <input type="hidden" value="<?= $product->id ?>">
                                                                    <a href="#" class="it-fav btn-favorite-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="left" title="Me gusta"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-fav.png" alt=""></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php endforeach ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-box text-center">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href="">1</a></li>
                                    <li class="list-inline-item"><a href="">2</a></li>
                                    <li class="active list-inline-item"><a href="">3</a></li>
                                    <li class="list-inline-item"><a href="">4</a></li>
                                    <li class="list-inline-item"><a href="">...</a></li>
                                    <li class="list-inline-item"><a href="">12</a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-angle-right"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>

							<?php endif ?>
							
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Category Area -->

        <!-- Brand area 2 -->
        <section class="brand2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tp-bnd owl-carousel">

                            <?php foreach($random_products as $product) : ?>
                            <div class="bnd-items">
                                <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><img src="<?= URL_PATH ?><?= $product->image ?>" alt="" class="img-fluid"></a>
                            </div>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brand area 2 -->

        <script>
            $(document).ready(function(){

                $('.list-menu .category-item[category="all"]').addClass('text-primary');

                $('.category-item').click(function(e){
                    var catProduct = $(this).attr('category')
                    console.log(catProduct);

                    $('.category-item').removeClass('text-primary');
                    $(this).addClass('text-primary');

                    /* Ocultar calzados */
                    $('.product-item').css('transform', 'scale(0)');
                    function hideProduct(){
                        $('.product-item').hide();
                    } setTimeout(hideProduct, 500);
                    
                    /* Mostrar calzados */
                    function showProduct(){
                        $('.product-item[category="'+ catProduct +'"]').css('transform', 'scale(1)')
                        $('.product-item[category="'+ catProduct +'"]').show();
                    } setTimeout(showProduct, 500);
                    

                    e.preventDefault();
                });

                $('.category-item[category="all"]').click(function(e){
                    function showAll(){
                        $('.product-item').show();
                        $('.product-item').css('transform', 'scale(1)');
                    } setTimeout(showAll, 500);
                    

                    e.preventDefault();
                });

                $('.category-item[category="off"]').click(function(e){
                    function showAll(){
                        $('.product-item[offer="yes"]').css('transform', 'scale(1)')
                        $('.product-item[offer="yes"]').show();
                    } setTimeout(showAll, 500);
                    

                    e.preventDefault();
                });


            });
        </script>
