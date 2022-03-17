$('#form-contact').submit(function(e){

    
    
    const postData = {
        name: $('#name').val(),
        email: $('#mail').val(),
        phone: $('#phone').val(),
        message: $('#message').val()
    };

    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Atención!',
        text: 'El mensaje no ha sido enviado debido a que no se ha configurado el servidor SMTP. No se preocupe, cuando usted adquiera el software funcionará sin problemas.',
        showConfirmButton: true
    });
    
    /*$.post(URL_PATH + '/contact/sendMail', postData, function(r) {
        
        switch (r) {
            case 'sent':
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Hemos recibido tu mensaje!',
                    text: 'Nos comunicaremos tan pronto sea posible a la dirección de correo proporcionada.',
                    showConfirmButton: false,
                    timer: 7000
                });

                setTimeout(function(){ 
                    window.location.replace(URL_PATH);
                }, 7300);
                break;

            case 'error':
                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error!',
                    text: 'Por favor proporciona todos los datos para que podamos contactarte. Si el error persiste puedes contactarnos a nuestras redes sociales.'
                });
                break;
        
            default:

                break;
        }
        
    });*/

    e.preventDefault();
});