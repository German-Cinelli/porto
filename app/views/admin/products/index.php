<!-- Estilos para seleccionar imágenes -->
<style>
    #librayr a{
        float:left;
        position:relative;
        border: 1px solid #e7e7e7;
    }

    .product-img{
        float:left;
        position:relative;
        border: 1px solid #e9e9e9;
        margin-right: 10px;
    }

    .product-img .btn{
        position: absolute;
        right: 0;
        bottom: 0;
    }

    #librayr img{
        width: 100px;
    }

    #librayr input{
        position:absolute;
        right: 0;
        bottom: 0;
    }

    #librayr a:hover{
        border: 1px solid red;
    }

    .product-images img{
        width: 100px;
    }

    .product-images-edit img{
        width: 100px;
    }

</style>

<style>

    .checkbox label:after {
    content: '';
    display: table;
    clear: both;
    }

    .checkbox .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
    }

    .checkbox .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 15%;
    }

    .checkbox label input[type="checkbox"] {
    display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon {
    opacity: 0;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
    opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled+.cr {
    opacity: .5;
    }

</style>


<!-- Add scrollbar-y in modal dialog *product-edit* -->
<style>
   .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body-edit{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    .modal-body-create{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    #media-modal {
    z-index: 10000; 
    }
    
</style>

<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-tags text-olive"></i> Productos
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-tags"></i> Productos</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- modal-edit-->
<?php include('app/views/admin/products/edit.php') ?>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de productos</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/product/create" class="btn btn-primary">
                    <span class="fa fa-plus"></span>
                    Nuevo producto
                </a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="products" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Oferta (%)</th>
                        <th scope="col">Precio en catálogo</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Destacar</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>


<!-- Cargar imagenes -->
<script>
    function fetchImages(){

    var URL_PATH = $('#url_path').val();

    $.ajax({
        url: URL_PATH + '/admin/image/list',
        type: 'GET',
        success: function(r){
            //console.log(r);

            let images = JSON.parse(r);
            let template = '';
            images.forEach(image => {
                template += `
                    <a href="#" data-image-id="${image.id}">
                        <img src="${URL_PATH}${image.path}" alt="">
                        <input type="checkbox" name="images-check">
                    </a>
                `;
            });

            $('#images').html(template);

            
        }
    });

    }


    function fetchImagesForRadio(){

    var URL_PATH = $('#url_path').val();

    $.ajax({
        url: URL_PATH + '/admin/image/list',
        type: 'GET',
        success: function(r){
            //console.log(r);

            let images = JSON.parse(r);
            let template = '';
            images.forEach(image => {
                template += `
                    <a href="#" data-image-id="${image.id}">
                        <img src="${URL_PATH}${image.path}" alt="">
                        <input type="radio" name="images-check">
                    </a>
                `;
            });

            $('#image').html(template);

            
        }
    });

    }
</script>


<!-- Subir imagenes -->
<script>


    $('#form-upload-images').submit(function(e){
        var URL_PATH = $('#url_path').val();
        var formData = new FormData();
        var ins = document.getElementById('multiFiles').files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("files[]", document.getElementById('multiFiles').files[x]);
        }

        $.ajax({
            data: formData,
            url:  URL_PATH + '/admin/image/store',
            type: 'POST',
            contentType: false,
            processData: false,
            beforesend: function(){

            },
            success: function(r){
                alert(r);
                fetchImages();
            }
        });

        $("#multiFiles").val(null);

        e.preventDefault();
    });
</script>



<!-- Listar imagenes -->
<script>
    $(document).ready(function(){

        fetchImages();
    });
</script>



<!-- Escoger imagenes previamente cargadas -->
<script>
    var mediaModal = $('#media-modal'),
    library = $('#librayr'), //tab
    productImagesContainer = $('.product-images'); //container

    library.on('click','a',function(e){
        
        e.preventDefault();

        

        //checkboxprocessing........
        var checkbox = $(this).find('input[type=checkbox]');

        if(!checkbox.is(':checked')){
            checkbox.prop('checked', true);
        }else{
            checkbox.prop('checked', false);
        }
    });

    //insert button and send images to the form and hidden fields tooo....
    $('.insert').click(function(e){
        //collect checkbox
        var checkboxes = library.find('input[type=checkbox]');
        checkboxes.each(function(i, el){
            if(el.checked){
                var imageId = $(el).parent().data('image-id');
                var imgSrc = $(el).siblings('img').attr('src');
                        
                //console.log(imageId);
                //console.log(imgSrc);

                //template
                var template = 	'<div class="product-img">'+
                                    '<input type="hidden" name="image-ids[]" value="'+ imageId +'">'+
                                    '<img src="'+ imgSrc +'" />'+
                                    '<a href="#" class="btn btn-xs btn-danger remove" data-toggle="tooltip" title="Remover">'+
                                    '<i class="fa fa-close"></i></a>'+
                                '</div>';
                //append
                productImagesContainer.append(template);
                        
            }
        });
        //hide modal
        mediaModal.modal('hide');
    });

    //remove product images js
    productImagesContainer.on('click', '.remove', function(e){
        e.preventDefault();
        //fadeout animation and remove....
        $(this).parent('.product-img').fadeOut('100', function(){
            $(this).remove();
        });
    });
</script>


<script>
    /* Scrollear hacia arriba para ver el modal de imágenes */
    $('#select-images').click(function(){
        $("div").scrollTop(0);
    });

    /* Necesitamos hacerlo de ésta manera para evitar que se cierren los 2 modals al cerrar cualquiera de ellos */
    $('.close-media-modal').click(function(e){
        $('#media-modal').modal('hide');
        e.preventDefault();
    });
    
</script>


<!-- PRODUCT-INDEX -->
<script>
    function fetchProducts(){
        var table = $('#products').DataTable({
            'ajax': {
                'url': URL_PATH + '/admin/product/list',
                'type': 'POST'
            },
            
            'columns': [
                {data: 'id'},

                {data: 'name', 
                    render: function(data){
                        return `<span style="#display: none">${data}</span>`
                    }
                },
                    
                {data: 'image', 
                    render: function(data){
                        return `<img width="50px" class="img-responsive" src="${URL_PATH}${data}">`
                    }
                },

                {data: 'category', 
                    render: function(data){
                        return `<span class="text-muted">${data.name}</span>`
                    }
                },

                {data: 'price', 
                    render: function(data){
                        return formatCurrency(data);
                    }
                },

                {data: 'offer', 
                    render: function(data){
                        if(data == 0){
                            return ''
                        } else {
                            return `<span class="text-muted label bg-blue">-${data}% OFF</span>`
                        }
                    }
                },

                {data: 'price_final', 
                    render: function(data){
                        return formatCurrency(data);
                    }
                },

                {data: 'stock', 
                    render: function(data){
                        if(data == 0){
                            return `<span class="label bg-red">0</span>`
                        } else {
                            return `<span class="label btn-twitter">${data}</span>`
                        }
                    }
                },

                {data: 'is_deleted', 
                    render: function(data){
                        if(data == null){
                                return `<input type="hidden" value="${data}">
                                        <i class="fa fa-circle text-green data-toggle="tooltip" title="El producto está disponible para su venta en el catálogo.">
                                    `
                        } else {
                                return `<i class="fa fa-circle text-red data-toggle="tooltip" title="El producto NO se está mostrando en el catálogo.">`
                        }
                    }
                },

                {data: 'is_featured', 
                    render: function(data){
                        if(data == 0){
                            return `
                            <input type="hidden" value="${data}">
                            <a href="#" class="btn-featured btn btn-social-icon" data-toggle="tooltip" title="Destacar producto">
                                
                                <i class="menu-icon fa fa-star-o text-yellow"></i>
                            </a>`
                        } else {
                            return `
                            <input type="hidden" value="${data}">
                            <a href="#" class="btn-unfeatured btn btn-social-icon" data-toggle="tooltip" title="Quitar producto destacado">
                                <i class="menu-icon fa fa-star text-yellow"></i>
                            </a>`
                        }
                    }
                },
                
                {data: 'is_deleted', 
                    render: function(data){
                        if(data == null){
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
                                                Editar registro
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-delete">
                                                <i class="fa fa-trash text-red"></i> 
                                                Enviar a papelera
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
                                                Editar registro
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-restore">
                                                <i class="fa fa-recycle text-green"></i> 
                                                Restaurar registro
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
                'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
            }
            
        });
        
        getDataShow('#products tbody', table);
        getDataEdit('#products tbody', table);
        getDataDelete('#products tbody', table);
        getDataRestore('#products tbody', table);
        getDataGallery('#products tbody', table);
        getDataFeatured('#products tbody', table);
        getDataUnfeatured('#products tbody', table);
    }
</script>



<!-- PRODUCT-SHOW -->
<script>
    var getDataShow = function(tbody, table){

    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.location.href = URL_PATH + '/admin/product/show/' + id;

        e.preventDefault();
    });

    }
</script>



<!-- PRODUCT-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){

        const postData = {
            slug: $('#slug').val(),
            name: $('#name').val(),
            description: $('#description').val(),
            gender: $('#gender').val(),
            category_id: $('#category_id').val(),
            arrayOf_sizes: $('#size_id').val(),
            arrayOf_materials: $('#material_id').val(),
            price: $('#price').val(),
            offer: $('#offer').val(),
        };

        //console.log(postData);

        $.post('product/store', postData, function(r) {
            //console.log(r);
            if(r == "saved"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registrado con éxito!',
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#form-create').trigger('reset');
                $('#modal-create').modal('hide');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error!',
                    //footer: '<a href>Why do I have this issue?</a>'
                });
            }
            
            $('#products').DataTable().ajax.reload();
            $('.select2').val(null).trigger('change');
        });

    e.preventDefault();
    });
