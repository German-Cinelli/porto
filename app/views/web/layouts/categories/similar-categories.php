                        <?php $similar_categories = \app\helpers\Utils::similarCategories($product->category->parent_id) ?>
                        <div class="category-box">
                            <div class="sec-title">
                                <h6>Categorías relacionadas</h6>
                            </div>
                            <!-- accordion -->
                            <div id="accordion">
                                <div class="card">
                                    <ul class="list-unstyled">
                                        <?php foreach($similar_categories as $category) : ?>
                                            <li><a href="<?= URL_PATH ?>/product/category/<?= $category->slug ?>"><i class="fa fa-angle-right"></i> <?= $category->name ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>