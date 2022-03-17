<?php $app = \app\helpers\Utils::getConfig(); ?>
<?php //dd($app); ?>
<?php Carbon\Carbon::setLocale('es') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $app['COMPANY_NAME'] ?> | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/library/sweetalert2/dist/sweetalert2.min.css"></link>
  <!-- Dropify -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/library/dropify/dist/css/dropify.min.css">

  <!-- jQuery 3 -->
  <script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>

  
        
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/dist/css/skins/skin-black-light.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black-light sidebar-mini">

<?php include('app/views/admin/about/modal.php') ?>

<input type="hidden" id="url_path" value="<?= URL_PATH ?>">
<script>
	const URL_PATH = $('#url_path').val();
</script>

<input type="hidden" id="url_path" value="<?= URL_PATH ?>">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= URL_PATH ?>/admin" class="logo">
      <!-- <img width="250px" class="logo" src=" URL_PATH /assets/img/logo.png" alt=""> -->
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>VDC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ecommerce</b> VDC</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
      
        <ul class="nav navbar-nav">

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if(\app\helpers\Utils::notifications()->count() == 0) : ?>

              <?php else : ?>
                <span class="label label-danger notification-number">
                  <?= \app\helpers\Utils::notifications()->count(); ?>
                </span>
              <?php endif ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                <div class="text-notifications text-muted">
                  <?php if(\app\helpers\Utils::notifications()->count() == 0) : ?>
                    Sin notificaciones.
                  <?php endif ?>

                  <?php if(\app\helpers\Utils::notifications()->count() == 1) : ?>
                    Tienes <?= \app\helpers\Utils::notifications()->count() ?> notificación.
                  <?php endif ?>

                  <?php if(\app\helpers\Utils::notifications()->count() > 1) : ?>
                    Tienes <?= \app\helpers\Utils::notifications()->count() ?> notificaciones.
                  <?php endif ?>

                </div>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  <?php foreach(\app\helpers\Utils::notifications() as $notification) : ?>
                  <li>
                    <a href="<?= URL_PATH ?><?= $notification->path ?>">
                      <input type="hidden" id="notification-id" value="<?= $notification->id ?>">
                      <button type="button" dato="<?= $notification->id ?>" class="close btn-remove-notification" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <img src="<?= URL_PATH ?><?= $notification->image ?>" alt="" width="32px">
                      <i class="<?= $notification->icon ?>"></i>
                      <?= $notification->message ?>
                      <br>
                      <small class="text-muted pull-right">
                        <i class="fa fa-clock-o"></i> 
                        <?= $notification->created_at->diffForHumans() ?>
                      </small>
                    </a>
                  </li>
                  <?php endforeach ?>

                </ul>
              </li>
              <!--<li class="footer"><a href="URL_PATH/admin/notification"></a></li>-->
            </ul>
          </li>
          
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php if(\app\helpers\Utils::messages()->count() == 0) : ?>

              <?php else : ?>
                <span class="label label-success">
                  <?= \app\helpers\Utils::messages()->count(); ?>
                </span>
              <?php endif ?>
              
            </a>

            <ul class="dropdown-menu">
              <li class="header">
                <?php if(\app\helpers\Utils::messages()->count() == 0) : ?>
                    <span class="text-muted">No tienes mensajes</span>.
                  <?php endif ?>

                  <?php if(\app\helpers\Utils::messages()->count() == 1) : ?>
                    Tienes <?= \app\helpers\Utils::messages()->count() ?> mensaje sin responder.
                  <?php endif ?>

                  <?php if(\app\helpers\Utils::messages()->count() > 1) : ?>
                    Tienes <?= \app\helpers\Utils::messages()->count() ?> mensajes sin responder.
                  <?php endif ?>

              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php foreach(\app\helpers\Utils::messages() as $message) : ?>
                <li><!-- start message -->
                  <a href="<?= URL_PATH ?>/admin/inbox/reply/<?= $message->id ?>">
                    <div class="pull-left">
                      <i class="fa fa-envelope text-blue"></i>  
                    </div>
                    <h4>
                      <?= $message->name ?>
                      <small><i class="fa fa-clock-o"></i> <?= $message->created_at ?></small>
                    </h4>
                    
                    <p class="text"><b><?= \app\helpers\Utils::limitTextWords($message->message, 25) ?></b></p>
                  </a>
                </li>
                <?php endforeach ?>
              </ul>
              </li>
              <li class="footer"><a href="<?= URL_PATH ?>/admin/inbox">Ver todos los mensajes</a></li>
            </ul>
          </li>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= URL_PATH ?>/assets/AdminLTE/dist/img/user7-128x128.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $_SESSION['login']->name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= URL_PATH ?>/assets/AdminLTE/dist/img/user7-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                <?= $_SESSION['login']->name ?> <?= $_SESSION['login']->lastname ?>
                  <small>@admin</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right">
                  <a href="<?= URL_PATH ?>/auth/logout" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" id="btn-about"><i class="fa fa-info-circle"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= URL_PATH ?>/assets/AdminLTE/dist/img/user7-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['login']->name ?> <?= $_SESSION['login']->lastname ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">NAVEGACIÓN</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?= URL_PATH ?>" target="_blank"><i class="fa fa-chevron-right text-blue"></i> <span class="text-blue">SU SITIO WEB</span></a></li>
        
        <hr>

        <!-- HOME -->
        <li class="<?php if(isset($home_active)){ echo $home_active; } ?>"><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
      
        <!-- PROVIDER -->
        <li class="treeview <?php if(isset($provider_menu_active)){ echo $provider_menu_active; } ?>">
          <a href="#">
            <i class="fa fa-street-view"></i> <span>Proveedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- PROVIDER-INDEX -->
            <li class="<?php if(isset($provider_index_active)){ echo $provider_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/provider"><i class="fa fa-list-ol"></i> <span>Listar proveedores</span></a></li>
            <!-- PROVIDER-INVOICE -->
            <li class="treeview <?php if(isset($invoice_menu_active)){ echo $invoice_menu_active; } ?>">
              <a href="#"><i class="fa fa-list-alt"></i> Facturas
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- INVOICE-CREATE -->
                <li class="<?php if(isset($invoice_create_active)){ echo $invoice_create_active; } ?>"><a href="<?= URL_PATH ?>/admin/invoice/create"><i class="fa fa-plus"></i> Nueva factura</a></li>
                <!-- INVOICE-INDEX -->
                <li class="<?php if(isset($invoice_index_active)){ echo $invoice_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/invoice"><i class="fa fa-list-ol"></i> Listar facturas</a></li>
                <!-- INVOICE-PAYMENT_HISTORY -->
                <li class="<?php if(isset($invoice_payment_history_active)){ echo $invoice_payment_history_active; } ?>"><a href="<?= URL_PATH ?>/admin/invoice/payment_history"><i class="fa fa-history"></i> Historial de pagos</a></li>
              </ul>
            </li>
            
          </ul>
        </li>
        
        <!-- CUSTOMER -->
        <li class="<?php if(isset($user_index_active)){ echo $user_index_active; } ?>">
          <a href="<?= URL_PATH ?>/admin/user">
            <i class="fa fa-users"></i> 
            <span>Clientes</span>
          </a>
        </li>
        
        <!-- PRODUCT -->
        <li class="treeview <?php if(isset($product_menu_active)){ echo $product_menu_active; } ?>">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- PRODUCT-CREATE -->
            <li class="<?php if(isset($product_create_active)){ echo $product_create_active; } ?>"><a href="<?= URL_PATH ?>/admin/product/create"><i class="fa fa-plus"></i> <span>Nuevo producto</span></a></li>
            <!-- PRODUCT-INDEX -->
            <li class="<?php if(isset($product_index_active)){ echo $product_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-list-ol"></i> <span>Listar productos</span></a></li>
            <!-- CATEGORY-INDEX -->
            <li class="<?php if(isset($category_index_active)){ echo $category_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/category"><i class="fa fa-cubes"></i> <span>Categorías</span></a></li>
            <!-- MASTER-PRODUCT -->
            <li class="treeview <?php if(isset($master_product_menu_active)){ echo $master_product_menu_active; } ?>">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Opciones</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- ATTRIBUTE-INDEX -->
                <li class="<?php if(isset($attribute_value_index_active)){ echo $attribute_value_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/masterproduct/attribute_value"><i class="fa fa-caret-square-o-up"></i> <span>Valores</span></a></li>
                <!-- PRODUCT-INDEX -->
                <li class="<?php if(isset($product_index_active)){ echo $product_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-list-ol"></i> <span>Producto maestro</span></a></li>
                 <!-- CATEGORY-INDEX -->
                <li class="<?php if(isset($category_index_active)){ echo $category_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/category"><i class="fa fa-cubes"></i> <span>Categorías</span></a></li>
              </ul>
            </li>
          </ul>
        </li>

        <!-- ORDER -->
        <li class="treeview <?php if(isset($order_menu_active)){ echo $order_menu_active; } ?>">
          <a href="#">
            <i class="fa fa-opencart"></i> <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- ORDER-CREATE -->
            <li class="<?php if(isset($registerSale_index_active)){ echo $registerSale_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/order/create"><i class="fa fa-shopping-cart"></i> <span>Registrar venta</span></a></li>
            <!-- ORDER-INDEX -->
            <li class="<?php if(isset($order_index_active)){ echo $order_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-list-ol"></i> <span>Listar ventas</span></a></li>
            <!-- ORDER-PENDING -->
            <li class="<?php if(isset($order_pending_active)){ echo $order_pending_active; } ?>"><a href="<?= URL_PATH ?>/admin/order/pending"><i class="fa fa-minus-square"></i> <span>Ventas pendientes</span></a></li>
            <!-- ORDER-CANCELED -->
            <li class="<?php if(isset($order_canceled_active)){ echo $order_canceled_active; } ?>"><a href="<?= URL_PATH ?>/admin/order/canceled"><i class="fa fa-ban"></i> <span>Ventas canceladas</span></a></li>
          </ul>
        </li>

        <!-- BANNERS -->
        <li class="<?php if(isset($offer_menu_active)){ echo $offer_menu_active; } ?>">
          <a href="<?= URL_PATH ?>/admin/offer">
            <i class="fa fa-bolt"></i> 
            <span>Banners</span>
          </a>
        </li>

        <!-- POST -->
        <li class="treeview <?php if(isset($post_menu_active)){ echo $post_menu_active; } ?>">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Publicaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- POST-CREATE -->
            <!--<li class="<?php if(isset($post_create_active)){ echo $post_create_active; } ?>"><a href="<?= URL_PATH ?>/admin/post/create"><i class="fa fa-plus"></i> <span>Nueva publicación</span></a></li>-->
            <!-- POST-INDEX -->
            <li class="<?php if(isset($post_index_active)){ echo $post_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/post"><i class="fa fa-list-ol"></i> <span>Listar publicaciones</span></a></li>
          </ul>
        </li>

        <!-- COMBO -->
        <li class="<?php if(isset($combo_index_active)){ echo $combo_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/combo"><i class="fa fa-th-large"></i> <span>Canastas</span></a></li>

        <!-- COUPON -->
        <li class="<?php if(isset($coupon_index_active)){ echo $coupon_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/coupon"><i class="fa fa-credit-card"></i> <span>Cupones</span></a></li>
        
        <!-- INBOX -->
        <li class="<?php if(isset($inbox_index_active)){ echo $inbox_index_active; } ?>">
          <a href="<?= URL_PATH ?>/admin/inbox">
            <i class="fa fa-envelope"></i> 
            <span>Mensajes</span>
          </a>
        </li>
        
        <!-- CONFIG -->
        <li class="treeview <?php if(isset($settings_menu_active)){ echo $settings_menu_active; } ?>">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Ajustes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- CONFIG -->
            <li class="<?php if(isset($config_index_active)){ echo $config_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/config"><i class="fa fa-cog"></i> <span>Configuración básica</span></a></li>
            <!-- SHIPPING -->
            <li class="<?php if(isset($shippingmethod_index_active)){ echo $shippingmethod_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/shippingmethod"><i class="fa fa-truck"></i> <span>Métodos de envío</span></a></li>
          </ul>
        </li>
        
        <!-- HELP -->
        <li class="<?php if(isset($help_index_active)){ echo $help_index_active; } ?>"><a href="<?= URL_PATH ?>/admin/help"><i class="fa fa-question-circle"></i> <span>Ayuda</span></a></li>


        <hr>

        
        <li><a href="<?= URL_PATH ?>/auth/logout"><i class="fa fa-arrow-circle-left text-red"></i> <span class="text-red">Cerrar sesión</span></a></li>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    <?php 
      if(isset($include)){
        include($include);
      } 
    ?>
        
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Desarrollado por
        <a href="https://sevencrows.com.uy/" target="_blank">SevenCrows</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021</strong>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
  
        <ul class="control-sidebar-menu">
          <li>
            <div class="container">
              <h4 class="text-primary">@SevenCrows</h4>
            </div>
          </li>
          <li>
            <div class="container">
              <i class="fa fa-whatsapp margin-r-5"></i> +598 99 999 999
              <p></p>
              <i class="fa fa-facebook margin-r-5"></i> facebook.com/sevencrows
              <p></p>
              <i class="fa fa-mail-forward margin-r-5"></i> soporte@sevencrows.com.uy
              <p></p>
            </div>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form action="#<?= URL_PATH ?>/suggestions" method="POST">
          <h3 class="control-sidebar-heading">Sugerencias</h3>

          <div class="form-group">
            <div class="form-group">
              <label></label>
              <textarea class="form-control" name="description" rows="12" placeholder="Escriba..."></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Enviar</button>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- Select2 -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap slider -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= URL_PATH ?>/library/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Dropify -->
