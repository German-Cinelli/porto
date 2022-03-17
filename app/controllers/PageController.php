<?php

namespace app\controllers;

use \Response;
use \Redelocker;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\User;
use app\models\Product;
use app\models\Category;
use app\models\Subcategory;
use app\models\FeaturedProduct;
use app\models\Post;
use app\models\Combo;


class PageController {

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
    public function actionCurl(){

        $locations = false;

        $redelocker = new Redelocker();
        
        $data = $redelocker->login();
        
        if($data){
            // Obtener token
            $token = $redelocker->get_token($data);
            // Obtener ubicaciones
            $locations = $redelocker->locations($token);

            dd($locations);
            
        }

    }

    /*public function actionLocations(){
        
        $post = [
            'email' => 'vdc@redelockerdev.com',
            'password' => 'vDcRedeLockerDes25'
        ];
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://release.redelocker.com/v1/api/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        dd($response);
        var_export($response);

    }*/

=======
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363

    public static function actionIndex(){
        $include = 'app/views/web/home.php';

        //dd($_SESSION['cart']);

        $quantity = 12;
        $count_products = Product::where('is_deleted', NULL)->count();
        if ($count_products < $quantity) {
            $quantity = $count_products;
        }

        $products = Product::where('is_deleted', NULL)->get()->random($quantity); // Trae 8 productos random

        $new_products = Product::where('is_deleted', null)->orderBy('id', 'DESC')->take($quantity)->get(); // Uĺtimos {{ $qty }} productos

        $most_selling_products = DB::select("SELECT products.*, 
            categories.name AS category_name, 
            SUM(quantity) AS TotalQuantity 
            FROM items

            INNER JOIN products ON products.id = items.product_id
            INNER JOIN categories ON products.category_id = categories.id
            WHERE is_deleted IS NULL
            GROUP BY product_id
            ORDER BY SUM(quantity) DESC
            LIMIT 12
        ");

        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        $combos = Combo::where('status', 1)->get();

        $blog = Post::latest()->first();
      
        Response::render('index', [
            'include' => $include,
            'title' => 'Inicio',
            'home_menu_select' => 'active',
            'products' => $products,
            'new_products' => $new_products,
            'posts' => $posts,
            'combos' => $combos,
            'most_selling_products' => $most_selling_products,
            'blog' => $blog
        ]);
    }

    public function actionContact(){
        
        $include = 'app/views/web/pages/contact.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Contacto',
            'contact_menu_select' => 'active'
        ]);
    }

    public function actionPreguntas_frecuentes(){
        $include = 'app/views/web/pages/faq.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Preguntas frecuentes'
        ]);
    }


    /*public function actionAbout(){
        $include = 'app/views/web/pages/about.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Sobre nosotros'
        ]);
    }*/

    /*public function actionRedelocker(){
        $include = 'app/views/web/pages/redelocker.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Redelocker'
        ]);
    }*/

    /*public function actionTerms(){
        $include = 'app/views/web/pages/terms.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Términos y condiciones'
        ]);
    }*/

    /*public function actionPoliticas_de_garantia(){
        $include = 'app/views/web/pages/warranty_polices.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Polticas de garantía'
        ]);
    }*/
    

}
