<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-list-alt text-olive"></i> Facturas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/invoice"><i class="fa fa-list-alt"></i> Facturas</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de facturas</h3>
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/invoice/create" class="btn btn-primary">
                    <span class="fa fa-plus"></span>
                    Nueva factura  
                </a>
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example2" class="table">
                <thead>
                    <tr>
                        <th scope="col">N° Factura</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($invoices as $invoice) : ?>

                        <tr>
                            <td>
                                <a href="<?= URL_PATH ?>/admin/invoice/show/<?= $invoice->id ?>">#<?= $invoice->id ?></a>
                            </td>
                            <td><?= $invoice->provider->business_name ?></td>
                            <td><?= $invoice->date ?></td>
                            <td><?= \app\helpers\Utils::moneyFormat($invoice->total_amount, '$') ?></td>
                            <td>
                                <?php if($invoice->status_id == 11) : ?>
                                    <span class="text-muted">
                                        Monto pago: <?= \app\helpers\Utils::moneyFormat($invoice->total_amount - $invoice->debt, '$') ?>
                                    </span>
                                    <div class="progress progress-sm" data-toggle="tooltip" title="Has pagado el <?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>% del total de la factura. Tienes una deuda de <?= \app\helpers\Utils::moneyFormat($invoice->debt, '$') ?>.">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="<?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                    
                                    
                                <?php else : ?>
                                    <span class="text-muted">
                                        Pago
                                    </span>
                                    <div class="progress progress-sm" data-toggle="tooltip" title="Has pagado el <?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>% del total de la factura.">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= \app\helpers\Utils::getPaidPercentage($invoice->total_amount, $invoice->debt)?>%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                    
                                <?php endif ?>
                            </td>
                            <td>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                        <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="<?= URL_PATH ?>/admin/invoice/show/<?= $invoice->id ?>">
                                                <i class="fa fa-info-circle text-blue"></i>
                                                Más información
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= URL_PATH ?>/admin/invoice/print/<?= $invoice->id ?>" target="_blank">
                                                <i class="fa fa-print text-black"></i> 
                                                Imprimir factura
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn-cancel" data-toggle="#modal" data-target="#modal-cancel-order">
                                                <i class="fa fa-ban text-red"></i> 
                                                Cancelar factura
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>
               
            </table>

        </div><!-- ./box-body -->
     </div><!-- ./box-primary -->

</section>


<!-- INVOICE-INDEX -->
<!--<script>
function fetchInvoices(){
    var table = $('#invoices').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/invoice/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id', 
                render: function(data){
                    return `<a href=${URL_PATH}"/admin/invoice/show/${data}">#${data}</a>`
                }
            },
            {'data': 'provider.business_name'},
            {'data': 'date'},
            {'data': 'total_amount', 
                render: function(data){
                    return `$ ${data}`
                }
            },
            {'defaultContent': `
                <div class="btn-group">
                    <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Ver">
                        <i class="menu-icon fa fa-search-plus text-blue"></i>
                    </a>
                    <a href="#" class="btn-edit btn btn-social-icon" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" title="Editar">
                        <i class="menu-icon fa fa-edit text-orange"></i>
                    </a>
                </div>`
            }

        ],
        'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    //getDataShow('#invoices tbody', table);
    //getDataConfirm_shipment('#invoices tbody', table);
    //getDataPrint('#invoices tbody', table);
}
</script>-->


<!-- INVOICE-SHOW -->
<!--<script>
var getDataShow = function(tbody, table){
    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.location.href = `${URL_PATH}/admin/invoice/show/` + id;

        e.preventDefault();
    });
}
</script>-->


<!-- INVOICE-PRINT -->
<!--<script>
var getDataPrint = function(tbody, table){
    $(document).on('click', '.btn-print', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.open(`${URL_PATH}/admin/invoice/print/` + id, '_blank');

        e.preventDefault();
    });

}
</script>-->



<!--<script>
    $(document).ready(function(){

        //fetchInvoices();
    });
</script>-->