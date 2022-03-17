<div class="container m-5">
    <h3 class="text-center"></h3>

    <div class="card">
        <div class="container-fluid bg-dark py-3">
            <p class="mb-0 card-title text-white text-left">Reestablecer contraseña de <b><?= $email ?></b></p>
        </div>
        <div class="card-body">
            <form id="form-password-reset">
                <input type="hidden" id="token" name="token" value="<?= $token ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese contraseña">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Confirmación</label>
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirme contraseña">
                    </div>
                </div><!-- ./form-row -->
                <button type="submit" class="btn btn-block btn-primary mt-3">Confirmar</button>
            </form>
        </div>
    </div>

</div><!-- ./container -->

<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>

<script>

    $('#form-password-reset').submit(function(e){

        const URL_PATH = $('#url_path').val();

        const postData = {
            token: $('#token').val(),
            password: $('#password').val(),
            password_confirm: $('#password_confirm').val()
        }

        //console.log(postData);

        if(postData.password.lenght < 7 || postData.password_confirm.length < 7){
            Swal.fire({
                icon: 'warning',
                title: 'Aviso!',
                text: 'La contraseña debe ser mayor a 6 caracteres.'
            });

            clearInputs()
        } else {
            if(postData.password != postData.password_confirm){
                Swal.fire({
                    icon: 'error',
                    title: 'Aviso!',
                    text: 'Las contraseñas deben coincidir.'
                });

                clearInputs()
            } else {

                $.post(URL_PATH + '/auth/password_recover', postData, function(r) {
                    //console.log(r);

                    switch (r) {
                        case 'error':
                            Swal.fire({
                                icon: 'error',
                                title: 'Las credenciales no coinciden!',
                                text: 'Intente nuevamente.'
                            });
                            break;

                        case 'success':
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Tu contraseña ha sido cambiada!',
                                text: 'Ya puedes iniciar sesión con tu cuenta.',
                                showConfirmButton: false,
                                timer: 4500
                            });  

                            setTimeout(function() { 
                                location.replace(URL_PATH);
                            }, 5000);

                            break;

                        case 'expired':
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Tu solicitud ha expirado!',
                                text: 'Pasaron más de 30 minutos desde que ha solicitado un cambio de contraseña. Por favor dirígase al formulario de inicio de sesión e intentelo nuevamente.',
                                showConfirmButton: false,
                                timer: 9000
                            });  

                            setTimeout(function() { 
                                location.replace(URL_PATH);
                            }, 9500);

                            break;
                    
                        default:

                            break;
                    }
                    
                });
                
            }
        }

        
        e.preventDefault();
    });

    function clearInputs(){
        $('#password').val('');
        $('#password_confirm').val('');
    }

</script>
