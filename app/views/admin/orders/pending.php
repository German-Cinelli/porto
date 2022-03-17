<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-opencart text-olive"></i> Ventas
        <small>Pendientes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-opencart"></i> Ventas</a></li>
        <li class="active">Pendientes</li>
    </ol>
</section>

<!-- modal-cancel-order-->
<?php include('app/views/admin/orders/modals/cancel-order.php') ?>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de ventas pendientes</h3>
            <div class="btn-group pull-right">
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="orders" class="table">
                <thead>
                    <tr>
                        <th scope="col">N° Pedido</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Método pago</th>
                        <th scope="col">Método envío</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha compra</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>

<!-- PENDING-INDEX -->
<script>
function fetchOrders(){
    var table = $('#orders').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/order/pending_list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id', 
                render: function(data){
                    return `<a href="${URL_PATH}/admin/order/show/${data}" target="_blank">#${data}</a>`
                }
            },
            {'data': 'full_name'},
            {'data': 'total_amount', 
                render: function(data){
                    return formatCurrency(data);
                }
            },
            {'data': 'payment_method',
                render: function(data){
                    return `<span class="label bg-blue">${data.name}</span>`
                }
            },
            {'data': 'shipping_method',
                render: function(data){
                    return `<i class="fa fa-truck text-primary" data-toggle="tooltip" title="${data.description}">`
                }
            },
            {'data': 'status', 
                render: function(data){
                    return `<span class="label ${data.bg}">${data.name}</span>`
                }
            },
            {'data': 'created_at'},

            {'data': 'status', 
                render: function(data){
                    if(data.id != 3){
                            return `
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                        <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" class="btn-show">
                                                <i class="fa fa-info-circle text-blue"></i>
                                                Más información
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-change-status">
                                                <i class="fa fa-compress text-green"></i> 
                                                Concretar pedido
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-print">
                                                <i class="fa fa-print text-black"></i> 
                                                Imprimir
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-cancel" data-toggle="modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar venta
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                    } else {
                            return `
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                        <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" class="btn-show">
                                                <i class="fa fa-info-circle text-blue"></i>
                                                Más información
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-print">
                                                <i class="fa fa-print text-black"></i> 
                                                Imprimir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                    }
                }
            },
            
        ],
        'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    getDataShow('#orders tbody', table);
    getDataConfirm_shipment('#orders tbody', table);
    getDataPrint('#orders tbody', table);
    getDataCancel('#orders tbody', table);
}
</script>


<!-- PENDING-SHOW -->
<script>
var getDataShow = function(tbody, table){
    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

       //window.location.replace('show/' + id);
       window.location.href = URL_PATH + '/admin/order/show/' + id;

       e.preventDefault();
    });
}
</script>


<!-- PENDING-PRINT -->
<script>
var getDataPrint = function(tbody, table){
    $(document).on('click', '.btn-print', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.open('print/' + id, '_blank');

       e.preventDefault();
    });
}
</script>


<!-- PENDING-CONFIRM -->
<script>
var getDataConfirm_shipment = function(tbody, table){
    $(document).on('click', '.btn-change-status', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        Swal.fire({
            title: `¿Desea concretar el pedido N° #${data.id}?`,
            text: `Confirme si su cliente '${data.full_name}' ya recibió su pedido.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, confirmar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/order/confirm_shipment', {id}, function(r){
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
                            title: 'Error!',
                            text: 'Por favor recargue la página e inténtelo nuevamente.'
                        })
                    }
                    
                    $('#orders').DataTable().ajax.reload(); 
                });
                
            }

        });

        e.preventDefault();
    })
}
</script>


<!-- CANCEL-ORDER -->
<script>
    var getDataCancel = function(tbody, table){
        $(document).on('click', '.btn-cancel', function(){
            //var URL_PATH = $('#url_path').val();
            var data = table.row( $(this).parents('tr') ).data();
            var id = data.id;

            /* Cargar inputs */
            $('#id-cancel-order').val(id);

        });
    }

    /* btn-submit->form-edit */
    $('#form-cancel-order').submit(function(e){

        const postData = {
            id:  $('#id-cancel-order').val(),
            reason:  $('#select-reason').val()
        };
       
        Swal.fire({
            title: `¿Está seguro de cancelar el pedido N° #${postData.id}?`,
            //text: `Confirme si su cliente '${data.user.name} ${data.user.lastname}' ya recibió su pedido.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, cancelar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/order/cancel_order', postData, function(r) {
                    //console.log(r);
                    if(r == 'error'){
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor recargue la página e inténtelo nuevamente.'
                        })
                    } else {
                        /* Alert-success */
                        Swal.fire(
                            'Acción exitosa!',
                            'El pedido ha sido cancelado.',
                            'success'
                        )
                        
                    }
                    $('#form-cancel-order').trigger('reset');
                    $('#modal-cancel-order').modal('hide');
                    $('#orders').DataTable().ajax.reload();
                });
                
            }

        });

        e.preventDefault();
    });
</script>


<script>
    $(document).ready(function(){

        fetchOrders();
    });
</script>