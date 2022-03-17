<?php

class Attempts {


    public static function issetSession(){

        //print_r($_SESSION['failed_attempts_login']);

        if(!isset($_SESSION['failed_attempts_login'])){
            // Antes estaba así: $_SESSION['failed_attempts_login'];
            $_SESSION['failed_attempts_login'] = 0;
        } 

    }


    /* Register new hit */
    public static function hit(){
        $_SESSION['failed_attempts_login']++;
    }



    public static function count(){
        if($_SESSION['failed_attempts_login'] == 4){
            $cookie_name = 'failed_attempts';
            $cookie_value = 1;
            setcookie($cookie_name, $cookie_value, time() + (60), '/'); // 60 seconds
            return true;
        } else {
            return false;
        }
    }


    public static function reset(){

        $_SESSION['failed_attempts_login'] = 0;

    }

    
    public static function issetCookie(){

        if(isset($_COOKIE['failed_attempts'])){
            return true;
        } else {
            return false;
        }

    }

}