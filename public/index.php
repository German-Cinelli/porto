<?php

// Definimos que todas las rutas van a ser relativas a la raiz del sitio
chdir(dirname(__DIR__));

// Constants
define('CORE_PATH', 'core/');
define('APP_PATH', 'app/');
define('URL_PATH', 'http://localhost/Projects/sevenparts');

/*define('APP', array(
    'COMPANY_NAME' => 'Nombre_Empresa',
    'CURRENCY' => 'USD',
    'MAIL' => 'contact@mail.com.uy',
    'CITY' => 'Montevideo',
    'LOCATION' => 'Centro',
    'ADDRESS' => 'Av. 18 de Julio 1337',
    'PHONE' => '2401 01 01',
    'CELLPHONE' => '598 99 099 099',
    'FACEBOOK' => 'https://www.facebook.com/',
    'INSTAGRAM' => 'https://www.instagram.com/'
));*/


require_once(CORE_PATH . 'Autoloader.php');

session_start();

$app = new App();