</script>



<!-- PRODUCT-EDIT -->
<script>
    var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        //var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        /* Vaciamos los elementos seleccionados antes de cargarlos */
        $('.select2').val(null).trigger('change');
        /* Vaciamos las imagenes cargadas */
        $('.product-images').html('');

        $.post(URL_PATH + '/admin/product/show2', {id}, function(r){
            product = JSON.parse(r);
            //console.log(product);
    
            /* Cargar inputs */
            $('#id-edit').val(product.id);
            $('#name-edit').val(product.name);
            $('.wysihtml5-sandbox').contents().find('body').html(product.description);
            $('#brand-edit').val(product.brand);
            $('#price-edit').val(product.price);
            $('#offer-edit').val(product.offer);
            $('#stock-edit').val(product.stock);
            $('#stock_alert-edit').val(product.stock_alert);
            $('#delivery_delay-edit').val(product.delivery_delay);
            $('#slug-edit').val(product.slug);

            /* Seleccionar categoria */
            $("#category_id-edit option[value='" + product.category_id + "']").prop("selected", true);

            /* Seleccionar categoria */
            $("#product_type_id-edit option[value='" + product.product_type_id + "']").prop("selected", true);
            
            $('.select2').trigger('change');

            /* Recorrer imagenes relaccionadas al producto */
            Object.keys(product.images).map(key => (
                $(".product-images").append(
                    '<div class="product-img">'+
                        '<input type="hidden" name="image-ids[]" value="'+ product.images[key].id +'">'+
                        '<img src="'+ URL_PATH + product.images[key].path +'" />'+
                        '<a href="#" class="btn btn-xs btn-danger remove" data-toggle="tooltip" title="Remover">'+
                        '<i class="fa fa-close"></i></a>'+
                    '</div>'
                )
            )).join('');
            //var template = 	;

            $('#product-image').html(`<img width="120px" src="${URL_PATH}${product.image}">`);

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    var arrayOf_images = [];
    var values = $("input[name='image-ids[]']").map(function(){
        arrayOf_images.push($(this).val());
    }).get();

    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val(),
        description: $('#compose-textarea').val(),
        product_type_id: $('#product_type_id-edit').val(),
        category_id: $('#category_id-edit').val(),
        brand: $('#brand-edit').val(),
        price: $('#price-edit').val(),
        offer: $('#offer-edit').val(),
        stock: $('#stock-edit').val(),
        stock_alert: $('#stock_alert-edit').val(),
        delivery_delay: $('#delivery_delay-edit').val(),
        slug: $('#slug-edit').val(),
        file: $('input[type=file]')[0].files[0],
        arrayOf_images: arrayOf_images
    };

    //console.log(postData);

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('name', postData.name);
    formData.append('description', postData.description);
    formData.append('product_type_id', postData.product_type_id);
    formData.append('category_id', postData.category_id);
    formData.append('brand', postData.brand);
    formData.append('price', postData.price);
    formData.append('offer', postData.offer);
    formData.append('stock', postData.stock);
    formData.append('stock_alert', postData.stock_alert);
    formData.append('delivery_delay', postData.delivery_delay);
    formData.append('slug', postData.slug);
    formData.append('file', postData.file);
    formData.append('arrayOf_images', JSON.stringify(postData.arrayOf_images));

    console.log(formData);

    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/product/update',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            product_id = r
            if(r != 'error'){
                product_id = r;
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualización exitosa!',
                    footer: `<a href=product/show/${product_id}>Clic aquí para ver el registro en detalle</a>`
                });
    
                $('#form-edit').trigger('reset');
                $('#file').val('');
                $('.dropify-clear').click();
                $('#modal-edit').modal('hide');
                $('#materials').DataTable().ajax.reload();
                $('.select2').val(null).trigger('change');
                $('#products').DataTable().ajax.reload();
    
            } else {
               
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error!',
                    footer: 'Por favor complete los datos requeridos.'
                });
    
            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
    });

    e.preventDefault();
});
</script>



