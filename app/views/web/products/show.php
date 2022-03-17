        <!-- MODAL REPLY -->
        <?php include('app/views/web/products/modal-reply.php') ?>
        
        <!-- simple-lightbox -->
        <link rel="stylesheet" href="<?= URL_PATH ?>/library/simple-lightbox/dist/simple-lightbox.min.css">

        <style>
            .fc-color-picker {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .fc-color-picker > li {
                float: left;
                font-size: 30px;
                margin-right: 5px;
                line-height: 30px;
            }
            .fc-color-picker > li .fa {
                -webkit-transition: -webkit-transform linear 0.3s;
                -moz-transition: -moz-transform linear 0.3s;
                -o-transition: -o-transform linear 0.3s;
                transition: transform linear 0.3s;
            }
            .fc-color-picker > li .fa:hover {
                -webkit-transform: rotate(30deg);
                -ms-transform: rotate(30deg);
                -o-transform: rotate(30deg);
                transform: rotate(30deg);
            }
        </style>

        <style>
            /* HIDE RADIO */
            [type=radio] { 
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* IMAGE STYLES */
            [type=radio] + img {
                cursor: pointer;
            }

            /* CHECKED STYLES */
            [type=radio]:checked + img {
                outline: 3px solid #f06;
            }
        </style>


        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="<?= URL_PATH ?>">Inicio</a></li>
                                <li class="list-inline-item"><span>|</span> <a href="<?= URL_PATH ?>/product">Productos</a></li>
                                <li class="list-inline-item"><span>|</span> Ver producto</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Single Product Area -->
        <section class="sg-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="sg-img">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="sg1" role="tabpanel">
                                            <img src="<?= URL_PATH ?><?= $product->image ?>" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane" id="sg2" role="tabpanel">
                                            <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/tab-2.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane" id="sg3" role="tabpanel">
                                            <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/tab-3.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane" id="sg4" role="tabpanel">
                                            <img src="<?= URL_PATH ?>/assets/ecommerce-template/images/tab-4.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="nav d-flex justify-content-between ">
                                        <div class="gallery">
                                            <?php foreach($product->images as $image) : ?>
                                                <a href="<?= URL_PATH ?><?= $image->path ?>" class="" value="<?= URL_PATH ?><?= $product->image ?>"> 
                                                    <img width="75px" src="<?= URL_PATH ?><?= $image->path ?>">
                                                </a>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="sg-content">
                                    <input type="hidden" id="product_id" value="<?= $product->id ?>">
                                    <div class="pro-tag">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item"><a href=""><?= $product->category->name ?></a></li>
                                        </ul>
                                        <p></p>
                                    </div>
                                     <div class="pro-name">
                                         <p><?= $product->name ?></p>
                                     </div>
                                     
                                    
                                     <?php if($product->offer > 0) : ?>
                                     <!--<h3><span class="badge badge-pill badge-danger">- <?= $product->offer ?>% Off</span></h3>-->
                                     <?php endif ?>
                                     
                                     <div class="pro-price">
                                         <ul class="list-unstyled list-inline">
                                         
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

                                            <?php if($product->category_id == 2 || $product->category_id == 3) : ?>
                                            <p>Para solicitar el armado del equipo, <a class="text-danger" href="<?= URL_PATH ?>/page/contact">chateá con nosotros</a>.</p>
                                             <?php endif ?>

                                         </ul>

                                         

                                         <p>Marca: 
                                            <span><?= $product->brand ?></span>
                                         </p>

                                         <p>Disponibilidad: 
                                            <?php if($product->stock > 0) : ?>

                                                <?php if($product->stock == 1) : ?>
                                                    <span>Con stock</span> <label>(<?= $product->stock ?> disponible)</label>
                                                <?php else : ?>
                                                    <span>Con stock</span> <label>(<?= $product->stock ?> disponibles)</label>
                                                <?php endif ?>

                                                
                                            <?php else : ?>
                                                <span>Consulte disponibilidad</span>
                                            <?php endif ?>
                                         </p>
                                     </div>
                                     
                                     <div class="colo-siz">
                                         <div class="qty-box">
                                             <ul class="list-unstyled list-inline">
                                                 <li class="list-inline-item">Cantidad :</li>
                                                 <li class="list-inline-item quantity buttons_added">
                                                     <input type="button" value="-" class="minus">
                                                     <input type="number" id="quantity" step="1" min="1" max="<?= $product->stock ?>" value="1" class="qty text" size="4" readonly>
                                                     <input type="button" value="+" class="plus">
                                                 </li>
                                             </ul>
                                         </div>
                                         
                                         <div class="pro-btns">

                                            <div class="btn-group">
                                                <a href="#" class="cart btn-cart-add" data-product-id="<?= $product->id ?>">Añadir al carrito</a>
                                                <div class="add-favorite">
                                                    <input type="hidden" value="<?= $product->id ?>">
                                                    <a href="#" class="fav-com btn-favorite-add" data-product-id="<?= $product->id ?>" data-toggle="tooltip" data-placement="top" title="Me gusta"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-fav.png" alt=""></a>
                                                    <a href="https://wa.me/?text=<?= $product->name ?> - <?= URL_PATH ?>/product/show/<?= $product->slug ?>" class="fav-com" data-toggle="tooltip" data-placement="right" title="Compartir en WhatsApp"><img src="<?= URL_PATH ?>/assets/ecommerce-template/images/it-comp.png" alt=""></a>
                                                </div>
                                            </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                
                                <div class="sg-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#pro-det">Detalles del producto</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#com"><i class="fa fa-comment-o text-primary"></i> Comentarios (<?= \app\helpers\Utils::getComments_count_product($product->id) ?>)</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rev"><i class="fa fa-star-o text-warning"></i> Reseñas (<?= \app\helpers\Utils::getReview_count($product->id) ?>)</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pro-det" role="tabpanel">
                                            <?= $product->description ?>
                                        </div>

                                        <!-- TAB-COMMENTS -->
                                        <div class="tab-pane fade" id="com" role="tabpanel">
                                            
                                            <!-- Blog Details -->
                                            <section class="blog-details">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="blog-d-box">
                                                                
                                                                <div class="blog-comment">
                                                                    <h4 id="section-comments">Comentarios (<?= \app\helpers\Utils::getComments_count_product($product->id) ?>)</h4>
                                                                    
                                                                    <?php if(count($product->product_comments) > 0) : ?>
                                                                        <?php foreach($product->product_comments as $comment) : ?>
                                                                        <div class="comment-box d-flex">
                                                                            <div class="comment-con">
                                                                                <input type="hidden" class="comment-id" value="<?= $comment->id ?>">
                                                                                <ul class="list-unstyled list-inline">
                                                                                    <li class="list-inline-item">
                                                                                        <?php if($comment->user->role->id == 1) : ?>
                                                                                            <span class="badge badge-danger text-white">
                                                                                                <i class="fa fa-user"></i>
                                                                                                <?= $reply->user->role->name ?>
                                                                                            </span>
                                                                                        <?php else : ?>
                                                                                            
                                                                                            <?php if(\app\helpers\Utils::getUser_id() == $comment->user->id) : ?>
                                                                                                <i class="fa fa-user"></i>
                                                                                                <strong class="text-pink"><u>Tú</u></strong> 
                                                                                            <?php else : ?>
                                                                                                <i class="fa fa-user"></i>
                                                                                                <?= $comment->user->name ?>
                                                                                            <?php endif ?>
                                                                                            
                                                                                        <?php endif ?>
                                                                                    </li>
                                                                                    <?php if(\app\helpers\Utils::getUser_id() != $comment->user->id) : ?>
                                                                                    <li class="list-inline-item">
                                                                                        <a href="#" 
                                                                                        data-product="<?= $product->id ?>" 
                                                                                        data-comment="<?= $comment->id ?>" 
                                                                                        data-user-id="<?= $comment->user->id ?>" 
                                                                                        data-name="<?= $comment->user->name ?>" 
                                                                                        class="btn-reply" data-toggle="modal" data-target="#modal-reply">Responder
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php endif ?>
                                                                                    <?php if(\app\helpers\Utils::roleAdmin()) : ?>
                                                                                    <li class="list-inline-item">
                                                                                        <a href="#" class="btn-delete" data-comment-id="<?= $comment->id ?>" data-user-name="<?= $comment->user->name ?>" data-toogle="tooltip" title="Eliminar comentario">
                                                                                            <i class="fa fa-trash text-danger"></i>
                                                                                            
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php endif ?>
                                                                                </ul>
                                                                                <span><i class="fa fa-clock-o"></i> <?= $comment->created_at->diffForHumans() ?></span>
                                                                                <p><?= $comment->comment ?></p>
                                                                                
                                                                            </div>
                                                                        </div>

                                                                        <?php if($comment->replies) : ?>
                                                                            <?php foreach($comment->replies as $reply) : ?>
                                                                                <div class="comment-box comment-box2 d-flex">
                                                                                    <div class="comment-con">
                                                                                        <ul class="list-unstyled list-inline">
                                                                                            <li class="list-inline-item">
                                                                                            <?php if($reply->user->role->id == 1) : ?>
                                                                                                <span class="badge badge-danger text-white">
                                                                                                    <i class="fa fa-user"></i>
                                                                                                    <?= $reply->user->role->name ?>
                                                                                                </span>
                                                                                            <?php else : ?>
                                                                                                <?php if(\app\helpers\Utils::getUser_id() == $reply->user->id) : ?>
                                                                                                    <i class="fa fa-user"></i>
                                                                                                    <strong class="text-pink"><u>Tú</u></strong> 
                                                                                                <?php else : ?>
                                                                                                    <i class="fa fa-user"></i>
                                                                                                    <?= $reply->user->name ?>
                                                                                                <?php endif ?>
                                                                                            <?php endif ?>
                                                                                            </li>
                                                                                            <?php if(\app\helpers\Utils::getUser_id() != $reply->user->id) : ?>
                                                                                                <li class="list-inline-item">
                                                                                                    <a href="#" 
                                                                                                    data-product="<?= $product->id ?>" 
                                                                                                    data-comment="<?= $comment->id ?>" 
                                                                                                    data-user-id="<?= $reply->user->id ?>" 
                                                                                                    data-name="<?= $reply->user->name ?>" 
                                                                                                    class="btn-reply" data-toggle="modal" data-target="#modal-reply">Responder
                                                                                                    </a>
                                                                                                </li>
                                                                                            <?php endif ?>
                                                                                            <li class="list-inline-item"></li>
                                                                                            <?php if(\app\helpers\Utils::roleAdmin()) : ?>
                                                                                            <li class="list-inline-item">
                                                                                                <a href="#" class="btn-delete" data-comment-id="<?= $reply->id ?>" data-user-name="<?= $reply->user->name ?>" data-toogle="tooltip" title="Eliminar comentario">
                                                                                                    <i class="fa fa-trash text-danger"></i>
                                                                                                    
                                                                                                </a>
                                                                                            </li>
                                                                                            <?php endif ?>
                                                                                        </ul>
                                                                                        <span><i class="fa fa-clock-o"></i> <?= $reply->created_at->diffForHumans() ?></span>
                                                                                        <p><?= $reply->comment ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach ?>

                                                                        <?php endif ?>

                                                                        <?php endforeach ?>
                                                                    <?php else : ?>
                                                                        
                                                                    <?php endif ?>
                                                                    
                                                                </div>
                                                                <div class="comment-form">
                                                                    <h6>¿Tienes alguna duda?</h6>
                                                                    <h5>Publica un comentario!</h5>
                                                                    <form id="form-comment" action="#">

                                                                        <div class="row">
                                                                            <?php if(isset($_SESSION['login'])) : ?>
                                                                            <div class="col-md-12">
                                                                                <textarea id="textarea-comment" data-product-id="<?= $product->id ?>" placeholder="Escriba su comentario..." required=""></textarea>
                                                                                <button type="submit" id="btn-submit">Comentar</button>
                                                                            </div>
                                                                            <?php else :  ?>
                                                                                <div class="alert alert-warning">
                                                                                    Para realizar un comentario es necesario que <a href="<?= URL_PATH ?>/auth">inicie sesión</a>.
                                                                                </div>
                                                                            <?php endif ?>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End Blog Details -->
                                        </div>

                                        <!-- TAB-REVIEWS -->
                                        <div class="tab-pane fade" id="rev" role="tabpanel">

                                            <?php foreach($reviews as $review) : ?>
                                            <div class="review-box">
                                                <div class="rv-img">
                                                    <img src="images/testimonial-1.jpg" alt="">
                                                </div>
                                                <div class="rv-content">
                                                    <h6>
                                                        <?php if(\app\helpers\Utils::getUser_id() == $review->user->id) : ?>
                                                            <i class="fa fa-user"></i>
                                                            <strong class="text-pink"><u>Tú</u></strong> 
                                                        <?php else : ?>
                                                            <i class="fa fa-user"></i>
                                                            <?= $review->user->name ?>
                                                        <?php endif ?>

                                                        <span>
                                                            <?= $review->created_at->diffForHumans() ?>
                                                        </span>
                                                    </h6>
                                                    <ul class="list-unstyled list-inline">
                                                    <?php 
                                                        for ($i = 0; $i < $review->score; $i++) { 
                                                            echo '<li class="list-inline-item"><i class="fa fa-star"></i></li> ';
                                                        } 
                                                    ?>
                                                    </ul>
                                                    <p><?= $review->comment ?></p>
                                                </div>
                                            </div>
                                            <?php endforeach ?>

                                            <div class="review-form">
                                                <h6>Déjanos tu reseña!</h6>
                                                <form id="form-review" action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="star-rating">
                                                                <label>Seleccione puntaje*</label>
                                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                                <input type="hidden" id="score" class="rating-value" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Escriba un comentario</label>
                                                            <textarea id="textarea-review" data-product-id="<?= $product->id ?>" required></textarea>
                                                            <button type="submit" required>Añadir reseña</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                    
                        <!-- Categorías dimilares -->
                       <?php include('app/views/web/layouts/categories/similar-categories.php') ?>

                       <!-- Destacados -->
                       <?php include('app/views/web/layouts/products/featured-products.php') ?>
                       
                    </div>
                </div>
                
            </div>

            <div class="container">

                <div class="sec-title">
                    <h4>Productos destacados</h4>
                </div>

                <hr>

                <!-- Productos similares -->
                
                <?php include('app/views/web/layouts/products/related-products.php') ?>
            </div>

        </section>
        <!-- End Single Product Area -->


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


        <!-- Realizar reseña -->
        <script>
            $('#form-review').submit(function(e){

                var product_id = $('#textarea-review').attr("data-product-id");

                const postData = {
                    product_id: product_id,
                    comment: $('#textarea-review').val(),
                    score: $('#score').val()
                }

                console.log(postData);

                if(postData.score == 0){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'Debes escoger una puntuación!',
                        showConfirmButton: false,
                        timer: 3100
                    });
                } else {
                    $.post(URL_PATH + '/blog/review', postData, function(r) {
                        //console.log(r);

                        switch (r) {
                            case 'saved':

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Agradecemos tu reseña!',
                                    text: 'Gracias por tomarte el tiempo, serás redirigido a la página principal.',
                                    showConfirmButton: false,
                                    timer: 6000
                                });

                                setTimeout(function(){ 
                                    window.location.href = URL_PATH;
                                }, 6200);
                                
                                break;

                            case 'already_exists':

                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Atención!',
                                    text: 'Ya has dejado tu reseña en éste producto!',
                                    showConfirmButton: false,
                                    timer: 3100
                                });

                                $('#form-reply').trigger('reset');
                                $('#modal-reply').modal('hide');
                                
                                break;

                            case 'not_logged':

                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Atención!',
                                    text: 'Debes iniciar sesión para poder realizar comentarios',
                                    footer: `<a href="${URL_PATH}/auth" class="text-primary">Clic aquí para hacerlo</a>`,
                                    showConfirmButton: true
                                });

                                $('#form-reply').trigger('reset');
                                $('#modal-reply').modal('hide');
                                
                                break;

                            case 'error':

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Algo salió mal!',
                                    text: 'Recargue la página e inténtelo nuevamente.'
                                });
                                
                                break;
                        
                            default:

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Algo salió mal!',
                                    text: 'Recargue la página e inténtelo nuevamente.'
                                });

                                break;
                        }
                        
                    });
                }

                

                e.preventDefault();
            });
        </script>













