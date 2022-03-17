<?php

namespace app\controllers;

use \Response;
use \Payment;
use \Redelocker;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;


use app\models\User;
use app\models\Order;
use app\models\Item;


use app\models\Product;

use app\models\ShippingCost;

use app\models\PaymentMethod;
use app\models\ShippingMethod;

use app\models\Notification;

use app\models\Coupon;
use app\models\CouponOrder;

use app\models\ComboCustomer;

use \MercadoPago;

use Carbon\Carbon;

class CheckoutController {


    /**
     * Paso 1
     * Datos de facturación
     */
    public function actionIndex(){

        //dd('checkout@index');
        
        Utils::issetSession();

        $customer = User::find($_SESSION['login']->id);
        
        /**
         * Comprobamos si el usuario tiene una factura 'abierta'
         */
        $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();
        

        if($order_pending){
            Response::redirect('/checkout/summary');
        }

        // Comprobamos si hay items añadidos al carrito antes de renderizar la vista
        if (count($_SESSION['cart']) > 0){

            

            $customer = User::find($_SESSION['login']->id);

            /**
             * Departamentos
             */
            //$citys = City::all();

            $sub_total = Utils::cart_calculate_sub_total();
            //$shipping_cost = Utils::getShipping_cost();

            //$total = Utils::cart_total($sub_total, $shipping_cost);

            /**
             * Métodos de pago
             */
            $payment_methods = PaymentMethod::all();
            
            /**
             * Métodos de envío
             */
            $shipping_methods = ShippingMethod::where('is_deleted', '<>', 1)->orderBy('id', 'DESC')->get();


            /**
             * Redelocker
             */
            $locations = false;
            $redelocker = new Redelocker();
                   
            $data = $redelocker->login();
                            
            if($data){
                /** Obtener token */
                $token = $redelocker->get_token($data);
                /** Obtener ubicaciones */
                $locations = $redelocker->locations($token);
                //dd($locations);
            }
            


            $include = 'app/views/web/checkout/index.php';
            
            Response::render('index', [
                'include' => $include,
                'title' => 'Tu compra',
                'cart_menu_select' => 'menu__link--select',
                'customer' => $customer,
                'sub_total' => $sub_total,
                'payment_methods' => $payment_methods,
                'shipping_methods' => $shipping_methods,
                'locations' => $locations
            ]);

        } else {

            Response::redirect('/cart');
        }

    }


