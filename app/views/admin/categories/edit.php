<!-- Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar categoría</h4>
            </div>
            <form id="form-edit">
                <div class="modal-body">

                    <input type="hidden" id="id-edit">
                    
                    <!-- NAME -->
                    <div class="form-group">
                        <label>Nombre:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="text" id="name-edit" class="form-control" placeholder="Ingrese nombre para la categoría" required>
                        </div>
                    </div>
                       

                    <!-- URL -->
                    <div class="form-group">
                        <label>URL:
                            <span data-toogle="tooltip" title="La URL debe estar relacionada con el nombre de la categoría y no debe repetirse, tampoco debe incluir la letra 'Ñ' ni espacios. En caso que sea más de una palabra recuerde separar con guiones '-' como indica el ejemplo.">
                                <i class="fa fa-question-circle text-blue"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" id="slug-edit" class="form-control" placeholder="Ejemplos: computadoras-intel | celulares-y-tablets" required>
                        </div>
                    </div>
                        

                    <!-- DESCRIPTION -->
                    <!--<div class="form-group">
                        <label>Descripción:</label>
                        <textarea class="form-control" id="description-edit" rows="3" placeholder="Ingrese descripción" required></textarea>
                    </div>-->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->