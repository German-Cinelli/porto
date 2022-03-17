// btn-submit-add
$('#form-create').submit(function(e){
        
    const postData = {
        name: $('#name').val(),
        code: $('#code').val(),
        //description: $('#description').val(),
        file: $('input[type=file]')[0].files[0],
    };

    console.log(postData);

    var formData = new FormData();
    formData.append('name', postData.name);
    formData.append('code', postData.code);
    //formData.append('description', postData.description);
    formData.append('file', postData.file);

    console.log(formData);

    $.ajax({
        data: formData,
        url: 'color/store',
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
                    title: 'Registrado con éxito!',
                    showConfirmButton: false,
                    timer: 1500
                });
    
                $('#form-create').trigger('reset');
                $('#file').val('');
                $('.dropify-clear').click();
                $('#modal-create').modal('hide');
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