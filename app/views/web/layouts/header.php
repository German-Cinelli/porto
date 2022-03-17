<<<<<<< HEAD
    		<div class="notice-top-bar bg-primary" data-sticky-start-at="180">
				<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
					<span class="close">
						<span></span>
						<span></span>
					</span>
				</button>

				<!-- ALERT -->
				<!--<div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light font-weight-semibold mb-0">Get Up to <strong>40% OFF</strong> New-Season Styles <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ml-2">MEN</a> <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ml-1 mr-2">WOMAN</a> <span class="opacity-6 text-1">* Limited time only.</span></p>
						</div>
					</div>
				</div>-->

			</div>
                    
            <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
				<div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
					<div class="header-top header-top-small-minheight header-top-simple-border-bottom">
						<div class="container">
							<div class="header-row justify-content-between">
								<div class="header-column col-auto px-0">
									<div class="header-row">
										<p class="font-weight-semibold text-1 mb-0 d-none d-sm-block">ENVÍOS GRATIS PARA EL INTERIOR DEL PAÍS</p>
									</div>
								</div>
								<div class="header-column justify-content-end col-auto px-0">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills font-weight-semibold text-2">
												<li class="nav-item dropdown nav-item-left-border d-lg-none">
													<a class="nav-link text-color-default text-color-hover-primary" href="#" role="button" id="dropdownMobileMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														More
														<i class="fas fa-angle-down"></i>
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownMobileMore">
														<a class="dropdown-item" href="#">About</a>
														<a class="dropdown-item" href="#">Our Stores</a>
														<a class="dropdown-item" href="#">Blog</a>
														<a class="dropdown-item" href="#">Contact</a>
														<a class="dropdown-item" href="#">Help & FAQs</a>
														<a class="dropdown-item" href="#">Track Order</a>
													</div>
												</li>
												
												<?php if(isset($_SESSION['login'])) : ?>

													<?php if($_SESSION['login']['admin'] == TRUE) : ?>

														<li><a href="<?= URL_PATH ?>/admin"><b class="text-danger">Panel administrativo</b></a></li>
													
													<?php else : ?>

														<li class="nav-item d-none d-lg-inline-block">
															<a href="<?= URL_PATH ?>/mydata" class="text-decoration-none text-color-default text-color-hover-primary">Mi cuenta</a>
														</li>
														<li class="nav-item d-none d-lg-inline-block">
															<a href="<?= URL_PATH ?>/cart" class="text-decoration-none text-color-default text-color-hover-primary">Mi carrito</a>
														</li>
														<li class="nav-item d-none d-lg-inline-block">
															<a href="<?= URL_PATH ?>/order" class="text-decoration-none text-color-default text-color-hover-primary">Mis compras</a>
														</li>
														<li class="nav-item d-none d-lg-inline-block">
															<a href="<?= URL_PATH ?>/auth/logout" class="text-decoration-none text-color-default text-color-hover-primary">Salir</a>
														</li>

													<?php endif ?>

												<?php else : ?>

													<li class="nav-item d-none d-lg-inline-block">
														<a href="<?= URL_PATH ?>/auth" class="text-decoration-none text-color-default text-color-hover-primary">Ingresar/Registrarse</a>
													</li>

												<?php endif ?>
												
											</ul>
											<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray">
												<li class="social-icons-facebook">
													<a href="<?= $app['FACEBOOK'] ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
												</li>
												<li class="social-icons-instagram">
													<a href="<?= $app['INSTAGRAM'] ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row py-2">
							<div class="header-column w-100">
								<div class="header-row justify-content-between">
									<div class="header-logo z-index-2 col-lg-2 px-0">
										<a href="<?= URL_PATH ?>">
											<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="<?= URL_PATH ?>/assets/e/img/logo.png">
										</a>
									</div>
									<div class="header-nav-features header-nav-features-no-border col-lg-5 col-xl-6 px-0 ml-0">
										<div class="header-nav-feature pr-lg-4 pr-xl-5 mr-4">
											<form role="search" id="search-bar-2">
												<div class="search-with-select">
													<a href="#" class="mobile-search-toggle-btn mr-2" data-porto-toggle-class="open">
														<i class="icons icon-magnifier text-color-dark text-color-hover-primary"></i>
													</a>
													<div class="search-form-wrapper input-group">
														<input class="form-control text-1" id="input-search-2" name="q" type="search" value="" placeholder="Buscar...">
														<span class="input-group-append">
															<button class="btn" type="submit">
																<i class="icons icon-magnifier header-nav-top-icon text-color-dark"></i>
															</button>
														</span>
													</div>
												</div>
											</form>
										</div>
									</div>
									<ul class="header-extra-info col-lg-3 col-xl-2 pl-2 pl-xl-0 d-none d-lg-block">
										<li class="d-none d-sm-inline-flex ml-0">
											<div class="header-extra-info-icon">
												<i class="icons icon-phone text-3 text-color-dark position-relative top-1"></i>
											</div>
											<div class="header-extra-info-text">
												<label class="text-1 font-weight-semibold text-color-default">Llámenos</label>
												<strong class="text-2">
                                                    <a href="#" class="text-color-hover-primary text-decoration-none">
                                                        <?= $app['PHONE'] ?>
                                                        <br>
                                                        <?= $app['CELLPHONE'] ?>
                                                    </a>
                                                </strong>
											</div>
										</li>
									</ul>
									<div class="d-flex col-auto col-lg-2 pr-0 pl-0 pl-xl-3">
										<ul class="header-extra-info">
											<?php if(isset($_SESSION['login'])) : ?>
											<li class="ml-0 ml-xl-4">
												<div class="header-extra-info-icon">
													<a href="<?= URL_PATH ?>/mydata" class="text-decoration-none text-color-dark text-color-hover-primary text-2">
														<i class="icons icon-user"></i>
													</a>
												</div>
											<?php endif ?>
											</li>
											<li class="mr-2 ml-3">
												<div class="header-extra-info-icon">
													<a href="<?= URL_PATH ?>/favorite" class="text-decoration-none text-color-dark text-color-hover-primary text-2">
														<i class="icons icon-heart"></i>
													</a>
												</div>
											</li>
										</ul>
										<div class="header-nav-features pl-0 ml-1">
											<div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ml-2">
												<a href="#" class="header-nav-features-toggle">
													<img src="<?= URL_PATH ?>/assets/e/img/icons/icon-cart-big.svg" height="30" alt="" class="header-nav-top-icon-img">
													<span class="cart-info">
														<span class="cart-qty notify"><?= \app\helpers\Utils::getAddToCart_count() ?></span>
													</span>
												</a>
												<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
													<ol class="mini-products-list">

														<?php if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL) : ?>

															<?php foreach($_SESSION['cart'] as $index => $item) : ?>

															<li class="item">
																<a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>" title="<?= $item['product']->name ?>" class="product-image"><img src="<?= URL_PATH ?><?= $item['product'] ->image?>" alt="<?= $item['product']->image ?>"></a>
																<div class="product-details">
																	<p class="product-name">
																		<a href="<?= URL_PATH ?>/product/show/<?= $item['product']->slug ?>"><?= $item['product']->name ?> </a>
																	</p>
																	<p class="qty-price">
																		<?= $item['quantity'] ?> x <?= \app\helpers\Utils::moneyFormat($item['product']->price_final, $app['SYMBOL']) ?> <small>c/u</small>
																	</p>
																	<a href="<?= URL_PATH ?>/cart/remove/<?= $index ?>" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
																</div>
															</li>

															<?php endforeach ?>

														<?php endif ?>

														<div id="cart-item">
														
														</div>

													</ol>

													<?php if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL) : ?>
													<div class="totals">
														<span class="label">Subtotal:</span>
														<span class="price-total">
															<span class="price">
																<?= $app['SYMBOL'] ?>
																<?= \app\helpers\Utils::moneyFormat(\app\helpers\Utils::cart_calculate_sub_total()) ?>
															</span>
														</span>
													</div>
													<?php endif ?>

													<div class="actions">
														<a class="btn btn-primary" href="<?= URL_PATH ?>/cart">Ir al carrito</a>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">


								</div>
							</div>
						</div>
					</div>
					<div class="header-nav-bar header-nav-bar-top-border bg-light">
						<div class="header-container container">
							<div class="header-row">
								<div class="header-column">
									<div class="header-row justify-content-end">
										<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '105px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
											<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">
												<nav class="collapse w-100">
													<ul class="nav nav-pills w-100" id="mainNav">
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>">
																Inicio
															</a>
														</li>
                                                        <li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="#">
																Productos
															</a>
															<ul class="dropdown-menu">
																<li>
																	<div class="dropdown-mega-content">
																		<div class="row">
																		<?php $categories = \app\helpers\Utils::getCategories(); ?>

																		<?php
																			$ref   = [];
																			$items = [];

																			foreach($categories as $data){
																				$thisRef = &$ref[$data->id];

																				$thisRef['parent'] = $data->parent_id;
																				$thisRef['label'] = $data->name;
																				$thisRef['link'] = $data->slug;
																				$thisRef['id'] = $data->id;

																				if($data->parent_id == 0) {
																						$items[$data->id] = &$thisRef;
																						//var_dump($items);
																				} else {
																						$ref[$data->parent_id]['child'][$data->id] = &$thisRef;
																				}

																				//d($items);

																			}

																			function getMenu($items, $class = '') {

																				$html = '


																				';

																				foreach($items as $key => $value){
																					if($value['label'] == 'Sin categorizar'){

																					} else {

																						$html .= '
																							<div class="col-lg-3">
																								<span class="dropdown-mega-sub-title">' . $value['label'] . '</span>
																									
																								<ul class="dropdown-mega-sub-nav">';



																					if(isset($value['child']) && count($value['child']) > 0){
																						foreach($value['child'] as $subcategory){
																							$html .=  '<li><a class="dropdown-item" href="' . URL_PATH . '/product/category/' . $subcategory['link'] . '">' . $subcategory['label'] . '</a></li>';
																						}
																					}

																					$html .= '
																								</ul>
																							</div>
																						';




																					$html .= "";
																					//d($value);

																					}

																				}

																			$html .= "";

																			return $html;

																			}

																			print getMenu($items);
																		?>
																		</div>
																	</div>
																</li>
															</ul>
														</li>
                                                        <li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>/cart">
																Carrito
															</a>
														</li>
														<li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>/page/contact">
																Contacto
															</a>
														</li>
														<li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>/blog">
																BLOG
															</a>
														</li>
														<!--<li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>/page/about">
																Quienes somos
															</a>
														</li>
														<li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="<?= URL_PATH ?>/page/faq">
																Preguntas frecuentes
															</a>
														</li>-->
														<?php if(isset($_SESSION['login'])) : ?>
														<li class="dropdown">
															<a href="<?= URL_PATH ?>/auth/logout" class="dropdown-item">
																Cerrar sesión
															</a>
														</li>
														<?php endif ?>
													</ul>
												</nav>
											</div>
											<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
												<i class="fas fa-bars"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
