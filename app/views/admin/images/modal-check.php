<!-- media modal... -->
<div id="media-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4>Gestión de imágenes</h4>
            </div>

            <div class="modal-body">
                <!-- nav tabs -->
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="active"><a href="#upload" data-toggle="tab">Subir</a></li>
                    <li><a href="#librayr" data-toggle="tab">Librería</a></li>
                </ul>

                <!-- tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active fade in" id="upload">
                        <form id="form-upload-images" method="POST" enctype="multipart/form-data">
                            <br>
                            <input id="multiFiles" name="files[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
                            <br>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>

                    <!-- library tab -->
                    <div class="tab-pane fade" id="librayr">
                        <div style="height: 250px; overflow-y: scroll;">
                            <div id="images">
                                    
                                <!-- images hard coded.. -->
                                <!-- data-image-id contains image id from database... -->
                                        
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <!-- insert button -->
                        <br>
                        <button type="button" class="btn btn-sm btn-primary insert">Listo</button>
                    </div><!-- end .library -->
                </div><!-- end tab-content -->
            </div>

        </div><!-- ./modal-content -->

    </div><!-- ./modal-dialog -->

</div><!-- ./media-modal -->



<!-- media modal... -->
<div id="media-modal-radio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4>Gestión de imágenes</h4>
            </div>

            <div class="modal-body">
                <!-- nav tabs -->
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="active"><a href="#upload" data-toggle="tab">Subir</a></li>
                    <li><a href="#librayr" data-toggle="tab">Librería</a></li>
                </ul>

                <!-- tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active fade in" id="upload">
                        <form id="form-upload-images" method="POST" enctype="multipart/form-data">
                            <br>
                            <input id="multiFiles" name="files[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
                            <br>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>

                    <!-- library tab -->
                    <div class="tab-pane fade" id="librayr">
                        <div style="height: 250px; overflow-y: scroll;">
                            <div id="images">
                                    
                                <!-- images hard coded.. -->
                                <!-- data-image-id contains image id from database... -->
                                        
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <!-- insert button -->
                        <br>
                        <button type="button" class="btn btn-sm btn-primary insert">Listo</button>
                    </div><!-- end .library -->
                </div><!-- end tab-content -->
            </div>

        </div><!-- ./modal-content -->

    </div><!-- ./modal-dialog -->

</div><!-- ./media-modal -->