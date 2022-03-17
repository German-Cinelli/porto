        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">Registro</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Register -->
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form-register" action="#">
                            <h5>Crear una cuenta</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nombre</label>
                                    <input type="text" id="name-register" name="f-name" placeholder="Ingrese su nombre" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input type="text" id="email-register" name="mail" placeholder="Ingrese su curreo" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Password*</label>
                                    <input type="text" id="password-register" name="pas" placeholder="Ingrese contraseña" required>
                                </div>
                                <div class="col-md-7">
                                    <div>
                                        <input type="checkbox" name="c-box" id="c-box" checked>
                                        <label for="c-box">Suscribirme para recibir noticias</label>
                                    </div>
                                </div>
                                <div class="col-md-5 text-right">
                                    <button type="submit" name="button">Registrarme</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Register -->


<!-- REGISTER -->
<script>
    $('#form-register').submit(function(e){
        
        const postData = {
            name: $('#name-register').val(),
            email: $('#email-register').val(),
            password: $('#password-register').val()
        };

        console.log(postData);
        
        $.post(URL_PATH + '/auth/register', postData, function(r) {
            console.log('Respuesta: ' + r);
            switch (r) {
                case '1':
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'Ya existe un usuario registrado con ese correo.'
                    })
                    break;

                case '2':
                    $('#overlay_registrar').hide();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registrado con éxito!',
                        text: 'Hemos enviado un Mail a su dirección de correo electrónico para verificar su cuenta.'
                    });  
                    break;

                case '3':
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Se produjo un error!',
                        footer: `<a href=${URL_PATH}/>Si continúa con éste problema haga clic aquí e intentelo nuevamente.</a>`
                    })
                    break;

                case '4':
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Se produjo un error!',
                        footer: 'Por favor complete todos los datos.'
                    })
                    break;
            
                default:

                    break;
            }
            
        });

        e.preventDefault();
    });

    function setErrorMessageR(msg){
        var template = `
            <div class="alert alert-danger" role="alert">
                ${msg}
            </div>
        `;

        document.querySelector('#error-message-register').innerHTML = template;
    }
 </script>