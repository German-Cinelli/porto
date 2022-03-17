<?php

namespace app\controllers;

use app\helpers\Utils;

use \Response;
use \Attempts;
use \Mailing;

use app\models\User;
use app\models\Inbox;
use app\models\PasswordReset;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Carbon\Carbon;


class AuthController {

    public function __construct(){

    }


    public function actionIndex(){

        Utils::isLogged_redirect(); // Método que redirige al inicio si está logeado.

        $include = 'app/views/auth/login.php';

        Response::render('index', [
            'include' => $include,
            'title' => 'Iniciar sesión'
        ]);

    }


    public function actionRegistrarse(){

        Utils::isLogged_redirect(); // Método que redirige al inicio si está logeado.

        $include = 'app/views/auth/register.php';

        Response::render('index', [
            'include' => $include,
            'title' => 'Registrarse'
        ]);

    }


    /**
     * Método para registro de clientes desde la web
     */
    public function actionRegister(){

        Utils::isLogged_redirect(); // Método que redirige al inicio si está logeado.

        if(isset($_POST)){

            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : false;
            //$lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : false;
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : false;
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : false;

            if($name && $email && $password){

                /* Verificamos si ya existe un usuario con su correo verificado */
                $user = User::where('email', '=', $email)->where('confirmed', '=', '1')->get();

                if(!$user->isEmpty()){
                    //die('existe');
                    die('1'); // Already exists
                } else {

                    $user = new User();

                    $user->role_id = 2;
                    $user->name = $name;
                    //$user->lastname = $lastname;
                    $user->email = $email;
                    $user->password = password_hash($password, PASSWORD_DEFAULT);
                    $user->confirmation_code = Utils::random_str(55);

                    $save = $user->save();

                    if($save){

                        /* sendMail recibe 3 parámetros:
                        * 1- A quien va dirigido
                        * 2- El asunto
                        * 3- El cuerpo del mensaje
                        **/
                        $link = URL_PATH . '/auth/verify/' . $user->confirmation_code;

                        $mailEmail = $email;
                        $mailSubject = 'Bienvenido a Sevenparts';
                        $mailBody = "Buenos días! Para comenzar a comprar es necesario que <a href='$link'>verifiques tu cuenta</a de correo electrónico.";

                        $sendMail = Mailing::sendMail($mailEmail, $mailSubject, $mailBody);

                        if($sendMail == 'sent'){
                            die('2');
                        } else {
                            die('error');
                        }

                        die('2');
                    } else {

                        die('3'); // Error to insert
                    }
                }



            } else {
                die('4'); // Missing from data

            }
        } else {

            die('4');
        }

    }


    /**
     * Método para iniciar sesión
     */
    public function actionLogin(){

        Utils::isLogged_redirect(); // Método que redirige al inicio si está logeado.

        /* Comprobamos si existe SESSION, caso contrario la creamos */
        Attempts::issetSession();

        /* Verificamos si sobrepasó los 4 intentos
        *  Registramos un nuevo hit cada vez que
        *  las credenciales de acceso sean incorrectas.
        * */
        $count = Attempts::count();
        if($count){
            $cookie = Attempts::issetCookie();
            if($cookie){

                die('limit_exceeded');

            } else {
                Attempts::issetSession();
                Attempts::reset();
            }

        }

        //die();

        if(isset($_POST)){

            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : false;
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : false;


            if($email && $password){

                $user = User::where('email', $email)->get();

                if ($user->isEmpty()){
                    Attempts::hit();
                    die('err');
                } else {

                    /* Comprobamos si ya confirmó su dirección de correo */
                    if($user[0]->confirmed == 1){
                        $password_verify = password_verify ($password,  $user[0]->password);
                    } else {
                        Attempts::hit();
                        die('not_confirmed');
                    }

                }

                if($password_verify){
                    $auth = $user[0];

                    $_SESSION['login'] = $auth;

                    /* Comprobamos si el usuario que intenta ingresar es de tipo admin o cliente
                    * En caso de ser admin creamos una propiedad 'admin' seteandola como TRUE
                    * Ésto para permitir luego el acceso o no al panel administrativo (dashboard) en:
                    * dominio.com/admin
                    */
                    if($auth->role_id == 1){
                        $_SESSION['login']['admin'] = true;
                        die('/admin');
                    } else {
                        die('/');
                    }

                } else {
                    Attempts::hit();
                    die('err');
                }

            } else {
                die('err');
            }


        } else {
            die('err');
        }

    }


    /**
     * Método para cerrar la sesión de usuario
     */
    public function actionLogout(){

        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }

