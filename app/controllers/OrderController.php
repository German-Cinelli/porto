<?php

namespace app\controllers;

use \Response;
use app\helpers\Utils;


use app\models\User;
use app\models\Order;
use app\models\Item;

class OrderController {


    public function actionIndex(){
        
        Utils::issetSession();

        $id_user_session = Utils::getIdUserSession();

        $orders = Order::where('user_id', '=', $id_user_session)->orderBy('created_at', 'DESC')->get();
        
        $include = 'app/views/web/order/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Carrito',
            'userdata_menu_select' => 'menu__link--select',
            'orders' => $orders,
        ]);

    }

}