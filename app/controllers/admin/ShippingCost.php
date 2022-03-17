<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\ShippingCost;


class ShippingcostController {

    
    public function actionIndex(){
        Utils::isAdmin();
        
        $shippingcost = ShippingCost::find(1);

        $include = 'app/views/admin/shippingcost/edit.php';
        $shippingcost_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'shippingcost_index_active' => $shippingcost_index_active,
            // Aca enviamos el array traido de la DB
            'shippingcost' => $shippingcost
        ]);

    }


    public function actionUpdate(){
        Utils::isAdmin();
        
        if(isset($_POST)){
            $cost = isset($_POST['cost']) ? $_POST['cost'] : false;

            if($cost){
                $shippingcost = Shippingcost::find(1);
                $shippingcost->cost = $cost;

                $update = $shippingcost->update();

                if($update){

                    die($cost);
                }

                die('error');

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        
    }


}