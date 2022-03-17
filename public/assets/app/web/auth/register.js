$('#form-register').submit(function(e){
    
    const postData = {
        name: $('#register-name').val(),
        lastname: $('#register-lastname').val(),
        email: $('#register-email').val(),
        password: $('#register-password').val()
    };

    //console.log(postData);

    const URL_PATH = $('#url_path').val();
    
    $.post(URL_PATH + '/auth/register', postData, function(r) {
        console.log(r);
        switch (r) {
            case '1':
                setErrorMessageR('Ya existe un usuario con ese correo!');
                break;

            case '2':
                $('#overlay_registrar').hide();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registrado con éxito!',
                    text: 'Hemos enviado un Mail a su dirección de correo electrónico para verificar su cuenta.'
                });  
                break;

            case '3':
                Swal.fire({
                    position: 'center',
                    icon: 'danger',
                    title: 'Se produjo un error!',
                    footer: `<a href=${URL_PATH}/>Si continúa con éste problema haga clic aquí e intentelo nuevamente.</a>`
                })
                break;

            case '4':
                Swal.fire({
                    position: 'center',
                    icon: 'danger',
                    title: 'Se produjo un error!',
                    footer: 'Por favor complete todos los datos.'
                })
                break;
        
            default:

                break;
        }
        
    });

    e.preventDefault();
});

function setErrorMessageR(msg){
    var template = `
        <div class="alert alert-danger" role="alert">
            ${msg}
        </div>
    `;

    document.querySelector('#error-message-register').innerHTML = template;
}