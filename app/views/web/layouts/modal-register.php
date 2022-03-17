<div class="overlay" id="overlay_registrar">
	<div class="popup" id="popupRegistrar">
		<i  id="btn-cerrar-popupRegistrarme" class="btn-cerrar-popup icon-cross"><i class="fa fa-close"></i></i> 
		<h4 class="card-title mb-4">Registrarse</h4>
		<div id="error-message-register">
				
		</div>
		<form id="form-register" action="<?= URL_PATH ?>/auth/register" method="POST">
			<a href="#" class="btn btn-outline-primary btn-block mb-2"> <i class="fa fa-facebook-f"></i> &nbsp  Regístrate usando Facebook</a>
			<a href="#" class="btn btn-outline-danger btn-block mb-4"> <i class="fa fa-google"></i> &nbsp  Regístrate usando Google</a>
			<hr>
			<h6 class="text-muted">Ó completa tus datos</h6>
			<div class="form-group">
				<input type="text" id="register-name" placeholder="Nombre" class="form-control" required>
			</div> <!-- form-group// -->
			<div class="form-group">
				<input type="text" id="register-lastname" placeholder="Apellido" class="form-control" required>
			</div> <!-- form-group// -->
			<div class="form-group">
				<input type="email" id="register-email" placeholder="Email" class="form-control" required>
			</div> <!-- form-group// -->
			<div class="form-group">
				<input type="password" id="register-password" placeholder="Contraseña" min="6" max="30" class="form-control" required>
			</div> <!-- form-group// -->
					
			<div class="form-group"> 
		        <label class="custom-control custom-checkbox text-left"> 
					<input type="checkbox" id="check-terms" class="custom-control-input"> 
					<div class="custom-control-label"> 
						Al registrarme acepto los <a target="_blank" href="<?= URL_PATH ?>/page/terms">términos y condiciones.</a>  
					</div> 
				</label>
		    </div> <!-- form-group end.// -->    
                
			<button type="submit" id="btn-register" class="btn btn-primary" disabled>Registrarme</button>
		</form>
	</div>
</div>