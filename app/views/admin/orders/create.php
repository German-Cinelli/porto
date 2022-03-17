<style>

    .checkbox label:after {
    content: '';
    display: table;
    clear: both;
    }

    .checkbox .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
    }

    .checkbox .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 15%;
    }

    .checkbox label input[type="checkbox"] {
    display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon {
    opacity: 0;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
    opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled+.cr {
    opacity: .5;
    }

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
         
</style>

<section class="content-header">
    <h1>
        <i class="menu-icon fa fa-opencart text-olive"></i> Ventas
        <small>Registrar venta</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= URL_PATH ?>/admin"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="<?= URL_PATH ?>/admin/order"><i class="fa fa-opencart"></i> Ventas</a></li>
        <li class="active">Registrar venta</li>
    </ol>
</section>

 <!-- Main content -->
<section class="content container-fluid">

    <!-- Alert -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h4><i class="icon fa fa-info-circle text-blue"></i> Recordar</h4>
            <p>Al registrar una venta automáticamente se da por hecho que el pedido está pago, estará en <span class="label label-warning">Pendiente de envío.</span></p>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ingrese los datos</h3>
        </div><!-- /.box-header -->

        <form id="form-create" action="<?= URL_PATH ?>/admin/order/store" method="POST">
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Cliente: <span class="text-red">(*)</span>
                            <span data-toogle="tooltip" title="Seleccione un cliente de la lista, si su cliente no se registró por la web escoja 'Consumidor final'.">
                                <i class="fa fa-question-circle text-blue"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <select id="customer" name="customer_id" class="form-control select2" style="width: 100%;" required>
                                <option value="<?= $final_consumer->id ?>"><span class="text-uppercase"><?= $final_consumer->lastname ?></span></option>
                                <?php foreach($customers as $customer) : ?>
                                <option value="<?= $customer->id ?>"><span class="text-uppercase"><?= $customer->name ?> | <?= $customer->email ?></span></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <!--<div class="col-md-6">
                        <label for="">Tipo de pago: <span class="text-red">(*)</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <select id="payment_type" name="payment_type" class="form-control select2" style="width: 100%;" required>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Tarjeta de crédito</option>
                            </select>
                        </div>
                    </div>-->
                    
                </div>

                <br>

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
                            <th scope="col">Precio unitario</th>
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
                                    <label for="inputEmail3">Costo de envío:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <input type="number" id="shipping_cost" value="0" name="shipping_cost" min="0" class="form-control" placeholder="Ingrese costo de envío" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3">Descuento:
                                        <span data-toogle="tooltip" title="Si desea realizarle algún tipo de descuento a su cliente, puede hacerlo completando el siguiente campo.">
                                            <i class="fa fa-question-circle text-blue"></i>
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <input type="number" id="discount" name="discount" pattern="[0-9]+" min="0" class="form-control" placeholder="Ingrese monto de descuento">
                                    </div>
                                </div>
                            </div>

                        </div><!-- ./row -->

                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3">Monto a pagar: <span class="text-red">(*)</span>
                                        <span data-toogle="tooltip" title="Indique el monto con el cual pagará su cliente.">
                                            <i class="fa fa-question-circle text-blue"></i>
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <input type="number" id="amount" name="amount" min="0" class="form-control" placeholder="Ingrese monto a pagar" required>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    
                        
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                        
                        <div class="">
                            <table class="table table-responsive">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td><?= $app['SYMBOL'] ?> <span id="sub_subtotal">0</span></td>
                                </tr>
                                <tr>
                                    <th>Descuento:</th>
                                    <td class="text-red">-<?= $app['SYMBOL'] ?> <span id="sub_discount">0</span></td>
                                </tr>
                                <tr>
                                    <th>Costo envío:</th>
                                    <td><?= $app['SYMBOL'] ?> <span id="sub_shipping_cost">0</td>
                                </tr>
                                <tr class="bg-blue">
                                    <th>Total:</th>
                                    <td><?= $app['SYMBOL'] ?> <strong id="sub_total_amount">0</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div class="bg-info text-right">
                            <span class="text-uppercase">
                                
                            </span>
                        </div>
                    
                    </div>

                </div>

                <hr>

                <div class="checkbox">
                    <label class="lead">
                        <input type="checkbox" id="check-shipping" value="1">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        Mi cliente necesita envío
                        <span data-toogle="tooltip" title="Marque ésta opción si su cliente necesita que le hagan un envío de los productos.">
                            <i class="fa fa-question-circle text-blue"></i>
                        </span>
                    </label>
                </div>
            
                <div id="customer-data" style="display:none">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre: <span class="text-red">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese nombre completo">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Departamento: <span class="text-red">(*)</span></label>
                                <select id="city" name="city" class="form-control">
                                    <option value="" disabled selected>Seleccione departamento</option>
                                    <option value="Montevideo">Montevideo</option>
                                    <option value="Artigas">Artigas</option>
                                    <option value="Canelones">Canelones</option>
                                    <option value="Cerro Largo">Cerro Largo</option>
                                    <option value="Colonia">Colonia</option>
                                    <option value="Durazno">Durazno</option>
                                    <option value="Flores">Flores</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Lavalleja">Lavalleja</option>
                                    <option value="Maldonado">Maldonado</option>
                                    <option value="Paysandú">Paysandú</option>
                                    <option value="Río Negro">Río Negro</option>
                                    <option value="Rivera">Rivera</option>
                                    <option value="Rocha">Rocha</option>
                                    <option value="Salto">Salto</option>
                                    <option value="San José">San José</option>
                                    <option value="Soriano">Soriano</option>
                                    <option value="Tacuarembó">Tacuarembó</option>
                                    <option value="Treinta y Tres">Treinta y Tres</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Barrio: <span class="text-red">(*)</span></label>
                                <input type="text" id="location" name="location" class="form-control" placeholder="Ingrese barrio">
                            </div>
                        </div>

                    </div><!-- ./row -->

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Dirección: <span class="text-red">(*)</span></label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Ingrese dirección">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Teléfono:</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese teléfono">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Celular:</label>
                            <input type="text" id="cellphone" name="cellphone" class="form-control" placeholder="Ingrese celular">
                        </div>

                    </div><!-- ./row -->
                    

                </div><!-- ./customer-data -->

            </div><!-- ./modal-body -->

            
            <div class="modal-footer">
                <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Registrar venta</button>
            </div>
        </form>

    </div><!-- ./box box-primary -->

</section>


<script>
$(document).ready(function() {
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
var shippingcost = 0
var discount = 0
var total = 0;

function getTotal(subtotal, shippingcost,discount){
    var total = (parseInt(subtotal) + parseInt(shippingcost) - parseInt(discount));

    return total;
}

$('#product').change(function(){
    //console.log(subtotal);

    id = $('#product').val();
    //console.log(id);

    if(id == null){
        Swal.fire({
            icon: 'warning',
            title: 'Aviso!',
            text: 'Debe seleccionar un producto de la lista.'
        });
    } else {
        $.post(URL_PATH + '/admin/product/withStock', {id}, function(r){
        
        if(r == 'out_of_stock'){

            Swal.fire({
                icon: 'warning',
                title: 'Agotado!',
                text: 'El producto seleccionado no tiene stock.',
            });

        } else {

        product = JSON.parse(r);
        //console.log(product);
        
        subtotal += product.price_final;
        //total += product.price_final
        //console.log('Total :' + getTotal(subtotal, shippingcost, discount));
        //console.log(subtotal + ' dps');
        
        $('#sub_subtotal').html(subtotal);
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

        var max = product.stock;
        if(product.stock == 0 && product.delivery_delay > 0){
            max = 99;
        }

        let template = '';
        template += `
            <tr class="">
                <td style="display: none">
                    <input type="hidden" class="product-id" name="product_id[]" value="${product.id}">
                    <input type="hidden" class="product-price" name="price[]" value="${product.price_final}">
                    <input type="hidden" name="price_final[]" value="${product.price_final}">
                </td>
                <td>
                    <img src="${URL_PATH}${product.image}" class="img-responsive" width="40px;">
                </td>
                <td>
                    ${product.name}
                </td>
                <td>
                    <input type="hidden" class="stock" value="${product.stock}">
                    <span class="label bg-primary stock">${product.stock}</span>
                </td>
                <td>
                    $ ${product.price_final}
                </td>
                <td>
                    <div class="qty">
                        <span class="minus bg-dark">-</span>
                            <input 
                                type="number" 
                                id="select-quantity" 
                                class="count select-quantity" 
                                name="qty" 
                                min="1" 
                                max="${max}" 
                                value="1"
                            >
                            <input type="hidden" value="${max}" name="max-attribute"">
                        <span  class="plus bg-dark">+</span>
                    </div>
                </td>
                <td>
                    $ <span class="price_final-table">${product.price_final}</span>
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


/* input count */
$(document).on('input', '.count', function(){
    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();
    console.log(qty);
    
    //qty--;
    $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
    //$(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val(parseInt($('.count').val()) - 1);

    var price = $(this).closest('tr').find('td').eq(0).find('input[name="price[]"]').val();
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
    $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

});


/* BUTTONS -PLUS/MINUS- */
$(document).on('click', '.plus', function(){

    var max_attribute = $(this).closest('tr').find('td').eq(5).find('input[name="max-attribute"]').val();
    console.log(max_attribute);

    //var stock = $(this).closest('tr').find('td').eq(3).find('input[class="stock"]').val();
    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();


    /* Comprobamos que haya existencia de stock */
    if(parseInt(qty) < parseInt(max_attribute)){
        qty++;
        
        $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
        var price = $(this).closest('tr').find('td').eq(0).find('input[name="price[]"]').val();
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
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));
        
    }

});

$(document).on('click', '.minus', function(){

    var qty = $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val();

    if(parseInt(qty) == 1){
        //console.log('Np se peude menos cantidad');
    } else {
        qty--;
        $(this).closest('tr').find('td').eq(5).find('input[name="qty"]').val(qty);
        //$(this).closest('tr').find('td').eq(5).find('input[id="select-quantity"]').val(parseInt($('.count').val()) - 1);

        var price = $(this).closest('tr').find('td').eq(0).find('input[name="price[]"]').val();
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
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));
    }
    
    

    /*if ($('.count').val() <= 1) {
		$('.count').val(1);
	}*/
});

$("#shipping_cost").on("input", function(e) {
  var input = $(this);
  var val = input.val();

  if (input.data("lastval") != val) {
    input.data("lastval", val);

    if(val == ''){
       val = 0; 
    }

    shippingcost = val;
   
    $('#sub_shipping_cost').html(shippingcost);
    $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

    
  }

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
    $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

    
  }

});


/* Checkbox costo de envío */
$('#check-shipping').change(function() {
    
    if(this.checked) {
        var myVariable;

        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'url': URL_PATH + "/admin/config/get_shippingcost",
            'success': function (data) {
                response = JSON.parse(data);
                myVariable = response.cost;
            }
        });

        shippingcost = myVariable;

        $('#customer-data').show(); // Habilitamos el formulario
        $('#shipping_cost').prop('disabled', false); // Habilitamos el input para ingresar el costo de envío
        $('#shipping_cost').val(shippingcost); // Seteamos el valor del costo de envío

        $('#sub_shipping_cost').html(shippingcost); // Actualizamos el costo de envio en el subtotal
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount)); // Actualizamos el total

        
    } else {

        $('#customer-data').hide();
        $('#shipping_cost').prop('disabled', true);
        $('#shipping_cost').val('');

        /* Seteamos shippingcost = 0 */
        shippingcost = 0;
        $('#sub_shipping_cost').html(shippingcost);
        $('#sub_subtotal').html(subtotal);
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));

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
        $('#sub_total_amount').html(getTotal(subtotal, shippingcost,discount));
        $(this).closest('tr').remove();
    });
</script>



<script>
    $('#customer').on('change', function() {
        var customer_id = this.value;

        $.post(URL_PATH + '/admin/order/getCustomerData', {customer_id}, function(r){
            var customer = JSON.parse(r)

            $("#name").val(customer[0].name + ' ' + customer[0].lastname);
            $("#document").val(customer[0].document);
            $('#city').val(customer[0].city).trigger('change');
            //$("#city").val(customer[0].city);
            $('#location').val(customer[0].location);
            $('#address').val(customer[0].address);
            $('#phone').val(customer[0].phone);
            $('#cellphone').val(customer[0].cellphone);
            


        });

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
                text: 'No ha seleccionado ningún producto para vender.',
            });
            
        } else {

            /* Comprobamos si hay productos repetidos */
            var repetidos = [];
            var temporal = [];

            arrayOf_product_id.forEach((value,index)=>{
            temporal = Object.assign([],arrayOf_product_id); //Copiado de elemento
            temporal.splice(index,1); //Se elimina el elemnto q se compara
            /**
            * Se busca en temporal el elemento, y en repetido para 
            * ver si esta ingresado al array. indexOf returna
            * -1 si el elemento no se encuetra
            **/
            if(temporal.indexOf(value)!=-1 && repetidos.indexOf(value)==-1)      repetidos.push(value);
            });

            if(repetidos.length > 0){
                Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    text: 'Hay productos repetidos. Por favor elimínelos, si desea vender más de una unidad agregue más cantidad.'
                });
            } else {

                //var payment_type = $('#payment_type').val();
                var items = arrayOf_product_id.length;
                var shipping_cost = parseInt(shippingcost);
                var check_shipping = 0;
                var dto = parseInt(discount);
                var amount = $('#amount').val();
                var t = getTotal(subtotal, shipping_cost, dto)
                
                if(t < 0){

                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'El total de la factura no puede ser negativo.'
                    });

                } else if(amount < t){

                    Swal.fire({
                        icon: 'warning',
                        title: 'Atención!',
                        text: 'El monto del cliente debe ser superior al total de la factura.'
                    });

                } else {

                    if ($('#check-shipping').prop('checked')){
                    check_shipping = 1;
                    var name = $('#name').val();
                    var city = $('#city').val();
                    var location = $('#location').val();
                    var address = $('#address').val();
                    var phone = $('#phone').val();
                    var cellphone = $('#cellphone').val();

                } 

                const postData = {
                    customer_id: $('#customer').val(),
                    items: items,
                    //payment_type: payment_type,
                    product_id: arrayOf_product_id,
                    price: arrayOf_product_price,
                    quantity: arrayOf_quantity,
                    shipping_cost: shipping_cost,
                    dto: dto,
                    need_shipping: check_shipping,
                    subtotal: subtotal,
                    total: t,
                    full_name: name,
                    city: city,
                    location: location,
                    address: address,
                    phone: phone,
                    cellphone: cellphone
                };

                Swal.fire({
                    title: `Información de la factura`,
                    html: `Subtotal: $ ${subtotal}<br>
                        Descuento: $ ${discount}<br>
                        Envío: $ ${shippingcost}<br>
                        <b>Total: $ ${t}<b>
                        <h4>¿Desea continuar?</h4>
                        `,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#1f89d6',
                    cancelButtonColor: '##757575',
                    confirmButtonText: 'Sí, continuar!'
                }).then((result) => {
                    if (result.value) {

                        $.post(URL_PATH + '/admin/order/store', postData, function(r) {
                        console.log(r);

                        if(r == 'warning'){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención!',
                                text: 'Por favor complete los datos de envío.',
                            });
                        } else {
                            if(r == 'error'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Atención!',
                                    text: 'Se produjo un error al efectuar la venta. Por favor compruebe todos los datos requeridos.',
                                });
                            } else {
                                if(r.charAt(0) == '{'){

                                    order = JSON.parse(r);
                                    console.log(order);
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Correcto!',
                                        html: `<p>La venta se ha efectuado con éxito</p><p><b>Vuelto: $ ${amount - t}</b></p>`,
                                        showCancelButton: true,
                                        confirmButtonText:`<a style="color: #fff;" target='_blank' href=${URL_PATH}/admin/order/print/${order.id}><i class="fa fa-print"></i> Imprimir factura</a>`,
                                        confirmButtonAriaLabel: 'Thumbs up, great!',
                                        cancelButtonText:'Cerrar'
                                    });

                                    saleCompleted();

                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Atención!',
                                        html: r
                                    });
                                }
                                
                            }
                        }
                    
                    });

                    }

                });

                }
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