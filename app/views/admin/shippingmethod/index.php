<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-truck text-olive"></i> Métodos de envío 
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/shippingmethod"><i class="fa fa-truck"></i> Métodos de envío</a></li>
        <li class="active">Listado</li>
        
    </ol>
</section>

<!-- modal-create -->
<?php include('app/views/admin/shippingmethod/create.php') ?>
<!-- modal-edit -->
<?php include('app/views/admin/shippingmethod/edit.php') ?>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de métodos de envío</h3>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <span class="fa fa-plus"></span>
                    Nuevo método 
                </button>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="shipping_methods" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Envío</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
    
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->


</section>


<!-- SHIPPINGMETTHOD-INDEX -->
<script>
function fetchShipping_methods(){
    var table = $('#shipping_methods').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/shippingmethod/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id', 
                render: function(data){
                    return `<strong>${data}</strong>`
                }
            },
            {'data': 'name'},
            {'data': 'description'},
            {'data': 'message'},
            {'data': 'cost'},
            {data: 'is_deleted', 
                    render: function(data){
                        if(data == 0){
                                return `<input type="hidden" value="${data}">
                                        <i class="fa fa-circle text-green data-toggle="tooltip" title="Activo">
                                    `
                        } else {
                                return `<i class="fa fa-circle text-red data-toggle="tooltip" title="Desactivado">`
                        }
                    }
                },
                {data: 'is_deleted', 
                    render: function(data){
                        if(data == 0){
                            return `
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                        <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal-edit">
                                                <i class="fa fa-edit text-orange"></i> 
                                                Editar registro
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-delete">
                                                <i class="fa fa-ban text-red"></i> 
                                                Desactivar
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
                                            <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal-edit">
                                                <i class="fa fa-edit text-orange"></i> 
                                                Editar registro
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-restore">
                                                <i class="fa fa-check-circle text-green"></i> 
                                                Activar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                        }
                    }
                },
        ],
        'language': {
            url: URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    //getDataShow('#shipping_methods tbody', table);
    getDataEdit('#shipping_methods tbody', table);
    getDataDelete('#shipping_methods tbody', table);
    getDataRestore('#shipping_methods tbody', table);
}
</script>



<!-- SHIPPINGMETTHOD-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            message: $('#message').val(),
            cost: $('#cost').val()
        };

        var formData = new FormData();
        formData.append('id', postData.id);
        formData.append('name', postData.name);
        formData.append('description', postData.description);
        formData.append('message', postData.message);
        formData.append('cost', postData.cost);

        $.ajax({
        data: formData,
        url: URL_PATH + '/admin/shippingmethod/store',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            //console.log(r);
            if(r == 'error'){

                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Por favor complete los datos requeridos.',
                });

            } else {
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Listo!',
                    text: 'Nuevo método de envío ingresado en su sistema.'
                });

                $('#form-create').trigger('reset');
                $('#modal-create').modal('hide');
                $('#shipping_methods').DataTable().ajax.reload();
               
            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error!',
                text: 'Por favor complete los datos requeridos.'
            })
        }
    });

        e.preventDefault();
    });
</script>



<!-- SHIPPINGMETTHOD-EDIT -->
<script>
    var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        //var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        $.post(URL_PATH + '/admin/shippingmethod/edit', {id}, function(r){
            shipping_method = JSON.parse(r);
            //console.log(shipping_method)
    
            /* Cargar inputs */
            $('#id-edit').val(shipping_method.id);
            $('#name-edit').val(shipping_method.name);
            $('#description-edit').val(shipping_method.description);
            $('#message-edit').val(shipping_method.message);
            $('#cost-edit').val(shipping_method.cost);

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val(),
        description: $('#description-edit').val(),
        message: $('#message-edit').val(),
        cost: $('#cost-edit').val()
    };

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('name', postData.name);
    formData.append('description', postData.description);
    formData.append('message', postData.message);
    formData.append('cost', postData.cost);

    console.log(postData);

    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/shippingmethod/update',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            if(r != 'error'){
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualización exitosa!'
                });
    
                $('#form-edit').trigger('reset');
                $('#file-edit').val('');
                $('.dropify-clear').click();
                $('#modal-edit').modal('hide');
                $('#shipping_methods').DataTable().ajax.reload();
    
            } else {
               
                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Por favor complete los datos requeridos.'
                });
    
            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error!',
                text: 'Por favor complete los datos requeridos.'
            })
        }
    });

    e.preventDefault();
});
</script>


<!-- SHIPPINGMETTHOD-DELETE -->
<script>
var getDataDelete = function(tbody, table){
    $(document).on('click', '.btn-delete', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;
        console.log(id);

        Swal.fire({
            title: `¿Desea desactivar el método de envío <br> '#${data.id} - ${data.name}'?`,
            text: "Ésta acción puede ser revertida luego.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Sí, desactivar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/shippingmethod/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Acción exitosa!',
                            text: 'El método de envío ha sido desactivado, no aparecerá como opción a escoger en el carrito.',
                            showConfirmButton: false,
                            timer: 4500
                        })  
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }

                    $('#shipping_methods').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>



<!-- SHIPPINGMETTHOD-RESTORE -->
<script>
var getDataRestore = function(tbody, table){
    $(document).on('click', '.btn-restore', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea activar el método de envío <br> '#${data.id} - ${data.name}'?`,
            //text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, activar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/shippingmethod/restore', {id}, function(r){
                    if(r == 'restored'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Acción exitosa!',
                            text: 'El método de envío ha sido activado, los clientes podrán elegirlo.',
                            showConfirmButton: false,
                            timer: 4500
                        })
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }
                    
                    $('#shipping_methods').DataTable().ajax.reload(); 
                });
                
            }

        });

        e.preventDefault();
    })
}
</script>



<script>
    $(document).ready(function(){

        fetchShipping_methods();
    });
</script>