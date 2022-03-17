<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\Provider;
use app\models\Invoice;

//use app\models\Inbox;


class ProviderController {


    
    public function actionIndex(){

        Utils::isAdmin();

        $include = 'app/views/admin/providers/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open',
            'provider_index_active' => 'active'
        ]);
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
