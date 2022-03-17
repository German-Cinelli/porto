<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\ProductType;
use app\models\Attribute;
use app\models\AttributeValue;
use app\models\ProductTypeAttributeValue;

//use app\models\Inbox;


class MasterproductController {

    public function actionIndex(){

        Utils::isAdmin();

        $product_type = ProductType::with('Attribute')->get()->groupBy('attribute_id');

        $include = 'app/views/admin/products/master_product/attribute_value.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            'master_product_menu_active' => 'active menu_open',
            'attribute_value_index_active' => 'active',
            'attribute_values' => $attribute_values
        ]);
    }


    public function actionAttribute_value(){

        Utils::isAdmin();

        $attribute_values = AttributeValue::with('Attribute')->get()->groupBy('attribute_id');

        //dd($attribute_values);

        $include = 'app/views/admin/products/master_product/attribute_value.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            'master_product_menu_active' => 'active menu_open',
            'attribute_value_index_active' => 'active',
            'attribute_values' => $attribute_values
        ]);

    }


    /**
     * Obtener todos los valores
     */
    public function actionGetValues_all(){
        Utils::isAdmin();

        $attribute_values = AttributeValue::all();

        if($attribute_values){

            die($attribute_values);
        } else {

            die('error');
        }

    }


    /**
     * Obtener todos los valores a partir de un product_type_id
     */
    public function actionGetValues(){
        Utils::isAdmin();

        if(isset($_POST)){
            $product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : false;

            if($product_type_id){

                $product_type_attribute_values = ProductTypeAttributeValue::where('product_type_id', $product_type_id)->with('attribute_value')->get();

                if($product_type_attribute_values){

                    die($product_type_attribute_values);
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


    /**
     * Método para crear un product_type
     */
    public function actionCreate_product_type(){

        Utils::isAdmin();

        if(isset($_POST)){

            $name = isset($_POST['name']) ? $_POST['name'] : false;

            if($name){

                $product_type = new ProductType();

                $product_type->name = $name;
                $product_type->description = $name;
    
                $save = $product_type->save();
 
                if($save){
                    
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


    public function actionAttribute_value_list(){

        Utils::isAdmin();


        $attribute_values = AttributeValue::with('Attribute')->get()->groupBy('attribute_id');
        dd($attribute_values);
        //$products = Product::with('Category')->where('is_deleted', '=', '1')->get();

        echo '{"data": '.$attribute_values.'}';
    }


    /**
     * Método para eliminar una row en la table product_type_attribute_value
     */
    public function actionDelete_prodct_type_attribute_value(){

        Utils::isAdmin();

        $product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : false;
        $attribute_value_id = isset($_POST['attribute_value_id']) ? $_POST['attribute_value_id'] : false;

        if($product_type_id && $attribute_value_id){
            $product_type_attribute_value = ProductTypeAttributeValue::where('product_type_id', $product_type_id)->where('attribute_value_id', $attribute_value_id)->first();

            if($product_type_attribute_value){
                $deleted = $product_type_attribute_value->delete();

                if($deleted){

                    die('deleted');
                    
                } else {
    
                    die('error');
                }

            } else {
                die('error');
            }

        } else {

            die('error');
        }

        die('error');
    }


    /**
     * Método para crear un product_type_attribute_value
     */
    /**
     * Método para crear un product_type
     */
    public function actionCreate_product_type_attribute_value(){

        Utils::isAdmin();

        if(isset($_POST)){

            $product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : false;
            $attribute_value_id = isset($_POST['attribute_value_id']) ? $_POST['attribute_value_id'] : false;

            if($product_type_id && $attribute_value_id){

                // Antes de crear un nuevo registro comprobamos existencia
                $p = ProductTypeAttributeValue::where('product_type_id', $product_type_id)->where('attribute_value_id', $attribute_value_id)->first();

                if($p){

                    die('exists');
                } else {

                    $product_type_attribute_value = new ProductTypeAttributeValue();

                    $product_type_attribute_value->product_type_id = $product_type_id;
                    $product_type_attribute_value->attribute_value_id = $attribute_value_id;
        
                    $save = $product_type_attribute_value->save();
    
                    if($save){
                        
                        die('saved');
                    } else {

                        die('error');
                    }

                }
 
            } else {

                die('error');
            }
        } else {
            
            die('error');
        }

    }


    /**
     * Método para crear un attributte_value
     */
    public function actionCreate_attribute_value(){

        Utils::isAdmin();

        if(isset($_POST)){

            $attribute_id = isset($_POST['attribute_id']) ? $_POST['attribute_id'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;

            if($attribute_id && $name){

                $attr = AttributeValue::where('attribute_id', $attribute_id)->where('name', $name)->first();

                if($attr){

                    die('exists');
                } else {

                    $tag = Attribute::find($attribute_id)->description;

                    $attribute_value = new AttributeValue();

                    $attribute_value->attribute_id = $attribute_id;
                    $attribute_value->name = $name;
                    $attribute_value->tag = $name . $tag;
                    
        
                    $save = $attribute_value->save();
    
                    if($save){
                        
                        die('saved');
                    } else {

                        die('error');
                    }

                }
 
            } else {

                die('error');
            }
        } else {
            
            die('error');
        }

    }



    /*public function actionCreate(){

        Utils::isAdmin();

        $include = 'app/views/admin/providers/create.php';

        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open',
            'provider_create_active' => 'active',
            'providers' => $providers
        ]);
       
    }*/


    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){

            $business_name = isset($_POST['business_name']) ? $_POST['business_name'] : false;
            $rut = isset($_POST['rut']) ? $_POST['rut'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;


            if($business_name && $rut && $city && $location && $address && $phone){

                $provider = new Provider();

                $provider->business_name = $business_name;
                $provider->rut = $rut;
                $provider->city = $city;
                $provider->location = $location;
                $provider->address = $address;
                $provider->phone = $phone;

                if($image){
                    // Subir imagen principal
                    $image_name = $_FILES['file']['name'];
                    $image_type = $_FILES['file']['type'];

                    $random_str = Utils::random_str(8);
                    $image_name_final = '/assets/uploads/providers/' . $random_str . '-' . $image_name;
                        
                    if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                        move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                    } else {
                        die('error');
                    }

                    $provider->image = $image_name_final;
                }

                $save_provider = $provider->save();
 
                if($save_provider){
                    
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



    public function actionShow($id){

        Utils::isAdmin();
        $provider = Provider::find($id);
        $invoices = Invoice::where('provider_id', '=', $id)->get(); // Compras realizadas al proveedor

        $include = 'app/views/admin/providers/show.php';

        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open',
            'provider' => $provider,
            'invoices' => $invoices
        ]);
    }


    public function actionEdit(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $provider = Provider::find($id);


            if($provider){
                die($provider);

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
            $business_name = isset($_POST['business_name']) ? $_POST['business_name'] : false;
            $rut = isset($_POST['rut']) ? $_POST['rut'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;
            

            if($id && $business_name && $rut && $city && $location && $address && $phone){
                $provider = Provider::find($id);
                $provider->business_name =  $business_name;
                $provider->rut = $rut;
                $provider->city = $city;
                $provider->location = $location;
                $provider->address = $address;
                $provider->phone = $phone;

                if($image){
                    // Subir imagen principal
                    $image_name = $_FILES['file']['name'];
                    $image_type = $_FILES['file']['type'];

                    $random_str = Utils::random_str(8);
                    $image_name_final = '/assets/uploads/providers/' . $random_str . '-' . $image_name;
                        
                    if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                        move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                    } else {
                        die('error');
                    }

                    $provider->image = $image_name_final;
                }

                
                $update = $provider->update();


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

        $providers = Provider::all();

        echo '{"data": '.$providers.'}';
    }


}
