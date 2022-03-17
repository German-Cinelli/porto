$(document).on('click', '#btn-addToCart', function(e){

    const postData = {
        product_id: $("#product_id").val(),
        quantity: $('#quantity').val()
    };

    //console.log(postData);

    if(postData.quantity < 0){
        Swal.fire({
            icon: 'warning',
            title: 'Atención!',
            text: 'Seleccione una cantidad válida.',
        });
    } else {

        $.post(URL_PATH + '/cart/add', postData, function(r) {
            //console.log(r);
           
        
            if(r == 'out_of_stock'){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Disculpa las molestias! No tenemos stock de éste producto.',
                });
            } else if(r == 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un error!',
                });
            } else {
                var object = JSON.parse(r);
                var count = Object.keys(object).length;
    
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Producto añadido al carrito!',
                    showConfirmButton: false,
                    timer: 2000
                });  
            }
    
            $('.notify').html('').html(count);
            
        });

    }

    
    
        

    

    e.preventDefault();
})