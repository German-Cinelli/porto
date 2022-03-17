<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\ShippingMethod;


class ShippingmethodController {
    
    public function actionIndex(){

        Utils::isAdmin();

        $include = 'app/views/admin/shippingmethod/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'settings_menu_active' => 'active menu_open',
            'shipping_index_active' => 'active'
        ]);
    }

    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $message = isset($_POST['message']) ? $_POST['message'] : false;
            $cost = isset($_POST['cost']) ? $_POST['cost'] : false;

            if($name && $description && $message && $cost){

                $shipping_method = new ShippingMethod();

                $shipping_method->name = $name;
                $shipping_method->description = $description;
                $shipping_method->message = $message;
                $shipping_method->cost = $cost;

                $save_shipping_method = $shipping_method->save();
 
                if($save_shipping_method){
                    
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


    public function actionEdit(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $shipping_method = ShippingMethod::find($id);


            if($shipping_method){
                die($shipping_method);

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        die('error');
    }


    
    public function actionUpdate(){
        Utils::isAdmin();

        if(isset($_POST)){
            //d($_POST);
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $message = isset($_POST['message']) ? $_POST['message'] : false;
            $cost = isset($_POST['cost']) ? $_POST['cost'] : 0;
            

            if($id  && $name && $description && $message){
                $shipping_method = ShippingMethod::find($id);
                $shipping_method->name = $name;
                $shipping_method->description =  $description;
                $shipping_method->message = $message;
                $shipping_method->cost = $cost;

                
                $update = $shipping_method->update();


                if($update){
                    
                    die($id);
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


    public function actionList(){
        Utils::isAdmin();

        $shipping_methods = ShippingMethod::withTrashed()->get();

        echo '{"data": '.$shipping_methods.'}';
    }


    public function actionRestore(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $shippingmethod = ShippingMethod::find($id);
            $shippingmethod->is_deleted = 0;
            $restored = $shippingmethod->update();

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


    public function actionDestroy(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $shippingmethod = ShippingMethod::find($id);
            $shippingmethod->is_deleted = 1;
            $deleted = $shippingmethod->update();

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


}
