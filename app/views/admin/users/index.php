<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-users text-olive"></i> Clientes
        <small></small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/user"><i class="fa fa-users"></i> Clientes</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de clientes registrados</h3>
            <div class="btn-group pull-right">
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="customers" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Depto.</th>
                        <th scope="col">Registrado el</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
    
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->

</section>


<!-- USER-LIST -->
<script>
function fetchCustomers(){
    var table = $('#customers').DataTable({
        'ajax': {
            'url': URL_PATH + '/admin/user/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'name', 
                render: function(data){
                    return `<a href="#" class="btn-show">${data}</span>`
                }
            },
            {'data': 'document'},
            {'data': 'email'},
            {'data': 'phone'},
            {'data': 'city'},
            {'data': 'created_at'},
            {'data': 'status',
                render: function(data){
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
                }
            }
        ],
        'language': {
            url: URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    getDataShow('#customers tbody', table);
}
</script>


<!-- USER-SHOW -->
<script>
var getDataShow = function(tbody, table){

$(document).on('click', '.btn-show', function(e){
    var data = table.row( $(this).parents('tr') ).data();
    var id = data.id;

   window.location.href = URL_PATH + '/admin/user/show/' + id;

   e.preventDefault();
});

}
</script>


<script>
    $(document).ready(function(){

        fetchCustomers();
    });
</script>