<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-opencart text-olive"></i> Ventas
        <small>Listar ventas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-opencart"></i> Ventas</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- modal-cancel-order-->
<?php include('app/views/admin/orders/modals/cancel-order.php') ?>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de ventas</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/order/create" class="btn btn-primary">
                    <span class="fa fa-plus"></span>
                    Registrar venta  
                </a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="orders" class="table" style="overflow-y:auto;">
                <thead>
                    <tr>
                        <th scope="col">N° Pedido</th>
                        <th scope="col">ID Pago</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Método pago</th>
                        <th scope="col">Método envío</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>


<!-- ORDER-INDEX -->
<script>
function fetchOrders(){
    var table = $('#orders').DataTable({
        'ajax': {
            'url': 'order/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id', 
                render: function(data){
                    return `<a href="order/show/${data}">${data}</a>`
                }
            },
            {'data': 'mercadopago_payment_id',
                render: function(data){
                    if(data == null){
                        return ``
                    } else {
                        return `<strong>${data}</strong>`
                    }
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
                    return `<img src="${URL_PATH}${data.icon}" width="40px" alt="" data-toogle="tooltip" title="${data.description}">`
                }
            },
            {'data': 'status', 
                render: function(data){
                    return `<span class="label ${data.bg}" data-toggle="tooltip" title="${data.description}">${data.name}</span>`
                }
            },
            {'data': 'created_at'},

            {'data': 'status', 
                render: function(data){
                    switch (data.id) {
                        case 1:
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
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 2:
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
                                    </ul>
                                </div>
                            `
                            
                            break;


                        case 3:
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
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 4:
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
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 5:
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
                                            <a href="#" class="btn-cancel" data-toggle="modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar venta
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 6:
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
                                            <a href="#" class="btn-cancel" data-toggle="modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar venta
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 7:
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
                                            <a href="#" class="btn-cancel" data-toggle="modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar venta
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                            
                            break;


                        case 8:
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
                            
                            break;

                        case 9:
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
                                            <a href="#" class="btn-cancel" data-toggle="modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar venta
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            `
                            
                            break;

                        case 10:
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
                            
                            break;

                        case 11:
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
                                    </ul>
                                </div>
                            `
                            
                            break;

                        default:

                            break;
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


<!-- ORDER-SHOW -->
<script>
var getDataShow = function(tbody, table){
    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.location.href = URL_PATH + '/admin/order/show/' + id;

       e.preventDefault();
    });
}
</script>


<!-- ORDER-PRINT -->
<script>
var getDataPrint = function(tbody, table){
    $(document).on('click', '.btn-print', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.open(URL_PATH + '/admin/order/print/' + id, '_blank');

       e.preventDefault();
    });

}
</script>


<!-- ORDER-CONFIRM -->
<script>
var getDataConfirm_shipment = function(tbody, table){
    $(document).on('click', '.btn-change-status', function(e){
        
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(data);

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