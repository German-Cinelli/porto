<section class="content-header">
    <h1>
        Categorias
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/category"><i class="fa fa-dashboard"></i> Categorias</a></li>
        <li class="active">Papelera</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de categorias removidas</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/category" class="btn bg-navy">Volver vista normal</a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->
        

        <div class="box-body">
            <table id="categories" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Eliminado el</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>

            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->
    
</section>

<script src="<?= URL_PATH ?>/assets/app/category/removed/list.js"></script>
<script src="<?= URL_PATH ?>/assets/app/category/removed/restore.js"></script>

<script>
    $(document).ready(function(){

        fetchCategories();
    });
</script>