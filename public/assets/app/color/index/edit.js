var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var URL_PATH = $('#url_path').val();
        var data = table.row( $(this).parents('tr') ).data();

        /* Cargar inputs */
        $('#id-edit').val(data.id)
        $('#name-edit').val(data.name)
        $('#code-edit').val(data.code);
        //$('#description-edit').val(data.description);
        $('#color-image').html(`<img width="120px" src="${URL_PATH}${data.image}">`);
    })

}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val(),
        code: $('#code-edit').val(),
        //description: $('#description-edit').val(),
        file: $('input[id=file-edit]')[0].files[0]
    };

    //console.log(postData);

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('name', postData.name);
    formData.append('code', postData.code);
    //formData.append('description', postData.description);
    formData.append('file', postData.file);


    $.ajax({
        data: formData,
        url: 'color/update',
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
                    showConfirmButton: false,
                    timer: 1500
                });
    
                $('#form-edit').trigger('reset');
                $('#file-edit').val('');
                $('.dropify-clear').click();
                $('#modal-edit').modal('hide');
                $('#colors').DataTable().ajax.reload();
    
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
                footer: 'Por favor complete los datos requeridos.'
            });
        }
    });

    e.preventDefault();
});