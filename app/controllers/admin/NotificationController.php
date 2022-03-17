<?php

namespace app\controllers\admin;

use app\models\Notification;
use app\helpers\Utils;
use \Response;


class NotificationController {


    /*public function actionIndex(){
        Utils::isAdmin();

        $notifications = Notification::all();
        dd($notifications);
        //$include = 'app/views/admin/notifications/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include
        ]);
        
    }*/

    /**
     * Eliminar una notificación
     */
    public function actionDestroy(){
        Utils::isAdmin();
        
        $id = isset($_POST['notification_id']) ? $_POST['notification_id'] : false;

        if($id){
            
            $notification = Notification::find($id);

            if($notification){
                $delete = $notification->delete();

                if($delete){

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

        
    }


}