var getDataDelete = function(tbody, table){
    $(document).on('click', '.btn-delete', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea enviar a papelera el registro <br> '#${data.id} - ${data.name}'?`,
            text: "Ésta acción puede ser revertida luego.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.value) {

                $.post('category/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado!',
                            showConfirmButton: false,
                            timer: 1500
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

                    $('#categories').DataTable().ajax.reload(); 
                });

            }

        });

    })
}