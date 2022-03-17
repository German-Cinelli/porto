<!-- modal-create -->
<?php include('app/views/admin/coupons/modals/create.php') ?>
<!-- modal-edit -->
<?php include('app/views/admin/coupons/modals/edit.php') ?>

<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-credit-card text-olive"></i> Cupones
        <small></small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/provider"><i class="fa fa-credit-card"></i> Cupones</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de cupones</h3>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <span class="fa fa-plus"></span>
                    Nuevo cupón 
                </button>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="coupons" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Usos</th>
                        <th scope="col">Límite de uso</th>
                        <th scope="col">Fecha expiración</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
    
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->

</section>


<!-- PROVIDER-INDEX -->
<script>
function fetchCoupons(){
    var table = $('#coupons').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/coupon/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'code'},
            {'data': 'discount_type', 
                render: function(data){
                    return `${data.name}`
                }
            },
            {'data': 'discount'},
            {'data': 'total_usage'},
            {'data': 'limit_usage'},
            {'data': 'expiration_date'},
            {'data': 'is_active', 
                    render: function(data){
                        if(data == 1){
                                return `<i class="fa fa-circle text-green data-toggle="tooltip" title="Activo">`
                        } else {
                                return `<i class="fa fa-circle text-red data-toggle="tooltip" title="Inactivo">`
                        }
                    }
                },
            {'data': 'is_active', 
                render: function(data){

                    if(data == 1){
                        return `
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                    <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" class="btn-show">
                                            <i class="fa fa-info-circle text-blue"></i>
                                            Más información
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-edit text-orange"></i> 
                                            Editar cupón
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-delete">
                                            <i class="fa fa-close text-red"></i> 
                                            Desactivar cupon
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        `
                    } else {
                        return `
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                    <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" class="btn-show">
                                            <i class="fa fa-info-circle text-blue"></i>
                                            Más información
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-edit text-orange"></i> 
                                            Editar cupón
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-restore">
                                            <i class="fa fa-check text-green"></i> 
                                            Activar cupon
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        `
                    }
                }
            }
        
        ],
        'language': {
            url: URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    getDataShow('#coupons tbody', table);
    getDataEdit('#coupons tbody', table);
    getDataDelete('#coupons tbody', table);
    getDataRestore('#coupons tbody', table);
}
</script>



<!-- PROVIDER-SHOW -->
<script>
var getDataShow = function(tbody, table){

    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

    window.location.href = URL_PATH + '/admin/coupon/show/' + id;

    e.preventDefault();
    });

}
</script>



<!-- coupon-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        const postData = {
            code: $('#code').val(),
            description: $('#description').val(),
            discount_type_id: $('#discount_type_id').val(),
            discount: $('#discount').val(),
            expiration_date: $('#expiration_date').val(),
            limit_usage: $('#limit_usage').val(),
            min_value: $('#min_value').val(),
            min_item: $('#min_item').val()
        };

        console.log(postData);
        

        $.post(URL_PATH + '/admin/coupon/store', postData, function(r) {
            console.log(r);
            switch (r) {
                case 'error':
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Algo salió mal!',
                        text: 'Complete todos los datos.',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    break;

                case 'saved':
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Acción exitosa!',
                        text: 'El cupón se ha registrado con éxito.',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#form-create').trigger('reset');
                    $('#modal-create').modal('hide');

                    $('#coupons').DataTable().ajax.reload();
                    $('.select2').val(null).trigger('change');
                    break;

                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salió mal!',
                        text: 'Complete todos los datos.',
                    });

                    break;
            }

            
            
        });

        e.preventDefault();
    });
</script>



<!-- COUPON-EDIT -->
<script>
    var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        $.post(URL_PATH + '/admin/coupon/edit', {id}, function(r){
            coupon = JSON.parse(r);
    
            /* Cargar inputs */
            $('#id-edit').val(coupon.id);
            /* Seleccionar tipo de descuento */
            $('#code-edit').val(coupon.code);
            $('#description-edit').val(coupon.description);
            $("#discount_type_id-edit option[value='" + coupon.discount_type_id + "']").prop("selected", true);
            $('#discount-edit').val(coupon.discount);

            $('#expiration_date-edit').datepicker("setDate", new Date(coupon.expiration_date)).trigger('change')
            var date2 = $('#expiration_date-edit').datepicker('getDate', '+1d'); 
            date2.setDate(date2.getDate()+1); 
            console.log(date2);
            $('#expiration_date').datepicker('setDate', new Date(date2)).trigger('change');
            $('#limit_usage-edit').val(coupon.limit_usage);
            $('#min_value-edit').val(coupon.min_value);
            $('#min_item-edit').val(coupon.min_item);

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        code: $('#code-edit').val(),
        description: $('#description-edit').val(),
        discount_type_id: $('#discount_type_id-edit').val(),
        discount: $('#discount-edit').val(),
        expiration_date: $('#expiration_date-edit').val(),
        limit_usage: $('#limit_usage-edit').val(),
        min_value: $('#min_value-edit').val(),
        min_item: $('#min_item-edit').val(),
    };

    console.log(postData);

    $.post(URL_PATH + '/admin/coupon/update', postData, function(r) {
            console.log(r);
            if(r == 'error'){

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Algo salió mal!',
                    text: 'Complete todos los datos.',
                    showConfirmButton: false,
                    timer: 2500
                });

             } else {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Acción exitosa!',
                    text: 'El cupón ha sido actualizado.',
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#form-edit').trigger('reset');
                $('#modal-edit').modal('hide');

                $('#coupons').DataTable().ajax.reload();
                $('.select2').val(null).trigger('change');

            }

        });

    e.preventDefault();
});
</script>


<!-- COUPON-DELETE -->
<script>
var getDataDelete = function(tbody, table){
    $(document).on('click', '.btn-delete', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea desactivar el cupón <br> '#${data.id} - ${data.code}'?`,
            text: "Ésta acción puede ser revertida luego.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Sí, desactivar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/coupon/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Cupón desactivado!',
                            showConfirmButton: false,
                            timer: 2000
                        })  
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }

                    $('#coupons').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>



<!-- COUPON-RESTORE -->
<script>
var getDataRestore = function(tbody, table){
    $(document).on('click', '.btn-restore', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea avtivar el cupón <br> '#${data.id} - ${data.code}'?`,
            //text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, restaurar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/coupon/restore', {id}, function(r){
                    if(r == 'restored'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Cupón activado!',
                            showConfirmButton: false,
                            timer: 2000
                        })  
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }
                    
                    $('#coupons').DataTable().ajax.reload(); 
                });
                
            }

        });

        e.preventDefault();
    })
}
</script>



<script>
    $(document).ready(function(){

        fetchCoupons();
    });
</script>