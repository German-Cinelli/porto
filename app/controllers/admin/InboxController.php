<?php

namespace app\controllers\admin;

use \Response;
use \Mailing;
use app\helpers\Utils;

use app\models\Inbox;


class InboxController {

    
    public function actionIndex(){
        Utils::isAdmin();

        $include = 'app/views/admin/inbox/index.php';
        $inbox_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'inbox_index_active' => $inbox_index_active,
        ]);

    }


    public function actionReply($id){
        Utils::isAdmin();
        $inbox = Inbox::find($id);

        $include = 'app/views/admin/inbox/reply.php';
        $inbox_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'inbox_index_active' => $inbox_index_active,
            'inbox' => $inbox
        ]);
    }

    public function actionSend_reply(){
        Utils::isAdmin();

        $id = isset($_POST['inbox_id']) ? $_POST['inbox_id'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $message = isset($_POST['message']) ? $_POST['message'] : false;
        $reply = isset($_POST['reply']) ? $_POST['reply'] : false;
        

        if($id && $message && $email && $reply){

            $mailEmail = $email; // Lo enviamos a nuestro correo para pruebas
            //$mailEmail = $email; // Dejarlo asi <----
            $mailSubject = 'Paulina Shoes - Respuesta';
            $mailBody = '
            <h1><span style="font-family:arial,helvetica,sans-serif">Paulina Shoes</span></h1>
            <blockquote>En respuesta a...' . $message . '</blockquote>
            <h4>' . $reply . '</h4>
            <h6>' . URL_PATH . '</h6>
            ';
                        
            $sendMail = Mailing::sendMail($mailEmail, $mailSubject, $mailBody);

            if($sendMail == 'sent'){

                $inbox = Inbox::find($id);
                $inbox->status = 1;
                $update = $inbox->update();

                $messages = Utils::messages();

                if($update){

                    die('replied');
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
        
        $inboxes = Inbox::orderBy('created_at', 'DESC')->get();

        echo '{"data": '.$inboxes.'}';
    }

}