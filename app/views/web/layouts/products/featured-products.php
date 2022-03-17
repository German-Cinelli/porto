<?php $featured_products = \app\helpers\Utils::featuredProducts() ?>
                                <div class="ht-offer">
                                    <div class="sec-title">
                                        <h6>Destacados</h6>
                                    </div>
                                    <div class="ht-body owl-carousel">

                                        <?php foreach($featured_products as $product) : ?>
                                        <div class="ht-item">
                                            <div class="ht-img">
                                                <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><img src="<?= URL_PATH ?><?= $product->image ?>" alt="" class="img-fluid"></a>
                                                <?php if($product->offer > 0) : ?>
                                                <span>- <?= $product->offer ?>%</span>
                                                <?php endif ?>
                                            </div>
                                            <div class="ht-content">
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