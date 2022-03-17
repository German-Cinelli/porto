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
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.value) {

                $.post('product/destroy', {id}, function(r){
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado!',
                            text: 'El calzado ya no se mostrará en el catálogo.',
                            showConfirmButton: false,
                            timer: 3500
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