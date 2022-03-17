			<!-- Breadcrumb Area -->
			<section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">INGRESAR</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Log In -->
        <section class="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="n-customer">
                            <h5>NUEVO USUARIO</h5>
                            <p>Regístrate para tener una experiencia personalizada, comprar vía web y realizar pagos Online con tarjetas de débito/crédito.</p>
                            <a href="<?= URL_PATH ?>/auth/registrarse">Crear una cuenta</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="r-customer">
                            <h5>INICIO DE SESIÓN</h5>

							<?php if(isset($message_login)) : ?>
                            <div class="alert alert-info text-white">
                                <p><?= $message_login ?></p>
                            </div>
                            <?php endif ?>

                            <form id="form-login" action="#">
                                <div class="emal">
                                    <label>Email</label>
                                    <input type="email" id="email-login" required>
                                </div>
                                <div class="pass">
                                    <label>Contraseña</label>
                                    <input type="password" id="password-login" required>
                                </div>
                                <div class="d-flex justify-content-between nam-btm">
                                    <div>
                                        <a href="">¿Olvidó su contraseña?</a>
                                    </div>
                                </div>
                                <button type="submit" name="button">Ingresar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Log In -->


<!-- LOGIN -->
 <script>
     $('#form-login').submit(function(e){
    
        const postData = {
            email: $('#email-login').val(),
            password: $('#password-login').val()
        };

        console.log(postData);

        $.post(URL_PATH + '/auth/login', postData, function(r) {
            console.log('Respuesta: ' + r);

            switch (r) {
                case 'err':
                    Swal.fire({
                        icon: 'error',
                        title: 'Las credenciales no coinciden!',
                        text: 'Intente nuevamente.'
                    });

                    $('#login-password').val('');
                    
                    break;

                case '/':
                    window.location.replace(URL_PATH + r);
                    break;

                case '/admin':
                    window.location.replace(URL_PATH + r);
                    break;

                case 'limit_exceeded':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Aviso! Límite excedido',
                        text: 'Has superado el límite de intentos. Por favor espera 60 segundos y vuelve a intentarlo.'
                    });
                    break;

                case 'not_confirmed':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Le hemos enviado un Mail!',
                        text: 'Antes de iniciar sesión recuerde verificar su dirección de correo electónico.'
                    });
                    break;
            
                default:

                    break;
            }
            
        });

        e.preventDefault();
    });

 </script>

<!-- forgot-password -->
<script>
$('#forgot_password').on('click', function(e){
	//var CustomerKey = 1234;//your customer key value.
	Swal.fire({
		title: '¿Olvidó su contraseña?',
		text: 'Ingrese su dirección de correo a continuación.',
		input: 'text',
		inputAttributes: {
			autocapitalize: 'off'
		},
		showCancelButton: true,
		confirmButtonText: 'Enviar',
		showLoaderOnConfirm: true,
		preConfirm: (login) => {
			return fetch(URL_PATH + `/auth/password/${login}`)
			.then(response => {
				if (!response.ok) {
					//console.log(response);
					throw new Error(response.statusText)
				}
				console.log(response);
				return response;
			})
			.catch(error => {
				Swal.showValidationMessage(
				`Request failed: ${error}`
				)
			})
		},
		allowOutsideClick: () => !Swal.isLoading()
		}).then((result) => {
			console.log(result);
		if (result.value) {
			Swal.fire({
				icon: 'success',
				title: `Solicitud recibida`,
				text: 'Enviamos un link al correo especificado para reestablecer su contraseña.'
			})

		}

	})

	e.preventDefault();
  })
</script>

</html>