    /**
     * Paso 2
     * Resumen de su compra + botón pagar
     */
    public function actionSummary(){
        
        Utils::issetSession();

        $customer = User::find($_SESSION['login']->id);

        $location = false;

        /**
         * Comprobamos si el usuario tiene una factura 'abierta'
         */
        $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();


        if($order_pending){
            
            /**
             * Comprobamos si esa factura tiene mas de 24 horas abierta
             */
            $now = new Carbon(); // Obtenemos la fecha y hora actual
            /*
            * Comparamos las horas de diferencia que hay entre la fecha actual y la de la factura creada
            * Si supera las 24 horas le ponemos un status_id = 2 (Expired)
            * y procedemos a crear una nueva
            */
            if($now->diffInHours($order_pending->created_at) > 24){
                //dd('expired');
                $order_pending->status_id = 2;
                $update = $order_pending->save();

                if($update){
                    Response::redirect('/cart');
                } else {
                    Response::redirect('/');
                }
                
            } else {

                /**
                 * Redelocker
                 */

                if($order_pending->shipping_method_id == 4){
                    
                    $redelocker = new Redelocker();
                
                    $data = $redelocker->login();
                    
                    if($data){
                        # Obtener token
                        $token = $redelocker->get_token($data);
                        # Obtener ubicaciones
                        $locations = $redelocker->locations($token);
                        //dd($locations);

                        # Redirigimos para que escoga ubicación desde el formulario en caso de que la ubicación sea NULL.
                        if($order_pending->redelocker_location_id === NULL){

                            $combo_customer = ComboCustomer::where('user_id', $customer->id)->get();

                            $include = 'app/views/web/checkout/redelocker_locations.php';
                    
                            Response::render('index', [
                                'include' => $include,
                                'title' => 'Tu compra',
                                'locations' => $locations,
                                'combo_customer' => $combo_customer
                            ]);

                        } else {
                            #Caso contrario necesitamos enviar los datos de esa ubicación.
                            foreach($locations as $location){
                                if($order_pending->redelocker_location_id === $location->idUbicacion){
                                    $location = $location;
                                }
                            }
                        }

                        

                    }

                }

                /**
                 * Si el método de envío es Redelocker enviamos los datos de la ubicacion seleccionada.
                 */
                /*if($order_pending->shipping_method_id === 4){

                }*/



                
                /**
                 * Si hay order pendiente tenemos que generar una nueva preferencia
                 * de pago y actualizar el preference_id en la order
                 * Solo en caso de que el metodo de pago sea mercadopago
                 */
                /**
                * MERCADOPAGO
                */
                if($order_pending->payment_method_id == 2){

                    
                    /**
                     * Mercadopago
                     */
                    $preference = Payment::Mercadopago($order_pending);

                } else {

                    $preference = null;

                }

                //dd($preference);

                $combo_customer = ComboCustomer::where('user_id', $customer->id)->get();
               
                $include = 'app/views/web/checkout/summary.php';
                    
                Response::render('index', [
                    'include' => $include,
                    'title' => 'Tu compra',
                    'order' => $order_pending,
                    'customer' => $customer,
                    'preference' => $preference,
                    'location' => $location,
                    'combo_customer' => $combo_customer
                ]);


            }

        } else {

            /**
             * Si no hay order pendiente...
             */
            // Comprobamos si hay items añadidos al carrito antes de renderizarla vista
            if (count($_SESSION['cart']) > 0){

                $coupon_code = isset($_POST['coupon_code']) ? $_POST['coupon_code'] : false;
                $name = isset($_POST['name']) ? $_POST['name'] : false;
                $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $shipping_phone = isset($_POST['phone']) ? $_POST['phone'] : false;
                $shipping_city = isset($_POST['city']) ? $_POST['city'] : false;
                $shipping_location = isset($_POST['location']) ? $_POST['location'] : false;
                $shipping_address = isset($_POST['address']) ? $_POST['address'] : false;
                $shipping_zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : false;

                $shipping_method = isset($_POST['radio-shipping-method']) ? $_POST['radio-shipping-method'] : false;
                $payment_method = isset($_POST['radio-payment-type']) ? $_POST['radio-payment-type'] : false;

                if($name && $lastname && $email && $shipping_phone && $shipping_city && $shipping_location && $shipping_address && $shipping_zipcode && $shipping_method && $payment_method){

                    $cart = $_SESSION['cart'];

                    /**
                     * Necesita envío?
                     * 2: Entrega a la dirección solicitada
                     * 3: Envío a tres cruces
                     */
                    $need_shipping = 0;
                    $shipping_cost = ShippingMethod::find($shipping_method)->cost;
                    if($shipping_method == 2 || $shipping_method == 3){
                        $need_shipping = 1;
                    }

                    /* Calcular el costo total de los productos */
                    $sub_total = 0;
                    $total_amount = 0;
                    foreach($_SESSION['cart'] as $product){
                        $sub_total += ($product['product']->price_final * $product['quantity']);
                        //$total_amount += $product['product']->price_final;
                    }

                    /**
                     * Comprobamos si hay cupon de descuento
                     */
                    $discount = 0;
                    if($coupon_code){
                        // Comprobamos que esté disponible
                        $coupon = Coupon::where('code', $coupon_code)->first();
                        $now = new Carbon();
                        if($now->toDateString() > $coupon->expiration_date){

                            //die('expired');
                        } else {

                            /**
                             * Comprobamos que no haya superado
                             * el límite de usos
                             */
                            if(!($coupon->total_usage >= $coupon->limit_usage)){
                                $discount = ($sub_total) * $coupon->discount / 100;
                               
                            }

                            
                        }
                    }

                    $order = new Order();
                    $order->user_id = $customer->id;
                    //$order->payment_type_id = 1;
                    $order->payment_method_id =  $payment_method;
                    $order->shipping_method_id = $shipping_method;
                    $order->preference_id = NULL;
                    $order->need_shipping = $need_shipping;
                    $order->full_name = $name . ' ' . $lastname;
                    $order->shipping_city = $shipping_city;
                    $order->shipping_location = $shipping_location;
                    $order->shipping_address = $shipping_address;
                    $order->phone = $shipping_phone;
                    $order->shipping_zipcode = $shipping_zipcode;
                    $order->shipping_cost = $shipping_cost;
                    $order->sub_total = $sub_total;
                    $order->dto = $discount;

                    $order->total_amount = floor(($sub_total + $shipping_cost) - $discount);
                    $order->status_id = 1;

                    //d($order);

                    $save = $order->save();

                    if($save){

                        /**
                         * Creamos un nuevo registro del uso del cupón
                         */
                        if($coupon_code){

                            if(!($coupon->total_usage >= $coupon->limit_usage)){

                                $coupon_order = new CouponOrder();
                                $coupon_order->coupon_id = $coupon->id;
                                $coupon_order->order_id = $order->id;
                                $coupon_order->total_discount = $discount;
    
                                //d($coupon_order);
    
                                $save_coupon_order = $coupon_order->save();
                                
                                if($save_coupon_order){
                                    
                                } else {
    
                                }

                            }

                        }
                        
                            
                        foreach($cart as $product){

                            $item = new Item();

                            $order = Order::where('user_id', $customer->id)->latest()->first();
                            //dd($order);

                            $item->order_id = $order->id;
                            $item->product_id = $product['product']->id;
                            $item->unit_price = $product['product']->price_final;
                            //$item->dto = $product['product']->offer;
                            $item->quantity = $product['quantity'];
                            $item->amount = $product['product']->price_final * $product['quantity'];

                            $item->dto = 0; //QUitar luego, no se usa, era del proyecto paulina-shoes

                            $save_item = $item->save();

                            if(!$save_item){
                                die('error');
                            }

                        }

                        /**
                         * Redelocker
                         */
                        if($order->shipping_method_id == 4){

                            $redelocker = new Redelocker();
                        
                            $data = $redelocker->login();
                            
                            if($data){
                                # Obtener token
                                $token = $redelocker->get_token($data);
                                # Obtener ubicaciones
                                $locations = $redelocker->locations($token);
                                //dd($locations);

                                # Redirigimos para que escoga ubicación desde el formulario en caso de que la ubicación sea NULL.
                                if($order->redelocker_location_id === NULL){

                                    $include = 'app/views/web/checkout/redelocker_locations.php';
                            
                                    Response::render('index', [
                                        'include' => $include,
                                        'title' => 'Tu compra',
                                        'locations' => $locations
                                    ]);

                                } else {
                                    #Caso contrario necesitamos enviar los datos de esa ubicación.
                                    foreach($locations as $location){
                                        if($order_pending->redelocker_location_id === $location->idUbicacion){
                                            $location = $location;
                                        }
                                    }
                                }

                                

                            }

                        }



                        /**
                         * MERCADOPAGO
                         */
                        $preference = Payment::Mercadopago($order);

                        //dd('-----');


                        $include = 'app/views/web/checkout/summary.php';
                    
                        Response::render('index', [
                            'include' => $include,
                            'title' => 'Tu compra',
                            'order' => $order,
                            'customer' => $customer,
                            'preference' => $preference,
                            'location' => $location
                        ]);


    
                    } else {

                        //die('2');
                        Resposne::redirect('/');
                    }

                } else {
                    /**
                     * Faltan datos
                     */
                }

            } else {

                Response::redirect('/cart');
            }
        }
        //dd($order_pending);

    }


