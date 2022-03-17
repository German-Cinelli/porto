<?php

namespace app\controllers;

use \Response;
use app\helpers\Utils;

use Rakit\Validation\Validator;

use app\models\User;


class MydataController {


    public function actionIndex(){
        //Comprobamos si existe variable de sesión, caso contrario lo redirige al index.

        /**
         * Quitar ésto luego
         * Lo dejo para que no cambien los datos del usuario tipo admin
         */
        //Response::redirect('/'); // Quitado

        Utils::issetSession();
        // Obtenemos el ID del usuario actualmente logeado.
        $id_user_session = Utils::getIdUserSession();
    
        $include = 'app/views/web/mydata/edit.php';
        $user = User::find($id_user_session);

        
        Response::render('index', [
            'include' => $include,
            'title' => 'Mis datos',
            'userdata_menu_select' => 'menu__link--select',
            'user' => $user
        ]);
    }


     public function actionUpdate(){
        Utils::issetSession();

        $validator = new Validator([
            'required' => ':attribute es requerido',
            'email' => ':email tidak valid',
        ]);

        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'lastname'                 => 'required',
            'city'                  => 'required',
            'location'              => 'required',
            'address'                  => 'required',
            'document'                  => 'required'
        ]);

        $validation->setAliases([
            'name' => 'El nombre',
            'lastname' => 'El apellido',
            'city' => 'El departamento',
            'location' => 'La localidad',
            'address' => 'La dirección',
            'document' => 'El documento'
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            
            $errors = $validation->errors();
            $messages = $errors->firstOfAll('<li>:message</li>');
           
            die(json_encode($messages));
            
        } else {

            if(isset($_POST)){
                $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
                $lastname = isset($_POST['lastname']) ?  htmlspecialchars($_POST['lastname']) : null;
                $city = isset($_POST['city']) ?  htmlspecialchars($_POST['city']) : null;
                $location = isset($_POST['location']) ?  htmlspecialchars($_POST['location']) : null;
                $address = isset($_POST['address']) ?  htmlspecialchars($_POST['address']) : null;
                $document = isset($_POST['document']) ?  htmlspecialchars($_POST['document']) : null;
                $phone = isset($_POST['phone']) ?  htmlspecialchars($_POST['phone']) : null;
                $cellphone = isset($_POST['cellphone']) ?  htmlspecialchars($_POST['cellphone']) : null;
                $business_name = isset($_POST['business_name']) ?  htmlspecialchars($_POST['business_name']) : null;
                $rut = isset($_POST['rut']) ?  htmlspecialchars($_POST['rut']) : null;
               
                if($name && $lastname && $city && $location && $address && $document){
                    $id_user_session = Utils::getIdUserSession();
                    $user = User::find($id_user_session);
                    $user->name = $name;
                    $user->lastname = $lastname;
                    $user->city = $city;
                    $user->location = $location;
                    $user->address = $address;
                    $user->document = $document;
                    $user->phone = $phone;
                    $user->cellphone = $cellphone;
                    $user->business_name = $business_name;
                    $user->rut = $rut;
    
                    //dd($user);
    
                    $update = $user->update();
    
                    // Debemos actualizar la variable de sesión para poder acceder a los datos que ingresó el usuario.
                    $data = User::find($id_user_session);
                    $_SESSION['login'] = $data;
    
                    /* Accedemos a los datos ingresados para actualizar los inputs con los nuevos valores */
                    $user = User::find($id_user_session);
    
                    if($update){
                        //die($user);
                        die('{"user": '.$user.'}');
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


     public function actionChange_password(){
        Utils::issetSession();
        // Obtenemos el ID del usuario actualmente logeado.
        $id_user_session = Utils::getIdUserSession();
    
        $include = 'app/views/web/mydata/change-password.php';
        $user = User::find($id_user_session);

        
        Response::render('index', [
            'include' => $include,
            'title' => 'Mis datos',
            'userdata_menu_select' => 'menu__link--select',
            'user' => $user
        ]);
     }


     public function actionUpdate_password(){
        Utils::issetSession();

        if(isset($_POST)){
            $current_password = isset($_POST['current_password']) ? htmlspecialchars($_POST['current_password']) : false;
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : false;
            $password_confirm = isset($_POST['password_confirm']) ? htmlspecialchars($_POST['password_confirm']) : false;
           
           
            if($current_password && $password && $password_confirm){
                if($password == $password_confirm){
                    $id_user_session = Utils::getIdUserSession();
                    $user = User::find($id_user_session);
                    $password_verify = password_verify ($current_password,  $user->password);
                
                    if($password_verify){
                        $user->password = password_hash($password, PASSWORD_DEFAULT);
                        $user->update();
                        // Actualizar los datos de session
                        $data = User::find($id_user_session);
                        $_SESSION['login'] = $data;

                        die('updated');
                       
                    } else {
                        die('error');
                        //echo 'La contraseña actual no coincide';
                        //dd($password_verify);
                    }
                } else {
                    die('error');
                    /*echo 'La confirmacion de contraseña debe ser igual a la ingresada' . '<hr>';
                    echo 'Password:';
                    d($password);
                    echo 'Password confirm:';
                    dd($password_confirm);*/
                }
               
            } else {
                die('error');
                //echo 'ERROR: faltan algunos datos' . '<br>';
                //dd($_POST);
            }
        } else {
            die('error');
            //echo 'No existe POST';
            //var_dump($_POST);
        }
     }

}