<!-- PRODUCT-DELETE -->
<script>
var getDataDelete = function(tbody, table){
    $(document).on('click', '.btn-delete', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea enviar a papelera el registro <br> '#${data.id} - ${data.name}'?`,
            text: "Ésta acción puede ser revertida luego.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/product/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado!',
                            text: 'El producto ya no estará disponible para su venta.',
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

                    $('#products').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>



<!-- PRODUCT-RESTORE -->
<script>
var getDataRestore = function(tbody, table){
    $(document).on('click', '.btn-restore', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea restaurar el registro <br> '#${data.id} - ${data.name}'?`,
            //text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, restaurar!'
        }).then((result) => {
            if (result.value) {

                $.post('product/restore', {id}, function(r){
                    if(r == 'restored'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Acción exitosa!',
                            text: 'El registro ha sido restaurado.',
                            footer: `<a href=product/show/${id}>Clic aquí para ver más detalles</a>`
                        })
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                    
                    $('#products').DataTable().ajax.reload(); 
                });
                
            }

        });

        e.preventDefault();
    })
}
</script>



<!-- GET-DATA-GALLERY -->
<script>
var getDataGallery = function(tbody, table){
    $(document).on('click', '.btn-gallery', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.location.replace('http://localhost/Projects/Paulina-Shoes/public/admin/product/show/' + id + '#edit-gallery');
    })
}
</script>


<!-- PRODUCT-FEATURED -->
<script>
var getDataFeatured = function(tbody, table){
    $(document).on('click', '.btn-featured', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea destacar el producto <br> '${data.name}'?`,
            //text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#196ecf',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Si, destacar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/product/featured', {id}, function(r){
                    console.log(r);
                    if(r == 'success'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Correcto!',
                            text: 'El producto se mostrará en destacados.',
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

                    $('#products').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>


<!-- PRODUCT-UNFEATURED -->
<script>
var getDataUnfeatured = function(tbody, table){
    $(document).on('click', '.btn-unfeatured', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea quitar el producto '${data.name}' de la lista de destacados?`,
            //text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Sí, quitar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/product/unfeatured', {id}, function(r){
                    console.log(r);
                    if(r == 'success'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Correcto!',
                            text: 'El producto ya no se mostrará en destacados.',
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

                    $('#products').DataTable().ajax.reload(); 
                });

            }

        });

        e.preventDefault();
    })
}
</script>



<script>
    $(document).ready(function(){
        
        fetchProducts();
    });
</script>