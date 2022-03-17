<section class="content-header">
    <h1>
        Costo de envío para Montevideo...
        <h1 class="text-center"><span id="shippment_cost" style="font-size: 150px;" class="badge bg-white">$<?= $shippingcost->cost ?></span></h1>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Costo de envío</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Actualice aquí el costo de envío</h3>
        </div><!-- /.box-header -->

        <form id="form-edit-shippment">
            <div class="modal-body">
                <div class="form-group">
                    <label>Costo:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" id="cost" value="<?= $shippingcost->cost ?>" min="0" class="form-control" placeholder="Ingrese costo de envío" required>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-warning pull-right">Actualizar</button>
            </div>
            
        </form>
        
     </div><!-- ./box-primary -->

</section>


<script>
    const URL_PATH = $('#url_path').val();

    $('#form-edit-shippment').submit(function(e){

        const postData = {
            cost: $('#cost').val()
        };

        $.post(URL_PATH + '/admin/shippingcost/update', postData, function(r) {
            console.log(r);
            if(r == "error"){
                /* Alert-error*/
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error!',
                    footer: '<a href>Why do I have this issue?</a>'
                });
            } else {
                /* Alert-success*/
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualización exitosa!',
                    text: 'El costo de envío para Montevideo se ha modificado con éxito',
                    showConfirmButton: false,
                    timer: 4500
                });

                $('#shippment_cost').text('$' + r);
            }

            $('#form-edit').trigger('reset');
            $('#modal-edit').modal('hide');
            $('#categories').DataTable().ajax.reload(); 
        });

        e.preventDefault();
    });
</script>