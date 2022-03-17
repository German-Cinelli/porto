<?php $most_selling_products = \app\helpers\Utils::mostSellingProducts() ?>
                            <?php if(count($most_selling_products) > 0) : ?>
                                <div class="bt-deal">
                                    <div class="sec-title">
                                        <h6>Más comprados</h6>
                                    </div>
                                    <div class="bt-body owl-carousel">
                                        <div class="bt-items">

                                            <?php foreach($most_selling_products as $product) : ?>
                                            <div class="bt-box d-flex">
                                                <div class="bt-img">
                                                    <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><img src="<?= URL_PATH ?><?= $product->image ?>" alt=""></a>
                                                </div>
                                                <div class="bt-content">
                                                    <p><a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><?= $product->name ?></a></p>
                                                    <ul class="list-unstyled list-inline price">
                                                        <li class="list-inline-item">
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
                                            </div>
                                            <?php endforeach ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>