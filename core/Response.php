<?php

class Response {

    private function __construct(){
        
    }


    // Con este método renderizaremos las vistas
    public static function render($view, $vars = []){

        foreach ($vars as $key => $value) {
            $$key = $value;
        }
    
        require_once(APP_PATH . 'views/' . $view . '.php');
    }

    // Éste será utilizado para redirigir
    public static function redirect($view){
        header('Location: ' . URL_PATH . $view);
    }

}