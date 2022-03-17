<form action="<?= URL_PATH ?>/admin/user/update/<?= $user->id ?>" method="POST" class="form-horizontal">
    <h4 class="text-center">Datos personales</h4>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="name" value="<?= $user->name ?>" class="form-control" placeholder="Ingrese nombre">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="lastname" value="<?= $user->lastname ?>" class="form-control" placeholder="Ingrese apellidos">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Dirección</label>
        <div class="col-sm-10">
            <input type="text" name="address" value="<?= $user->address ?>" class="form-control" placeholder="Ingrese dirección">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Documento</label>
        <div class="col-sm-10">
            <input type="text" name="document" value="<?= $user->document ?>" class="form-control" placeholder="Ingrese documento">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="phone" value="<?= $user->phone ?>" class="form-control" placeholder="Ingrese teléfono">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Celular</label>
        <div class="col-sm-10">
            <input type="text" name="cellphone" value="<?= $user->cellphone ?>" class="form-control" placeholder="Ingrese celular">
        </div>
    </div>

    <hr>

    <h4 class="text-center">Datos empresariales</h4>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Razón social</label>
        <div class="col-sm-10">
            <input type="text" name="business_name" value="<?= $user->business_name ?>" class="form-control" placeholder="Ingrese razón social">
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">RUT</label>
        <div class="col-sm-10">
            <input type="text" name="rut" value="<?= $user->rut ?>" class="form-control" id="inputName" placeholder="Ingrese N° RUT">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Actualizar datos</button>
        </div>
    </div>
</form>