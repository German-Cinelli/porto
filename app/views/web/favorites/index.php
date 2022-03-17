        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TUS PRODUCTOS FAVORITOS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Wishlist -->
        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-table wsh-list table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="t-pro">Producto</th>
                                        <th class="t-price">Precio</th>
                                        <th class="t-total">Carrito</th>
                                        <th class="t-rem">Marca</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($favorites as $favorite) : ?>
                                    <tr>
                                        <td class="t-pro d-flex">
                                            <div class="t-img">
                                                <a href=""><img width="64px" src="<?= URL_PATH ?><?= $favorite->product->image ?>" alt=""></a>
                                            </div>
                                            <div class="t-content">
                                                <p class="t-heading"><a href="<?= URL_PATH ?>/product/show/<?= $favorite->product->slug ?>"><?= $favorite->product->name ?></a></p>
                                                <ul class="list-unstyled col-sz">
                                                    <li><p>Categoría : <span><?= $favorite->product->category->name ?></span></p></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="t-price">
                                            <?= $app['SYMBOL'] ?>
                                            <?= \app\helpers\Utils::moneyFormat($favorite->product->price_final) ?>
                                        </td>
                                        <td class="t-add">
                                            <button class="btn-cart-add" type="button" data-product-id="<?= $favorite->product->id ?>" name="button">Añadir al carrito</button>
                                        </td>
                                        <td class="t-rem"><?= $favorite->product->brand ?></td>
                                    </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Wishlist -->