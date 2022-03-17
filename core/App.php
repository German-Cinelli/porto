<?php

require_once('app/controllers/PageController.php');

class App {

    protected $folder = '';
    protected $folder_backslash = '';

    protected $controller = "app\\controllers\\" . 'PageController';

    protected $method = 'actionIndex';
    protected $params = [];

    public function __construct(){

        // Verificamos si existe $_GET['url']
        $url = $this->parseUrl();

        if($url != null){
            if($url[0] == 'admin'){
                $this->folder = $url[0] . '/';
                $this->folder_backslash = $url[0] . '\\';
                unset($url[0]);
                // Con la siguiente functiono re-reordenamos, luego de quitar el indice [0] => 'admin' con unset...
                // nos queda: [1] => 'Controlador', [2] => 'Método' y [3] => 'Parámetros'
                // Necesitamos re-ordenar el array comenzando en el indice 0
                $reindexed_url = array_values($url);
                $url = $reindexed_url;
    
                $this->controller = "app\\controllers\\admin\\AdminController.php";
    
            }
        }

        



        /*if(!count($url) > 0){
            require_once(APP_PATH . 'controllers/' . $this->folder . 'AdminController.php');

            $this->controller = new $this->controller;
            die();
            App::redirect();
        } */

        /**
        * Obtenemos el nombre del controlador
        * Convirtimos el primer caracter a mayuścula
        * Ya que por convencion es: Ej-> UserController, ProductController, etc
        */

        $controllerName = ($url != NULL) ? ucfirst(strtolower($url[0])) . 'Controller' : 'AdminController';


        // Validamos si el Controlador realmente existe en los archivos
        if(FILE_EXISTS(APP_PATH . 'controllers/' . $this->folder . $controllerName . '.php')){

            $this->controller = "app\\controllers\\" . $this->folder_backslash . $controllerName;

            unset($url[0]);

            // Requerimos de forma dinámica ese controlador que acabamos de obtener

            require_once(APP_PATH . 'controllers/' . $this->folder . $controllerName . '.php');


            // Instanciamos el controlador
            $this->controller = new $this->controller;

            /**
            * Comprobamos si está definida la siguiente
            * parte de la url, es decir el método
            */
            if(isset($url[1])){
                // Le concatenamos 'action' ya que todos los métodos de un controlador tiene ese prefijo.
                // Además de convertir la primera letra a mayuscula con ucfirst
                $methodName = 'action' . ucfirst(strtolower($url[1]));

                // Verificamos si el método dentro de la clase existe
                if(METHOD_EXISTS($this->controller, $methodName)){
                    // En caso que exista el método lo seteamos en la variable que ya tenemos definida
                    $this->method = $methodName;
                    unset($url[1]);
                }
            } else {
                //

            }


            /**
            * Obtenemos los parámetros de la URL
            *
            */
            // Validamos si la URL todavía existe
            // Si la URL tiene valores los agregamos a un array de valores
            // De lo contrario quedará vacío, ya que la propiedad params
            // fue seteada como un array vacío desde el principio
            $this->params = $url ? array_values($url) : $this->params;


            // Llamamos al método en el controlador
            // Lo ejecutamos y le mandamos los parametros que obtuvimos
            CALL_USER_FUNC_ARRAY([$this->controller, $this->method], $this->params);

        } else {
            App::redirect();
        }

    }

    public function parseUrl(){
        if(isset($_GET['url'])){

            //Filtramos la URL quitandole los caracteres especiales
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            // En caso que no exista $_GET['url] por defecto ya definimos las propiedades
            // El controlador y método a llamar será HomeController@actionIndex
            App::redirect();
        }
    }

    public function redirect(){
        CALL_USER_FUNC_ARRAY([$this->controller, $this->method], $this->params);
    }

}
