var getDataConfirm_shipment = function(tbody, table){
    $(document).on('click', '.btn-change-status', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea concretar el pedido N° #${data.id}?`,
            text: `Confirme si su cliente '${data.user.name} ${data.user.lastname}' ya recibió su pedido.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, confirmar!'
        }).then((result) => {
            if (result.value) {

                $.post('order/confirm_shipment', {id}, function(r){
                    console.log(r);
                    if(r == 'confirmed'){
                        /* Alert-success */
                        Swal.fire(
                            'Acción exitosa!',
                            'El pedido figurará como concretado.',
                            'success'
                        )
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error!',
                            //footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                    
                    $('#orders').DataTable().ajax.reload(); 
                });
                
            }

        });

        e.preventDefault();
    })
}