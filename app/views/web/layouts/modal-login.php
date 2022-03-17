<div class="overlay" id="overlay">
	<div class="popup" id="popup">
		<i  id="btn-cerrar-popup" class="btn-cerrar-popup icon-cross"><i class="fa fa-close"></i></i>
			
		<h4 class="card-title mb-4">Iniciar sesión</h4>
		<form id="form-login" action="<?= URL_PATH ?>/Auth/login" method="POST">
			<a href="#" class="btn btn-outline-primary btn-block mb-2"> <i class="fa fa-facebook-f"></i> &nbsp  Inicia sesión con Facebook</a>
			<a href="#" class="btn btn-outline-danger btn-block mb-4"> <i class="fa fa-google"></i> &nbsp  Inicia sesión con Google</a>
			<hr>
			<div class="form-group">
				<input id="login-email" type="email" name="email" class="form-control" placeholder="Email" required>
			</div> <!-- form-group// -->
			<div class="form-group">
				<input id="login-password" type="password" name="password" class="form-control" placeholder="Contraseña" required>
			</div> <!-- form-group// -->
						
			<div class="form-group">
				<a id="forgot_password" href="" class="float-right">Olvidé mi contraseña</a> 
				<label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> Recordar </div> </label>
			</div> <!-- form-group form-check .// -->
			<div class="form-group">
				<button type="submit" id="btn-login" class="btn btn-primary btn-block"> Ingresar  </button>
			</div> <!-- form-group// -->    
		</form>
				

		<p class="text-center mt-4">No tienes una cuenta? <a id="btn-abrir-registrar2" href="#">Registrate</a></p>
	</div>
</div>