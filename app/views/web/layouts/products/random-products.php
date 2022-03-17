        <?php $random_products =  \app\helpers\Utils::getRandom_products(14) ?>
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