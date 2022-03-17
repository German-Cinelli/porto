<?php

namespace app\controllers\admin;

use app\models\Config;
use app\models\ShippingCost;
use app\helpers\Utils;
use \Response;


class ConfigController {


    public function actionIndex(){
        Utils::isAdmin();

        $config = Config::first();
        //dd($data);
        $include = 'app/views/admin/config/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'settings_menu_active' => 'active menu_open',
            'config_index_active' => 'active',
            'config' => $config
        ]);
        
    }


    public function actionGetConfig(){
        Utils::isAdmin();
        
        $config = Config::first();
        
        die($config);
    }


    public function actionUpdate(){
        Utils::isAdmin();

        if(isset($_POST)){
            
            $company_name = isset($_POST['company_name']) ? $_POST['company_name'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
            $cellphone = isset($_POST['cellphone']) ? $_POST['cellphone'] : false;
            $currency = isset($_POST['currency']) ? $_POST['currency'] : false;
            $symbol = isset($_POST['symbol']) ? $_POST['symbol'] : false;
            $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : false;
            $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : false;

            if($company_name && $city && $location&& $address && $mail && $phone && $cellphone && $currency && $symbol && $facebook && $instagram){
                $config = Config::first();
                $config->company_name =  $company_name;
                $config->city = $city;
                $config->location = $location;
                $config->address = $address;
                $config->mail = $mail;
                $config->phone = $phone;
                $config->cellphone = $cellphone;
                $config->currency = $currency;
                $config->symbol = $symbol;
                $config->facebook = $facebook;
                $config->instagram = $instagram;

                $update = $config->update();

                if($update){
                    
                    die('updated');
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
     * Método para renderizar formulario de costo de envío
     */
    public function actionShippingcost(){
        Utils::isAdmin();

        $shippingcost = ShippingCost::find(1)->cost;
        //dd($shippingcost);

        $include = 'app/views/admin/config/shippingcost.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'settings_menu_active' => 'active menu_open',
            'shippingcost_index_active' => 'active',
            'shippingcost' => $shippingcost
        ]);

    }


    /**
     * Método para actualizar el costo de envío
     */
    public function actionUpdate_shippingcost(){
        Utils::isAdmin();

        $cost = isset($_POST['shippingcost']) ? $_POST['shippingcost'] : false;

        if($cost){
            $shippingcost = ShippingCost::find(1);
            $shippingcost->cost = $cost;
            $update = $shippingcost->update();

            if($update){

                die('updated');
            } else {

                die('error');
            }

        }


    }


    /**
     * Método para obtener el costo de envío
     */
    public function actionGet_shippingcost(){
        Utils::isAdmin();

        $shippingcost = ShippingCost::find(1);

        die($shippingcost);
    }


}