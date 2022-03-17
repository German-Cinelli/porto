var getDataEdit = function(tbody, table){
    $(document).on('click', '.btn-edit', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        /* Vaciamos los elementos seleccionados antes de cargarlos */
        $('.select2').val(null).trigger('change');

        $.post('material/show', {id}, function(r){
            material = JSON.parse(r);
            //console.log(r);
    
            /* Cargar inputs */
            $('#id-edit').val(material.id)
            $('#name-edit').val(material.name)
            //$('#description-edit').val(material.description);
    
            /* 
            * Recorrer con for todos los colores y dejarlos seleccionados en el input con
            * el atributo *selected*
            */
            let template = ``;
            Object.keys(material.colors).map(key => (
                $(".select2 option[value='" + material.colors[key].id + "']").prop("selected", true)
            )).join('')
            
            $('.select2').trigger('change');

        })
    });
}

/* btn-submit->form-edit */
$('#form-edit').submit(function(e){

    const postData = {
        id: $('#id-edit').val(),
        name: $('#name-edit').val(),
        //description: $('#description-edit').val(),
        arrayOf_colors: $('#color_id-edit').val()
    };

    $.post('material/update', postData, function(r) {
        if(r == "updated"){
            /* Alert-success */
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Actualización exitosa!',
                showConfirmButton: false,
                timer: 1500
            })  
        } else {
            /* Alert-failed */
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }

        /* Reset inputs and-success */
        $('#form-edit').trigger('reset');
        $('#modal-edit').modal('hide');
        $('#materials').DataTable().ajax.reload();
        $('.select2').val(null).trigger('change');
    });

    e.preventDefault();
});