<script src="<?= URL_PATH ?>/library/dropify/dist/js/dropify.min.js"></script>
<!-- ChartJS -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/chart.js/Chart.js"></script>
<!-- ChartJS -->
<script src="<?= URL_PATH ?>/assets/dist/js/Chart.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- jQuery Knob -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- jQuery Format-CUrrency -->
<script src="<?= URL_PATH ?>/library/format-currency/jquery.formatCurrency-1.4.0.min.js"></script>

<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();

    //Date picker
    $("#datepicker").datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      language: 'es-AR'
    }).datepicker("setDate", new Date());
    
  });
</script>

<!-- app -->
<!--<script src="?= URL_PATH ?>/assets/app.js"></script>-->

<!-- Para que funcione la paginación de los DataTables -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    })

    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */

  })

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  //Timepicker
  /*$('.timepicker').timepicker({
    showInputs: false
  })*/

</script>

<!-- Slider -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider()
  })
</script>

<!-- Dropify -->
<script>
  $ ('.dropify').dropify();
              
  // Translated
  $('.dropify-es').dropify({
    messages: {
    default: 'Arrastre y suelte un archivo o haz clic aquí!',
    replace: 'Arrastre y suelte un archivo o haz clic para reemplazar',
    remove:  'Remover',
    error:   'Lo sentimos, el archivo es demasiado grande.'
    }
  });
