                                <?php $related_products = \app\helpers\Utils::relatedProducts($product->category_id, 12) ?>

                                 <div class="row mb-5">
                                    <div class="col">
                                        <h5 class="font-weight-bold pt-5">PRODUCTOS RELACIONADOSS</h5>

                                        <?php foreach($related_products as $product) : ?>
                                        <div class="product row row-gutter-sm align-items-center mb-4">
                                            <div class="col-5 col-lg-5">
                                                <div class="product-thumb-info border-0">
                                                    <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>">
                                                        <div class="product-thumb-info-image">
                                                            <img alt="" class="img-fluid" src="<?= URL_PATH ?><?= $product->image ?>">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-7 col-lg-7 ml-md-0 ml-lg-0 pl-lg-1 pt-1">
                                                <h3 class="text-3-4 font-weight-normal font-alternative text-transform-none line-height-3 mb-0">
                                                    <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>" class="text-color-dark text-color-hover-primary text-decoration-none">
                                                        <?= $product->name ?>
                                                    </a>
                                                </h3>
                                                <div title="Rated <?= \app\helpers\Utils::getScore($product->id) ?> out of 5">
                                                    <input type="text" class="d-none" value="<?= \app\helpers\Utils::getScore($product->id) ?>" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'dark', 'size':'xs'}">
                                                </div>
                                                <p class="price text-4 mb-0">
                                                    <span class="sale text-color-dark font-weight-medium">
                                                        <?= $app['SYMBOL'] ?>
                                                        <?= \app\helpers\Utils::moneyFormat($product->price_final) ?>
                                                    </span>
                                                    <?php if($product->offer > 0) : ?>
                                                    <span class="amount">
                                                        <?= $app['SYMBOL'] ?>
                                                        <?= \app\helpers\Utils::moneyFormat($product->price) ?>
                                                    </span>
                                                    <?php endif ?>
                                                </p>
                                            </div> 
                                        </div>
                                        <?php endforeach ?>

                                    </div>
                                </div>