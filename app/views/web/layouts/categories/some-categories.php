                        <?php $random_categories = \app\helpers\Utils::randomCategories() ?>

                        <h5 class="font-weight-bold pt-3">Categorias</h5>
                        <ul class="nav nav-list flex-column">
                            <?php foreach($random_categories as $category) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL_PATH ?>/product/category/<?= $category->slug ?>">
                                <?= $category->name ?>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>