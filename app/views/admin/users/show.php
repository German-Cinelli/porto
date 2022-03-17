<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-user text-olive"></i> Clientes
        <small>Información del cliente</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/user"><i class="fa fa-users"></i> Clientes</a></li>
        <li class="active">Ver</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?= URL_PATH ?>/assets/customer.png" alt="User profile picture">
                    <h3 class="profile-username text-center"><?= $user->name ?> <?= $user->lastname ?></h3>

                
                    <?php if($user->rut) : ?>
                      <div class="alert alert-info alert-dismissible">
                        <small><i class="icon fa fa-warning"></i>El cliente se registró como empresa.</small>
                      </div>
                      <div class="box-header with-border">
                        <strong><i class="fa fa-fax text-red margin-r-5"></i> Razón social</strong>
                        <p class="text-muted"><?= $user->business_name ?></p>
                        <strong><i class="fa fa-dot-circle-o text-red margin-r-5"></i> Rut</strong>
                        <p class="text-muted"><?= $user->rut ?></p>
                      </div>
                    <?php endif ?>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-credit-card margin-r-5"></i> Cédula identidad</strong>
                        <p class="text-muted"><?= $user->document ?></p>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                        <p class="text-muted"><?= $user->address ?></p>

                        <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
                        <p class="text-muted"><?= $user->phone ?></p>

                        <strong><i class="fa fa-mobile-phone margin-r-5"></i> Celular</strong>
                        <p class="text-muted"><?= $user->cellphone ?></p>

                        <strong><i class="fa fa-google margin-r-5"></i> Correo</strong>
                        <p class="text-muted"><?= $user->email ?></p>

                        <strong><i class="fa fa-clock-o margin-r-5"></i> Se registró el...</strong>

                        <p class="text-muted"><?= $user->created_at ?></p>
                        
                    </div>
                    <!-- /.box-body -->

                </div><!-- /.box-body -->

            </div><!-- /.box-primary -->

        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Compras realizadas</a></li>
              <li><a href="#settings" data-toggle="tab"><i class="fa fa-edit"></i> Editar datos</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                 
                  <?php if($orders->isEmpty()) : ?>
                    <div class="alert alert-warning alert-dismissible">
                      <h4><i class="icon fa fa-ban"></i> Sin datos!</h4>

                      <p>Al parecer el cliente <?= $user->name ?> <?= $user->lastname ?> auń no ha realizado ninguna compra.</p>
                    </div>
                  <?php else : ?>

                  <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th scope="col">N° Pedido</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Fecha compra</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($orders as $order) : ?>
                      <tr>
                        <td>#<?= $order->id ?></td>
                        <td><span class="text-green"><?= \app\helpers\Utils::moneyFormat($order->total_amount, '$') ?></span></td>
                        <td><?= $order->created_at ?></td>
                        <td>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                <span class="fa fa-caret-down"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="<?= URL_PATH ?>/admin/order/show/<?= $order->id ?>">
                                        <i class="fa fa-info-circle text-blue"></i>
                                        Más información
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= URL_PATH ?>/admin/order/print/<?= $order->id ?>">
                                        <i class="fa fa-print text-black"></i> 
                                        Imprimir pedido
                                    </a>
                                </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>

                    </tbody>
                
                  </table>

                  <?php endif ?>
                
                </div><!-- /.post -->

              </div>
              
              <div class="tab-pane" id="settings">
                <?php include($include_form_edit); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

    </div><!-- /.row -->
  
</section>