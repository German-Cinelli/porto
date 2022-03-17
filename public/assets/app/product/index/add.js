// btn-submit-add
$('#form-create').submit(function(e){

    const postData = {
        slug: $('#slug').val(),
        name: $('#name').val(),
        description: $('#description').val(),
        gender: $('#gender').val(),
        category_id: $('#category_id').val(),
        arrayOf_sizes: $('#size_id').val(),
        arrayOf_materials: $('#material_id').val(),
        price: $('#price').val(),
        offer: $('#offer').val(),
    };

    //console.log(postData);

    $.post('product/store', postData, function(r) {
        //console.log(r);
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
        
        $('#products').DataTable().ajax.reload();
        $('.select2').val(null).trigger('change');
    });

    e.preventDefault();
});