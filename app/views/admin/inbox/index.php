<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-envelope-o text-olive"></i> Mensajes
        <?php if(\app\helpers\Utils::messages()->count() > 0) : ?>
        <small>Tienes <?= \app\helpers\Utils::messages()->count() ?> sin responder.</small>
        <?php else : ?>
        <small>No tienes mensajes que responder.</small>
        <?php endif ?>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/inbox"><i class="fa fa-envelope-o"></i> Mensajes</a></li>
        <li class="active">Listado</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de mensajes</h3>
            <div class="btn-group pull-right">
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="inbox" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Enviado el</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                
            </table>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->

</section>


<!-- INBOX-LIST -->
<script>
function fetchInbox(){
    var table = $('#inbox').DataTable({
        'ajax': {
            'url': 'inbox/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'status',
                render: function(data){
                    if(data == 0){
                        return `<i class="fa fa-square text-blue" data-toggle="tooltip" title="Aún no has respondido el mensaje"></i>`
                    } else {
                        return `<i class="fa fa-check-square text-blue" data-toggle="tooltip" title="Has respondido éste mensaje"></i>`
                    }
                }
            },
            {'data': 'name'},
            {'data': 'email'},
            {'data': 'phone'},
            {'data': 'message', 
                render: function(data){
                    return `<span class="overflow-hidden">` + limitTextWords(data) + `</span>`
                }
            },
            {'data': 'created_at'},
            {'data': 'status',
                render: function(data){
                    `<div class="btn-group">`
                    if(data == 0){
                        return `
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                    <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" class="btn-reply">
                                            <i class="fa fa-mail-reply text-blue"></i>
                                            Responder mensaje
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
                                        <a href="#" class="" disabled>
                                            <i class="fa fa-mail-reply text-blue"></i>
                                            Ya respondiste el mensaje
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        `
                    }
                }
            }
        ],
        'language': {
            'url': URL_PATH + '/library/datatables/lang/es/spanish.lang'
        }
    });

    reply('#inbox tbody', table);
}

function limitTextWords(text){
    var t = text.length;
    message = text;
    if(t > 65){
        message = text.substr(0,65)+'...';
    }

    return message;
}
</script>


<!-- INBOX-REPLY -->
<script>
var reply = function(tbody, table){

    $(document).on('click', '.btn-reply', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.location.href = URL_PATH + '/admin/inbox/reply/' + id;

        e.preventDefault();
    });

}
</script>


<script>
    $(document).ready(function(){

        fetchInbox();
    });
</script>