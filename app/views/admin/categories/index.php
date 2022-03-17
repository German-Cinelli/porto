 <!-- Nestable Drag&Drop Menu -->
 <link rel="stylesheet" href="<?= URL_PATH ?>/library/nestable-drop-drag-menu/nestable.min.css">

<section class="content-header">
    <h1>
    <i class="menu-icon fa fa-cubes text-olive"></i> Categorias 
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/category"><i class="fa fa-cubes"></i> Categorias</a></li>
        <li class="active">Listado</li>
    </ol>
</section>


<!-- modal-create-->
<?php include('app/views/admin/categories/create.php') ?>

<!-- modal-edit-->
<?php include('app/views/admin/categories/edit.php') ?>


<!-- Main content -->
<section class="content container-fluid">

    <?php $can_insert_category = \app\helpers\Utils::CanInsertCategory() ?>

    <?php if($can_insert_category) : ?>

    <div class="callout callout-danger">
        <h4>
            <i class="fa fa-warning"></i>
            Atención
        </h4>

        <p>Ha superado el limite para ingresar nuevas categorías. Para continuar ingresando por favor comuníquese con nosotros.</p>
    </div>

    <?php endif ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Menú de categorias</h3>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <span class="fa fa-plus"></span>
                    Nueva categoría
                </button>
            </div><!-- /.btn-group -->

            <br><br>

            <div class="callout callout-info margin-t5">
                <h4><i class="fa fa-warning"></i> Recuerde!</h4>

                <ul>
                    <li>Toda categoría debe tener subcategoría.</li>
                    <li>Dejar alguna categoría "suelta" puede conllevar errores.</li>
                    <li>Si tiene algún inconveniente al editar o eliminar alguna categoría, recargue la página e inténtelo nuevamente.</li>
                    <li>No olvide guardar los cambios una vez haya modificado la estructura de las categorías.</li>
                </ul>
                
              </div>

            <div class="modal-body">
            
            <div id="load"></div>
                <menu id="nestable-menu">
                    <button type="button" class="btn bg-purple" data-action="collapse-all">Colapsar</button>
                    <button type="button" class="btn bg-maroon" data-action="expand-all">Expandir</button>
                    <div class="modal-footer">
                        <input type="hidden" id="nestable-output">
                        <button id="save" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            Guardar cambios
                        </button>
                    </div>
                </menu>
                    
                <div class="dd" id="nestable">

                    <?php  
                        $ref   = [];
                        $items = [];

                        foreach($categories as $data){
                            $thisRef = &$ref[$data->id];

                            $thisRef['parent'] = $data->parent_id;
                            $thisRef['label'] = $data->name;
                            $thisRef['link'] = $data->slug;
                            $thisRef['id'] = $data->id;

                            if($data->parent_id == 0) {
                                    $items[$data->id] = &$thisRef;
                                    //var_dump($items);
                            } else {
                                    $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
                            }

                            //d($items);

                        }

                        function getMenu($items, $class = 'dd-list') {
                        
                            $html = "<ol class=\"".$class."\" id=\"menu-id\">";
                        
                            foreach($items as $key => $value){
                                //dd($value);
                                if($value['label'] == 'Sin categorizar'){
                                    /* Evitamos mostrar las categorías 'Sin categorizar' */
                                } else {
                                    
                                    $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label'].'</span>
                                        <span class="span-right">/<span id="link_show'.$value['id'].'">'.$value['link'].'</span> &nbsp;&nbsp;
                                            <a class="edit-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil text-yellow"></i></a>
                                            <a href="#" class="delete-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'"><i class="fa fa-trash text-red"></i></a>
                                        </span>
                                    </div>';
                                    
                                    if(array_key_exists('child',$value)) {
                                        $html .= getMenu($value['child'],'child');
                                    }
                
                                    $html .= "</li>";

                                }

                                
                            }
                    
                            $html .= "</ol>";
                        
                            return $html;
                    
                        }

                        print getMenu($items);
                    ?>

                    

                </div><!-- ./dd  -->

            </div><!-- ./box -->
            
        </div><!-- ./modal-body -->

    </div><!-- ./box-primary -->

    
    
</section>

<!-- Nestable Drag&Drop Menu -->
<script src="<?= URL_PATH ?>/library/nestable-drop-drag-menu/nestable.min.js"></script>

<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);



    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


});
</script>


