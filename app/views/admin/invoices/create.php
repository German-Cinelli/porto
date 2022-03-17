<style>
    input[type="number"] {
        width:85px;
    }
</style>

<style>

    .qty .count {
        color: #000;
        display: inline-block;
        vertical-align: top;
        font-size: 20px;
        font-weight: 700;
        line-height: 30px;
        padding: 0 2px;
        min-width: 35px;
        text-align: center;
    }
    .qty .plus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 25px;
        height: 25px;
        font: 25px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        background-color: #19bb8a !important;
        }
    .qty .minus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 25px;
        height:25px;
        font: 25px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        background-clip: padding-box;
        background-color: #c2224a !important;
    }

    .minus:hover{
        background-color: #c2224a !important;
    }
    .plus:hover{
        background-color: #19bb8a !important;
    }
    /*Prevent text selection*/
    span{
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    input{  
        border: 0;
        width: 2%;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input:disabled{
        background-color:white;
    }
    .product-price{
        border: 1; 
    }
         
</style>

<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-list-alt text-olive"></i> Nueva factura
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/invoice"><i class="fa fa-list-alt"></i> Facturas</a></li>
        <li class="active">Registrar nueva factura</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ingrese los datos</h3>
        </div><!-- /.box-header -->

        <form id="form-create">
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Proveedor: <span class="text-red">(*)</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-street-view"></i>
                            </div>
                            <select id="provider" name="provider" class="form-control select2" style="width: 100%;" required>
                                <option value="" disabled selected>Seleccione proveedor</option>
                                <?php foreach($providers as $provider) : ?>
                                <option value="<?= $provider->id ?>"><?= $provider->business_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>  
                    </div>
                </div>

                <br>

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Fecha: <span class="text-red">(*)</span></label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" class="form-control pull-right" id="datepicker" placeholder="Seleccione fecha" required>
                            </div>
                        </div>
                    </div>

                </div><!-- ./row -->

                <label for="">Producto: <span class="text-red">(*)</span></label>
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-star"></i>
                            </div>
                            <select id="product" class="form-control select2" style="width: 100%;" required>
                                <option value="" disabled selected>Seleccione producto</option>
                                <?php foreach($products as $product) : ?>
                                <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                </div><!-- ./row -->

                <br>

                <table id="orders" class="table" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th scope="col" style="display: none">#</th>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Precio unitario <span class="text-red">(*)</span></th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>

                    <tbody id="table-products">

                    </tbody>
               
                </table>

                <hr>

                
                <div class="row">
                
                    <div class="col-sm-12 col-md-6 col-lg-6">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3">Método de pago:
                                        <span data-toogle="tooltip" title="Seleccione el método de pago que ud. realizó al proveedor. Si ha pagado el total de la factura seleccione -CONTADO-. De lo contrario seleccione -CREDITO- e indique el monto abonado a continuación.">
                                            <i class="fa fa-question-circle text-blue"></i>
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <select id="payment_type" class="form-control select2" style="width: 100%;" required>
                                            <option value="1" selected>Contado</option>
                                            <option value="3">Crédito</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="amount-paid" style="display: none">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail3">Monto pagado:
                                            <span data-toogle="tooltip" title="Indique el monto pagado, con éste dato el sistema clasificará su compra al proveedor como 'Pago / Pendiente de pago'.">
                                                <i class="fa fa-question-circle text-blue"></i>
                                            </span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <input type="number" id="payment_amount" min="0" class="form-control" placeholder="Ingrese monto">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- ./amount-paid -->

                        </div><!-- ./row -->
                        
                    </div><!-- ./col-sm-12 -->

                    <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                        
                        <div class="">
                            <table class="table table-responsive">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$ <span id="sub_subtotal">0</span></td>
                                </tr>
                                <tr class="bg-blue">
                                    <th>Total:</th>
                                    <td>$ <strong id="sub_total_amount">0</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div class="bg-info text-right">
                            <span class="text-uppercase">
                                
                            </span>
                        </div>
                    
                    </div><!-- ,/col-sm-12 -->

                </div><!-- ./row -->

            </div><!-- ./modal-body -->

            
            <div class="modal-footer">
                <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-list-alt"></i> Registrar factura</button>
            </div>
        </form>

    </div><!-- ./box box-primary -->

</section>


<script>
$( document ).ready(function() {
    //getProductList(); // Obtener todos los productos con stock
});

function getProductList(){
    $.post(URL_PATH + '/admin/order/getProducts', function(r) {
        console.log(JSON.parse(r));
    });
}
</script>



<script>

var subtotal = 0
var total = 0;

function getTotal(subtotal){
    
    var total = (parseInt(subtotal));

    return total;
}

$('#product').change(function(){
    //console.log(subtotal);

    id = $('#product').val();

    if(id == null){
        Swal.fire({
            icon: 'warning',
            title: 'Aviso!',
            text: 'Debe seleccionar un producto de la lista.'
        });
    } else {
        $.post(URL_PATH + '/admin/product/all', {id}, function(r){
        
            if(r == 'error'){

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Ocurrió un error al obtener los datos del producto. Por favor recargue la página e inténtelo nuevamente.',
                });

            } else {

                product = JSON.parse(r);
                //console.log(product);
                
                //subtotal += product.price_final;
                //total += product.price_final
                //console.log('Total :' + getTotal(subtotal, shippingcost, discount));
                //console.log(subtotal + ' dps');

                
                //$('#sub_subtotal').html(subtotal);
                //$('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

                let template = '';
                template += `
                    <tr class="">

                        <td style="display: none">
                            <input type="hidden" class="product-id" name="product_id[]" value="${product.id}">

                            <input type="hidden" name="price_final[]" value="0">
                        </td>

                        <td>
                            <img src="${URL_PATH}${product.image}" class="img-responsive" width="40px;">
                        </td>

                        <td>
                            ${product.name}
                        </td>

                        <td>
                            <input type="hidden" class="stock" value="${product.stock}">
                            ${product.stock == 0 ? `<span class="label bg-red">Sin stock</span>` : `<span class="label bg-primary stock">${product.stock}</span>`}
                            
                        </td>

                        <td>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" class="product-price form-control" name="price[]" min="1" value="0" placeholder="Ingrese precio unitario">
                            </div>
                        </td>

                        <td>
                            <div class="qty">
                                <span class="minus bg-dark">-</span>
                                    <input type="number" id="select-quantity" class="count select-quantity" name="qty" min="1" max="" value="1">
                                <span  class="plus bg-dark">+</span>
                            </div>
                        </td>

                        <td>
                            $ <span class="price_final-table">0</span>
                        </td>

                        <td>
                            <div class="btn-group">
                                <a class="btn-delete btn btn-danger btn-social-icon" data-toogle="tooltip" title="Quitar">
                                    <i class="menu-icon fa fa-trash text-white"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                `;

                $('#table-products').append(template);

            }
        
        
        });

    }

    //e.preventDefault();
})