</script>

<!-- NOTIFICATIONS -->
<script>
    $(document).on('click', '.btn-remove-notification', function(e){
        var element = $(this).parents('a');
        var number_of_notifications = $('.notification-number').html();
        var notification_id = $(this).siblings('input[type=hidden]').val();

        $.post(URL_PATH + '/admin/notification/destroy', {notification_id}, function(r){
         
          // Remover elemento
          element.remove();
          
          switch (parseInt(--number_of_notifications)) {
            case 0:
              $('.notification-number').html('');
              $('.text-notifications').html('Sin notificaciones.')
              break;

            case 1:
                $('.notification-number').html(parseInt(number_of_notifications));
                $('.text-notifications').html('Tienes ' + number_of_notifications + ' notificación.')
              break;
          
            default:
                $('.notification-number').html(parseInt(number_of_notifications));
                $('.text-notifications').html('Tienes ' + number_of_notifications + ' notificaciones.')
              break;
          }
         
          
          
                    
          
        });

      e.preventDefault();
    });
</script>

<!-- BTN-ABOUT -->
<script>
  $('#btn-about').click(function(e){
    Swal.fire({
      //title: 'Para adquirir el software comuníquese con nosotros.',
      text: 'v0.2',
      imageUrl: URL_PATH + '/assets/dist/images/sevencrows.jpeg',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
      confirmButtonText: 'Cerrar',
      footer: '<a href="https://sevencrows.com.uy/" target="_blank">Nuestro sitio</a>'
    })
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>