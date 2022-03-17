        
        
        <!-- Top Bar -->
		<section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="top-right text-right">
                            <ul class="list-unstyled list-inline">

                            <!-- Menu Area -->
        

                                <?php if(isset($_SESSION['login']))  : ?>
                                <section class="menu-area">
                                    <div class="main-menu">
                                        <ul class="list-unstyled list-inline">
                                                        
                                            <li class="list-inline-item">
                                            
                                                <a class="px-4">
                                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/user.png" alt="">
                                                    <?= $_SESSION['login']->name ?> 
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown list-unstyled">

                                                <?php if($_SESSION['login']['admin'] == TRUE) : ?>
                                                    <li><a href="<?= URL_PATH ?>/admin">Administración</a></li>
                                                <?php else : ?>
                                                    <li><a href="<?= URL_PATH ?>/mydata">Mis datos</a></li>
                                                    <li><a href="<?= URL_PATH ?>/cart">Mi carrito</a></li>
                                                    <li><a href="<?= URL_PATH ?>/order">Mis compras</a></li>
                                                <?php endif ?>

                                                    <li><a href="<?= URL_PATH ?>/auth/logout">Cerrar sesión</a></li>
                                                    
                                                </ul>
                                            </li>

                                            <li class="list-inline-item">
                                                <a class="pr-4" href="<?= URL_PATH ?>/favorite">
                                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/wishlist.png" alt="">
                                                    Favoritos
                                                </a>
                                            </li>
                                                        
                                        </ul>
                                    </div>
                                </section>
                                    
                                <?php else : ?>
                                    <li class="list-inline-item">
                                        <a href="<?= URL_PATH ?>/auth">
                                            <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/login.png" alt="">
                                            Ingresar/Registrarse
                                        </a>
                                    </li>
                                <?php endif ?>
                                
                            </ul>

                            
            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Top Bar -->

		<!-- Logo Area -->
        <section class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="<?= URL_PATH ?>"><img src="<?= URL_PATH ?>/assets/dist/your_logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-5 padding-fix">
                        <form id="search-bar" action="#" class="search-bar">
                            <input type="text" id="input-search" placeholder="¿Qué buscas?">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="carts-area d-flex">
                            <div class="call-box d-flex">
                                <div class="call-ico">
                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/call.png" alt="">
                                </div>
                                <div class="call-content">
                                    <span>Whatsapp</span>
                                    <p><?= $app['CELLPHONE'] ?></p>
                                </div>
                            </div>
                            <!-- CART -->
                            <div class="cart-box ml-auto text-center">
                                <a href="<?= URL_PATH ?>/cart" class="">
                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/cart.png" alt="cart">
                                    <span class="notify">
                                        <?= \app\helpers\Utils::getAddToCart_count() ?>
                                    </span>
                                </a>
                            </div>
                            <!-- FAVORITE -->
                            <div class="cart-box ml-auto text-center">
                                <a href="<?= URL_PATH ?>/favorite" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/heart.png" alt="favorite">
                                    <span><?= \app\helpers\Utils::getFavorites_count() ?></span>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Area -->

        <script>
            $('#search-bar').submit(function(e){
                search = $('#input-search').val();
                url = URL_PATH + '/product/search/' + search;
                window.location.href = url;

                e.preventDefault();
            });
        </script>