/* INPUT PRICE */
$(document).on('input', '.product-price', function(){

    var quantity = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();
    var old_price = $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val();
    var price = $(this).closest('tr').find('td').eq(4).find('input[name="price[]"]').val();
    

    if(price == ''){
        price = 0;
    }

    if(old_price == ''){
        old_price = 0;
    }

    var price_final = (parseInt(price) * parseInt(quantity))
    
    subtotal += (price_final - old_price)
    

    $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val(price_final);
    $(this).closest('tr').find('td').eq(6).find('span[class="price_final-table"]').html(price_final);

    $(this).closest('tr').find('td').eq(4).find('input[name="old_price"]').val(price_final);

    $('#sub_subtotal').html(subtotal);
    $('#sub_total_amount').html(getTotal(subtotal));

});


/* input count */
$(document).on('input', '.count', function(){
    var stock = $(this).closest('tr').find('td').eq(3).find('input[class="stock"]').val();
    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();
        
    $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
    var price = $(this).closest('tr').find('td').eq(4).find('input[name="price[]"]').val();
    var quantity = $(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val();
    var price_final_input = $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val();

        

    //console.log('Subtotal ' + subtotal);
    subtotal -= price_final_input; // Restamos el precio que tenia
            
    var price_final = (parseInt(price) * parseInt(quantity))
    subtotal += price_final
    //console.log('SUBTOTAL ' + subtotal);

    // Seteamos el input hidden del precio como price_final
    $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val(price_final);
    $(this).closest('tr').find('td').eq(6).find('span[class="price_final-table"]').html(price_final);

    $('#sub_subtotal').html(subtotal);
    $('#sub_total_amount').html(getTotal(subtotal));

});


/* BUTTONS -PLUS/MINUS- */
$(document).on('click', '.plus', function(){

    var stock = $(this).closest('tr').find('td').eq(3).find('input[class="stock"]').val();
    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();


    
    qty++;
        
    $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
    var price = $(this).closest('tr').find('td').eq(4).find('input[name="price[]"]').val();
    var quantity = $(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val();
    var price_final_input = $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val();

        

    //console.log('Subtotal ' + subtotal);
    subtotal -= price_final_input; // Restamos el precio que tenia
            
    var price_final = (parseInt(price) * parseInt(quantity))
    subtotal += price_final
    //console.log('SUBTOTAL ' + subtotal);

    // Seteamos el input hidden del precio como price_final
    $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val(price_final);
    $(this).closest('tr').find('td').eq(6).find('span[class="price_final-table"]').html(price_final);

    $('#sub_subtotal').html(subtotal);
    $('#sub_total_amount').html(getTotal(subtotal));

});

$(document).on('click', '.minus', function(){

    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();

    if(parseInt(qty) == 1){
        //console.log('Np se peude menos cantidad');
    } else {
        qty--;
        $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
        //$(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val(parseInt($('.count').val()) - 1);

        var price = $(this).closest('tr').find('td').eq(4).find('input[name="price[]"]').val();
        var quantity = $(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val();
        var price_final_input = $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val();



        //console.log('Subtotal ' + subtotal);
        subtotal -= price_final_input; // Restamos el precio que tenia
            
        var price_final = (parseInt(price) * parseInt(quantity))
        subtotal += price_final
        //console.log('SUBTOTAL ' + subtotal);

        // Seteamos el input hidden del precio como price_final
        $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val(price_final);
        $(this).closest('tr').find('td').eq(6).find('span[class="price_final-table"]').html(price_final);

        $('#sub_subtotal').html(subtotal);
        $('#sub_total_amount').html(getTotal(subtotal));
    }
    
    

    /*if ($('.count').val() <= 1) {
		$('.count').val(1);
	}*/
});


$("#discount").on("input", function(e) {
  var input = $(this);
  var val = input.val();

  if (input.data("lastval") != val) {
    input.data("lastval", val);

    if(val == ''){
       val = 0; 
    }

    discount = val;
    
    $('#sub_discount').html(discount);
    $('#sub_total_amount').html(getTotal(subtotal));

    
  }

});


/* Checkbox costo de envío */
$('#check-shipping').change(function() {
    if(this.checked) {

        $('#customer-data').show(); // Habilitamos el formulario
        $('#shipping_cost').prop('disabled', false); // Habilitamos el input para ingresar el costo de envío

    } else {

        $('#customer-data').hide();
        $('#shipping_cost').prop('disabled', true);
        $('#shipping_cost').val(0);

        /* Seteamos shippingcost = 0 */
        shippingcost = 0;
        $('#sub_shipping_cost').html(shippingcost);
        $('#sub_subtotal').html(subtotal);
        $('#sub_total_amount').html(getTotal(subtotal));

    }  

});


$('#payment_type').change(function(){

    if($("#payment_type" ).val() == 1){
        $('#amount-paid').hide();
        
    } else {
        $('#amount-paid').show();
        
    }

});





</script>



<script>
    $("#orders").on("click", ".btn-delete", function() {
        //console.log($(this).closest('tr').find('td').eq(0).find('input[type="hidden"]').val());
        var price = $(this).closest('tr').find('td').eq(0).find('input[name="price_final[]"]').val();
        //console.log('price: ' + price);
        subtotal -= price;
        $('#sub_subtotal').html(subtotal);
        $('#sub_total_amount').html(getTotal(subtotal));
        $(this).closest('tr').remove();
    });
</script>



<!-- INVOICE-CREATE -->
<script>
    $('#form-create').submit(function(e){

        var arrayOf_product_id = [];
        var arrayOf_quantity = [];
        var arrayOf_product_price = [];

        $('input.product-id').each(function() {
            arrayOf_product_id.push($(this).val());
        });

        $('input.select-quantity').each(function() {
            arrayOf_quantity.push($(this).val());
        });

        $('input.product-price').each(function() {
            arrayOf_product_price.push($(this).val());
        });


        /* Comprobamos si hay productos añadidos a la tabla */
        if(arrayOf_product_id.length == 0 || arrayOf_quantity.lenght == 0){

            Swal.fire({
                icon: 'warning',
                title: 'Atención!',
                text: 'No ha seleccionado ningún producto.',
            });
            
        } else {
            /* */
            
            var payment_type = $("#payment_type" ).val();
            var payment_amount = $("#payment_amount" ).val();

            if(payment_amount == ''){
                payment_amount = 0;
            }

            var items = arrayOf_product_id.length;
            var date = $('#datepicker').val();
            var amount = $('#amount').val();
            var t = getTotal(subtotal)
            
            if(t < 0 || subtotal < 0 || amount < 0){

                Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'No es posible tener valores negativos, revise el formulario.'
                });

            } else {

                const postData = {
                    provider_id: $('#provider').val(),
                    date: date,
                    items: items,
                    product_id: arrayOf_product_id,
                    price: arrayOf_product_price,
                    quantity: arrayOf_quantity,
                    subtotal: subtotal,
                    total: t,
                    payment_type: payment_type,
                    payment_amount: payment_amount
                };

                var string = ''
                if(payment_type == 1){
                    string = `Subtotal: $ ${subtotal}
                            <br>
                            <b>Total: $ ${t}</b>
                            <br><br>
                            Método de pago: Contado
                            <br>
                            <h4>¿Desea continuar?</h4>
                            `;
                } else {
                    string = `Subtotal: $ ${subtotal}<br>s
                            <b>Total: $ ${t}</b>
                            <br><br>
                            Método de pago: Crédito
                            <br>
                            Monto abonado: $ ${payment_amount}
                            <h4>¿Desea continuar?</h4>
                            `;
                }

                console.log(postData);

                Swal.fire({
                    title: `Información de la factura`,
                    html: string,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#1f89d6',
                    cancelButtonColor: '##757575',
                    confirmButtonText: 'Sí, continuar!'
                    }).then((result) => {
                        if (result.value) {

                            $.post(URL_PATH + '/admin/invoice/store', postData, function(r) {
                            console.log(r);

                            if(r == 'error'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Atención!',
                                    text: 'Se produjo un error al efectuar la factura. Por favor compruebe todos los datos requeridos.',
                                });
                            } else {
                                invoice = JSON.parse(r);
                                console.log(invoice);
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Correcto!',
                                    html: `<p>La factura se ha efectuado con éxito</p><p>El <b>stock</b> de los productos han sido actualizados.</p>`,
                                    showCancelButton: true,
                                    confirmButtonText:`<a style="color: #fff;" target='_blank' href=${URL_PATH}/admin/invoice/print/${invoice.id}><i class="fa fa-print"></i> Imprimir factura</a>`,
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    cancelButtonText:'Cerrar'
                                });

                                saleCompleted();
                                    
                            }
                        
                        
                        });

                    }

                });

            }

        }

    e.preventDefault();
});
</script>


<!-- Función para limpiar pantalla y setear las variables en 0 luego de registrar una venta -->
<script>
function saleCompleted(){
    
    subtotal = 0
    shippingcost = 0
    discount = 0
    total = 0;

    //$('#customer').val('2').change();

    $('#table-products').html('');

    $('#shipping_cost').val('');
    $('#shipping_cost').prop('disabled', true);
    $('#discount').val('');
    $('#amount').val('');



    $('#check-shipping').prop('checked', false);
    $('#customer-data').hide();
    $('#name').val('');
    $('#city').val('Montevideo');
    $('#location').val('');
    $('#address').val('');
    $('#phone').val('');
    $('#cellphone').val('');

    $('#sub_subtotal').html('0');
    $('#sub_discount').html('0');
    $('#sub_shipping_cost').html('0');
    $('#sub_total_amount').html('0');
    



}
</script>