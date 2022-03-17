<?php

namespace app\controllers;

use \Response;
use app\helpers\Utils;


use app\models\User;
use app\models\Newsletter;

class NewsletterController {


    /**
     * Nueva suscripcion
     */
    public function actionIndex(){

        if(isset($_POST)){

            $email = isset($_POST['email']) ? $_POST['email'] : false;

            if($email){

                $newsletter = new Newsletter();
                $newsletter->email = $email;
                $save = $newsletter->save();

                if($save){

                    die('success');
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
     * Remover suscripcion
     */
    /*public function actionRemove(){
        

    }*/


}