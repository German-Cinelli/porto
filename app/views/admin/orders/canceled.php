<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-opencart text-olive"></i> Ventas
        <small>Canceladas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-opencart"></i> Ventas</a></li>
        <li class="active">Canceladas</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de ventas canceladas</h3>
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
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Motivo</th>
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
            'url': URL_PATH + '/admin/order/canceled_list',
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
            {'data': 'status', 
                render: function(data){
                    return `<span class="label bg-red">${data.name}</span>`
                }
            },
            {'data': 'created_at'},

            {'data': 'canceled_order', 
                render: function(data){
                    var m = '';
                    $.each(data, function (i) {
                        $.each(data[i], function (key, val) {
                            if(key == 'reason'){
                                m += val;
                            }
                            //m += (key + val) + ' - ';
                        });
                    });
                    return m;
                }
            },
            {'defaultContent': `
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
            
        ],
        'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    getDataShow('#orders tbody', table);
    getDataPrint('#orders tbody', table);

    
}
</script>


<!-- ORDER-SHOW -->
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


<script>
    $(document).ready(function(){

        fetchOrders();
    });
</script>