    /**
     * Seleccionar Locker
     */
    public function actionRedelocker_location(){
        Utils::issetSession();

        $location = isset($_POST['location']) ? $_POST['location'] : false;

        if($location){
            $customer = User::find($_SESSION['login']->id);

            $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();

            if($order_pending){
                $order_pending->redelocker_location_id = $location;
                $update = $order_pending->update();

                if($update){

                    # Redirigimos nuevamente al summary.
                    Response::redirect('/checkout/summary');
                } else {

                    # En caso de no actualizar redirigimos al carrito.
                    Response::redirect('/cart');
                }

            } else {

                # Si no existe pedido pendiente redirigimos al carrito.
                Response::redirect('/cart');
            }

        } else {

            # En caso de no recibir por POST redirigimos al formulario de seleccion de Locker.
            Response::redirect('/checkout/summary');
        }

    }



    /**
      * Paso 3 (VIEJO)
      * Pago
      */
    public function actionProcess_payment(){
        
        $preference_id = isset($_GET['preference_id']) ? $_GET['preference_id'] : false;
        $payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : false;
        $merchant_order_id = isset($_GET['merchant_order_id']) ? $_GET['merchant_order_id'] : null;
        $status = isset($_GET['status']) ? $_GET['status'] : false;

        if($preference_id && $payment_id && $status){

            $order = Order::where('preference_id', $preference_id)->first();

            $customer = User::find($_SESSION['login']->id);

            /**
             * Actualizamos el estado a preparar pedido - pago
             */
            $order->status_id = 4;
            $order->mercadopago_payment_id = $payment_id;
            $order->mercadopago_merchant_order_id = $merchant_order_id;

            $update_order = $order->save();



            /**
             * Actualizamos el stock de los productos
             */
            $string = '';
            foreach($order->items as $item){

                if($item->product->product_type_id == 21){
                    $arr = [];
                    foreach($combo_customer as $itm){
                        array_push($arr, $itm->product_id);
                    }
                    $item->canasta = $arr;
                    $item->save();
                }

                /* Actualizar stock del producto */
                $product = Product::find($item->product_id);
                //$new_stock = ($product->stock - $quantity[$i]);

                /**
                 * Actualizamos el stock del producto solo si no es a contra-pedido
                 */
                if($product->delivery_delay == 0){
                    $product->stock = ($product->stock - $item->quantity);
                    $update_stock_product = $product->update();
                }
                

                /* Comprobamos si el stock es inferior a stock-alert */
                if($product->stock <= $product->stock_alert && $product->delivery_delay == 0){

                    switch ($product->stock) {
                        case 0:
                            $message = 'Sin stock.';
                            $icon = "fa fa-warning text-red";
                            break;

                        case 1:
                            $message = 'Queda ' . $product->stock . ' unidad.';
                            $icon = "fa fa-warning text-yellow";
                            break;
                        
                        default:
                            $message = 'Quedan ' . $product->stock . ' unidades.';
                            $icon = "fa fa-warning text-yellow";
                            break;
                    }

                    /* New Notification */
                    $notification = new Notification();
                    $notification->image = $product->image;
                    $notification->message = $message;
                    $notification->icon = $icon;
                    $notification->path = '/admin/product/show/' . $product->id;
                    $save_notification = $notification->save();

                    if(!$save_notification){
                        //die('error');
                    }


                }

                /**
                * Añadimos en el atributo nota los productos que eligio el cliente de la canasta
                 */
                    
                if($item->product_id == 60){
                    $product_comb = Utils::getProducts_combo($_SESSION['login']->id);
                    foreach($product_comb as $pc){
                        $string += "$pc->product_id -";
                    }
                }

            }


            $order = Order::where('preference_id', $preference_id)->first();
            $order->note = $string;
            $order->save();


            /**
             * Actualizamos el cupon a confirmado
             * si es que existe...
             */
            $coupon_order = CouponOrder::where('order_id', $order->id)->first();
            
            if($coupon_order){

                $coupon_order->confirmed = 1;
                $update_coupon_order = $coupon_order->update();

                /**
                 * Le añadimos un uso
                 */
                $coupon = Coupon::where('id', $coupon_order->coupon_id)->first();
                
                $used = ++$coupon->total_usage;
                
                $coupon->total_usage = $used;
                $update_coupon = $coupon->update();

            }
            

            /* Actualizar atributo sold */
            $update_sold_items = DB::select("UPDATE items SET sold = 1 WHERE order_id = $order->id");
        
            
            
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }

            Response::redirect('/checkout/success_order/' . $order->id);

            
            //$include = 'app/views/web/checkout/payment/success.php';

            /*Response::render('index', [
                'include' => $include,
                'title' => 'Tu compra',
                'order' => $order,
                'customer' => $customer
            ]);*/

        }


    }


    /*public function actionA(){

        $combo_customer = ComboCustomer::where('user_id', $_SESSION['login']->id)->get();
        $order = Order::find(4);
        foreach($order->items as $item){
            if($item->product->product_type_id == 21){
                $arr = [];
                foreach($combo_customer as $itm){
                    array_push($arr, $itm->product_id);
                }
                $item->canasta = $arr;
                $item->save();
            }
            
        }

        dd($arr);
        
        dd($combo_customer);
        

        $customer = User::find($_SESSION['login']->id);

        
        $order->status_id = 4;
        $order->mercadopago_payment_id = $payment_id;

        $update_order = $order->save();



        
        foreach($order->items as $item){

            
            $product = Product::find($item->product_id);
            //$new_stock = ($product->stock - $quantity[$i]);

            
            if($product->delivery_delay == 0){
                $product->stock = ($product->stock - $item->quantity);
                $update_stock_product = $product->update();
            }
            

            
            if($product->stock <= $product->stock_alert && $product->delivery_delay == 0){

                switch ($product->stock) {
                    case 0:
                        $message = 'Sin stock.';
                        $icon = "fa fa-warning text-red";
                        break;

                    case 1:
                        $message = 'Queda ' . $product->stock . ' unidad.';
                        $icon = "fa fa-warning text-yellow";
                        break;
                    
                    default:
                        $message = 'Quedan ' . $product->stock . ' unidades.';
                        $icon = "fa fa-warning text-yellow";
                        break;
                }

                
                $notification = new Notification();
                $notification->image = $product->image;
                $notification->message = $message;
                $notification->icon = $icon;
                $notification->path = '/admin/product/show/' . $product->id;
                $save_notification = $notification->save();

                if(!$save_notification){
                    //die('error');
                }
            }

            if($product->product_type_id == 21){
                //$combo_customer = ComboCustomer::
            }

        }
    }*/


     /**
      * Paso 3 (VIEJO)
      * Pago
      */
    public function actionProcess_payment(){
        Utils::issetSession();

        dd($_POST);

        $preference_id = isset($_POST['preference_id']) ? $_POST['preference_id'] : false;
        $payment_id = isset($_POST['payment_id']) ? $_POST['payment_id'] : false;
        $payment_status = isset($_POST['payment_status']) ? $_POST['payment_status'] : false;

        
        if($preference_id && $payment_id && $payment_status && $payment_status == 'approved'){
            $order = Order::where('preference_id', $preference_id)->first();

            $customer = User::find($_SESSION['login']->id);

            
            $order->status_id = 4;
            $order->mercadopago_payment_id = $payment_id;

            $update_order = $order->save();



            
            foreach($order->items as $item){

                
                $product = Product::find($item->product_id);
                //$new_stock = ($product->stock - $quantity[$i]);

                
                if($product->delivery_delay == 0){
                    $product->stock = ($product->stock - $item->quantity);
                    $update_stock_product = $product->update();
                }
                

                
                if($product->stock <= $product->stock_alert && $product->delivery_delay == 0){

                    switch ($product->stock) {
                        case 0:
                            $message = 'Sin stock.';
                            $icon = "fa fa-warning text-red";
                            break;

                        case 1:
                            $message = 'Queda ' . $product->stock . ' unidad.';
                            $icon = "fa fa-warning text-yellow";
                            break;
                        
                        default:
                            $message = 'Quedan ' . $product->stock . ' unidades.';
                            $icon = "fa fa-warning text-yellow";
                            break;
                    }

                    
                    $notification = new Notification();
                    $notification->image = $product->image;
                    $notification->message = $message;
                    $notification->icon = $icon;
                    $notification->path = '/admin/product/show/' . $product->id;
                    $save_notification = $notification->save();

                    if(!$save_notification){
                        //die('error');
                    }
                }

            }

            
            $coupon_order = CouponOrder::where('order_id', $order->id)->first();
            
            if($coupon_order){

                $coupon_order->confirmed = 1;
                $update_coupon_order = $coupon_order->update();

                
                $coupon = Coupon::where('id', $coupon_order->coupon_id)->first();
                
                $used = ++$coupon->total_usage;
                
                $coupon->total_usage = $used;
                $update_coupon = $coupon->update();

            }
            

            
            $update_sold_items = DB::select("UPDATE items SET sold = 1 WHERE order_id = $order->id");
            
            
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }

            Response::redirect('/checkout/success/' . $order->id);

            
            //$include = 'app/views/web/checkout/payment/success.php';

            

        } else {

            Response::redirect('/checkout/failure');



        }

    }

    /**
     * Paso 3
     * Pedido a contrarembolso
     */
    public function actionProcess_order(){
        Utils::issetSession();

        $customer = User::find($_SESSION['login']->id);

        $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();
        //dd($order_pending);
        
        if(!$order_pending){
            Response::redirect('/');
        }
        

        
        //Modificar el a href por un form btn-submit, hay que enviar el preference_id input type_hidden

        $order_pending->status_id = 5;

        $update = $order_pending->save();

        if($update){

            $include = 'app/views/web/checkout/payment/success.php';

            Response::render('index', [
                'include' => $include,
                'title' => 'Tu compra',
                'order' => $order_pending,
                'customer' => $customer
            ]);

        } else {

            $include = 'app/views/web/checkout/payment/failure.php';

            Response::render('index', [
                'include' => $include,
                'title' => 'Tu compra',
                'order' => $order_pending
            ]);

        }

       


    }

    

    public function actionCancel_order(){

        Utils::issetSession();

        $customer = User::find($_SESSION['login']->id);

        $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();

        if($order_pending){
            $order_pending->status_id = 3; // 3->cancelado
            $update = $order_pending->save();
        }

        Response::redirect('/cart');

    }



    /**
     * Método para ver sii un cupón está disponible
     */
    public function actionCoupon(){

        if($_POST){

            $code = isset($_POST['code']) ? $_POST['code'] : false;

            if($code){

                $coupon = Coupon::where('code', $code)->first();

                if($coupon){

                    /**
                     * Comprobamos que el cupón no haya expirado
                     */
                    $now = new Carbon();
                    if($now->toDateString() > $coupon->expiration_date){

                        die('expired');
                    } else {

                        /**
                         * Comprobamos que no haya alcanzado el uso límite
                         */

                         if($coupon->total_usage >= $coupon->limit_usage){

                             die('limit_exceeded');
                         }

                        die($coupon);
                    }

                } else {

                    die('not_exists');
                }

            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }


    /**
     * Método para renderizar una vista si el pago fue exitoso
     */
    public function actionSuccess_order($order_id = false){

        if($order_id){

            $user_id = Utils::getIdUserSession();

            /**
             * Comprobamos que el usuario actualmente logeado sea
             * propietario de ese pedido
             */
            $order = Order::where('user_id', $user_id)
                            ->where('id', $order_id)
                            ->first();
            
            if($order){

                $customer_email = User::find($user_id)->email;

                $include = 'app/views/web/checkout/payment/success.php';

                Response::render('index', [
                    'include' => $include,
                    'title' => 'Tu compra',
                    'order' => $order,
                    'customer_email' => $customer_email
                ]);

            } else {

                Response::redirect('/');
            }



        } else {

            Response::redirect('/');
        }

    }


    /**
     * Método para renderizar una vista si el pago falla
     */
    public function actionFailure(){

        $include = 'app/views/web/checkout/payment/failure.php';

        Response::render('index', [
            'include' => $include,
            'title' => 'Tu compra'
        ]);
    }


}