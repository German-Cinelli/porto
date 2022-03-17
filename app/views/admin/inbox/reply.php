<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?= URL_PATH ?>/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-envelope-o text-olive"></i> Mensajes 
        <small>Responder mensaje</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/inbox"><i class="fa fa-envelope-o"></i> Mensajes</a></li>
        <li class="active">Responder</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Responder mensaje de <strong><?= $inbox->name ?></strong> <small><i class="fa fa-clock-o"></i> <?= $inbox->created_at->diffForHumans() ?></small></h3>
            <div class="btn-group pull-right">
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->

        <!-- /.box-header -->
        <div class="box-body">
            <form id="form-reply">
                <input id="inbox-id" type="hidden" value="<?= $inbox->id ?>">
                <input id="email" type="hidden" value="<?= $inbox->email ?>">
                <input id="message" type="hidden" value="<?= $inbox->message ?>">

                <h4>De: <?= $inbox->email ?></h4>
                <h4>Teléfono: <?= $inbox->phone ?></h4>
                <h4>Mensaje: <?= $inbox->message ?></h4>
                
                <div class="form-group">
                    <textarea id="reply" class="form-control" style="height: 300px">*Borre esto y escriba aquí su respuesta*</textarea>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Responder</button>
                    </div>
                    <a href="<?= URL_PATH ?>/admin/inbox" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
                </div><!-- /.box-footer -->
            </form>
        </div><!-- /. box-body -->
    </div><!-- /. box box-primary -->
     
</section>


<script>

    $('#form-reply').submit(function(e){
        
        const postData = {
            inbox_id: $('#inbox-id').val(),
            email: $('#email').val(),
            message: $('#message').val(),
            reply: $('#reply').val()
        };

        //console.log(postData);

        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Atención!',
            text: 'El mensaje no ha sido enviado debido a que no se ha configurado el servidor SMTP. No se preocupe, cuando usted adquiera el software funcionará sin problemas.',
            showConfirmButton: true
        });


        /*$.post(URL_PATH + '/admin/inbox/send_reply', postData, function(r) {
            //console.log(r);
            if(r == "replied"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Correcto!',
                    text: 'Tu respuesta ha sido enviada!',
                    showConfirmButton: false,
                    timer: 2800
                });

                setTimeout(function(){ 
                    window.location.replace(URL_PATH + '/admin/inbox');
                }, 3000);
                
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Recargue la página e inténtelo nuevamente. Si el problema persiste comuníquese con nosotros.',
                });
            }
            
        });*/

        e.preventDefault();
    });
</script>