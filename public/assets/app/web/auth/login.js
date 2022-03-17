$('#form-login').submit(function(e){
    
    const postData = {
        email: $('#login-email').val(),
        password: $('#login-password').val()
    };

    const URL_PATH = $('#url_path').val();

    $.post(URL_PATH + '/auth/login', postData, function(r) {
        console.log(r);

        switch (r) {
            case 'err':
                Swal.fire({
                    icon: 'error',
                    title: 'Las credenciales no coinciden!',
                    text: 'Intente nuevamente.'
                });

                $('#login-password').val('');
                
                break;

            case '/':
                window.location.replace(URL_PATH + r);
                break;

            case '/admin':
                window.location.replace(URL_PATH + r);
                break;

            case 'limit_exceeded':
                Swal.fire({
                    icon: 'warning',
                    title: 'Aviso! Límite excedido',
                    text: 'Has superado el límite de intentos. Por favor espera 60 segundos y vuelve a intentarlo.'
                });
                break;

            case 'not_confirmed':
                Swal.fire({
                    icon: 'warning',
                    title: 'Le hemos enviado un Mail!',
                    text: 'Antes de iniciar sesión recuerde verificar su dirección de correo electónico.'
                });
                break;
        
            default:

                break;
        }
        
    });

    e.preventDefault();
});

function setErrorMessage(msg){
    var template = `
        <div class="alert alert-danger" role="alert">
            ${msg}
        </div>
    `;

    document.querySelector('#error-message-login').innerHTML = template;
}