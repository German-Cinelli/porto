<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-question-circle text-olive"></i> Sección de ayuda
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Ayuda</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                            Información general
                        </a>
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="box-body">
                            En <i class="fa fa-home"></i> Inicio, se le proporcionará información general y 
                            estadísticas con respecto a los ingresos, pedidos y ventas que realice su empresa.
                            <br><br>
                            Podrá visualizar la cantidad de usuarios registrados, ventas realizadas 
                            y las ventas pendentes de envío junto con otro tipo de información relevante.
                            <br><br>
                            Dispondrá de una barra lateral posicionada a la izquierda la cual podrá comprimir
                            pulsando sobre el ícono <i class="fa fa-bars"></i> que se encuentra del lado superior. Aunque le recomendamos que no lo haga para tener una mejor orientación.
                            <br><br>
                            Dentro de ella tendrá disponible los distintos iconos que daran acceso a los recursos que se soliciten.
                            <br><br><br>
                            Al navegar por el sistema, y listar un recurso, visualizará 
                            una tabla donde dispondrá de 3 posibles acciones:
                            <i class="fa fa-search-plus text-blue"></i> 
                            <i class="fa fa-edit text-yellow"></i> 
                            <i class="fa fa-trash text-red"></i>
                            <br><br><br>
                            Acción <i class="fa fa-search-plus text-blue"></i> : 
                            Solicita más información acerca de un registro. 
                            <br><br>
                            Acción <i class="fa fa-edit text-yellow"></i> : 
                            Edita la información de un registro existente.
                            <br><br>
                            Acción <i class="fa fa-trash text-red"></i> : 
                            Elimina un registro.
                            <br><br>
                            Al eliminar un registro esa información persiste en nuestra base de datos.
                            Si usted desea restaurar alguno de estos registros podrá hacerlo con el botón
                            <i class="fa fa-recycle text-green"></i>.
                            <br><br>
                            Cuando liste un recurso, en la parte superior de cada tabla habrá una caja
                            de texto en donde podrá filtrar una buśqueda y ordenar alfabéticamente con el ićono
                            <i class="fa fa-long-arrow-up"></i><i class="fa fa-long-arrow-down"></i>.
                            <br><br><br>
                            Al momento de adquirir el sistema configúrelo dirigiendose a <i class="fa fa-cog"></i> Configuración.
                            Podrá establecer valores como el nombre de su empresa, ciudad, localidad, dirección y teléfono entre otras.
                            Es importante que complete el fomulario y utilice datos reales de su empresa ya que serán utilizados en varios módulos
                            del sitio.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                            Sobre productos & categorías
                        </a>
                    </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in">
                        <div class="box-body">
                            Podrá acceder a la lista de sus productos desde la barra lateral pulsando sobre <i class="fa fa-star"></i> Productos.
                            <br><br>
                            <i class="fa fa-cubes text-black"></i> Categorías: Tiene como finalidad clasificar los productos facilitando el orden.
                            Ejemplos: Computadoras & Notebooks, Audio & Parlantes, Electrodomésticos, etc.
                            <br><br>
                            Algo a tener en cuenta, cuando usted crea una categoría, también esta creando un nuevo elemento en el menú de su sitio web.
                            <br><br>
                            Una categoría padre puede tener categorías hijas (Ejemplo 1)
                            <br>
                            Pero tambien, una categoría hija puede ser padre a la vez (Ejemplo 2)
                            <br><br>

                            <div class="col-md-6">
                                Ejemplo 1:
                                <ul>
                                    <li>Computadoras & Notebooks
                                        <ul>
                                            <li>Computadoras</li>
                                            <li>Notebooks</li>
                                        </ul>
                                    </li>
                                    <li>Electrodomésticos
                                        <ul>
                                            <li>Refrigerador y Congeladores</li>
                                            <li>Aire acondicionado</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                Ejemplo 2:
                                <ul>
                                    <li>Computadoras & Notebooks
                                        <ul>
                                            <li>Computadoras
                                                <ul>
                                                    <li>Equipos AMD</li>
                                                    <li>Equipos Intel</li>
                                                    <li>PC Gamer</li>
                                                    <li>All in One</li>
                                                </ul>
                                            </li>
                                            <li>Notebooks</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <br>
                            Para editar la jerarquía o las posiciones del menú dirígase a <i class="fa fa-cubes"></i> Categorias, mantenga pulsado sobre el ícono <i class="fa fa-bars text-muted"></i> 
                            que se encuentra en el extremo izquierdo envolviendo la categoría, arrastrela para cambiar su posición y guarde los cambios

                            <br><br>
                            Al momento de listar los productos verá las etiquetas: <span class="label bg-green">Activo</span> o <span class="label bg-red">Inactivo</span>
                            <br><br>
                            <span class="label bg-green">Activo</span> Señala que el producto se está 
                            mostrando en el catálogo, significa que puede ser comprado por sus clientes.
                            <br><br>
                            <span class="label bg-red">Inactivo</span> Indica lo contrario, el producto con ésta etiqueta 
                            no podrá ser comprado por sus clientes, no se mostrará en el catálogo.
                            <br><br>
                            Al momento de detallar más información acerca de un producto, tambien podrá saberlo con los siguientes iconos:
                            <i class="fa fa-circle text-green"></i> <i class="fa fa-circle text-red"></i> 
                            <br><br>
                            Éste dato se muestra encima de la imagen principal de un producto.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion3" href="#collapse3">
                            Sobre envíos
                        </a>
                    </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <div class="box-body">
                            Podrá modificar el costo de envío de un pedido dirigiéndose a <i class="fa fa-truck"></i> Envíos.
                            <br><br>
                            
                            El costo actualmente es de <?= \app\helpers\Utils::moneyFormat(\app\helpers\Utils::getShipping_cost(), '$') ?> <span class="text-lowercase"><?= $app['CURRENCY'] ?></span>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion4" href="#collapse4">
                            Sobre clientes
                        </a>
                    </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse in">
                        <div class="box-body">
                            Definimos 'Cliente' como todo aquel usuario que navege por la web y acceda desde el formulario de registro.
                            Podrá listar sus clientes dirigiéndose a <i class="fa fa-users"></i> Clientes desde el panel lateral.
                            <br><br>
                            Dicho lo anterior, se listarán todos los clientes registrados sin restricciones, 
                            es decir, hayan realizado o no alguna compra.
                            <br><br>
                            Podrá ver más información acerca de un cliente con el botón <i class="fa fa-search-plus text-blue"></i>.
                            Se detallarán sus datos personales y las compras realizadas.
                            <br><br>
                            Los datos personales del cliente serán utilizados con el propósito de detallar la dirección de envío 
                            en la factura, que a su vez usted tendrá como referencia a la hora de realizar la entrega.
                            <br><br>
                            El cliente al registrarse tiene el consentimiento del uso que se le dará a su información.
                            Se detalla dentro de los Términos y Condiciones sobre el cual el usuario acepta al momento registrarse.
                            Ésta información se encuentra disponible en la sección <a href="<?= URL_PATH ?>/page/terms#data-policy" target="_blank">Política de datos</a>.
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion5" href="#collapse5">
                            Sobre pedidos
                        </a>
                    </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in">
                        <div class="box-body">
                                Cuando un cliente realiza una compra el pedido tendrá un estado 
                                'Pendiente' con el ícono: <i class="fa fa-minus-square text-yellow"></i>
                            <br><br>
                                En el listado de pedidos dispondrá de las siguientes acciones: 
                                <i class="fa fa-info-circle text-blue"></i> 
                                <i class="fa fa-check-circle text-green"></i> 
                                <i class="fa fa-print text-black"></i>
                            <br><br><br>
                                Acción <i class="fa fa-info-circle text-blue"></i> : 
                                Corresponde a dar más información sobre el pedido realizado. 
                                Así como los productos que compraron, el total, dirección de envío, etc. 
                            <br><br>
                                Acción <i class="fa fa-compress text-green"></i> : 
                                Una vez los productos hayan entregados al cliente usted 
                                podrá modificar el estado en que se encuentra el pedido. 
                                Realizada ésta acción el pedido pasara de estado 'Pendiente <i class="fa fa-minus-square text-yellow"></i>'
                                a 'Concretado <i class="fa fa-check-square text-blue"></i>'.
                            <br><br>
                                Acción <i class="fa fa-print text-black"></i> : 
                                Podrá imprimir sus facturas en un formato de hoja A4. 
                                Ésta factura contiene información acerca del pedido realizado, ademas de los datos 
                                necesarios para su envío (departamento, localidad, dirección y teléfono del cliente).
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion6" href="#collapse6">
                            Sobre ventas
                        </a>
                    </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse in">
                        <div class="box-body">
                            Ud. podrá registrar las ventas que se realizan 'por fuera' de la Web. Dirigiéndose a  "<i class="fa fa-calendar-plus-o"></i> Registrar venta" seleccione los calzados que solicitó su cliente pulsando sobre el icono <i class="fa fa-plus text-blue"></i>. A continuación podrá personalizarlo detallando materiales, colores, talles, suela y los datos de envío.
                            <br><br>
                            Considere que el precio y el descuento de un calzado NO se tendrá en cuenta al momento de realizar la factura, podrá ingresar el precio del calzado y el costo de envío de forma manual.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse7">
                            Sobre envío de correos
                        </a>
                    </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse in">
                        <div class="box-body">
                            Sus clientes podrán contactarlo a través del <a href="<?= URL_PATH ?>/page/contact" target="_blank">formulario de contacto.</a>
                            Podrá ver los mensajes desde su bandeja de correo electrónico, o bien, también podrá acceder a ellos pulsando en '<i class="fa fa-envelope"></i> Mensajes'.
                            Además, en la esquina superior derecha, el icono <i class="fa fa-envelope-o"></i> le notificará los mensajes recibidos.
                            <br><br>
                            Recomendamos que conteste los mensajes desde la página, ya que una vez responda el mensaje éste cambiará su estado, así podrá diferenciar tanto mensajes recibidos como respondidos para una mejor organización.
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </div>
    
</section>