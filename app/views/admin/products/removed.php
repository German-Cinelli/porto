<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-star text-olive"></i> Productos
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-star"></i> Productos</a></li>
        <li class="active">Papelera</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de productos inactivos</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/product" class="btn bg-navy">Volver vista normal</a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="products" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Precio ($)</th>
                        <th scope="col">Oferta (%)</th>
                        <th scope="col">Precio en catálogo ($)</th>
                        <th scope="col">Eliminado el</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
              
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->
    
</section>

<script src="<?= URL_PATH ?>/assets/app/product/removed/list.js"></script>
<script src="<?= URL_PATH ?>/assets/app/product/removed/restore.js"></script>

<script>
    $(document).ready(function(){

        fetchProducts();
    });
</script>