<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-list-alt text-olive"></i> Facturas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/invoice"><i class="fa fa-list-alt"></i> Facturas</a></li>
        <li class="active">Historial de pagos</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Historial de pagos</h3>
            <div class="btn-group pull-right">
                
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-print"></i> Imprimir historial
                    <span class="fa fa-caret-down"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#"> De hoy</a></li>
                    <li><a href="#"> Últimos 7 días</a></li>
                    <li><a href="#"> Uĺtimos 30 días</a></li>
                </ul>  
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="invoices" class="table">
                <thead>
                    <tr>
                        <th scope="col">N° Factura</th>
                        <th scope="col">Total a pagar</th>
                        <th scope="col">Monto abonado</th>
                        <th scope="col">Deuda</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>

<!-- INVOICE-PAYMENT_HISTORY -->
<script>
function fetchInvoices(){
    var table = $('#invoices').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/invoice/list_payments_history',
            'type': 'POST'
        },
        'columns': [
            {'data': 'invoice_id', 
                render: function(data){
                    return `<a href=${URL_PATH}/admin/invoice/show/${data}>#${data}</a>`
                }
            },
            {'data': 'invoice.total_amount', 
                render: function(data){
                    return formatCurrency(data);
                }
            },
            {'data': 'payment', 
                render: function(data){
                    return `<span class="text-green">${formatCurrency(data)}</span>`
                }
            },
            {'data': 'debt', 
                render: function(data){
                    return `<span class="text-red">${formatCurrency(data)}</span>`
                }
            },
            {'data': 'invoice.date'},
        ],
        'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

}
</script>



<script>
    $(document).ready(function(){

        fetchInvoices();
    });
</script>