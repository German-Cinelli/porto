var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function() {
    overlay.classList.add('active');
    popup.classList.add('active');
});
btnCerrarPopup.addEventListener('click', function() {
    overlay.classList.remove('active');
    popup.classList.remove('active');
});




var btnAbrirPopupRegistrarme = document.getElementById('btn_abrir_registrar'),
    overlayRegistrarme = document.getElementById('overlay_registrar'),
    popupRegistrarme = document.getElementById('popupRegistrar'),
    btnCerrarPopupRegistrarme = document.getElementById('btn-cerrar-popupRegistrarme');

btnAbrirPopupRegistrarme.addEventListener('click', function() {
    overlayRegistrarme.classList.add('active');
    popupRegistrarme.classList.add('active');
});
btnCerrarPopupRegistrarme.addEventListener('click', function() {
    overlayRegistrarme.classList.remove('active');
    popupRegistrarme.classList.remove('active');
});



var btnAbrirPopup2 = document.getElementById('btn-abrir-popup2'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup2');

btnAbrirPopup2.addEventListener('click', function() {
    overlay.classList.add('active');
    popup.classList.add('active');
});


var btnAbrirPopupRegistrarme2 = document.getElementById('btn-abrir-registrar2'),
    overlayRegistrarme = document.getElementById('overlay_registrar'),
    popupRegistrarme = document.getElementById('popupRegistrar'),
    btnCerrarPopupRegistrarme = document.getElementById('btn-cerrar-popupRegistrarme');

btnAbrirPopupRegistrarme2.addEventListener('click', function() {
    overlay.classList.remove('active');
    popup.classList.remove('active');
    overlayRegistrarme.classList.add('active');
    popupRegistrarme.classList.add('active');
});