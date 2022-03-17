<?php

namespace app\controllers;

use \Response;
use \Mailing;
use app\helpers\Utils;

use app\models\Product;
use app\models\User;
use app\models\Order;
use app\models\Item;
use app\models\ShippingCost;
use app\models\ComboCustomer;


class CartController {

    /* Mostrar items del carrito */
    public function actionIndex(){

        //dd($_SESSION['cart']);

        if(isset($_SESSION['cart'])){
            
        }

        $sub_total = Utils::cart_calculate_sub_total();
        $shipping_cost = Utils::getShipping_cost();

        $total = Utils::cart_total($sub_total, $shipping_cost);
        //dd($total);

        

        $include = 'app/views/web/cart/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Carrito',
            'cart_menu_select' => 'active',
            'sub_total' => $sub_total,
            'total' => $total,
            'shipping_cost' => $shipping_cost
        ]);

    }

    /* Añadir item al carrito */
    public function actionAdd(){

        if(isset($_POST)){

            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

            //die(json_encode($_SESSION['cart'][0]['product']));

            //die('product_id: ' . $product_id . ' | quantity: ' . $quantity);
                
            if($product_id && $quantity){

                $product = Product::find($product_id);
                //print_r($product);

                
                /**
                 * Comprobamos si ya existe en el carrito
                 */
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $item){
                        if($item['product']->id == $product_id){
                            die('is_already_in_the_cart');
                        }
                    }
                }
                

                if($product->stock == 0 && $product->delivery_delay == 0){
                    die('out_of_stock');
                }

                if($product->stock < $quantity && $product->delivery_delay == 0){
                    die('insufficient_stock');
                }
                
                
                $_SESSION['cart'][] = array(
                    'product' => $product,
                    'quantity' => $quantity
                );

                die(json_encode($_SESSION['cart']));

            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }


    /**
     * Método para añadir más cantidad de un producto
     */
    public function actionPlusQuantity(){
        if(isset($_POST)){

            $index = isset($_POST['index']) ? $_POST['index'] : false;
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : false;

            $q = ++$quantity;

             // La cantidad no puede ser cero
             if($q <= 0){
                die('not_zero');
            }

            
            if($product_id && $quantity){

                $product = Product::find($product_id);
                //print_r($product);

                if($product->stock <= 0){
                    unset($_SESSION['cart'][$index]);
                    die('out_of_stock');
                }

                if($product->stock < $q){
                    die('insufficient_stock');
                }

                $_SESSION['cart'][$index]['quantity'] = $q;
                
                die('ok');

            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }

    /**
     * Método para restar cantidad de un producto
     */
    public function actionMinusQuantity(){
        if(isset($_POST)){

            $index = isset($_POST['index']) ? $_POST['index'] : false;
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : false;

            $q = --$quantity;

            // La cantidad no puede ser cero
            if($q <= 0){
                die('not_zero');
            }
            

            if($product_id && $quantity){

                $product = Product::find($product_id);
                //print_r($product);

                if($product->stock <= 0){
                    unset($_SESSION['cart'][$index]);
                    die('out_of_stock');
                }

                if($product->stock < $q){
                    die('insufficient_stock');
                }

                $_SESSION['cart'][$index]['quantity'] = $q;
                
                die('ok');

            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }

     

    /* Remover un item en especifico del carrito */
    public function actionRemove($index){

        // product_type = 21 ->  Tipo canasta
        if($_SESSION['cart'][$index]['product']->product_type_id == 21){
            $combo_customer = ComboCustomer::where('user_id', $_SESSION['login']->id)->get();
            foreach($combo_customer as $item){
                $item->delete();
            }
        }
        
        if(isset($index)){
            unset($_SESSION['cart'][$index]);
        }
        
         
        Response::redirect('/cart');
    }

    /* Remover todos los item del carrito */
    public function actionClear(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }

    /*  */
    public function actionPay(){

        //dd($_SESSION['cart']);

        // Traemos todos los datos del cliente
        $customer = User::find($_SESSION['login']->id);

        /* Comprobamos si el cliente tiene ingresados todos sus datos */
        if($customer->name && $customer->lastname && $customer->city && $customer->location && $customer->address && $customer->document){
            
            // Costo de envío
            $shipping_cost = 0;
            if($customer->city == 'Montevideo'){
                $shipping_cost = Shippingcost::find(1)->cost;
            } 


            /* Calcular el costo total de los calzados */
            $sub_total = 0;
            $total_amount = 0;
            foreach($_SESSION['cart'] as $product){
                $sub_total += $product['product']->price;
                $total_amount += $product['product']->price_final;
            }

            /* Calcular el descuento */
            $dto = $sub_total - $total_amount;

            $order = new Order();
            $order->user_id = $customer->id;
            $order->status_id = 5; // Pendiente de envío
            $order->payment_type_id = 2; // Tarjeta de crédito
            $order->need_shipping = 1;
            $order->full_name = $customer->name . ' ' . $customer->lastname;
            $order->shipping_city = $customer->city;
            $order->shipping_location = $customer->location;
            $order->shipping_address = $customer->address;
            $order->shipping_cost = $shipping_cost;
            $order->sub_total = $sub_total;
            $order->dto = $dto;
            $order->total_amount = $total_amount + $shipping_cost;
            
            $save = $order->save();

            if($save){
                
                foreach($_SESSION['cart'] as $product){

                    $item = new Item();

                    $order = Order::where('user_id', '=', $customer->id)->latest()->first();

                    $item->order_id = $order->id;
                    $item->product_id = $product['product']->id;
                    $item->unit_price = $product['product']->price;
                    $item->dto = $product['product']->offer;
                    $item->quantity = 1;
                    $item->amount = $product['product']->price_final * 1;

                    $save_item = $item->save();

                    if(!$save_item){
                        die('1');
                    }

                }

                $items = Item::where('order_id', '=', $order->id)->get();
                //print_r($items);
                $item_table = '';
                foreach($items as $item){
                    $item_table .= "
                        <tr>
                            <td> x$item->quantity </td>
                            <td>" . $item->product->name . "</td>
                            <td> $$item->unit_price </td>
                        </tr>";
                }
                //print_r($item_table);

                /* sendMail recibe 3 parámetros:
                    * 1- A quien va dirigido
                    * 2- El asunto
                    * 3- El cuerpo del mensaje
                 */
                $mailEmail = $customer->email;
                //$mailEmail = 'john7a51c0john@gmail.com'; // Éste es para realizar pruebas, asi llegan a ese correo.
                $mailSubject = 'NOMBRE_EMPRESA - Su compra';
                
                $mailBody = '
                    <h1><span style="font-family:arial,helvetica,sans-serif">Paulina Shoes</span></h1>

                    <p><br />
                    <span style="font-family:arial,helvetica,sans-serif">Hola <strong>' . $customer->name . '!&nbsp;</strong>Tu compra ha sido efectuada con &eacute;xito.</span></p>

                    <p><span style="font-family:arial,helvetica,sans-serif">El env&iacute;o&nbsp;tendr&aacute; una demora m&iacute;nima de 5 di&aacute;s h&aacute;biles. Te pedimos que seas paciente mientras&nbsp;fabricamos tu calzado personalizado!</span></p>

                    <p>También podras ver los detalles de tu compra en nuestra página dirigiéndote a "Mis compras".</p>
                    <br />
                    <span style="font-family:arial,helvetica,sans-serif">Aqu&iacute; los detalles de tu reciente&nbsp;compra:</span><br />
                    &nbsp;
                    &nbsp;&nbsp;<br />
                    &nbsp;
                    <table align="center" border="1" cellpadding="2" cellspacing="2" style="width:600px">
                        <thead>
                            <tr>
                                <th scope="col"><span style="color:#696969">Ctd</span></th>
                                <th scope="col"><span style="color:#696969">Producto</span></th>
                                <th scope="col"><span style="color:#696969">Precio</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            ' . $item_table . '
                        </tbody>
                    </table>
                    &nbsp;

                    <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:500px">
                        <tbody>
                            <tr>
                                <td>Fecha de compra:</td>
                                <td>' . $order->created_at . '</td>
                            </tr>
                            <tr>
                                <td>Localidad:</td>
                                <td>' . $order->shipping_location . '/' . $order->shipping_city . '</td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td>' . $order->shipping_address . '</td>
                            </tr>
                            <tr>
                                <td>Sub total</td>
                                <td>$' . $order->sub_total . '</td>
                            </tr>
                            <tr>
                                <td>Costo de envío</td>
                                <td>$' . $order->shipping_cost . '</td>
                            </tr>
                            <tr>
                                <td>Descuento</td>
                                <td style="color:#c50000">-$' . $order->dto . '</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td style="color:#0c3070">$' . $order->total_amount . '</td>
                            </tr>
                        </tbody>
                    </table>

                    <br />

                    <hr /><img alt="" src="https://www.sc-hosting.com.uy/public/assets/img/logo.png" style="height:118px; width:500px" /><br />
                    <a href="http://www.paulinashoes.com.uy">https://www.paulinashoes.com.uy</a>
                ';



                $sendMail = Mailing::sendMail($mailEmail, $mailSubject, $mailBody);

                die('success');
                
            } else {
                die('2');
            }

        } else {
            die('3');
        }
       



        Response::redirect('/');

    }

}