<!-- modal-create -->
<?php include('app/views/admin/providers/create.php') ?>
<!-- modal-edit -->
<?php include('app/views/admin/providers/edit.php') ?>

<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-users text-olive"></i> Producto maestro
        <small></small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/provider"><i class="fa fa-user"></i> Producto maestro</a></li>
        <li class="active">Valores</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de valores</h3>
            <div class="btn-group pull-right">
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <span class="fa fa-plus"></span>
                    Nuevo proveedor 
                </button>-->
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <?php foreach($attribute_values as $items) : ?>
            <table id="attribute_values" class="table">
                <h4>Atributo: <strong><?= $items[0]->attribute->name ?></strong></h4>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Atributo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>

                <tbody>
                   
                    <?php foreach($items as $index => $item) : ?>
                        <tr>
                            <td><?= ++$index ?></td>
                            <td><?= $item->attribute->name; ?></td>
                            <td><?= $item->tag ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
    
            </table>

            <hr>
            <?php endforeach ?>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->


</section>


<!-- PROVIDER-INDEX -->
<script>
function fetchAttribute_values(){
    var table = $('#attribute_values').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/masterproduct/attribute_value_list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'attribute', 
                render: function(data){
                    return `${data.name}`
                }
            },
            {'data': 'name'},
            {'defaultContent': `
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
                                Editar registro
                            </a>
                        </li>
                    </ul>
                </div>
                `
            }
        ],
        'language': {
            url: URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    getDataShow('#attribute_values tbody', table);
    getDataEdit('#attribute_values tbody', table);
}
</script>



<!-- PROVIDER-SHOW -->
<script>
var getDataShow = function(tbody, table){

    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

    window.location.href = URL_PATH + '/admin/provider/show/' + id;

    e.preventDefault();
    });

}
</script>



<!-- PROVIDER-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        const postData = {
            business_name: $('#business_name').val(),
            rut: $('#rut').val(),
            city: $('#city').val(),
            location: $('#location').val(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            file: $('input[type=file]')[0].files[0]
        };

        var formData = new FormData();
        formData.append('id', postData.id);
        formData.append('business_name', postData.business_name);
        formData.append('rut', postData.rut);
        formData.append('city', postData.city);
        formData.append('location', postData.location);
        formData.append('address', postData.address);
        formData.append('phone', postData.phone);
        formData.append('file', postData.file);


        $.ajax({
        data: formData,
        url: URL_PATH + '/admin/provider/store',
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
                    text: 'Nuevo proveedor registrado en su sistema.'
                });

                $('#form-create').trigger('reset');
                $('#modal-create').modal('hide');
                $('#providers').DataTable().ajax.reload();
               
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



<!-- PROVIDER-EDIT -->
<script>
    var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        $.post(URL_PATH + '/admin/provider/edit', {id}, function(r){
            provider = JSON.parse(r);
    
            /* Cargar inputs */
            $('#id-edit').val(provider.id);
            $('#business_name-edit').val(provider.business_name);
            $('#rut-edit').val(provider.rut);
            $('#city-edit').val(provider.city);
            $('#location-edit').val(provider.location);
            $('#address-edit').val(provider.address);
            $('#phone-edit').val(provider.phone);

            if(provider.image == null){
                $('#provider-image').html(`<img width="250px" class="profile-user-img" src="${URL_PATH}/assets/dist/images/not-image-avilable.png">`);
            } else {
                $('#provider-image').html(`<img width="250px" class="profile-user-img" src="${URL_PATH}${provider.image}">`);
            }

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        business_name: $('#business_name-edit').val(),
        rut: $('#rut-edit').val(),
        city: $('#city-edit').val(),
        location: $('#location-edit').val(),
        address: $('#address-edit').val(),
        phone: $('#phone-edit').val(),
        file: $('input[name=file-edit]')[0].files[0]
    };

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('business_name', postData.business_name);
    formData.append('rut', postData.rut);
    formData.append('city', postData.city);
    formData.append('location', postData.location);
    formData.append('address', postData.address);
    formData.append('phone', postData.phone);
    formData.append('file', postData.file);

    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/provider/update',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            product_id = r
            if(r != 'error'){
               provider_id = r;
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualización exitosa!',
                    footer: `<a href=provider/show/${product_id}>Clic aquí para ver el registro en detalle</a>`
                });
    
                $('#form-edit').trigger('reset');
                $('#file-edit').val('');
                $('.dropify-clear').click();
                $('#modal-edit').modal('hide');
                $('#providers').DataTable().ajax.reload();
    
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



<script>
    $(document).ready(function(){

        //fetchAttribute_values();
    });
</script>