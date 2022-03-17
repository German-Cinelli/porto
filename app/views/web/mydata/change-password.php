<section class="section-content padding-y bg">
    <div class="container my-3">
       
        <div class="card p-3">
            <div class="box">
                <div class="card-title text-center mb-5">
                    <h4>Cambio de contraseña <i class="icon text-primary fa fa-key"></i></h4>
                </div>
                <form id="form-edit">

                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <label for="">Contraseña actual</label>
                            <input type="text" id="current_password" class="form-control" placeholder="Ingrese contraseña actual" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Contraseña nueva</label>
                            <input type="text" id="password" class="form-control" placeholder="Ingrese nueva contraseña" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col.lg-6 mb-3">
                            <label for="">Confirmación</label>
                            <input type="text" id="password_confirm" class="form-control" placeholder="Repita contraseña" required>
                        </div>
                    </div>
                </div>

                <button href="#" id="btn-update-password" class="btn btn-block btn-primary mt-4">Actualizar contraseña</button>

            </form>
        </div>
    </div>
</section>

<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?= URL_PATH ?>/assets/app/web/mydata/updatePassword.js"></script>