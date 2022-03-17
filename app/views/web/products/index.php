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
                        

                        <section class="product-area">
                            
                            <!-- Destacados -->
                            <?php include('app/views/web/layouts/products/featured-products.php') ?>

                            <!-- Le podrá interesar -->
                            <?php include('app/views/web/layouts/products/interest-products.php') ?>

                        </section>

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
                                        <option value="">------</option>
                                        <option value="&sort=name,asc" <?php if($sort_path == '&sort=name,asc'){ echo 'selected'; } ?>>A - Z</option>
                                        <option value="&sort=name,desc" <?php if($sort_path == '&sort=name,desc'){ echo 'selected'; } ?>>Z - A</option>
                                        <option value="&sort=price_final,asc" <?php if($sort_path == '&sort=price_final,asc'){ echo 'selected'; } ?>>- Precio</option>
                                        <option value="&sort=price_final,desc" <?php if($sort_path == '&sort=price_final,desc'){ echo 'selected'; } ?>>+ Precio</option>
                                    </select>
                                </div>
                                <div class="page">
                                    <p>Página <?= $products->currentPage() ?> de <?= $products->lastPage() ?></p>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel">
                                    <div class="row">
                                        
                                        <?php if($products->isEmpty()) : ?>

                                            <div class="alert alert-primary col-12" role="alert">
                                                <i class="fa fa-warning text-danger"></i> <?= $message ?>
                                            </div>
                                            
                                        <?php else : ?>

                                            <?php foreach($products as $product) : ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="tab-item">
                                                    <div class="tab-img">
                                                        <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>">
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
                                                        </a>
                                                    </div>
                                                    <div class="tab-heading">
                                                        <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                                    </div>
                                                    <div class="img-content d-flex justify-content-between">
                                                        <div>
                                                            <ul class="list-unstyled list-inline price">
                                                                <li class="list-inline-item">
                                                                    <span class="text-danger">
                                                                        <?= $app['SYMBOL'] ?>
                                                                        <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                                                                    </span>
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
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            
                                        <?php endif ?>

										

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
                                                            <?php if(count($product->images) > 0) : ?>
                                                                <img class="sec-img img-fluid" src="<?= URL_PATH ?><?= $product->images[0]->path ?>" alt="">
                                                            <?php endif ?>
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
																	<li class="list-inline-item">
                                                                        <span class="text-danger">
                                                                            <?= $app['SYMBOL'] ?>
                                                                            <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                                                                        </span>
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
                                                        <p><?= $product->description ?></p>
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
                            
                            <?php if(!$products->isEmpty()) : ?>
                            <!-- PAGINATION -->
                            <?php include('app/views/web/layouts/pagination.php') ?>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="sec-title">
                    <h4>Productos destacados</h4>
                </div>

                <hr>

                <!-- Productos destacados -->
                
                <?php include('app/views/web/layouts/products/related-products.php') ?>
            </div>

        </section>
        <!-- End Category Area -->
        
        


        <script>
            $('.sort-box').on('change', function() {
                var sort_path = this.value;
                var path = '<?= $path ?>'
                var url = URL_PATH +  path + sort_path;
                
                window.location.href = url;
            });
        </script>
