<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-th-large text-olive"></i> Canastas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/combo"><i class="fa fa-th-large"></i> Canastas</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de canastas</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/combo/create" class="btn btn-primary">
                    <span class="fa fa-plus"></span>
                    Nueva canasta  
                </a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example2" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($combos as $combo) : ?>

                        <tr>
                            <td>
                                <a href="<?= URL_PATH ?>/admin/combo/show/<?= $combo->id ?>">#<?= $combo->id ?></a>
                            </td>
                            <td>
                                <img width="72px" src="<?= URL_PATH ?><?= $combo->image ?>" alt="">
                                <?= $combo->name ?>
                            </td>
                            <td>
                                <?= $app['SYMBOL'] ?>
                                <?= \app\helpers\Utils::moneyFormat($combo->price) ?>
                            </td>
                            <td>
                                <?php if($combo->status == 0) : ?>
                                    <span data-toggle="tooltip" title="La canasta no se está mostrarando en el catálogo."><i class="fa fa-circle text-red"></i> Inactivo</span>
                                <?php else : ?>
                                    <span data-toggle="tooltip" title="La canasta se está mostrarando en el catálogo."><i class="fa fa-circle text-green"></i> Activo</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                        <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= URL_PATH ?>/admin/combo/show/<?= $combo->id ?>">
                                                <i class="fa fa-info-circle text-blue"></i>
                                                Más información
                                            </a>
                                        </li>

                                        <?php if($combo->status == 0) : ?>
                                            <li>
                                                <a href="#" class="btn-on" data-combo-id="<?= $combo->id ?>">
                                                    <i class="fa fa-check-circle text-green" ></i> 
                                                    Activar
                                                </a>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="#" class="btn-off" data-combo-id="<?= $combo->id ?>">
                                                    <i class="fa fa-ban text-red"></i> 
                                                    Desactivar
                                                </a>
                                            </li>
                                        <?php endif ?>

                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>


<script>
$(document).on('click', '.btn-on', function(e){
        var id = $(this).attr("data-combo-id");

        Swal.fire({
            title: `¿Desea activar la canasta <br> N° ${id}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#757575',
            confirmButtonText: 'Sí, activar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/combo/on', {id}, function(r){
                    if(r == 'restored'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Acción exitosa!',
                            text: 'El registro ha sido activado.'
                        })
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error!',
                            footer: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }
                    
                    setTimeout(function(){
                        window.location.reload(false); 
                    }, 2150);

                });

            }

        });

        e.preventDefault();
    })
</script>


<script>
$(document).on('click', '.btn-off', function(e){
        var id = $(this).attr("data-combo-id")

        Swal.fire({
            title: `¿Desea desactivar la canasta <br> N° ${id}?`,
            //text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#757575',
            confirmButtonText: 'Si, desactivar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/combo/off', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Acción exitosa!',
                            text: 'El registro ha sido desactivado.',
                            showConfirmButton: false,
                            timer: 3900
                        })  
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }

                    setTimeout(function(){
                        window.location.reload(false); 
                    }, 2150);
                    
                });
                
            }

        });

        e.preventDefault();
    })
</script>