<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\Combo;
use app\models\ComboItem;
use app\models\Product;
use app\models\ProductType;

use app\models\Attribute;

use app\models\ProductAttributeValue;

use app\models\ProductTypeAttributeValue;



class ComboController {


    public function actionIndex(){
        Utils::isAdmin();

        $combos = Combo::all();

        $include = 'app/views/admin/combos/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'combo_menu_active' => 'active menu_open',
            'combo_index_active' => 'active',
            'combos' => $combos
        ]);

    }


    public function actionShow($id){
        Utils::isAdmin();

        $combo = Combo::find($id);

        $product_type = ProductType::all();

        $include = 'app/views/admin/combos/show.php';

        Response::render('admin/dashboard', [
            'include' => $include,
            'combo_menu_active' => 'active menu_open',
            'combo_index_active' => 'active',
            'combo' => $combo,
            'product_type' => $product_type
        ]);
        
    }


    public function actionCreate(){
        Utils::isAdmin();

        $pt_av = ProductTypeAttributeValue::all();

 

        $include = 'app/views/admin/combos/create.php';
        
                   
        Response::render('admin/dashboard', [
            'include' => $include,
            'combo_menu_active' => 'active menu_open',
            'combo_index_active' => 'active',
            'pt_av' => $pt_av
        ]);
    }


    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);
        
        if(isset($_POST)){

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;
            $items = isset($_POST['items']) ? $_POST['items'] : false;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;


            if($name && $description && $price && $slug && $items && $image){
                
                $combo = new Combo();

                $combo->name = $name;
                $combo->description = $description;
                $combo->price = $price;
                $combo->slug = $slug;
               
                // Subir imagen principal
                $image_name = $_FILES['file']['name'];
                $image_type = $_FILES['file']['type'];
                
                $random_str = Utils::random_str(8);
                $image_name_final = '/assets/uploads/combos/' . $random_str . '-' . $image_name;
                    
                if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                    move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                } else {
                    die('error');
                }

                $combo->image = $image_name_final;

                //dd($product);

                $save_combo = $combo->save();
                
 
                if($save_combo){

                    /**
                     * Items
                     */
                    foreach($items as $item){
                        $combo_item = new ComboItem();
                        $combo_item->combo_id = $combo->id;
                        $combo_item->product_type_attribute_value_id = $item;

                        $save_combo_item = $combo_item->save();

                        if(!$combo_item){
                            die('error');
                        }
                    }
                     

                    //$c = Combo::latest()->first();
                    Response::redirect('/admin/combo/show/' . $combo->id);
                    die('saved');
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


    public function actionOn(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $combo = Combo::find($id);
            $combo->status = 1;
            $restored = $combo->update();

            if($restored){

                die('restored');
            } else {

                die('error');
            }

        } else {
            
            die('error');
        }

        die('error');
    }


    public function actionOff(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $combo = Combo::find($id);
            $combo->status = 0;
            $deleted = $combo->update();

            if($deleted){

                die('deleted');
    
            } else {

                die('error');
            }

        } else {

            die('error');
        }

        die('error');
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