=======
        <!-- Menu Area -->
        <section class="menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>">INICIO </a>
                                </li>
                                <li class="list-inline-item mega-menu"><a>MENU <i class="fa fa-angle-down"></i></a>
                                    <div class="mega-box">
                                        <div class="row">

                                            <?php $categories = \app\helpers\Utils::getCategories(); ?>

                                            <?php
                                                $ref   = [];
                                                $items = [];

                                                foreach($categories as $data){
                                                    $thisRef = &$ref[$data->id];

                                                    $thisRef['parent'] = $data->parent_id;
                                                    $thisRef['label'] = $data->name;
                                                    $thisRef['link'] = $data->slug;
                                                    $thisRef['id'] = $data->id;

                                                    if($data->parent_id == 0) {
                                                            $items[$data->id] = &$thisRef;
                                                            //var_dump($items);
                                                    } else {
                                                            $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
                                                    }

                                                    //d($items);

                                                }

                                                function getMenu($items, $class = '') {

                                                    $html = '


                                                    ';

                                                    foreach($items as $key => $value){
                                                        if($value['label'] == 'Sin categorizar'){

                                                        } else {

                                                            $html .= '
                                                                <div class="col-md-3">
                                                                    <div class="sm-phn">
                                                                        <h6>' . $value['label'] . '</h6>
                                                                        <div class="dept-box">';



                                                        if(isset($value['child']) && count($value['child']) > 0){
                                                            foreach($value['child'] as $subcategory){
                                                                $html .=  '<a href="' . URL_PATH . '/product/category/' . $subcategory['link'] . '">' . $subcategory['label'] . '</a>';
                                                            }
                                                        }

                                                        $html .= '
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ';




                                                        $html .= "";
                                                        //d($value);

                                                        }

                                                    }

                                                $html .= "";

                                                return $html;

                                                }

                                                print getMenu($items);
                                            ?>


                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/product/equipos_gamer">EQUIPOS GAMER </a>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/cart">CARRITO </a>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/page/contact">CONTACTO</a></li>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/page/preguntas_frecuentes">PREGUNTAS FRECUENTES</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Menu Area -->

        <!-- Mobile Menu -->
        <section class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <a href=""><img src="<?= URL_PATH ?>/assets/dist/your_logo.png" alt=""></a>

                                <?php if(!isset($_SESSION['login'])) : ?>
                                <a href="<?= URL_PATH ?>/auth"><span>Ingresar / Registrarse</span></a>
                                <?php endif ?>

                                <ul class="list-unstyled">
                                    <li><a href="<?= URL_PATH ?>">Inicio</a></li>
                                    <li><a href="#">Menu</a>
                                        <ul class="list-unstyled">

                                            <?php foreach($categories as $category) : ?>

                                            <?php if($category->parent_id == 0 && $category->slug != 'sin-categorizar') : ?>
                                            <li>
                                                <a href="#"><?= $category->name ?></a>
                                                <?php if(isset($category->children)) : ?>

                                                    <ul class="list-unstyled">
                                                        <?php foreach($category->children as $category) : ?>
                                                        <li><a href="<?= URL_PATH ?>/product/category/<?= $category->slug ?>#grid"><?= $category->name ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>

                                                <?php endif ?>

                                            </li>
                                            <?php endif ?>

                                            <?php endforeach ?>

                                        </ul>
                                    </li>
                                    <li><a href="<?= URL_PATH ?>/product/equipos_gamer">Equipos gamer</a></li>
                                    <li><a href="<?= URL_PATH ?>/cart">Carrito</a></li>
                                    <li><a href="<?= URL_PATH ?>/page/contact">Contacto</a></li>
                                    <?php if(isset($_SESSION['login'])) : ?>
                                        <?php if($_SESSION['login']['admin'] == TRUE) : ?>

                                            <li><a href="<?= URL_PATH ?>/admin"><b class="text-danger">Panel administrativo</b></a></li>

                                        <?php else : ?>

                                            <li><a href="<?= URL_PATH ?>/mydata">Mis datos</a></li>
                                            <li><a href="<?= URL_PATH ?>/cart">Mi carrito</a></li>
                                            <li><a href="<?= URL_PATH ?>/order">Mis compras</a></li>

                                        <?php endif ?>
                                    <?php endif ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Mobile Menu -->


        <!-- Sticky Menu -->
        <section class="sticky-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="sticky-logo">
                            <a href="index.html"><img width="130px" src="<?= URL_PATH ?>/assets/dist/your_logo.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>">INICIO </a>
                                <li class="list-inline-item mega-menu"><a>MENU <i class="fa fa-angle-down"></i></a>
                                    <div class="mega-box">
                                        <div class="row">
                                            <?php $categories = \app\helpers\Utils::getCategories(); ?>

                                            <?php
                                                $ref   = [];
                                                $items = [];

                                                foreach($categories as $data){
                                                    $thisRef = &$ref[$data->id];

                                                    $thisRef['parent'] = $data->parent_id;
                                                    $thisRef['label'] = $data->name;
                                                    $thisRef['link'] = $data->slug;
                                                    $thisRef['id'] = $data->id;

                                                    if($data->parent_id == 0) {
                                                            $items[$data->id] = &$thisRef;
                                                            //var_dump($items);
                                                    } else {
                                                            $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
                                                    }

                                                    //d($items);

                                                }

                                                print getMenu($items);
                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/product/equipos_gamer">EQUIPOS GAMER</a></li>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/cart">CARRITO </a>
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>/page/contact">CONTACTO</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2">
                        <div class="carts-area d-flex">
                            <div class="src-box">
                                <form id="search-bar-2" action="#">
                                    <input type="text" id="input-search-2" placeholder="¿Qué buscas?">
                                    <button type="submit" name="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="wsh-box ml-auto">
                                <a href="<?= URL_PATH ?>/favorite" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/heart.png" alt="favorite">
                                    <span>
                                        <?= \app\helpers\Utils::getFavorites_count() ?>
                                    </span>
                                </a>
                            </div>
                            <div class="cart-box ml-auto">
                                <a href="<?= URL_PATH ?>/cart" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/cart.png" alt="favorite">
                                    <span>
                                        <?= \app\helpers\Utils::getAddToCart_count() ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sticky Menu -->
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363

        <script>
            $('#search-bar-2').submit(function(e){
                search = $('#input-search-2').val();
                url = URL_PATH + '/product/search/' + search;
                window.location.href = url;

                e.preventDefault();
            });
        </script>
