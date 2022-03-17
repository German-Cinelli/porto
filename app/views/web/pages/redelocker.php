        
        <!-- simple-lightbox -->
        <link rel="stylesheet" href="<?= URL_PATH ?>/library/simple-lightbox/dist/simple-lightbox.min.css">
        
        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-light bg-color-secondary text-center p-2">Preguntas frecuentes</h2>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Terms & Condition -->
        <section class="term-condition">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <h3>1. ¿Qué es Redelocker?</h3>
						<p><i class="fas fa-arrow-circle-right text-primary"></i> Es una Red de Lockers en lugares accesibles y seguros dentro de Montevideo donde podrás retirar tus paquetes o compras de manera fácil y confiable sin intermediarios.</p>
                    </div>

                    <div class="col-md-6">
                        <h3>2. ¿Cómo funciona?</h3>
						<p><i class="fas fa-arrow-circle-right text-primary"></i> Antes de realizar el pago elegí recibir el paquete de tu compra en el Redelocker más cercano o de tu conveniencia.</p>
                    </div>
                    
                    <div class="col-md-12">
                        <h3>3. ¿Cómo retiro mi paquete?</h3>
                        <p><i class="fas fa-arrow-circle-right text-primary"></i> Luego de efectuar el pago recibirás un código vía email o SMS cuando el paquete esté depositado en el Redelocker acordado.</p>
                        
						<p><i class="fas fa-arrow-circle-right text-primary"></i> Una vez que tienes tu código, vas al Redelocker indicado antes de la fecha de vencimiento, escaneás y abris el locker para retirar tu paquete.</p>
                        
                    </div>

                </div>
                
                <div class="row">
                
                    <div class="col-lg-12">

                        <h4 class="mb-0">Lugares donde se ubican  <i class="fas fa-map-marker-alt text-danger"></i></h4>
                        <p>A continuación te mostramos los distintos puntos de entrega.</p>

                        <div class="gallery mb-4" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
                            <a class="img-thumbnail img-thumbnail-no-borders d-inline-block mb-1 mr-1" href="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-1.png" class="item-thumb" value="http://localhost/Projects/porto/assets/uploads/combos/aJKapOlp-500x500.png">
                                <img src="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-1-512x512.png" width="110" height="110" alt="mapa-redelocker">
                            </a>
                            <a class="img-thumbnail img-thumbnail-no-borders d-inline-block mb-1 mr-1" href="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-2.png" class="item-thumb" value="http://localhost/Projects/porto/assets/uploads/combos/aJKapOlp-500x500.png">
                                <img src="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-2-512x512.png" width="110" height="110" alt="mapa-redelocker">
                            </a>
                            <a class="img-thumbnail img-thumbnail-no-borders d-inline-block mb-1 mr-1" href="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-3.png" class="item-thumb" value="http://localhost/Projects/porto/assets/uploads/combos/aJKapOlp-500x500.png">
                                <img src="<?= URL_PATH ?>/assets/dist/images/redelocker/map-redelocker-3-512x512.png" width="110" height="110" alt="mapa-redelocker">
                            </a>
                        </div>

                    </div>
                </div>

                <p class="lead">Si te quedaron dudas sobre ésta manera de entrega no dudes en <a href="<?= URL_PATH ?>/page/contact">contactarnos</a>.</p>

                    

                <!-- PRODUCTOS-DESTACADOS -->
                <?php //include('app/views/web/layouts/products/featured-products.php') ?>

            </div>
        </section>
        <!-- End Terms & Condition -->


        <!-- simple-lightbox -->
        <script src="<?= URL_PATH ?>/library/simple-lightbox/dist/simple-lightbox.jquery.min.js"></script>

        <script>
            // simple-lightbox
            var gallery = $('.gallery a').simpleLightbox({
                // default source attribute
                sourceAttr: 'href',
                overlay: true,
                spinner: true,
                nav: true,
                close: true,
                animationSlide: true,

            });
        </script>