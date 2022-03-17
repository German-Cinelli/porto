<section class="section-content padding-y bg">
    <div class="container my-3">
       
        <div class="card p-3">
            <div class="box">
                <div class="card-title text-center mb-5">
                    <h4>Datos personales <i class="icon text-primary fa fa-user"></i></h4>
                    <p>Es de importancia que utilices tus datos reales ya que serán utilizados en la factura de tu pedido.</p>
                </div>
                <form id="form-edit">

                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                        <input type="hidden" id="id" value="<?= $_SESSION['login']->id ?>">
                            <label for="">Nombre</label>
                            <input type="text" id="name" value="<?= $_SESSION['login']->name ?>" class="form-control" placeholder="Ingrese nombre">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Apellido</label>
                            <input type="text" id="lastname" value="<?= $_SESSION['login']->lastname ?>" class="form-control" placeholder="Ingrese apellido">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Departamento</label>
                            <select id="city" class="form-control">
                            <?php if($_SESSION['login']->city == NULL) : ?>
                                <option value="" disabled selected>Seleccione departamento</option>
                            <?php else : ?>
                                <option value="<?= $_SESSION['login']->city ?>"><?= $_SESSION['login']->city ?></option>
                            <?php endif ?>
                                <option value="Montevideo">Montevideo</option>
                                <option value="Artigas">Artigas</option>
                                <option value="Canelones">Canelones</option>
                                <option value="Cerro Largo">Cerro Largo</option>
                                <option value="Colonia">Colonia</option>
                                <option value="Durazno">Durazno</option>
                                <option value="Flores">Flores</option>
                                <option value="Florida">Florida</option>
                                <option value="Lavalleja">Lavalleja</option>
                                <option value="Maldonado">Maldonado</option>
                                <option value="Paysandú">Paysandú</option>
                                <option value="Río Negro">Río Negro</option>
                                <option value="Rivera">Rivera</option>
                                <option value="Rocha">Rocha</option>
                                <option value="Salto">Salto</option>
                                <option value="San José">San José</option>
                                <option value="Soriano">Soriano</option>
                                <option value="Tacuarembó">Tacuarembó</option>
                                <option value="Treinta y Tres">Treinta y Tres</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Localidad</label>
                            <input type="text" id="location" value="<?= $_SESSION['login']->location ?>" class="form-control" placeholder="Ingrese su localidad">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Dirección</label>
                            <input type="text" id="address" value="<?= $_SESSION['login']->address ?>" class="form-control" placeholder="Ingrese dirección">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Documento de identidad</label>
                            <input type="text" id="document" value="<?= $_SESSION['login']->document ?>" class="form-control" placeholder="Ingrese N° documento">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Teléfono</label>
                            <input type="text" id="phone" value="<?= $_SESSION['login']->phone ?>" class="form-control" placeholder="Ingrese N° telefónico">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Teléfono Celular</label>
                            <input type="text" id="cellphone" value="<?= $_SESSION['login']->cellphone ?>" class="form-control" placeholder="Ingrese N° celular">
                        </div>
                    </div>
                    <i class="icon text-dark fa fa-key"></i> ¿Quieres cambiar tu contraseña?<a href="<?= URL_PATH ?>/mydata/change_password"> Haz clic aquí.</a>
                </div>


                <div class="box mt-3">
                    <div class="card-title text-center m-5">
                        <h4>Datos empresariales <i class="icon text-primary fa fa-fax"></i></h4>
                        <p>Si tu compra va dirigida a nombre de una empresa, completa los siguientes datos.</p>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">Razón social</label>
                            <input type="text" id="business_name" value="<?= $_SESSION['login']->business_name ?>" class="form-control" placeholder="Ingrese Razón Social">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label for="">RUT</label>
                            <input type="text" id="rut" value="<?= $_SESSION['login']->rut ?>" class="form-control" placeholder="Ingrese N° RUT">
                        </div>
                    </div>
                </div>

                <button href="#" id="btn-update" class="btn btn-block btn-primary mt-4">Actualizar mis datos</button>

            </form>
        </div>
    </div>
</section>

<script src="<?= URL_PATH ?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?= URL_PATH ?>/assets/app/web/mydata/updateData.js"></script>