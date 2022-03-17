// btn-submit-add
$('#form-create').submit(function(e){
        
    const postData = {
        name: $('#name').val()
    };

    $.post('category/store', postData, function(r) {
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
            });
        }

        $('#categories').DataTable().ajax.reload(); 
    });

    e.preventDefault();
});