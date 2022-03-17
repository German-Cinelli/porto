$('#btn-update').on('click', function(e){

    const postData = {
        id: $('#id').val(),
        name: $('#name').val(),
        lastname: $('#lastname').val(),
        city: $('#city').val(),
        location: $('#location').val(),
        address: $('#address').val(),
        document: $('#document').val(),
        phone: $('#phone').val(),
        cellphone: $('#cellphone').val(),
        business_name: $('#business_name').val(),
        rut: $('#rut').val(),
    };

    //console.log(postData);

    $.post('mydata/update', postData, function(r) {
        //console.log(r);
        response = JSON.parse(r);
        //console.log(response);
        
        /* En caso que devuelva un objeto 'user' significa que  
        *  se actualizaron los datps
        *  Caso contrario devuelve los errores
        * */
        if(response.user != undefined){

             /* Cargar inputs */
             $('#id').val(response.user.id)
             $('#name').val(response.user.name)
             $('#lastname').val(response.user.lastname);
             $('#city').val(response.user.city);
             $('#location').val(response.user.location);
             $('#address').val(response.user.address);
             $('#document').val(response.user.document);
             $('#phone').val(response.user.phone);
             $('#cellphone').val(response.user.cellphone);
             $('#business_name').val(response.user.business_name);
             $('#rut').val(response.user.rut);

             $("#dropdown-user").html(response.user.name);
             
             /* Alert-success */
             Swal.fire({
                 position: 'center',
                 icon: 'success',
                 title: 'Sus datos han sido actualizados!',
                 showConfirmButton: false,
                 timer: 1900
             })
        } else {
            var messages = '';

            $.each( response, function( key, value ) {
                messages += value;
            });

            /* Alert-error*/
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error!',
                html: `${messages}`,
                footer: 'Asegúrese de enviar los datos necesarios!'
            })
        }

    });

    e.preventDefault();
})