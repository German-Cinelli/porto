var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var data = table.row( $(this).parents('tr') ).data();

       /* Cargar inputs */
       $('#id-edit').val(data.id)
       $('#name-edit').val(data.name)
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val()
    };

    $.post('category/update', postData, function(r) {
        if(r == "updated"){
            /* Alert-success*/
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Actualización exitosa!',
                showConfirmButton: false,
                timer: 1500
            })  
        } else {
            /* Alert-error*/
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }

        $('#form-edit').trigger('reset');
        $('#modal-edit').modal('hide');
        $('#categories').DataTable().ajax.reload(); 
    });

    e.preventDefault();
});