<script>
  $(document).ready(function(){
    $("#load").hide();
    $("#submit").click(function(){
       $("#load").show();

       var dataString = {
              label : $("#label").val(),
              link : $("#link").val(),
              id : $("#id").val()
            };
    });

    $('.dd').on('change', function() {
        $("#load").show();

          var dataString = {
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "save.php",
            data: dataString,
            cache : false,
            success: function(data){
              $("#load").hide();
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

    


    $(document).on("click",".del-buttona",function() {
        var x = confirm('Desea borrar ésta categoría?');
        var id = $(this).attr('id');
        if(x){
            $("#load").show();
             $.ajax({
                type: "POST",
                url: "delete.php",
                data: { id : id },
                cache : false,
                success: function(data){
                  $("#load").hide();
                  $("li[data-id='" + id +"']").remove();
                } ,error: function(xhr, status, error) {
                  alert(error);
                },
            });
        }
    });

    $(document).on("click",".edit-button",function() {
        var id = $(this).attr('id');
        var label = $(this).attr('label');
        var link = $(this).attr('link');
        $("#id").val(id);
        $("#label").val(label);
        $("#link").val(link);
    });

    $(document).on("click","#reset",function() {
        $('#label').val('');
        $('#link').val('');
        $('#id').val('');
    });

  });

</script>



<!-- CATEGORY-CREATE -->
<script>
    // btn-submit-add
    $('#form-create').submit(function(e){
        
        const postData = {
            name: $('#name').val(),
            slug: $('#slug').val()
        };

        //console.log(postData);
    
        $.post(URL_PATH + '/admin/category/store', postData, function(r) {
            //console.log(r);
            switch (r) {
                case 'error':
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor recargue la página e inténtelo nuevamente.',
                    });
                    break;

                case 'warning':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Límite excedido!',
                        text: 'No fue posible ingresar una nueva categoría.',
                    });
                    break;

                case 'already_exists':
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'La URL que desea ingresar ya es existente para otra categoría. Recuerde que debe ser única.',
                    });
                    break;

                    
                default:
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Categoría creada con éxito!',
                        showConfirmButton: false,
                        timer: 2100
                    });

                    $("#menu-id").append(r);
                    $('#form-create').trigger('reset');
                    $('#modal-create').modal('hide');

                    break;
            }

            
            
            });


    
        e.preventDefault();
    });
</script>


<!-- CATEGORY-EDIT -->
<script>
    $(document).on("click",".edit-button",function() {

        // Obtener datos
        var id = $(this).attr('id');
        var label = $(this).attr('label');
        var link = $(this).attr('link');

        // Cargar inputs
        $("#id-edit").val(id);
        $("#name-edit").val(label);
        $("#slug-edit").val(link);

        /* btn-submit->form-edit */
        $('#form-edit').submit(function(e){

            const postData = {
                id: $('#id-edit').val(),
                name: $('#name-edit').val(),
                slug: $('#slug-edit').val()
            };

            //console.log(postData);

            $.post(URL_PATH + '/admin/category/update', postData, function(r) {
                //console.log(r);
                if(r == "error"){
                    /* Alert-error*/
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error!',
                        text: 'Por favor complete todos los datos. Recuerde además de no ingresar una URL ya existente.',
                    })
                   
                } else {
                    var data = JSON.parse(r);
                    //console.log(data);
                     /* Alert-success*/
                     Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Actualización exitosa!',
                        showConfirmButton: false,
                        timer: 1500
                    })  

                    $('#form-edit').trigger('reset');
                    $('#modal-edit').modal('hide');
                    $('#label_show'+data.id).html(data.name);
                    $('#link_show'+data.id).html(data.slug);
                }

                
            });

            e.preventDefault();
        });
    });
</script>


<!-- CATEGORY-DELETE -->
<script>
    $(document).on("click",".delete-button",function(e) {

        var id = $(this).attr('id');
        var label = $(this).attr('label');
        console.log(id);
        Swal.fire({
            title: `¿Desea eliminar la categoría <br> ${label}?`,
            text: `Recuerde que al eliminar una categoría tambien se eliminarán sus subcategorías. Además los productos pertenecientes a '${label}' quedarán sin categorizar.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '##757575',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.value) {

                $.post(URL_PATH + '/admin/category/destroy', {id}, function(r){
                    //console.log(JSON.parse(r));
                    if(r == 'deleted'){
                        /* Alert-success */
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro eliminado!',
                            showConfirmButton: false,
                            timer: 1500
                        })  

                        $("li[data-id='" + id +"']").remove();
                    } else {
                        /* Alert-failed */
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error!'
                        })
                    }

                    
                });

            }

        });

        e.preventDefault();
    });
</script>


<!-- SAVE-MENU -->
<script>
    $("#save").click(function(){
         //$("#load").show();

          var dataString = {
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: URL_PATH + "/admin/category/update2",
            data: dataString,
            cache : false,
            success: function(data){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El menú ha sido guardado!',
                    //text: 'Para comprobar por favor recargue la página.',
                    showConfirmButton: false,
                    timer: 2100
                })

            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });
</script>
