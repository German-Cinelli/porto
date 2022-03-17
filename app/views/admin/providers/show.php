<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-street-view text-olive"></i> Proveedores
        <small>Información del proveedor</small>
    </h1>
        <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/provider"><i class="fa fa-street-view"></i> Proveedores</a></li>
        <li class="active">Ver</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <?php if($provider->image == '') : ?>
                        <img src="<?= URL_PATH ?>/assets/dist/images/not-image-avilable.png" class="profile-user-img img-responsive" alt="logo-proveedor">
                    <?php else : ?>
                        <img class="profile-user-img img-responsive" src="<?= URL_PATH ?><?= $provider->image ?>" alt="User profile picture">
                    <?php endif ?>
                    
                    <h3 class="profile-username text-center"><?= $provider->business_name ?></h3>

                
                  
                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-dot-circle-o margin-r-5"></i> Rut</strong>
                        <p class="text-muted"><?= $provider->rut ?></p>

                        <strong><i class="fa fa-location-arrow margin-r-5"></i> Ciudad</strong>
                        <p class="text-muted"><?= $provider->city ?> / <?= $provider->location ?></p>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                        <p class="text-muted"><?= $provider->address ?></p>

                        <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
                        <p class="text-muted"><?= $provider->phone ?></p>

                        <strong><i class="fa fa-clock-o margin-r-5"></i> Se registró el...</strong>

                        <p class="text-muted"><?= $provider->created_at ?></p>
                        
                    </div>
                    <!-- /.box-body -->

                </div><!-- /.box-body -->

            </div><!-- /.box-primary -->

        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Compras</a></li>
              <li><a href="#settings" data-toggle="tab"><i class="fa fa-edit"></i> Editar datos proveedor</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                 
                  <?php if($invoices->isEmpty()) : ?>
                    <div class="alert alert-warning alert-dismissible">
                      <h4><i class="icon fa fa-ban"></i> Sin datos!</h4>

                      <p>Al parecer auń no has realizado ninguna compra a tu proveedor <?= $provider->business_name ?>.</p>
                    </div>
                  <?php else : ?>

                  <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th scope="col">N° Factura</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Fecha compra</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($invoices as $invoice) : ?>
                      <tr>
                        <td>
                            <a href="<?= URL_PATH ?>/admin/invoice/show/<?= $invoice->id ?>">#<?= $invoice->id ?></a>
                        </td>
                        <td><span class="text-red"><?= \app\helpers\Utils::moneyFormat($invoice->total_amount, $app['SYMBOL']) ?></span></td>
                        <td><?= $invoice->date ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= URL_PATH ?>/admin/invoice/show/<?= $invoice->id ?>" class="btn btn-social-icon" data-toggle="tooltip" title="Más información">
                                    <i class="menu-icon fa fa-info-circle text-blue"></i>
                                </a>
                                <a href="<?= URL_PATH ?>/admin/invoice/print/<?= $invoice->id ?>" target="_blank" class="btn btn-social-icon" data-toggle="tooltip" title="Imprimir factura">
                                    <i class="menu-icon fa fa-print text-black"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                    <?php endforeach ?>

                    </tbody>
                
                  </table>

                  <?php endif ?>
                
                </div><!-- /.post -->

              </div>
              
              <div class="tab-pane" id="settings">
              <form id="form-edit">
                <div class="modal-body">

                    <input type="hidden" id="provider-id" value="<?= $provider->id ?>">

                    <div class="row">

                        <!-- BUSINESS_NAME -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre empresa: <span class="text-red">(*)</span></label>
                                <input type="text" id="business_name-edit" value="<?= $provider->business_name ?>" class="form-control" placeholder="Ingrese nombre de empresa" required>
                            </div>
                        </div>

                        
                         <!-- RUT -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RUT: <span class="text-red">(*)</span></label>
                                <input type="text" id="rut-edit" value="<?= $provider->rut ?>" class="form-control" placeholder="Ingrese N° RUT" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- CITY -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudad: <span class="text-red">(*)</span></label>
                                <select id="city-edit" class="form-control" required>
                                    <option value="<?= $provider->city ?>" selected><?= $provider->city ?></option>
                                    <option value="Artigas">Artigas</option>
                                    <option value="Canelones">Canelones</option>
                                    <option value="Cerro Largo">Cerro Largo</option>
                                    <option value="Colonia">Colonia</option>
                                    <option value="Durazno">Durazno</option>
                                    <option value="Flores">Flores</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Lavalleja">Lavalleja</option>
                                    <option value="Maldonado">Maldonado</option>
                                    <option value="Montevideo">Montevideo</option>
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
                                <label>Localidad: <span class="text-red">(*)</span></label>
                                <input type="text" id="location-edit" value="<?= $provider->location ?>" class="form-control" placeholder="Ingrese localidad" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- ADDRESS -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección: <span class="text-red">(*)</span></label>
                                <input type="text" id="address-edit" value="<?= $provider->address ?>" class="form-control" placeholder="Ingrese dirección" required>
                            </div>
                        </div>

                        
                         <!-- PHONE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono: <span class="text-red">(*)</span></label>
                                <input type="text" id="phone-edit" value="<?= $provider->phone ?>" class="form-control" placeholder="Ingrese teléfono" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    
                    <div class="row">
                        
                        <?php if($provider->image != '') : ?>
                        <!-- IMAGE -->
                        <div class="col-md-12">
                            <label for="">Logo actual:</label>
                            <img width="250px" class="profile-user-img" src="<?= URL_PATH ?><?= $provider->image ?>" alt="logo-proveedor">
                        </div>

                        <hr>
                        <?php endif ?>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- IMAGE -->
                        <div class="col-md-12">
                            <label for="">Logo:</label>
                            <?php if($provider->image != '') : ?>
                                <span data-toogle="tooltip" title="En caso de querer actualizar el logo del proveedor, seleccione uno nuevo desde el recuadro de abajo.">
                                    <i class="fa fa-question-circle text-blue"></i>
                                </span>
                            <?php endif ?>
                            <input type="file" id="file-edit" name="file-edit" value="asd" class="dropify-es" />
                        </div>
                    
                    </div><!-- ./row -->

                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Actualizar datos</button>
                </div>
            </form>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

    </div><!-- /.row -->
  
</section>



<!-- PROVIDER-EDIT -->
<script>
/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#provider-id').val(),
        business_name: $('#business_name-edit').val(),
        rut: $('#rut-edit').val(),
        city: $('#city-edit').val(),
        location: $('#location-edit').val(),
        address: $('#address-edit').val(),
        phone: $('#phone-edit').val(),
        file: $('input[type=file]')[0].files[0]
    };

    //console.log(postData);

    var formData = new FormData();
    formData.append('id', postData.id);
    formData.append('business_name', postData.business_name);
    formData.append('rut', postData.rut);
    formData.append('city', postData.city);
    formData.append('location', postData.location);
    formData.append('address', postData.address);
    formData.append('phone', postData.phone);
    formData.append('file', postData.file);


    $.ajax({
        data: formData,
        url: URL_PATH + '/admin/provider/update',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            //console.log(r);
            if(r == 'error'){

                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Por favor complete los datos requeridos.',
                });

            } else {

                provider_id = r;
              
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Listo!',
                    text: 'Los datos de su proveedor han sido actualizados.'
                });
               
            }
        },
        error: function(xhr){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!'
            })
        }
    });

    e.preventDefault();
});
</script>