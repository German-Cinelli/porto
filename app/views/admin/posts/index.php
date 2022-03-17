<!-- modal-create -->
<?php include('app/views/admin/posts/create.php') ?>
<!-- modal-edit -->
<?php include('app/views/admin/posts/edit.php') ?>

<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-file-text text-olive"></i> Publicaciones
        <small></small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/post"><i class="fa fa-file-text"></i> Publicaciones</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de publicaciones</h3>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <span class="fa fa-plus"></span>
                    Nueva publicación
                </button>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="posts" class="table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
    
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->

</section>


<!-- POST-INDEX -->
<script>
function fetchPosts(){
    var table = $('#posts').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/post/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'image', 
                render: function(data){
                    if(data == null){
                        return `<img width="50px" src="${URL_PATH}/assets/dist/images/not-image-avilable.png">`
                    } else {

                    }
                    return `<img width="50px" src="${URL_PATH}${data}">`
                }
            },
            {'data': 'title', 
                render: function(data){
                    return `<a href="#" class="btn-show">${data}</span>`
                }
            },
            {'data': 'created_at'},
            {'defaultContent': `
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                        <span class="fa fa-caret-down"></span>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#" class="btn-show">
                                <i class="fa fa-eye text-blue"></i>
                                Ver publicación
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal-edit">
                                <i class="fa fa-edit text-orange"></i> 
                                Editar publicación
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-delete">
                                <i class="fa fa-trash text-red"></i> 
                                Eliminar publicación
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

    getDataShow('#posts tbody', table);
    getDataEdit('#posts tbody', table);
    getDataDelete('#posts tbody', table);
}
</script>



<!-- POST-SHOW -->
<script>
var getDataShow = function(tbody, table){

    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        $.post(URL_PATH + '/admin/post/edit', {id}, function(r){
            //console.log(r);
            
            if(r == 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Ocurrió algo inesperado al tratar de recuperar la información.',
                });
            } else {
                
            }
            post = JSON.parse(r);

            window.location.href = URL_PATH + '/blog/show/' + post.slug;
        })

        e.preventDefault();
    });

}
</script>



<!-- POST-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        const postData = {
            title: $('#title').val(),
            slug: $('#slug').val(),
            description: $('#description').val(),
            embedded_content: $('#embedded_content').val(),
            file: $('input[type=file]')[0].files[0]
        };
        
        console.log(postData);

        var formData = new FormData();
        formData.append('title', postData.title);
        formData.append('slug', postData.slug);
        formData.append('description', postData.description);
        formData.append('embedded_content', postData.embedded_content);
        formData.append('file', postData.file);


        $.ajax({
            data: formData,
            url: URL_PATH + '/admin/post/store',
            type: 'POST',
            contentType: false,
            processData: false,
            beforesend: function(){

            },
            success: function(r){
                //console.log(r);

                switch (r) {
                    case 'error':
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor complete los datos requeridos.',
                        });
                        break;

                    case 'slug':
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención!',
                            text: 'La URL ingresada ya pertenece a otra publicación. Por favor ingrese otra.',
                        });
                        break;

                    case 'saved':
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Publicación creada!',
                            text: 'Los clientes podrán ver tu publicación en el sitio. También puedes compartirla en tus redes sociales.'
                        });

                        $('#form-create').trigger('reset');
                        $('#modal-create').modal('hide');
                        $('#posts').DataTable().ajax.reload();
                        break;
                
                    default:
                        break;
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



<!-- POST-EDIT -->
<script>
    var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        $.post(URL_PATH + '/admin/post/edit', {id}, function(r){
            post = JSON.parse(r);
            //console.log(post);
    
            /* Cargar inputs */
            $('#id-edit').val(post.id);

            if(post.product_id != null){
                $("#product_id-edit option[value='" + post.product.id + "']").prop("selected", true);
            } else {
                $("#product_id-edit option[value='" + 0 + "']").prop("selected", true);
            }
            $('.select2').trigger('change');

            $('#title-edit').val(post.title);
            $('#slug-edit').val(post.slug);
            
            $('.wysihtml5-sandbox').contents().find('body').html(post.description);
            $('#description-edit').val(post.description);

            if(post.image == null){
                $('#post-image').html(`<img width="250px" class="profile-user-img" src="${URL_PATH}/assets/dist/images/not-image-avilable.png">`);
            } else {
                $('#post-image').html(`<img width="250px" class="profile-user-img" src="${URL_PATH}${post.image}">`);
            }

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    if($('#product_id-edit').val() == null){
        
        product_id = 0;
    } else {

        product_id = $('#product_id-edit').val();
    }

    const postData = {
        id: $('#id-edit').val(),
        product_id: product_id,
        title: $('#title-edit').val(),
        slug: $('#slug-edit').val(),
        description: $('#description-edit').val(),
        file: $('input[name=file-edit]')[0].files[0]
    };
    
    //console.log(postData);

    

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('product_id', postData.product_id);
    formData.append('title', postData.title);
    formData.append('slug', postData.slug);
    formData.append('description', postData.description);
    formData.append('file', postData.file);

    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/post/update',
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
                    text: 'Por favor complete los datos requeridos.'
                });
    
            } else if(r == 'slug'){

                Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'La URL ingresada ya pertenece a otra publicación. Por favor ingrese otra.',
                });
    
            } else {

                post_id = r;
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualización exitosa!',
                    //footer: `<a href=post/show/${post_id}>Clic aquí para ver el registro en detalle</a>`
                });
    
                $('#form-edit').trigger('reset');
                $('#file-edit').val('');
                $('.dropify-clear').click();
                $('#modal-edit').modal('hide');
                $('#posts').DataTable().ajax.reload();

            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error!',
                text: 'Por favor complete los datos requeridos.'
            });
        }
    });

    e.preventDefault();
});
</script>



<!-- POST-DELETE -->
<script>
var getDataDelete = function(tbody, table){
    $(document).on('click', '.btn-delete', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea eliminar la publicación <br> '#${data.id} - ${data.title}'?`,
            //text: "Ésta acción puede ser revertida luego.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/post/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado!',
                            text: 'La publicación no aparecerá en su sitio.',
                            showConfirmButton: false,
                            timer: 4300
                        })  
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e intentelo nuevamente.'
                        })
                    }

                    $('#posts').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>



<script>
    $(document).ready(function(){

        fetchPosts();
        $("#description").wysihtml5();
        $("#description-edit").wysihtml5();
    });
</script>