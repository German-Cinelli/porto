        <?php include('app/views/web/blog/modal-reply.php') ?>

        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">


								<h1 class="text-dark font-weight-bold text-8">BLOG</h1>
                                <span class="sub-title text-dark"></span>
							</div>

							<div class="col-md-12 align-self-center order-1">


								<ul class="breadcrumb d-block text-center">
									<li><a href="<?= URL_PATH ?>">Inicio</a></li>
                                    <li><a href="<?= URL_PATH ?>/blog">Blog</a></li>
									<li class="active">Ver noticia</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

                <div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post border-0 m-0 p-0">
                                    <div class="post-image ml-0">
										<?php if($post->image) : ?>
											<img width="800px" src="<?= URL_PATH ?><?= $post->image ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                        <?php else : ?>
                                            <div class="text-center">
                                                <?= $post->embedded_content ?>
                                            </div>
                                        <?php endif ?>
										</a>
									</div>

									<div class="post-date ml-0">
										<span class="day"><?= $post->created_at->format('d') ?></span>
										<span class="month"><?= $post->created_at->format('M Y') ?></span>
									</div>

									<div class="post-content ml-0">

										<h2 class="font-weight-bold text-primary"><?= $post->title ?></h2>

										<div class="post-meta">
											<span><i class="far fa-comments"></i> Comentarios:<a href="#section-comments">(<span><?= \app\helpers\Utils::getComments_count_blog($post->id) ?></span>)</a></span>
										</div>

										<p><?= $post->description ?></p>


										<!--<div class="post-block mt-5 post-share">
											<h4 class="mb-3">Compartir</h4>-->

											<!-- AddThis Button BEGIN -->
											<!--<div class="addthis_toolbox addthis_default_style ">
												<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
												<a class="addthis_button_tweet"></a>
												<a class="addthis_button_pinterest_pinit"></a>
												<a class="addthis_counter addthis_pill_style"></a>
											</div>
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
											

										</div>-->

                                        <div id="section-comments" class="post-block mt-5 post-comments">
											<h4 class="mb-3">Comentarios (<?= \app\helpers\Utils::getComments_count_blog($post->id) ?>)</h4>

                                            <?php if(count($post->post_comments) > 0) : ?>
                                                <?php foreach($post->post_comments as $comment) : ?>
                                                <ul class="comments">
                                                    <li>
                                                        <div class="comment">
                                                            <input type="hidden" class="comment-id" value="<?= $comment->id ?>">
                                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                <img class="avatar" alt="" src="<?= URL_PATH ?>/assets/dist/images/user-avatar.png">
                                                            </div>
                                                            <div class="comment-block">
                                                                <div class="comment-arrow"></div>
                                                                <span class="comment-by">
                                                                    <?php if($comment->user->role->id == 1) : ?>
                                                                        <strong class="text-danger"><?= $app['COMPANY_NAME'] ?></strong>
                                                                    <?php else : ?>

                                                                        <?php if(\app\helpers\Utils::getUser_id() == $comment->user->id) : ?>
                                                                            <strong>Tú</strong>
                                                                        <?php else : ?>
                                                                            <strong><?= $comment->user->name ?></strong>
                                                                        <?php endif ?>

                                                                    <?php endif ?>

                                                                    <span class="float-right">
                                                                        <?php if(\app\helpers\Utils::getUser_id() != $comment->user->id) : ?>
                                                                        <!-- BTN REPLY-COMMENT -->
                                                                        <span> 
                                                                            <a href="#"
                                                                                data-post="<?= $post->id ?>" 
                                                                                data-comment="<?= $comment->id ?>" 
                                                                                data-user-id="<?= $comment->user->id ?>" 
                                                                                data-name="<?= $comment->user->name ?>" 
                                                                                class="btn-reply" data-toggle="modal" data-target="#modal-reply"
                                                                            >
                                                                                <i class="fas fa-reply"></i> 
                                                                                Responder
                                                                            </a>
                                                                        </span>
                                                                        <?php endif ?>

                                                                        <?php if(\app\helpers\Utils::roleAdmin()) : ?>
                                                                        <!-- BTN DELETE-COMMENT -->
                                                                        <span>
                                                                            <a href="#" class="btn-delete" data-comment-id="<?= $comment->id ?>" data-user-name="<?= $comment->user->name ?>" data-toogle="tooltip" title="Eliminar comentario">
                                                                                <i class="fas fa-trash text-danger"></i>
                                                                                Eliminar                                  
                                                                            </a>
                                                                        </span>
                                                                            
                                                                        <?php endif ?>
                                                                    </span>

                                                                </span>
                                                                <p><?= $comment->comment ?></p>
											                    <span class="date float-right"><?= $comment->created_at->diffForHumans() ?></span>
                                                            </div>
                                                        </div>

                                                        <?php if($comment->replies) : ?>

                                                        <?php foreach($comment->replies as $reply) : ?>

                                                        <ul class="comments reply">
                                                            <li>
                                                                <div class="comment">
                                                                    <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                        <img class="avatar" alt="" src="<?= URL_PATH ?>/assets/dist/images/user-avatar.png">
                                                                    </div>
                                                                    <div class="comment-block">
                                                                        <div class="comment-arrow"></div>
                                                                        <span class="comment-by">
                                                                            <?php if($reply->user->role->id == 1) : ?>
                                                                                <strong class="text-danger"><?= $reply->user->role->name ?></strong>
                                                                            <?php else : ?>

                                                                                <?php if(\app\helpers\Utils::getUser_id() == $reply->user->id) : ?>
                                                                                    <strong>Tú</strong>
                                                                                <?php else : ?>
                                                                                    <strong><?= $reply->user->name ?></strong>
                                                                                <?php endif ?>

                                                                            <?php endif ?>

                                                                            <span class="float-right">
                                                                                <?php if(\app\helpers\Utils::getUser_id() != $reply->user->id) : ?>
                                                                                <!-- BTN REPLY-COMMENT -->
                                                                                <span> 
                                                                                    <a href="#"
                                                                                        data-post="<?= $post->id ?>" 
                                                                                        data-comment="<?= $comment->id ?>" 
                                                                                        data-user-id="<?= $reply->user->id ?>" 
                                                                                        data-name="<?= $reply->user->name ?>" 
                                                                                        class="btn-reply" data-toggle="modal" data-target="#modal-reply"
                                                                                    >
                                                                                        <i class="fas fa-reply"></i> 
                                                                                        Responder
                                                                                    </a>
                                                                                </span>
                                                                                <?php endif ?>

                                                                                <?php if(\app\helpers\Utils::roleAdmin()) : ?>
                                                                                <!-- BTN DELETE-COMMENT -->
                                                                                <span>
                                                                                    <a href="#" class="btn-delete" data-comment-id="<?= $reply->id ?>" data-user-name="<?= $reply->user->name ?>" data-toogle="tooltip" title="Eliminar comentario">
                                                                                        <i class="fas fa-trash text-danger"></i>
                                                                                        Eliminar                                  
                                                                                    </a>
                                                                                </span>
                                                                                    
                                                                                <?php endif ?>
                                                                            </span>
                                                                        </span>
                                                                            <p><?= $reply->comment ?></p>
                                                                            <span class="date float-right"><?= $reply->created_at->diffForHumans() ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    <?php endforeach ?>
                                                    <?php endif ?>
                                                    
                                                    </li>
                                                </ul>
                                                <?php endforeach ?>
                                            <?php endif ?>

										</div>

										<div class="post-block mt-5 post-leave-comment">

											<hr class="solid my-5">
                                            <h5>Publica un comentario!</h5>
                                            <div class="row">
                                                <div class="col">

                                                <?php if(isset($_SESSION['login'])) : ?>
                                                    <form id="form-comment">
                                                        <textarea id="textarea-comment" data-post-id="<?= $post->id ?>" maxlength="5000" data-msg-required="Escriba su comentario..." rows="5" class="form-control" name="message" required></textarea>
                                                        <div class="my-3">
                                                            <button type="submit" id="btn-submit" class="btn btn-primary">Comentar</button>
                                                        </div>
                                                    </form>
                                                <?php else : ?>
                                                    <div class="alert alert-primary">
                                                        Para realizar un comentario es necesario que <a class="text-white" href="<?= URL_PATH ?>/auth"><strong>inicie sesión</strong></a>.
                                                    </div>
                                                <?php endif ?>
                                                </div>

                                            </div>
										</div>

									</div>
								</article>

							</div>
						</div>
					</div>

				</div>


        <script>
            $('.btn-reply').on('click', function (e) {
                var post_id = $(this).attr("data-post");
                var comment_id = $(this).attr("data-comment");
                var user_id = $(this).attr("data-user-id");
                var user_name = $(this).attr("data-name");
                

                $('#post-id').val(post_id);
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
                    post_id: $('#post-id').val(),
                    user_id: $('#user-id').val(),
                    comment_id: $('#comment-id').val(),
                    reply: $('#reply').val(),
                };

                //console.log(postData);
                

                $.post(URL_PATH + '/blog/reply', postData, function(r) {
                    //console.log(r);
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

                var post_id = $('#textarea-comment').attr("data-post-id");

                const postData = {
                    post_id: post_id,
                    comment: $('#textarea-comment').val()
                }

                //console.log(postData);


                $.post(URL_PATH + '/blog/comment', postData, function(r) {
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

                            $.post(URL_PATH + '/blog/comment_destroy', {comment_id}, function(r){
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
