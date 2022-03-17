var options = {
    title: '<i class="fa fa-get-pocket"></i> Alerta de Cookies',
    message: 'Utilizamos cookies propias y de terceros para mejorar la experiencia del usuario a través de su navegación. Si continúas navegando aceptas su uso.',
    delay: 600,
    expires: 1,
    link: '#privacy',
    onAccept: function(){
        var myPreferences = $.fn.ihavecookies.cookie();
        console.log('Yay! The following preferences were saved...');
        console.log(myPreferences);
    },
    uncheckBoxes: true,
    acceptBtnLabel: 'Entendido',
    moreInfoLabel: 'Más información',
    cookieTypesTitle: 'Select which cookies you want to accept',
    fixedCookieTypeLabel: 'Essential',
    fixedCookieTypeDesc: 'These are essential for the website to work correctly.'
}

$(document).ready(function() {
    $('body').ihavecookies(options);

    if ($.fn.ihavecookies.preference('marketing') === true) {
        //console.log('This should run because marketing is accepted.');
    }

    $('#ihavecookiesBtn').on('click', function(){
        $('body').ihavecookies(options, 'reinit');
    });


    const URL_PATH = $('#url_path').val();
    // Check if exist verified user
    if ($("#verified_user").length) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Su cuenta ha sido verificada!',
            text: 'Ya puedes iniciar sesión con tu dirección de correo.',
            showConfirmButton: false,
            timer: 4800
        });
        
        setTimeout(function(){ 
            window.location.replace(URL_PATH);
        }, 4950);
        
    }

    if ($("#token_expired").length) {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'El tiempo ha expirado!',
            text: 'Han transcurrido más de 20 minutos desde que solicitó cambio de clave. Si desea cambiarla por favor inténtelo nuevamente.',
        });
        
    }
});