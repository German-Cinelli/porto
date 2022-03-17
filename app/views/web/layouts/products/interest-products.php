<?php $interest_products = \app\helpers\Utils::interestProducts() ?>
                                <div class="top-rtd">
                                    <div class="sec-title">
                                        <h6>Te podrá interesar</h6>
                                    </div>
                                    <div class="rt-slider owl-carousel">
                                        <div class="rt-items">

                                            <?php foreach($interest_products as $product) : ?>
                                            <div class="rt-box d-flex">
                                                <div class="rt-img">
                                                    <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><img src="<?= URL_PATH ?><?= $product->image ?>" alt=""></a>
                                                </div>
                                                <div class="rt-content">
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