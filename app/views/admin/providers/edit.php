
<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar proveedor</h4>
            </div>
            <form id="form-edit">
                <div class="modal-body">
                    <input type="hidden" id="id-edit">
                    
                    <div class="row">

                        <!-- BUSINESS_NAME -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre empresa: <span class="text-red">(*)</span></label>
                                <input type="text" id="business_name-edit" class="form-control" placeholder="Ingrese nombre de empresa" required>
                            </div>
                        </div>

                        
                         <!-- RUT -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RUT: <span class="text-red">(*)</span></label>
                                <input type="text" id="rut-edit" class="form-control" placeholder="Ingrese N° RUT" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- CITY -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudad: <span class="text-red">(*)</span></label>
                                <select id="city-edit" class="form-control" required>
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
                                <label>Localidad: <span class="text-red">(*)</span></label>
                                <input type="text" id="location-edit" class="form-control" placeholder="Ingrese localidad" required>
                            </div>
                        </div>

                    </div><!-- ./row -->


                    <div class="row">

                        <!-- ADDRESS -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección: <span class="text-red">(*)</span></label>
                                <input type="text" id="address-edit" class="form-control" placeholder="Ingrese dirección" required>
                            </div>
                        </div>

                        
                         <!-- PHONE -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono: <span class="text-red">(*)</span></label>
                                <input type="text" id="phone-edit" class="form-control" placeholder="Ingrese teléfono" required>
                            </div>
                        </div>

                    </div><!-- ./row -->

                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Logo actual:</label>
                            <div id="provider-image">
                                            
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="">Actualizar logo:</label>
                            <input type="file" id="file-edit" name="file-edit" class="dropify-es" />
                        </div>
                    
                    </div><!-- ./row -->


                </div><!-- ./modal-body --> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->