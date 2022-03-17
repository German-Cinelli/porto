<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-th-large text-olive"></i> Canastas
        <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/product"><i class="fa fa-th-large"></i> Canastas</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>



 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nueva canasta</h3>
            
            <div class="btn-group pull-right">
                <a href="<?= URL_PATH ?>/admin/combo" class="btn btn-primary">
                    <span class="fa fa-list-ol"></span>
                    Listar canastas
                </a>
            </div><!-- /.btn-group -->
            
        </div><!-- /.box-header -->

        <form action="<?= URL_PATH ?>/admin/combo/store" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

                <div class="row">
                
                    <div class="col-md-6">
                        <!-- NAME -->
                        <div class="form-group">
                            <label>Título: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Ingrese título" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- PRICE -->
                        <div class="form-group">
                            <label>Precio: <span class="text-red">(*)</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input type="number" name="price" class="form-control" placeholder="Ingrese precio" required>
                            </div>
                        </div>
                    </div>
                
                
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label>Descripción: <span class="text-red">(*)</span></label>
                    <div class="form-group">
                        <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">
                            *Borre ésto e ingrese una descripción*
                        </textarea>
                    </div>
                </div>


                <!-- URL -->
                <div class="form-group">
                    <label>URL: <span class="text-red">(*)</span>
                        <span data-toogle="tooltip" title="La URL debe estar relacionada con el nombre del producto y no debe repetirse. No debe incluir la letra 'Ñ' ni espacios, recuerde separar con guiones '-' como indica el ejemplo.">
                            <i class="fa fa-question-circle text-blue"></i>
                        </span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-link"></i></span>
                        <input type="text" name="slug" class="form-control" placeholder="Ejemplo: combo-gaming-mouse-teclado-auriculares-mousepad" required>
                    </div>
                </div>

                 <!-- PRODUC -->
                 <div class="form-group">
                    <label>Producto - Atributo: <span class="text-red">(*)</span>
                        <span data-toogle="tooltip" title="La URL debe estar relacionada con el nombre del producto y no debe repetirse. No debe incluir la letra 'Ñ' ni espacios, recuerde separar con guiones '-' como indica el ejemplo.">
                            <i class="fa fa-question-circle text-blue"></i>
                        </span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-tag"></i></span>
                        <select name="items[]" class="form-control select2" multiple="multiple" data-placeholder="Seleccione..." style="width: 100%;">
                        <?php foreach($pt_av as $item) : ?>
                            <option value="<?= $item->id ?>"><?= $item->product_type->name ?> - <?= $item->attribute_value->name ?><?= $item->attribute_value->attribute->description ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                </div>

                <!-- IMAGES -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="clearfix"></div>
                            <label for="exampleInputFile">Imagen: <span class="text-red">(*)</span></label>
                            <input type="file" name="file" value="asd" class="dropify-es" />        
                        </div><!-- end .form-group -->

                        <div class="product-image">
                            <!-- product images and hidden fields -->
                            <!-- dynamically added after  -->
                        </div>
                    </div><!-- ./col-sm-6 -->
                

                </div><!-- ./row -->


            </div><!-- ./box -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

        </div><!-- ./modal-body -->

    </form>

</section>