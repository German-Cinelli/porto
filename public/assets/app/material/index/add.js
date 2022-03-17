// btn-submit-add
$('#form-create').submit(function(e){

    const postData = {
        name: $('#name').val(),
        //description: $('#description').val(),
        arrayOf_colors: $('#color_id').val()
    };

    //console.log(postData);

    $.post('material/store', postData, function(r) {
        if(r == "saved"){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registrado con éxito!',
                showConfirmButton: false,
                timer: 1500
            });
            $('#form-create').trigger('reset');
            $('#modal-create').modal('hide');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                //footer: '<a href>Why do I have this issue?</a>'
            });
        }
        
        $('#materials').DataTable().ajax.reload();
        $('.select2').val(null).trigger('change');
    });

    e.preventDefault();
});