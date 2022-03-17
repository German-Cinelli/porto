<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-wrench text-olive"></i> Ajustes 
        <small>Configuración básica</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/config"><i class="fa fa-wrench"></i> Ajustes</a></li>
        <li class="active">Configuración básica</li>
        
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Datos de mi empresa</h3>
            <div class="btn-group pull-right">
                
            </div><!-- /.btn-group -->
        </div><!-- /.box-header -->
        
        <div class="box-body">
            <form id="form-edit"action="#">

                <!-- COMPANY_NAME -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Nombre de empresa: <span class="text-red">(*)</span></label>
                        <input type="text" id="company_name" class="form-control" placeholder="Ingrese nombre de empresa" required>
                    </div>
                </div>

                <!-- CITY -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ciudad: <span class="text-red">(*)</span></label>
                        <select id="city" class="form-control select2" required>
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
                </div>

                <!-- LOCATION -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Localidad/Barrio: <span class="text-red">(*)</span></label>
                        <input type="text" id="location" class="form-control" placeholder="Ingrese barrio" required>
                    </div>
                </div>

                <!-- ADDRESS -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dirección: <span class="text-red">(*)</span></label>
                        <input type="text" id="address" class="form-control" placeholder="Ingrese dirección" required>
                    </div>
                </div>

                <!-- MAIL -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Correo electrónico: <span class="text-red">(*)</span></label>
                        <input type="text" id="mail" class="form-control" placeholder="Ingrese correo" required>
                    </div>
                </div>

                <!-- PHONE -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Teléfono: <span class="text-red">(*)</span></label>
                        <input type="text" id="phone" class="form-control" placeholder="Ingrese N° telefónico" required>
                    </div>
                </div>

                <!-- CELLPHONE -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Celular: <span class="text-red">(*)</span></label>
                        <input type="text" id="cellphone" class="form-control" placeholder="Ingrese N° celular" required>
                    </div>
                </div>

                <!-- CURRENCY -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Moneda: <span class="text-red">(*)</span></label>
                        <select id="currency" class="form-control select2" required>
                            <option value="Pesos uruguayos">Pesos uruguayos</option>
                            <option value="Pesos argentinos">Pesos argentinos</option>
                            <option value="Pesos chilenos">Pesos chilenos</option>
                            <option value="Pesos mexicanos">Pesos mexicanos</option>
                            <option value="Pesos colombianos">Pesos colombianos</option>
                            <option value="Soles peruanos">Soles peruanos</option>
                            <option value="Reales brasileños">Reales brasileños</option>
                            <option value="Dolares americanos">Dolares americanos</option>
                            <option value="Euros">Euros</option>
                        </select>
                    </div>
                </div>

                <!-- SYMBOL -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Símbolo de moneda: <span class="text-red">(*)</span>
                            <span data-toogle="tooltip" title="Corresponde al símbolo que verán sus clientes en el catálogo de productos y sus facturas. Ejemplos: $ 2.750.00, UYU 2.750.00, USD 2.750.00, € 2.750.00">
                                <i class="fa fa-question-circle text-blue"></i>
                            </span>
                        </label>
                        <select id="symbol" class="form-control select2" required>
                            <option value="$">$</option>
                            <option value="UYU">UYU</option>
                            <option value="USD">USD</option>
                            <option value="U$S">U$S</option>
                            <option value="€">€</option>
                            <option value="€">S/</option>
                        </select>
                    </div>
                </div>

                <!-- FACEBOOK -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Facebook:</label>
                        <input type="text" id="facebook" class="form-control" placeholder="Ingrese link Facebook">
                    </div>
                </div>

                <!-- INSTAGRAM -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Instagram:</label>
                        <input type="text" id="instagram" class="form-control" placeholder="Ingrese Link Instagram">
                    </div>
                </div>

                <button class="btn btn-primary pull-right">Actualizar datos</button>

            </form>

        </div><!-- ./box-body -->
    </div><!-- ./box-primary -->
    
</section>

<!-- GET-CONFIG -->
<script>
function fetchConfig(){
    $.ajax({
        url: URL_PATH + '/admin/config/getConfig',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            var config = JSON.parse(r);
            //console.log(config);
            
            $('#company_name').val(config.company_name);
            $("#city option[value='" + config.city + "']").prop("selected", true);
            $('#location').val(config.location);
            $('#address').val(config.address);
            $('#mail').val(config.mail);
            $('#phone').val(config.phone);
            $('#cellphone').val(config.cellphone);
            $("#currency option[value='" + config.currency + "']").prop("selected", true);
            $("#symbol option[value='" + config.symbol + "']").prop("selected", true);
            $('#facebook').val(config.facebook);
            $('#instagram').val(config.instagram);
            
            $('.select2').trigger('change');

        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
    });
}

</script>


<!-- CONFIG-EDIT -->
<script>
    $('#form-edit').submit(function(e){

        const postData = {
            company_name: $('#company_name').val(),
            city: $('#city').val(),
            location: $('#location').val(),
            address: $('#address').val(),
            mail: $('#mail').val(),
            phone: $('#phone').val(),
            cellphone: $('#cellphone').val(),
            currency: $('#currency').val(),
            symbol: $('#symbol').val(),
            facebook: $('#facebook').val(),
            instagram: $('#instagram').val()
        };

        //console.log(postData);

        $.post(URL_PATH + '/admin/config/update', postData, function(r) {
            //console.log(r);
            if(r == "updated"){
                /* Alert-success*/
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Listo!',
                    text: 'La configuración del sitio ha sido actualizada.',
                    showConfirmButton: false,
                    timer: 4100
                })  
            } else {
                /* Alert-error*/
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error! Complete los datos requeridos.',
                })
            }

        });

        e.preventDefault();
    });
</script>

<script>
    $(document).ready(function(){

        fetchConfig();
    });
</script>