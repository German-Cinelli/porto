var getDataRestore = function(tbody, table){
    $(document).on('click', '.btn-restore', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea restaurar el registro <br> '#${data.id} - ${data.name}'?`,
            //text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, restaurar!'
        }).then((result) => {
            if (result.value) {

                $.post('restore', {id}, function(r){
                    if(r == 'restored'){
                        /* Alert-success */
                        Swal.fire(
                            'Acción exitosa!',
                            'El registro ha sido restaurado.',
                            'success'
                        )
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