<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-home text-olive"></i> Inicio 
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Panel</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?= $customers ?></h3>

                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= URL_PATH ?>/admin/user" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $orders_delivered ?><sup style="font-size: 20px"></sup></h3>

                <p>Pedidos totales</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="<?= URL_PATH ?>/admin/order" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <?php if($orders_pending !=0) : ?>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?= $orders_pending ?></h3>

                <p>Pedidos pendientes</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
              </div>
              <a href="<?= URL_PATH ?>/admin/order/pending" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <?php else : ?>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>0</h3>

                <p>No hay pedidos pendientes</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
              </div>
              <a href="<?= URL_PATH ?>/admin/order" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $quantity_of_products_sold ?></h3>

                <p>Productos vendidos</p>
              </div>
              <div class="icon">
                <i class="fa fa-tags"></i>
              </div>
              <a href="<?= URL_PATH ?>/admin/product" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>


      <div class="row">

        <div class="col-sm-12 col-md-4">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ingresos este mes</span>
              <span class="info-box-number text-green">+ <?= $app['SYMBOL'] ?> <?= \app\helpers\Utils::moneyFormat($earnings_this_month, '$') ?></span>
              <span class="progress-description">
                Mes anterior: <?= $app['SYMBOL'] ?> <?= \app\helpers\Utils::moneyFormat($earnings_previous_month, '$') ?>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-4">
          <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fa fa-tags"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Productos vendidos éste mes</span>
              <span class="info-box-number text-green"><?= $qty_product_sold_this_month ?></span>
              <span class="progress-description">
                Vendidos el mes anterior: <?= $qty_product_sold_previous_month ?>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-4">
          <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Usuarios registrados este mes</span>
              <span class="info-box-number text-green">+<?= $registered_users_this_month ?></span>
              <span class="progress-description">
                Registrados el mes anterior: <?= $registered_users_previous_month ?>
              </span>
            </div>
          </div>
        </div>

      </div><!-- ./row -->


      <!-- Charts -->
      <div class="row">

        <!-- BAR-CHART -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="chart" width="500" height="381"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div><!-- col -->

        <!-- PRODUCT LIST -->
        <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Productos más vendidos</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">

                    <?php foreach($most_selling_products as $index => $product) : ?>
                      <li class="item">
                        <div class="product-img">
                          <?= ++$index ?>
                          <img src="<?= URL_PATH ?><?= $product->image ?>" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="<?= URL_PATH ?>/admin/product/show/<?= $product->id ?>" class="product-title"><?= $product->name ?></a>
                           
                          
                          <!-- Favoritos -->
                          <span style="padding-left: 10px;" class="pull-right text-muted" data-toggle="tooltip" title="Reacciones: <?= \app\helpers\Utils::getQuantity_of_favorites($product->id) ?>">
                            <i class="fa fa-heart-o"></i> 
                            <?= \app\helpers\Utils::getQuantity_of_favorites($product->id) ?>
                          </span>
                          <!-- Vendidos -->
                          <span class="pull-right text-muted" data-toggle="tooltip" title="Vendidos: <?= $product->TotalQuantity ?>">
                            <i class="fa fa-shopping-cart"></i> 
                            <?= $product->TotalQuantity ?>
                          </span>
                          <br>
                          <!-- Reviews -->
                          <span style="padding-left: 10px;" class="pull-right text-muted" data-toggle="tooltip" title="Total de reseñas: <?= \app\helpers\Utils::getQuantity_of_reviews($product->id) ?>">
                            <?php if(\app\helpers\Utils::getQuantity_of_reviews($product->id) == 0) : ?>
                              Sin reseñas.
                            <?php else : ?>

                              <?php for ($i = 0; $i < \app\helpers\Utils::getScore_rounded($product->id); $i++) : ?>
                                <i class="fa fa-star text-yellow"></i> 
                              <?php endfor ?> 

                              <?php if(\app\helpers\Utils::getScore($product->id) > \app\helpers\Utils::getScore_rounded($product->id)) : ?>
                                <i class="fa fa-star-half-o text-yellow"></i> 
                              <?php endif ?>
                            
                            <?php endif ?>
                          
                          </span>

                          <span class="product-description">
                            Categoría: <?= $product->category_name ?>
                          </span>
                        </div>
                    </li>
                    <?php endforeach ?>
                    
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?= URL_PATH ?>/admin/product" class="uppercase">Ver todos los productos</a>
                </div>
                <!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.colr -->

        

        
      </div>
      <!-- /.row -->

   

      

        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Últimos pedidos</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
           </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Pedido N°</th>
                    <th>ID Pago</th>
                    <th>Cliente</th>
                    <th>Fecha compra</th>
                    <th>Método de pago</th>
                    <th>Método de envío</th>
                    <th>Estado</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach($orders as $order) : ?>
                  <tr>
                    <td><a href="<?= URL_PATH ?>/admin/order/show/<?= $order->id ?>">#<?= $order->id ?></a></td>
                    <td><strong><?= $order->mercadopago_payment_id ?></strong></td>
                    <td><?= $order->user->name ?> <?= $order->user->lastname ?></td>
                    <td><?= $order->created_at ?></td>
                    <td>
                      <?= $order->payment_method->name ?>
                    </td>
                    <td>
                      <i class="fa fa-truck text-primary" data-toggle="tooltip" title="<?= $order->shipping_method->name ?>"></i>
                    </td>
                    <td>
                      <span class="label <?= $order->status->bg ?>" data-toggle="tooltip" title="<?= $order->status->description ?>">
                        <?= $order->status->name ?>
                      </span>
                    </td>
                    <td>
                      <strong>
                        <?= $app['SYMBOL'] ?>
                        <?= \app\helpers\Utils::moneyFormat($order->total_amount, '$') ?>
                      </strong>
                    </td>

                  </tr>
                  <?php endforeach ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= URL_PATH ?>/admin/order/create" class="btn btn-sm btn-primary btn-flat pull-left"><i class="fa fa-plus"></i> Registrar venta</a>
              <a href="<?= URL_PATH ?>/admin/order" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los pedidos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          

          <!-- AREA CHART -->
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Preferidos por los clientes</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">

              <ul class="products-list product-list-in-box">

                <?php foreach($favorites as $index => $product) : ?>
                  <li class="item">
                    <div class="product-img">
                      <?= ++$index ?>
                            <img src="<?= URL_PATH ?><?= $product->image ?>" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="<?= URL_PATH ?>/admin/product/show/<?= $product->id ?>" class="product-title"><?= $product->name ?>
                        <span class="pull-right text-muted"><i class="fa fa-heart-o"></i> <?= $product->fav ?></span></a>
                      <span class="product-description">
                        Categoría: <?= $product->category_name ?>
                      </span>
                    </div>
                </li>
                <?php endforeach ?>
                      
              </ul>
                
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div><!-- col -->
          
          <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">TOP Clientes</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">

                  <?php  ?>

                    <?php foreach($best_customers as $index => $customer) : ?>
                      <li class="item">
                        <div class="product-img">
                          <?= ++$index ?>
                          <img src="<?= URL_PATH ?>/assets/customer.png" alt="Customer Image">
                        </div>
                        <div class="product-info">
                          <a href="<?= URL_PATH ?>/admin/user/show/<?= $customer->id ?>" class="product-title"><?= $customer->name ?> <?= $customer->lastname ?>
                            <span class="pull-right text-muted">Productos comprados: <span class="label label-danger"><?= \app\helpers\Utils::getQuantity_purchased_products_byCustomer($customer->id) ?></span></span></a>
                          <span class="product-description">
                            <?= $customer->city ?> - Última compra: <strong><?= $customer->LastOrderDate ?></strong>
                          </span>
                        </div>
                    </li>
                    <?php endforeach ?>
                    
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?= URL_PATH ?>/admin/product" class="uppercase">Listado de clientes</a>
                </div>
                <!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.colr -->

          </div>

      </div>

