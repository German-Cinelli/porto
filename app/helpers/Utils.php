<?php

namespace app\helpers;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Pagination\Paginator;

use NumberToWords\NumberToWords;
use app\models\Inbox;
use app\models\Notification;
use app\models\Category;
use app\models\Config;
use app\models\ShippingCost;
use app\models\Product;
use app\models\Favorite;
use app\models\Plan;
use app\models\PostUser;
use app\models\ProductUser;
use app\models\Review;
use app\models\FeaturedProduct;
use app\models\User;
use app\models\Order;
use app\models\ComboCustomer;
use \Response;
use Carbon\Carbon;


class Utils {

    /* Método que devuelve la configuración del sitio */
    public static function getConfig(){
        $app = Config::first();

        //dd($app);
        
        $config = array(
            'COMPANY_NAME' => $app->company_name,
            'MAIL' => $app->mail,
            'CITY' => $app->city,
            'LOCATION' => $app->location,
            'ADDRESS' => $app->address,
            'PHONE' => $app->phone,
            'CELLPHONE' => $app->cellphone,
            'CURRENCY' => $app->currency,
            'SYMBOL' => $app->symbol,
            'FACEBOOK' => $app->facebook,
            'INSTAGRAM' => $app->instagram
        );

        //dd($config);
        return $config;
    }

    /* Método que devuelve si un usuario es de tipo admin */
    public static function isAdmin(){
        if(isset($_SESSION['login']) && $_SESSION['login']['admin'] == true){
            return true;
        } else {
            
            Response::redirect('/');
        }
    }

    /* Método que devuelve si un usuario es de tipo admin sin redirigir */
    public static function roleAdmin(){
        if(isset($_SESSION['login']) && $_SESSION['login']['admin'] == true){
            return true;
        } else {
            
            return 0;
        }
    }


    /* Método que devuelve si un usuario es de tipo admin */
    public static function isEmployee(){
        if(isset($_SESSION['login']) && $_SESSION['login']['employee'] == true){
            return true;
        } else {
            
            Response::redirect('/');
        }
    }


    /* Método que redirecciona si no existe actualmente un usuario logeado */
    public static function issetSession(){
        if(isset($_SESSION['login'])){
            return true;
        } else {
            Response::redirect('/');
        }
    }

