<!-- Modal -->
<div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="text-muted modal-title"></h4>
            </div>
            <form id="form-reply">
                <div class="modal-body">
                    
                    <input type="hidden" id="product-id">
                    <input type="hidden" id="user-id">
                    <input type="hidden" id="comment-id">
                    
                    <div class="row">

                        <!-- REPLY-COMMENT -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Responder comentario de 
                                    <b>
                                        <span id="user-name">
                                    
                                        </span>
                                    </b>
                                </label>
                                <textarea class="form-control" id="reply" rows="3" placeholder="Escriba aquí su respuesta" required></textarea>
                            </div>
                        </div>

                    </div><!-- ./row -->

                    
                </div><!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Responder</button>
                </div>
            </form>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   