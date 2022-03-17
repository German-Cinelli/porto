$('#btn-update-password').on('click', function(e){

    const postData = {
        current_password: $('#current_password').val(),
        password: $('#password').val(),
        password_confirm: $('#password_confirm').val(),
    };

    $.post('update_password', postData, function(r) {

        if(r == 'updated'){
            /* Alert-success */
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Su contraseña ha sido actualizada!',
                showConfirmButton: false,
                timer: 2500
            })  
           
            setTimeout(function(){ 
                window.location.replace("mydata");
             }, 2100);

             
        } else {
            /* Alert-error*/
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error!',
                footer: 'Asegúrese de que las contraseñas coincidan!'
            })
        }

    });

    e.preventDefault();
})