</section>

<!-- FLOT CHARTS -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/Flot/jquery.flot.categories.js"></script>

<!-- Page script -->
<script>
  $(document).ready(function(){

    months = [];
    number_of_the_months = [];

    /* Obtener número de mes actual */
    var date = new Date();
    var month_number = date.getMonth();

    /* Funcion que devuelve el nombre del mes pasando como parámetro el número */
    function GetMonthName(monthNumber) {
      var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Dicembre'];
      return months.slice(monthNumber)[0];
    }

    /* Funcion que devuelve el nombre del mes pasando como parámetro el número */
    function GetMonthNumber(monthNumber) {
      var months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
      return months.slice(monthNumber)[0];
    }

    /* Loop para obtener los 6 meses anteriores incluidos el actual */
    for (let i = month_number; i > (month_number - 6); i--) {
      months.push(GetMonthName(i)); // push_to_array
      number_of_the_months.push(GetMonthNumber(i)); // push_to_array
    }

    /* Invertimos los array para tenerlos en orden */
    months_reverse = months.reverse();
    number_of_the_months_reverse = number_of_the_months.reverse();

    //console.log(number_of_the_months_reverse);

    var newData = [];

    var datos = {
			labels : months_reverse, // Pasamos el array del nombre de los meses invertido
			datasets : [{
				label : "Gastos",
				backgroundColor : "rgba(202, 24, 24, 0.486)",
				data : []
			},
			{
				label : "Ingresos",
				backgroundColor : "rgba(24, 202, 119, 0.486)",
				data : []
			},
			
			]
		};


		var canvas = document.getElementById('chart').getContext('2d');
		window.bar = new Chart(canvas, {
			type : "bar",
			data : datos,
			options : {
				elements : {
					rectangle : {
						borderWidth : 1,
						borderColor : "rgb(0,255,0)",
						borderSkipped : 'bottom'
					}
				},
				responsive : true,
				title : {
					display : true,
					text : "Gráfico de gastos e ingresos"
				}
			}
		});

		setInterval(function(){

      /**
       * Gastos
       */
      $.ajax({
        url: URL_PATH + '/admin/reports/graph_invoices',
        method: 'GET',
        success: function(data) {
          newData = [];
          var response = JSON.parse(data);
          var months = number_of_the_months_reverse;
          var expenses = [0, 0, 0, 0, 0, 0];

          for(var i = 0 ; i < response.length ; i++){
            var a = months.indexOf(response[i].month);
            expenses[a] = parseInt(response[i].expenses);
          }
          
          newData.push(expenses);
          
        },
        error: function(data){
          console.log(data);
        }
      });

      /**
       * Ingresos
       */
      $.ajax({
        url: URL_PATH + '/admin/reports/graph_orders',
        method: 'GET',
        success: function(data) {
          
          //newData = [];
          
          var response = JSON.parse(data);
          var months = number_of_the_months_reverse;
          var income = [0, 0, 0, 0, 0, 0];

          for(var i = 0 ; i < response.length ; i++){
            var a = months.indexOf(response[i].month);
            income[a] = parseInt(response[i].income);
          }
          
          newData.push(income);
          
        },
        error: function(data){
          console.log(data);
        }
      });
     
      /**
       * Ocurre un error en donde sin motivo aparente newData tiene 3 arrays
       * Deberían ser 2 porque cada vez que entra en el loop lo declaro como array vacío
       * En caso que sean 2 (Correcto) actualizamos el chart
       */
      if(Object.keys(newData).length != 2){

        //console.log('ERROR');

      } else {

        $.each(datos.datasets, function(i, dataset){
          dataset.data = newData[i];
          window.bar.update();
        });
      
			
      }
      
      

		
		}, 3500);

  });
  
</script>