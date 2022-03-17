            <div role="main" class="main">

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
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-3">
							<aside class="sidebar">
								
								<div class="tabs tabs-dark mb-4 pb-2">
									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recientes</a></li>
										<li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="recentPosts">
											<ul class="simple-post-list">

                                                <?php foreach($recent_posts as $post) : ?>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>">

                                                                <?php if($post->image) : ?>
																    <img src="<?= URL_PATH ?><?= $post->image ?>" width="50" height="50" alt="">
                                                                <?php elseif($post->embedded_content) : ?>
																	<img src="<?= URL_PATH ?>/assets/dist/images/play-image.jpg" width="50" height="50" alt="">
																<?php endif ?>
																	
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>"><?= $post->title ?></a>
														<div class="post-meta">
                                                            <?= $post->created_at->diffForHumans() ?>
														</div>
													</div>
												</li>
                                                <?php endforeach ?>
            
											</ul>
										</div>
										<div class="tab-pane" id="popularPosts">
											<ul class="simple-post-list">
												
												<?php foreach($popular_posts as $post) : ?>
													<?php $post = \app\models\Post::find($post->post_id) ?>
													<li>
														<div class="post-image">
															<div class="img-thumbnail img-thumbnail-no-borders d-block">
																<a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>">

																	<?php if($post->image) : ?>
																		<img src="<?= URL_PATH ?><?= $post->image ?>" width="50" height="50" alt="">
																	<?php elseif($post->embedded_content) : ?>
																		<img src="<?= URL_PATH ?>/assets/dist/images/play-image.jpg" width="50" height="50" alt="">
																	<?php endif ?>
																		
																</a>
															</div>
														</div>
														<div class="post-info">
															<a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>"><?= $post->title ?></a>
															<div class="post-meta">
																<?= $post->created_at->diffForHumans() ?>
															</div>
														</div>
													</li>
												<?php endforeach ?>
												
											</ul>
										</div>
									</div>
								</div>

                                <!-- Productos más vendidos -->
                                <?php include('app/views/web/layouts/products/most-selling-products.php') ?>

							</aside>
						</div>
						<div class="col-lg-9">
							<div class="blog-posts">

                                <?php if(!$posts->isEmpty()) : ?>

                                    <?php foreach($posts as $post) : ?>
                                    <article class="post post-medium">
                                        <div class="row mb-3">
                                            <div class="col-lg-5">
                                                <div class="post-image">
                                                    <?php if($post->embedded_content) : ?>
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                        <?= $post->embedded_content ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <img src="<?= URL_PATH ?><?= $post->image ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="post-content">
                                                    <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2"><a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>"><?= $post->title ?></a></h2>
                                                    <p class="mb-0"><?= $post->description ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="post-meta">
                                                    <span><i class="far fa-calendar-alt"></i> <?= $post->created_at->format('d') ?> <?= $post->created_at->format('M Y') ?> </span>
                                                    <span><i class="far fa-user"></i> <?= $app['COMPANY_NAME'] ?></a> </span>
                                                    <span><i class="far fa-comments"></i> Comentarios: <a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>#section-comments">(<span><?= \app\helpers\Utils::getComments_count_blog($post->id) ?></span>)</a> </span>
                                                    <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="<?= URL_PATH ?>/blog/show/<?= $post->slug ?>" class="btn btn-xs btn-light text-1 text-uppercase">Leer más</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <?php endforeach ?>

                                <?php else :  ?>

                                    <div class="alert alert-tertiary container-fluid">
                                        <h4 class="text-white">No se encontraron noticias.</h4>
                                    </div>
                                
                                <?php endif ?>

							</div>

                            <?php if(!$posts->isEmpty()) : ?>

                                <div class="row mt-4">
                                    <div class="col">
                                        <ul class="pagination float-right">
                                            <!-- ARROW-PREVIOUS -->
                                            <li class="page-item"><a class="page-link" href="<?= URL_PATH ?><?= $path ?><?= $posts->previousPageUrl() ?><?= $sort_path ?>"><i class="fas fa-angle-left"></i></a></li>


                                            <?php for ($i = 0 ; $i < $posts->lastpage(); $i++) : ?>
                                            <li class="page-item <?= $_GET['page'] == $i + 1 ? 'active' : '' ?>">
                                                <a class="page-link" href="<?= URL_PATH ?><?= $path ?>/?page=<?= $i + 1 ?><?= $sort_path ?>">
                                                    <?= $i + 1 ?>
                                                </a>
                                            </li>
                                            <?php endfor ?>


                                            <!-- ARROW-NEXT -->
                                            <a class="page-link" href="<?= URL_PATH ?><?= $path ?><?= $posts->nextPageUrl() ?><?= $sort_path ?>"><i class="fas fa-angle-right"></i></a>
                                        </ul>
                                    </div>
                                </div>

                            <?php endif ?>

						</div>
					</div>

				</div>

			</div>