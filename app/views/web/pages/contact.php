        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">CONTACTO</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Contact -->
		<section class="contact-area error-sec">
            <div class="container">

                <div class="row pb-5 mb-5">
                    <div class="col-md-12">
                        <div class="error-box text-center">
                            <h3>Comunicate con nosotros por WhatsApp!</h3>
                            <p>Responderemos todas tus dudas</p>
                            <a href="https://wa.me/+59896392243" style="background-color: #25D366"><i class="fa fa-whatsapp"></i>CHATEAR AHORA</a>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-5">
                    <div class="col-lg-4 col-md-5">
                    	<div class="contact-box-tp">
                    		<h4>Información de contacto</h4>
                    	</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-box d-flex">
                                    <div class="contact-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6>Correo</h6>
                                        <p><?= $app['MAIL'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-box d-flex">
                                    <div class="contact-icon">
                                        <i class="fa fa-whatsapp"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6>Whatsapp</h6>
                                        <p><?= $app['CELLPHONE'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-link">
                        	<ul class="list-unstyled list-inline">
                        		<li class="list-inline-item"><a href="<?= $app['FACEBOOK'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        		<li class="list-inline-item"><a href="<?= $app['INSTAGRAM'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        	</ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="contact-form">
                            <h4>Ó dejanos tu mensaje</h4>
                            <form action="#" id="form-contact">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><input type="text" id="name" name="name" placeholder="Su nombre" required=""></p>
                                     </div>
                                    <div class="col-md-6">
                                        <p><input type="number" id="phone" name="subject" placeholder="Su teléfono" required></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><input type="email" id="mail" name="email" placeholder="Su correo" required=""></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><textarea name="message" id="message" placeholder="Escriba aquí su mensaje" required=""></textarea></p>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">Enviar mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact -->

        <!-- Brand area 2 -->
        <section class="brand2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tp-bnd owl-carousel">
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-01.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-02.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-03.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-04.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-05.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-06.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-07.png" alt="" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brand area 2 -->

		

		<script>
            $('#form-contact').submit(function(e){

            const postData = {
                name: $('#name').val(),
                email: $('#mail').val(),
                phone: $('#phone').val(),
                message: $('#message').val()
             };

            //console.log(postData);

            $.post(URL_PATH + '/contact/sendMail', postData, function(r) {
                console.log(r);
                switch (r) {
                    case 'sent':
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Hemos recibido tu mensaje!',
                            text: 'Nos comunicaremos tan pronto sea posible a la dirección de correo especificada.',
                            showConfirmButton: false,
                            timer: 7000
                        });

                        setTimeout(function(){ 
                            window.location.replace(URL_PATH);
                        }, 7300);
                        break;

                    case 'error':
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error!',
                            text: 'Por favor proporciona todos los datos para que podamos contactarte. Si el error persiste puedes contactarnos por WhatsApp.'
                        });
                        break;
                
                    default:

                        break;
                }
                
            });

            e.preventDefault();
            });
        </script>

        <!-- reCaptcha -->
        <script>
        
         /*$('#btn-submitkk').click(function(e){
            grecaptcha.execute('6Le92tcZAAAAAFdapukJvo7wptK3G6hRzbe3oskb', {action: 'submit'}).then(function(token) {
                console.log(token);// Add your logic to submit to your backend server here.
            });
             e.preventDefault();
         })*/
            
        </script>
