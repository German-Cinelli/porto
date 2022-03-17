<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\Order;
use app\models\Item;
use app\models\User;
use app\models\Product;
use app\models\Status;
use app\models\PaymentMethod;
use app\models\ShippingMethod;
use app\models\CanceledOrder;
use app\models\Notification;
use app\models\ShippingCost;


class OrderController {


    public function actionIndex(){
        Utils::isAdmin();

        $include = 'app/views/admin/orders/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'order_index_active' => 'active'
        ]);

    }

    public function actiongetCustomerData(){
        Utils::isAdmin();
        $customer_id = $_POST['customer_id'];
        
        $customer = User::where('id', $customer_id)->get();

        die(json_encode($customer));
    }

    
    public function actionPending(){
        Utils::isAdmin();

        $include = 'app/views/admin/orders/pending.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'order_pending_active' => 'active'
        ]);

    }

    public function actionCanceled(){
        Utils::isAdmin();

        $include = 'app/views/admin/orders/canceled.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'order_canceled_active' => 'active'
        ]);

    }

    public function actionShow($id){
        Utils::isAdmin();

        $order = Order::with([
            'status' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'payment_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'shipping_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->find($id);




        $items = Item::where('order_id', '=', $id)->withTrashed()->get();
        $user = User::find($order->user_id);

        $status = Status::all();

        $include = 'app/views/admin/orders/show.php';
        $order_index_active = 'active';

        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'order_index_active' => $order_index_active,
            'user' => $user,
            'order' => $order,
            'items' => $items,
            'status' => $status
        ]);
        
    }

    /**
     * Método para gestionar un pedido
     * Cambiar el estado del mismo
     */
    Public function actionChange_status(){

        Utils::isAdmin();

        $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : false;
        $status_id = isset($_POST['status_id']) ? $_POST['status_id'] : false;

        if($order_id && $status_id){

            $order = Order::find($order_id);

            if($order){

                $order->status_id = $status_id;

                $update_order = $order->update();

                if($update_order){

                    die('changed');
                } else {

                    die('error');
                }

            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }


    public function actionCreate(){
        Utils::isAdmin();

        //$products = Product::all();
        $products = Product::where('stock', '>', 0)
            ->orWhere('delivery_delay', '>', 0)
            ->get();
        //dd($products);
        $final_consumer = User::where('role_id', 3)->first();
        $customers = User::where('role_id', 2)->get();

        $shipping_cost = ShippingCost::first()->cost;
        
        

        $include = 'app/views/admin/orders/create.php';
        
                   
        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'registerSale_index_active' => 'active',
            'products' => $products,
            'final_consumer' => $final_consumer,
            'customers' => $customers,
            'shipping_cost' => $shipping_cost
        ]);
    }


    public function actionStore(){
        Utils::isAdmin();

        //dd('dd');
        
        $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : false;
        //$payment_type = isset($_POST['payment_type']) ? $_POST['payment_type'] : false;
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
        $items = isset($_POST['items']) ? $_POST['items'] : false;
        $quantity = $_POST['quantity'];

        /* Comprobamos disponibilidad de stock de los productos */
        $message = '';
        for($i = 0; $i < $items; $i++){
            $product = Product::find($product_id[$i]);
            if($product->stock < $quantity[$i] && $product->delivery_delay == 0){
                $message .= '</p>El artículo ' . $product->name . ' tiene <span class="text-red">' . $product->stock . '</span> de stock.</p>';
            }
            
        }

        if($message != ''){
            die($message);
        }
        
        if($customer_id && $product_id && $items){

            $need_shipping = $_POST['need_shipping'];

            if($need_shipping == 1){

                $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : false;
                $city = isset($_POST['city']) ? $_POST['city'] : false;
                $location = isset($_POST['location']) ? $_POST['location'] : false;
                $address = isset($_POST['address']) ? $_POST['address'] : false;
                $phone = isset($_POST['phone']) ? $_POST['phone'] : 'Sin especificar';
                $cellphone = isset($_POST['cellphone']) ? $_POST['cellphone'] : 'Sin especificar';

                if(!$full_name || !$city || !$location || !$address){
                    die('warning');
                }

            } else {

                /* En caso de que no se necesite hacer el envío seteamos las variables como 'Sin especificar' */
                $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : 'Consumidor final';
                $city = isset($_POST['city']) ? $_POST['city'] : 'Sin especificar';
                $location = isset($_POST['location']) ? $_POST['location'] : 'Sin especificar';
                $address = isset($_POST['address']) ? $_POST['address'] : 'Sin especificar';
                $phone = isset($_POST['phone']) ? $_POST['phone'] : 'Sin especificar';
                $cellphone = isset($_POST['cellphone']) ? $_POST['cellphone'] : 'Sin especificar';

            }


            
            //die('Name: ' . $name . ' | City: ' . $city . ' | Location: ' . $location . ' | Address: ' . $address . ' | Phone: ' . $phone . ' | Cellphone: ' . $cellphone);

            $shipping_cost = isset($_POST['shipping_cost']) ? $_POST['shipping_cost'] : 0;
            $dto = isset($_POST['dto']) ? $_POST['dto'] : 0;
            

            //$quantity = $_POST['quantity'];
            $unit_price = $_POST['price'];
            $post_subtotal = $_POST['subtotal'];
            $post_total = $_POST['total'];
            $sub_total = 0;
            
            for ($i = 0; $i < $items; $i++) { 
                $sub_total += ($quantity[$i] * $unit_price[$i]); // Calculamos el subtotal
            }

            $status_id = 10;
            if($need_shipping == 1){
                $status_id = 4; // Preparar pedido - Pago
            }

            $order = new Order();
            $order->user_id = $customer_id;
            $order->status_id = $status_id;
            $order->shipping_method_id = 2;
            $order->payment_method_id = 1; // Las ventas que se realicen desde el dashbaord deberian estar guardarse como metodo de pago = Contrarembolso?
            //$order->payment_type_id = $payment_type;
            $order->full_name = $full_name;
            $order->need_shipping = $need_shipping;
            $order->shipping_city = $city;
            $order->shipping_location = $location;
            $order->shipping_address = $address;
            $order->phone = $phone;
            $order->cellphone = $cellphone;
            $order->shipping_cost = $shipping_cost;
            $order->sub_total = $sub_total;
            $order->dto = $dto;
            $order->total_amount = $sub_total + $shipping_cost - $dto;

            

            $save = $order->save();

            if($save){
                    
                for($i = 0; $i < $items; $i++){

                    $item = new Item();

                    $order = Order::where('user_id', '=', $customer_id)->latest()->first();

                    $item->order_id = $order->id;
                    $item->product_id = $product_id[$i];
                    $item->unit_price = $unit_price[$i];
                    $item->dto = 0;
                    $item->quantity = $quantity[$i];
                    $item->amount = ($quantity[$i] * $unit_price[$i]);

                    $save_item = $item->save();

                    /* Actualizar stock del producto */
                    $product = Product::find($product_id[$i]);
                    //$new_stock = ($product->stock - $quantity[$i]);


                    /**
                     * Actualizamos el stock del producto solo si no es a contra-pedido
                     */
                    if($product->delivery_delay == 0){
                        $product->stock = ($product->stock - $quantity[$i]);
                        $update_stock_product = $product->update();
                    }
                    


                    if(!$save_item && !$update_stock_product){
                        die('error');
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
                            die('error');
                        }
                    }

                }
                //Response::redirect('/admin/order/show/' . $order->id);
                $order = Order::where('user_id', '=', $customer_id)->latest()->first();
                die(json_encode($order));
                
            } else {
                die('error');
            }

        } else {
            die('error');
        }

        
    }


    public function actionPrint($id){
        Utils::isAdmin();

        $order = Order::withTrashed()->find($id);
        $items = Item::where('order_id', '=', $id)->withTrashed()->get();
        $user = User::find($order->user_id);
        

        $include = 'app/views/admin/orders/print.php';
        $order_index_active = 'active';
        
        Response::render('admin/empty-html', [
            'include' => $include,
            'order_index_active' => $order_index_active,
            'user' => $user,
            'order' => $order,
            'items' => $items
            
        ]);
        
    }


    public function actionCancel_order(){
        Utils::isAdmin();

        $order_id = isset($_POST['id']) ? $_POST['id'] : false;
        $reason = isset($_POST['reason']) ? $_POST['reason'] : false;

        if($order_id && $reason){
            $items = Item::where('order_id', $order_id)->get();
            
            if($items){

                foreach($items as $item){

                    /* Actualizar stock de los productos */
                    $product = Product::find($item->product_id);
                    //$new_stock = ($product->stock - $quantity[$i]);

                    // Comprobamos si el producto es a contra-pedido, ésto quiere decir que no maneja stock.
                    // En tal caso no hay que modificar el stock
                    if(!$product->delivery_delay > 0){
                        $product->stock = ($product->stock + $item->quantity);
                        $update_stock_product = $product->update();
    
                        if(!$update_stock_product){
                            die('error');    
                        }
                    }
                    

                    /* Eliminar items */
                    $i = Item::find($item->id);
                    $delete_item = $i->delete();

                    if(!$delete_item){
                        die('error');
                    }
                    
                }


                $order = Order::find($order_id);


                /* Actualizamos el estado */
                $order->status_id = 3; //Cancelado
                $update_order = $order->update();

                /* Creamos un nuevo registro en la tabla canceled_orders */
                $canceled_order = new CanceledOrder();
                $canceled_order->order_id = $order->id;
                $canceled_order->reason = $reason;
                $save_canceled_order = $canceled_order->save();

                if($save_canceled_order){
                    die('ok');
                } else {
                    die('error');
                }
            

            } else {

                die('error');
            }
        } else {

            die('error');
        }
    }



    /* Añadir item al carrito */
    public function actionAdd(){
        Utils::isAdmin();

        if(isset($_POST)){

            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $material_id = isset($_POST['material_id']) ? $_POST['material_id'] : false;
            $color_id = isset($_POST['color_id']) ? $_POST['color_id'] : false;
            $size_id = isset($_POST['size_id']) ? $_POST['size_id'] : false;

            if($product_id && $material_id && $color_id && $size_id){

                $product = Product::find($product_id);
                $material = Material::find($material_id);
                $color = Color::find($color_id);
                $size = Size::find($size_id);
        
                $_SESSION['cart'][] = array(
                    'product' => $product,
                    'material' => $material,
                    'color' => $color,
                    'size' => $size,
                );

                die(json_encode($_SESSION['cart']));

            } else {

                die('error');
            }
    
        } else {

            die('error');
        }

    }

    /* Remover un item en especifico del carrito */
    public function actionRemove($index){
        Utils::isAdmin();
        //dd($index);
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
        Utils::isAdmin();

        $price = 0;

        foreach($_SESSION['cart'] as $item){
            $product = Product::find($item['product']->id);
            $price += $product->price_final;
        }

        //d('Total a pagar: $' . $price);

        echo $price;
    }


    public function actionList(){
        Utils::isAdmin();

        $orders = Order::with([
            'status' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'payment_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'shipping_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->get();

        echo '{"data": '.$orders.'}';
    }

    /* Lista de pedidos pendientes de envío */
    public function actionPending_list(){
        Utils::isAdmin();

        $orders = Order::with([
            'status' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'payment_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'shipping_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->where('status_id', 4)
        ->orWhere('status_id', 5)
        ->orWhere('status_id', 6)
        ->orWhere('status_id', 7)
        ->orWhere('status_id', 8)
        ->orWhere('status_id', 9)
        ->get();

        //die($orders);

        echo '{"data": '.$orders.'}';
    }


    /* Lista de pedidos cancelados */
    public function actionCanceled_list(){
        Utils::isAdmin();

        $orders = Order::with([
            'status' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'payment_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with([
            'shipping_method' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->with('canceled_order')
        ->where('status_id', 3)
        ->get();

        //$orders = Order::where('status_id', 4)->with('User')->with('Status')->with('Canceled_order')->withTrashed()->get();

        echo '{"data": '.$orders.'}';
    }


    public function actionConfirm_shipment(){
        Utils::isAdmin();
        $order_id = isset($_POST['id']) ? $_POST['id'] : false;

        if($order_id){

            $order = Order::find($order_id);
            $order->need_shipping = 0;
            $order->status_id = 10;
            $confirm = $order->update();

            if($confirm){
                die('confirmed');

            } else {

                die('error');
            }

        }
        
        die('error');
    }


}