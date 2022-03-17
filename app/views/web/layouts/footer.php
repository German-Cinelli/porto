<style>
            .banner-mercadopago {
                display: block;
                max-width:785px;
                max-height:40px;
                width: auto;
                height: auto;
                margin: 0 auto;
            }
        </style>

        <!-- Footer Area -->
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="f-sup">
                            <h5>Información</h5>
                            <p class="text-white lead">Somos una tienda online dedicada a la venta de insumos informáticos y de equipos gaming.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-contact">
                            <h5>Contacto</h5>
                            <div class="f-email">
                                <i class="fa fa-envelope"></i>
                                <span>Email :</span>
                                <p><?= $app['MAIL'] ?></p>
                            </div>
                            <div class="f-phn">
                                <i class="fa fa-whatsapp"></i>
                                <span>Whatsapp :</span>
                                <p><?= $app['CELLPHONE'] ?></p>
                            </div>
                            <div class="f-social">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href="<?= $app['FACEBOOK'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="<?= $app['INSTAGRAM'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-cat">
                            <h5>Categorías</h5>
                            <ul class="list-unstyled">
                                <?php $cats = \app\helpers\Utils::randomCategories() ?>
                                
                                <?php foreach($cats as $cat) : ?>
                                <li><a href="<?= URL_PATH ?>/product/category/<?= $cat->slug ?>"><i class="fa fa-angle-right"></i><?= $cat->name ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-link">
                            <h5>Enlaces</h5>
                            <ul class="list-unstyled">
                                <?php if(isset($_SESSION['login'])) : ?>
                                    <li><a href="<?= URL_PATH ?>/mydata"><i class="fa fa-angle-right"></i>Mi cuenta</a></li>
                                <?php else : ?>
                                    <li><a href="<?= URL_PATH ?>/auth"><i class="fa fa-angle-right"></i>Iniciar sesión</a></li>
                                <?php endif ?>
                                <li><a href="<?= URL_PATH ?>/product"><i class="fa fa-angle-right"></i>Productos</a></li>
                                <li><a href="<?= URL_PATH ?>/cart"><i class="fa fa-angle-right"></i>Carrito</a></li>
                                <li><a href="<?= URL_PATH ?>/page/contact"><i class="fa fa-angle-right"></i>Contacto</a></li>
                                <li><a href="<?= URL_PATH ?>/page/preguntas_frecuentes"><i class="fa fa-angle-right"></i>Preguntas frecuentes</a></li>
                                <?php if(isset($_SESSION['login'])) : ?>
                                    <li><a href="<?= URL_PATH ?>/auth/logout"><i class="fa fa-angle-right"></i>Cerrar sesión</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; 2021 | Desarrollado por <a href="https://sevencrows.com.uy" target="_blank">SevenCrows</a></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="images/payment.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="back-to-top text-center">
                <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/backtotop.png" alt="" class="img-fluid">
            </div>
        </section>
        <!-- End Footer Area -->