    /* Método que devuelve si el usuario está o no logeado */
    public static function isLogged(){
        if(isset($_SESSION['login'])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método donde si está logeado redirige al index
     */
    public function isLogged_redirect(){
        if(isset($_SESSION['login'])){
            Response::redirect('/');
        }
    }

    // Método que devuelve el ID del usuario actualmente logeado
    public static function getIdUserSession(){
        if(isset($_SESSION['login'])){
            $id_user_session = $_SESSION['login']->id;
            return $id_user_session;
        } else {
            Response::redirect('/');
        }
    }

    public static function calculatePrice($price, $offer){
        // Regla básica de 3
        // Almacenamos en una vareiable descuento para luego restarlo al precio original
        // y asi retornar el precio con el descuento incluido
        $discount = ($price * $offer) / 100;
        // Con ceil redondeamos hacia arriba en caso de que nos diera un numero que no sea entero
        // Generaría error al insertar ya que el campo en la DB es te tipo INT
        // Incluso creo seria mejor tener el campo como float y a la hora de mostrar el precio, en caso
        // de no ser un entero mostrar el primer digito luego de la coma, con la funcion round();
        ceil($price_final = $price - $discount);

        return $price_final;
    }


    /* Generate random string */
    public static function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public static function cart_calculate_sub_total(){
        if(isset($_SESSION['cart'])){
            $sub_total = 0;
            foreach($_SESSION['cart'] as $index => $item){
                $sub_total += ($item['product']->price_final * $item['quantity']);
            }

            return $sub_total;
        }
    }

    public static function cart_discount(){
        if(isset($_SESSION['cart'])){
            $discount = 0;
            foreach($_SESSION['cart'] as $index => $item){
                $discount += $item['product']->price_final - $item['product']->price;
            }

            return $discount;
        }
    }


    /**
     * Las 2 formas de calcular el total son correctas.
     */
    public static function cart_total($sub_total, $shipping_cost){
        
        /* 1era forma */
        $t = ($sub_total + $shipping_cost);
        return $t;


        /* 2da forma */
        /*if(isset($_SESSION['cart'])){
            $total = 0;
            foreach($_SESSION['cart'] as $index => $item){
                $total += ($item['product']->price_final * $item['quantity']);
            }

            $total += $shipping_cost;

            return $total;
        }*/
    }


    /* Retorna los mensajes pendientes */
    public static function messages(){

        $messages = Inbox::where('status', '=', 0)->get();
        
        return $messages;
    }


    /* Retorna los notificationes */
    public static function notifications(){

        $notifications = Notification::orderBy('id', 'DESC')->get();
        
        return $notifications;
    }


    /* Retorna los productos con alerta de stock */
    public static function stockAlert(){
        //$products = Product::where('stock', '<', 'stock_alert')->get();

        $products = DB::select("SELECT *
            FROM products
            WHERE stock <= stock_alert;
        ");

        dd($products);
        $expenses_this_month = $expenses_this_month[0]->TotalAmount;

        return $products;
    }


    /* Convertir numero a string */
    public static function number_to_words($price){
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('es')->toWords($price);
        
        return $numberTransformer;
    }


    public static function limitTextWords($string, $number){
        if(strlen($string) > $number){
            $string = substr_replace($string, "...", $number);
        }
        
        return $string;
    }

    /* Método que devuelve el precio de un producto formateado
     * Añadiéndole puntos y comas.
     *
     * */
    public static function moneyFormat($price){
        $money = money_format("%!n", $price);
        
        return $money;
    }


    public static function getCategories(){
        $categories = Category::orderBy('name', 'ASC')->get();
        return $categories;
    }


    function getCategories_menu() {
        $ref   = [];
        $items = [];

        foreach($categories as $data){
            $thisRef = &$ref[$data->id];

            $thisRef['parent'] = $data->parent_id;
            $thisRef['label'] = $data->name;
            $thisRef['link'] = $data->slug;
            $thisRef['id'] = $data->id;

            if($data->parent_id == 0) {
                    $items[$data->id] = &$thisRef;
                    //var_dump($items);
            } else {
                    $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
            }

            //d($items);

        }

        function getMenu($items, $class = 'dd-list') {
        
            $html = "<ol class=\"".$class."\" id=\"menu-id\">";
        
            foreach($items as $key => $value){
                //dd($items);
                $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label'].'</span>
                            <span class="span-right">/<span id="link_show'.$value['id'].'">'.$value['link'].'</span> &nbsp;&nbsp;
                                <a class="edit-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil text-yellow"></i></a>
                                <a class="delete-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'"><i class="fa fa-trash text-red"></i></a></span>
                        </div>';
                if(array_key_exists('child',$value)) {
                    $html .= getMenu($value['child'],'child');
                }
    
                $html .= "</li>";
            }
    
            $html .= "</ol>";
        
            return $html;
    
        }

        print getMenu($items);
    }


    public static function getShipping_cost(){
        $shipping_cost = ShippingCost::first();
        
        return $shipping_cost->cost;
    }

    /* Método que devuelve el porcentaje de pago de una factura */
    public static function getPaidPercentage($total_amount, $debt){
        $pay = ($total_amount - $debt);
        $percentage = ($pay * 100) / $total_amount;
        return round($percentage);
    }


    /**
     * Método que devuelve productos random
     */
    public static function getRandom_products($number){
        $quantity = $number;
        
        $count = Product::count();
        
        if($count < $quantity){
            $quantity = $count;
        }

        $products = Product::all()->random($quantity);

        return $products;
    }


    /**
     * Método para saber si puede o  no ingresar un 
     * nuevo producto dependiendo delplan escogido
     */
    public static function CanInsertProduct(){
        $config = Config::find(1);
        $plan = Plan::find($config->plan);
        $products = Product::count();

        if($products >= $plan->quantity_of_products){
            return true;
        } else {
            return false;
        }
    }


    /**
     * Método para saber si puede o  no ingresar una 
     * nueva categoría dependiendo delplan escogido
     */
    public static function CanInsertCategory(){
        $config = Config::find(1);
        $plan = Plan::find($config->plan);
        $categories = Category::count();

        if($categories > $plan->quantity_of_categories){
            return true;
        } else {
            return false;
        }
    }


    /**
     * Método que devuelve la cantidad de productos favoritos del usuario
     */
    public static function getFavorites_count(){
        //dd($_SESSION['login']);
        $favorites = 0;
        if(isset($_SESSION['login'])){
            $favorites = Favorite::where('user_id', $_SESSION['login']->id)->get()->count();
        } 
        
        return $favorites;
    }

    /**
     * Método que devuelve la cantidad de productos añadidos al carrito
     */
    public static function getAddToCart_count(){
        //dd($_SESSION['login']);
        $products = 0;
        if(isset($_SESSION['cart'])){
            $products = count($_SESSION['cart']);
        } 
        
        return $products;
    }


    /**
     * Método que trae la cantidad de comentarios en una publicación
     */
    public static function getComments_count_blog($post_id){
        $comments = PostUser::where('post_id', $post_id)->count();

        return $comments;
    }


    /**
     * Método que trae la cantidad de comentarios en un producto publicación
     */
    public static function getComments_count_product($product_id){
        $comments = ProductUser::where('product_id', $product_id)->count();

        return $comments;
    }


    /**
     * Método que devuelve el ID del usuario actualmente logeado
     */
    public static function getUser_id(){
        if(isset($_SESSION['login'])){
            $user_id = json_encode($_SESSION['login']->id);
            
            return $user_id;
        } else {
            return 0;
        }
    }


    /**
     * Método que devuelve la cantidad de reseñas de un producto
     */
    public static function getReview_count($product_id){
       $reviews = Review::where('product_id', $product_id)->get()->count();
       return $reviews;
    }






    /**
     * Los siguientes métodos son para traer productos destacados, categorias relacionadas, le podrá interesar, etc
     */
    public static function productsInSlider(){
        return FeaturedProduct::inRandomOrder()->get();
    }


    /**
     * 'Le podrá interesar'
     */
    public static function interestProducts(){
        return Product::where('is_deleted', NULL)->get()->random(5);
    }

    /**
     * Productos destacados
     */
    public static function featuredProducts(){
        return Product::where('is_deleted', NULL)
                            ->where('is_featured', 1)
                            ->inRandomOrder()
                            ->get();
    }

    /**
     * Método que devuelve los productos ams vendidos
     */
    public static function mostSellingProducts(){
        $most_selling_products = DB::select("SELECT products.*, 
            categories.name AS category_name, 
            SUM(quantity) AS TotalQuantity 
            FROM items

            INNER JOIN products ON products.id = items.product_id
            INNER JOIN categories ON products.category_id = categories.id
            WHERE is_deleted IS NULL
            GROUP BY product_id
            ORDER BY SUM(quantity) DESC
            LIMIT 5
        ");

        return $most_selling_products;
    }

    /**
     * Método que devuelve los productos similares a una misma categoría
     */
    public static function relatedProducts($category_id, $number){
        
        $featured_products = Product::where('is_deleted', null)->where('is_featured', 1)->get();
        
        return $featured_products;
    }

    /**
     * Método que devuelve las subcategorías de una categoría
     */
    public static function similarCategories($parent_id){
        return Category::where('parent_id', $parent_id)->get();
    }


    /**
     * Método que devuelve cantidad limitada de categías random
     */
    public static function randomCategories(){
        $quantity = 6;
        
        $categories = Category::where('parent_id', '<>', 0)
                                ->where('slug', '<>', 'uncategorized')
                                ->get()
                                ->count();
        //dd($categories);
        if($categories < 8){
            $quantity = $categories;
        }

        $categories_random = Category::where('parent_id', '<>', 0)
                                    ->where('slug', '<>', 'uncategorized')
                                    ->get()
                                    ->random($quantity); // 8 categorías random para mostrar
        return $categories_random;
    }


    /**
     * Método para que reconozca el método GET para la Paginación
     */
    public static function pagination(){
        Paginator::currentPageResolver(function ($pageName = 'page') {
            return (int) ($_GET[$pageName] ?? 1);
        });
    }


    public static function search($products){
        
        $sort_path = '';
        if(isset($_GET['sort'])){
            $sort = explode(',', $_GET['sort']);
            $products->orderBy($sort[0], $sort[1]);
            // Para luego concatenarlo
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }

        return $sortedQuery = $products->paginate(6);

       
        // En caso de recibir la url /product concatenamos la página 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }
    }


    /**
     * Lista blanca de parámetros GET
     * Debemos validar que el usuario no ingrese otro campo para filtrar
     * Solo se admita: name - price_final / asc - desc
     */
    public static function whitelistGet(){
        //dd($query);
        $whitelist_column = [
            'name',
            'price_final'
        ];

        $whitelist_orderby = [
            'asc',
            'desc'
        ];

        if(isset($_GET['sort'])){
            
            /**
             * Debemos filtrar que el usuario no ingrese manualmente algún otro
             * campo de la tabla para filtrar
             * Hay que construir una whitelist
             */
            $sort = explode(',', $_GET['sort']);
            
            /* Comprobamos que sean solo 2 parámetros */
            if(count($sort) == 2){

                if (!(in_array($sort[0], $whitelist_column) && in_array($sort[1], $whitelist_orderby))) {
                    
                    Response::redirect('/');
                } 
    
                

                return $sort;
                
            } else {
                Response::redirect('/');
            }
            
        } else {

            return false;
        }

        
    }


    /**
     * Método para obtenerla cantidad de favoritos que tiene un producto
     */
    public static function getQuantity_of_favorites($product_id){
        return $total_favorites = Favorite::where('product_id', $product_id)->count();
    }


    /**
     * Método para obtenerla cantidad de reseñas que tiene un producto
     */
    public static function getQuantity_of_reviews($product_id){
        return $total_reviews = Review::where('product_id', $product_id)->count();
    }


    /**
     * Método que devuelve el puntaje de las review redondado hacia abajo para iterar en el for
     * Ejemplos: 0, 1, 2, 3, 4, 5
     */
    public static function getScore_rounded($product_id){
        $quantity_reviews = Review::where('product_id', $product_id)->count();
        if($quantity_reviews == 0){
            return 0;
        }

        $sum_score = Review::where('product_id', $product_id)->sum('score');
        $round = round($score = ($sum_score / $quantity_reviews), 1);
        return floor($round);
        //return round($score = ($sum_score / $quantity_reviews), 1);
    }


    /**
     * Método que devuelve el score de las reseñas con decimal redondeado
     * Ejemplos: 1, 1.5, 3, 4.5, 5
     */
    public static function getScore($product_id){
        $quantity_reviews = Review::where('product_id', $product_id)->count();
        if($quantity_reviews == 0){
            return 0;
        }

        $sum_score = Review::where('product_id', $product_id)->sum('score');
        return round(($sum_score / $quantity_reviews) * 2) / 2;
    }

    /**
     * Método que devuelve la cantidad de banners que el administrador puede hacer
     */
    public static function getQuantity_of_banners(){
        $config = Config::find(1);
        $plan = Plan::find($config->plan);
        return $plan->banner;
    }

    /**
     * Método para comprobar si un usuario tiene una
     * order abierta (status_id = 1)
     */
    public static function orderPending(){
        
        $customer = User::find($_SESSION['login']->id);

        $order_pending = Order::where('user_id', $customer->id)->where('status_id', 1)->first();

        if($order_pending){
            return true;
        } else {
            return false;
        }

    }

    /**
     * Método que devuelve verdadero si un producto es nuevo
     * Es decir si tiene menos de 30 dias a la fecha de ingreso
     * 
     * Ésto es para poner una etiqueta "NUEVO" al listar los productos en la web
     */
    public static function productIsNew($created_at){
        
        $now = new Carbon(); // Obtenemos la fecha y hora actual
        
        $is_new = 0;
            
        /*
        * Comparamos los dias de diferencia que hay entre la fecha actual y la fecha de ingreso del producto
        * Si supera los 1200 (20 minutos) mandamos mensaje de error
        */
        if($now->diffInDays($created_at) < 30){
            $is_new = 1;
        }

        return $is_new;
    }


    /**
     * Método que devuelve la cantidad de productos que commpró un cliente
     */
    public static function getQuantity_purchased_products_byCustomer($customer_id){
        $customer = User::find($customer_id);

        $qty = 0;
        foreach($customer->orders as $order){
            foreach($order->items as $item){
                $qty += $item->quantity;
            }
        }

        return $qty;

    }


    /**
<<<<<<< HEAD
     * Método que devuelve los productos que el cliente tiene en la tabla combo_customer
     */
    public function getProduct_canasta($user_id){
        return ComboCustomer::where('user_id', $user_id)->get();
    }


    /**
     * Método que devuelve el path de imageen a partir del user_id
     */
    public function getCanasta_imagen($user_id){
        return ComboCustomer::where('user_id', $user_id)->first()->combo->image;
=======
     * Método para traer los productos escogidos en la canasta
     */
    public static function getProducts_combo($user_id){
        $products_combo = ComboCUstomer::where('user_id', $user_id)->get();

        return $products_combo;

>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
    }


}

