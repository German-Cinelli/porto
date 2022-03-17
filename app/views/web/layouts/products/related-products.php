<?php $similar_products = \app\helpers\Utils::relatedProducts($product->category_id, 12) ?>
                <div class="row">
                    
                    <div class="col-md-12">
                    
                        <div class="tp-bnd owl-carousel">
                                                
                            <?php foreach($similar_products as $product) : ?>
                            <div class="bnd-items">
                                <a href="<?= URL_PATH ?>/product/show/<?= $product->slug ?>"><img src="<?= URL_PATH ?><?= $product->image ?>" alt="" class="img-fluid"></a>
                                <?= $product->name ?>
                            </div>
                            <?php endforeach ?>
                            
                    </div>
                </div>