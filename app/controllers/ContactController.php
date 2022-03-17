<?php

namespace app\controllers;

use \Response;
use \Mailing;

use app\models\Inbox;

class ContactController {

    public function actionIndex(){
        
        Response::render('contact');
    }

    public function actionSendMail(){

        if(isset($_POST)){
            //die('sent');
            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : false;
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : false;
            $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : false;
            $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : false;

            
            if($name && $email && $phone && $message){

                /* sendMail recibe 3 parámetros:
                    * 1- A quien va dirigido
                    * 2- El asunto
                    * 3- El cuerpo del mensaje
                 */
                $mailEmail = 'ger.cs28@gmail.com';
                $mailSubject = 'SevenParts - Respuesta';
                $mailBody = 'De: <b>' . $name . '</b> <br> Correo: ' . $email . ' <br> Teléfono: ' . $phone . ' <br> ' . 'Mensaje: ' . $message;
                
                $sendMail = Mailing::sendMail($mailEmail, $mailSubject, $mailBody);

                if($sendMail == 'sent'){
                    $inbox = new Inbox();

                    $inbox->name = $name;
                    $inbox->email = $email;
                    $inbox->phone = $phone;
                    $inbox->message = $message;
                    $inbox->status = 0;

                    $save = $inbox->save();

                    if($save){
                        die('sent');
                    } else {
                        die('error');
                    }

                } else {
                    die('error');
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