        Response::redirect('/');
    }


    /**
     * Método de confirmación de email
     */
    public function actionVerify($code = null){

        $user = User::where('confirmation_code', '=', $code)->where('confirmed', '=', NULL)->first();
        //dd($user);

        if(!$user){
            Response::redirect('/');
        } else {

            $u = User::find($user->id);
            $u->confirmed = 1;
            $u->confirmation_code = NULL;
            $update = $u->update();

            //dd($update);
            $verified_user = false;
            if($update){
                $verified_user = true;
            }

            Response::render('index', [
                'include' => 'app/views/pages/home.php',
                'title' => 'Inicio',
                'home_menu_select' => 'menu__link--select',
                'verified_user' => $verified_user
            ]);

        }



    }


    /* Método que genera un registro en password_resets
    *  Almacenando el email y el token
    **/
    public function actionPassword($login){

        $user = User::where('email', '=', $login)->where('confirmed', '=', '1')->get();

        if($user->isEmpty()){
            die('error');
        } else {
            /* Verificamos previamente que no haya una solicitud de cambio de pw */
            $pw_reset = PasswordReset::where('email', '=', $user[0]->email)->get();

            if(!$pw_reset->isEmpty()){
                die('error');
            } else {
                $token = Utils::random_str(85);
                $password_reset = new PasswordReset();
                $password_reset->email = $login;
                $password_reset->token = $token;
                $save = $password_reset->save();

                if($save){
                    // Link ->
                    $link = URL_PATH . '/auth/password_reset/' . $token;

                    $mailEmail = $login;
                    $mailSubject = 'Sevenparts - Cambio de clave';
                    $mailBody = "Recibimos una solicitud de cambio de contraseña en nuestro sitio web. Recuerde que su solicitud expirará en 20 minutos, transcurrido el tiempo límite deberá realizar otra. <br> Haga <a href='$link'>clic aquí</a> para cambiar su contraseña.";

                    $sendMail = Mailing::sendMail($mailEmail, $mailSubject, $mailBody);

                    if($sendMail == 'sent'){
                        die('ok');
                    } else {
                        die('error');
                    }

                } else {

                    die('error');
                }
            }

        }

    }


    /*
    *  Formulario para cambiar password
    **/
    public function actionPassword_reset($token = null){
        $password_reset = PasswordReset::where('token', '=', $token)->first();

        if(!isset($password_reset)){
            Response::redirect('/');
        } else {

            $now = new Carbon(); // Obtenemos la fecha y hora actual
            //d('current date: ' . $now);
            //d('token date: ' . $password_reset->created_at);
            //d('seconds difference: ' . $now->diffInSeconds($password_reset->created_at));
            //die();
            /*
             * Comparamos los segundos de diferencia que hay entre la fecha actual y la del token generado
             * Si supera los 1200 (20 minutos) mandamos mensaje de error
             */
            if($now->diffInSeconds($password_reset->created_at) > 1200){

                $delete = $password_reset->delete();

                if($delete){

                    Response::render('index', [
                        'include' => 'app/views/pages/home.php',
                        'title' => 'Inicio',
                        'home_menu_select' => 'menu__link--select',
                        'token_expired' => true
                    ]);

                } else {

                    die('error');
                }


            } else {

                $include = 'app/views/auth/password_reset.php';
                $email = $password_reset->email;
                $token = $password_reset->token;

                Response::render('index', [
                    'include' => $include,
                    'title' => 'Recuperar contraseña',
                    'home_menu_select' => 'menu__link--select',
                    'email' => $email,
                    'token' => $token
                ]);

            }

            die();



        }

    }


    /*
    *  Lógica para cambiar password
    **/
    public function actionPassword_recover(){

        if(isset($_POST)){

            $token = isset($_POST['token']) ? htmlspecialchars($_POST['token']) : false;
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : false;
            $password_confirm = isset($_POST['password_confirm']) ? htmlspecialchars($_POST['password_confirm']) : false;


            if($token && $password && $password_confirm){
                $password_reset = PasswordReset::where('token', '=', $token)->first();

                if(!$password_reset){
                    die('expired');
                } else {
                    if($password == $password_confirm){
                        $u = User::where('email', '=', $password_reset->email)->get();
                        $user = User::find($u[0]->id);
                        $user->password = password_hash($password, PASSWORD_DEFAULT);
                        $update = $user->update();
                        //print_r($update);

                        if($update){
                            /* Eliminamos el token, ya no será necesario tenerlo */
                            $delete = $password_reset->delete();

                            if($delete){
                                die('success');
                            } else {
                                die('error');
                            }
                        } else {
                            die('error');
                        }

                    }


                }


            } else {

                die('error');
            }

        } else {

            die('error');
        }
    }

}
