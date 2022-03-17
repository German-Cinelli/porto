var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        /* Vaciamos los elementos seleccionados antes de cargarlos */
        $('.select2').val(null).trigger('change');
        /* Vaciamos las imagenes cargadas */
        $('.product-images').html('');

        $.post('product/show2', {id}, function(r){
            product = JSON.parse(r);
            //console.log(product);
    
            /* Cargar inputs */
            $('#id-edit').val(product.id)
            $('#name-edit').val(product.name)
            $('#description-edit').val(product.description);
            $('#price-edit').val(product.price)
            $('#offer-edit').val(product.offer)
            $('#slug-edit').val(product.slug)
            $('#customize-edit').val(product.customize)

            if(product.sole != null){
                $('#sole-edit').prop('checked', true);
            }

            if(product.elastic != null){
                $('#elastic-edit').prop('checked', true);
            }

            /* Seleccionar género */
            $("#gender-edit option[value='" + product.gender + "']").prop("selected", true)

            /* Seleccionar customize */
            $("#category_id-edit option[value='" + product.category_id + "']").prop("selected", true)

            /* Seleccionar categoria */
            $("#customize-edit option[value='" + product.customize + "']").prop("selected", true)

            /* Recorrer todos los talles y dejarlos seleccionados */
            Object.keys(product.sizes).map(key => (
                $("#size_id-edit option[value='" + product.sizes[key].id + "']").prop("selected", true)
            )).join('');

            /* Recorrer todos los materiales y dejarlos seleccionados */
            Object.keys(product.materials).map(key => (
                $("#material_id-edit option[value='" + product.materials[key].id + "']").prop("selected", true)
            )).join('');
            
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

    var sole = undefined;
    var elastic = undefined;
    if($('#sole-edit').prop('checked') == true){
        sole = 1;
    }

    if($('#elastic-edit').prop('checked') == true){
        elastic = 1;
    }

    var arrayOf_images = [];
    var values = $("input[name='image-ids[]']").map(function(){
        arrayOf_images.push($(this).val());
    }).get();


    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val(),
        description: $('#description-edit').val(),
        gender: $('#gender-edit').val(),
        category_id: $('#category_id-edit').val(),
        arrayOf_materials: $('#material_id-edit').val(),
        arrayOf_sizes: $('#size_id-edit').val(),
        price: $('#price-edit').val(),
        offer: $('#offer-edit').val(),
        slug: $('#slug-edit').val(),
        customize: $('#customize-edit').val(),
        sole: sole,
        elastic: elastic,
        file: $('input[type=file]')[0].files[0],
        arrayOf_images: arrayOf_images
    };

    //console.log(postData);

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('name', postData.name);
    formData.append('description', postData.description);
    formData.append('gender', postData.gender);
    formData.append('category_id', postData.category_id);
    formData.append('arrayOf_materials', JSON.stringify(postData.arrayOf_materials));
    formData.append('arrayOf_sizes', JSON.stringify(postData.arrayOf_sizes));
    formData.append('price', postData.price);
    formData.append('offer', postData.offer);
    formData.append('slug', postData.slug);
    formData.append('customize', postData.customize);
    formData.append('sole', postData.sole);
    formData.append('elastic', postData.elastic);
    formData.append('file', postData.file);
    formData.append('arrayOf_images', JSON.stringify(postData.arrayOf_images));

    $.ajax({
        data: formData,
        url: 'product/update',
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