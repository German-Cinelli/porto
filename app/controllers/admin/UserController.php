<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\User;
use app\models\Product;
use app\models\Order;

use app\models\Inbox;


class UserController {


    /**
     * Mostrar una lista de los registros solicitados
     *
     * en 'views/users/index.php'
     */
    public function actionIndex(){

        Utils::isAdmin();

        $users = User::all()->where('role_id', '2');

        $include = 'app/views/admin/users/index.php';
        $user_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'user_index_active' => $user_index_active,
            'users' => $users
        ]);
    }


    /**
     * Formulario para crear un nuevo usuario
     * No nos interesa aún registrar un user desde el dashboard
     */
    /*public function actionCreate(){

        Utils::isAdmin();
       
        Response::render('/admin/users/create');
        
    }*/


    /**
     * Método para almacenar un registro
     * Sera llamado desde el formulario de create
     */
    /*public function actionStore(){

        Utils::isAdmin();
        echo 'UserController@store';
        die();

    }*/


    public function actionShow($id){

        Utils::isAdmin();
        $user = User::find($id);

        /* Pedidos del cliente */
        $orders = Order::where('user_id', '=', $id)->get();

        //dd($orders);

        $include = 'app/views/admin/users/show.php';
        $include_form_edit = 'app/views/admin/users/edit.php';
        $user_index_active = 'active';

        // Esto lo dejo provisorio
        Response::render('admin/dashboard', [
            'include' => $include,
            'include_form_edit' => $include_form_edit,
            'user_index_active' => $user_index_active,
            'user' => $user,
            'orders' => $orders
        ]);
    }


    /*public function actionEdit($id){
        Utils::isAdmin();
        echo 'UserController@edit: ' . $id;
    }*/


    /**
     * Actualizar un registro
     */
    public function actionUpdate($id){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
            $address = isset($_POST['address']) ? $_POST['address'] : null;
            $document = isset($_POST['document']) ? $_POST['document'] : null;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
            $cellphone = isset($_POST['cellphone']) ? $_POST['cellphone'] : null;
            $business_name = isset($_POST['business_name']) ? $_POST['business_name'] : null;
            $rut = isset($_POST['rut']) ? $_POST['rut'] : null;
           
            $user = User::find($id);
            $user->name = $name;
            $user->lastname = $lastname;
            $user->address = $address;
            $user->document = $document;
            $user->phone = $phone;
            $user->cellphone = $cellphone;
            $user->business_name = $business_name;
            $user->rut = $rut;
          

            $user->update();

            Response::redirect('/admin/user/show/' . $id);

        } else {
            echo 'No existe POST';
            var_dump($_POST);
        }
    }


    /*public function actionDestroy($id){
        Utils::isAdmin();
    echo 'UserController@destroy ' . $id;
    }*/


    public function actionBuy($id){
        Utils::isAdmin();
        
        echo 'Method @buy | user_id->' . $id;
        echo '<hr>';
        echo 'Listado de productos:';
        $products = Product::all();

        foreach($products as $product){
            d($product->getAttributes());
            foreach($product->materials as $material){
            //d($material->colors);
            echo $material->id . ' | ' . $material->name . '<br>';
            foreach($material->colors as $color){
                echo $color->id . ' | ' . $color->name . '<br>'; 
            }

            }
              
            echo '<hr>';
        }

    }

    /**
    * Método que devuelve todas las compras realizadas por un cliente.
    */
    public function actionOrders($id){
        Utils::isAdmin();

        $user = User::find($id);
        $orders = Order::where('user_id', '=', $id)->get();

        $include = 'app/views/admin/users/orders.php';
        $order_index_active = 'active';

        Response::render('admin/dashboard', [
            'include' => $include,
            'order_index_active' => $order_index_active,
            'user' => $user,
            'orders' => $orders
        ]);

    }


    public function actionList(){
        Utils::isAdmin();

        $customers = User::where('role_id', '2')->get();

        echo '{"data": '.$customers.'}';
    }


}