<script>
            $('.btn-reply').on('click', function (e) {
                var product_id = $(this).attr("data-product");
                var comment_id = $(this).attr("data-comment");
                var user_id = $(this).attr("data-user-id");
                var user_name = $(this).attr("data-name");
                

                $('#product-id').val(product_id);
                $('#comment-id').val(comment_id);
                $('#user-id').val(user_id);
                $('#user-name').html(user_name);

                $('#modal-reply').show();


                e.preventDefault();
            });
        </script>


        <!-- REPLY -->
        <script>
            // btn-submit-add
            $('#form-reply').submit(function(e){

                const postData = {
                    user_logged: $('#user-logged').val(),
                    product_id: $('#product-id').val(),
                    user_id: $('#user-id').val(),
                    comment_id: $('#comment-id').val(),
                    reply: $('#reply').val(),
                };

                //console.log(postData);
                

                $.post(URL_PATH + '/product/reply', postData, function(r) {
                    console.log(r);
                    switch (r) {
                        case 'saved':

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Respuesta publicada!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#form-reply').trigger('reset');
                            $('#modal-reply').modal('hide');

                            setTimeout(function(){ 
                                window.location.reload();
                            }, 2500);
                            
                            break;

                        case 'not_logged':

                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Atención!',
                                text: 'Debes iniciar sesión para poder realizar comentarios',
                                footer: `<a href="${URL_PATH}/auth" class="text-primary">Clic aquí para hacerlo</a>`,
                                showConfirmButton: false
                            });

                            $('#form-reply').trigger('reset');
                            $('#modal-reply').modal('hide');
                            
                            break;

                        case 'error':

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal!',
                                text: 'Recargue la página e inténtelo nuevamente.'
                            });
                            
                            break;
                    
                        default:

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal!',
                                text: 'Recargue la página e inténtelo nuevamente.'
                            });

                            break;
                    }
                    
                });

                e.preventDefault();
            });
        </script>

        <!-- Realizar comentario -->
        <script>
            $('#form-comment').submit(function(e){

                var product_id = $('#textarea-comment').attr("data-product-id");

                const postData = {
                    product_id: product_id,
                    comment: $('#textarea-comment').val()
                }

                //console.log(postData);


                $.post(URL_PATH + '/product/comment', postData, function(r) {
                    //console.log(r);

                    switch (r) {
                        case 'saved':

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Comentario publicado!',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            $("#btn-submit").prop("disabled", true);

                            setTimeout(function(){ 
                                window.location.reload();
                            }, 2500);
                            
                            break;

                        case 'not_logged':

                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Atención!',
                                text: 'Debes iniciar sesión para poder realizar comentarios',
                                footer: `<a href="${URL_PATH}/auth" class="text-primary">Clic aquí para hacerlo</a>`,
                                showConfirmButton: false
                            });

                            $('#form-reply').trigger('reset');
                            $('#modal-reply').modal('hide');
                            
                            break;

                        case 'error':

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal!',
                                text: 'Recargue la página e inténtelo nuevamente.'
                            });
                            
                            break;
                    
                        default:

                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal!',
                                text: 'Recargue la página e inténtelo nuevamente.'
                            });

                            break;
                    }
                    
                });


                e.preventDefault();
            });
        </script>

        <!-- Delete -->
        <script>
            $('.btn-delete').on('click', function (e) {
                var comment_id = $(this).attr("data-comment-id");
                var user_name = $(this).attr("data-user-name");

                //console.log(comment_id);
                //console.log(user_name);

                Swal.fire({
                    title: `¿Desea eliminar el mensaje de <br> ${user_name}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '##757575',
                    confirmButtonText: 'Sí, eliminar!'
                    }).then((result) => {
                        if (result.value) {

                            $.post(URL_PATH + '/product/comment_destroy', {comment_id}, function(r){
                                console.log(r);
                                if(r == 'deleted'){
                                    /* Alert-success */
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Comentario eliminado!',
                                        text: 'El comentario ya no será visible para ninguna persona.',
                                        showConfirmButton: false,
                                        timer: 3500
                                    })  

                                    setTimeout(function(){ 
                                        window.location.reload();
                                    }, 3700);
                                } else {
                                    /* Alert-failed */
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Ha ocurrido un error!',
                                        text: 'Por favor recargue la página e intentelo nuevamente.'
                                    })
                                }

                            });

                        }

                    });
                
                e.preventDefault();
            });
        </script>