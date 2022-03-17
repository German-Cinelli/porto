<?php

namespace app\controllers;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Pagination\Paginator;


use app\helpers\Utils;
use \Response;


use app\models\User;
use app\models\Product;
use app\models\Combo;
use app\models\ComboItem;
use app\models\ComboCustomer;
use app\models\ProductAttributeValue;




class ComboController {


    
    public function actionIndex(){

        /* Para que reconozca el parámetro GET */
        Utils::pagination();
        /* Si los parámetros por GET no están en la whitelist redirige a: '/' */
        $sort = Utils::whitelistGet(); 


        $path = '/product';

        $query = Product::where('is_deleted', NULL);

        $sort_path = '';

        if($sort){
            /* Si existen variables GET añadimos el filtro a la consulta */
            $query->orderBy($sort[0], $sort[1]);
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }

        $sortedQuery = $query->paginate(12);

        // En caso de no recibir una página del pagination mostramos la número 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }

        $message = '';
        if($sortedQuery->isEmpty()){
            $message = 'No se encontraron resultados.';
        }
        
        
        $include = 'app/views/web/products/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Catálogo',
            'products' => $sortedQuery,
            'path' => $path,
            'message' => $message,
            'sort_path' => $sort_path
        ]);

    }



    public function actionShow($slug = false){

        if(!$slug){
            Response::redirect('/');
        }
        
        $include = 'app/views/web/combos/show.php';
        $combo = Combo::where('slug', $slug)->where('status', 1)->first();

        if($combo == NULL){
            Response::redirect('/');
        }
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Canasta',
            'combo' => $combo
        ]);
        
    }


    /**
     * Método para comprobar que todos los productos elegidos pertenezcan a la canasta
     */
    public function actionCheck_chosen_products(){

        $combo_id = isset($_POST['combo_id']) ? $_POST['combo_id'] : false;
        $items = isset($_POST['items']) ? $_POST['items'] : false;

        if($combo_id && $items){

            $combo = Combo::find($combo_id);

            if($combo->combos_items->count() == count($items)){

                $customer_id = Utils::getUser_id();

                if($customer_id){

                    /**
                    * Comprobamos si ya existe en el carrito
                    */
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $item){
                            if($item['product']->id == 60){
                                die('is_already_in_the_cart');
                            }
                        }
                    }

<<<<<<< HEAD
                    $product = Product::where('id', 60)->first();
                    $product->price = $combo->price;
                    $product->price_final = $combo->price;
                    $product->update();
                        
                    $_SESSION['cart'][] = array(
                        'product' => $product,
                        'quantity' => 1
                    );

=======
                    /**
                     * Borramos los items de la canasta anteriores
                     */
                    $c = ComboCustomer::where('user_id', $customer_id)->get();
                    if($c){
                        foreach($c as $com){
                            $com->delete();
                        }
                    }

                    /**
                     * Actualizamos el precio del producto tipo canasta
                     */
                    $product = Product::where('id', 60)->first();
                    $product->price = $combo->price;
                    $product->price_final = $combo->price;
                    $product->update();
                        
                    $_SESSION['cart'][] = array(
                        'product' => $product,
                        'quantity' => 1
                    );
                    
                    
                    

>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                    foreach($items as $item){
                        
                        $combo_customer = new ComboCustomer();
                        $combo_customer->combo_id = $combo->id;
                        $combo_customer->user_id = $customer_id;
                        $combo_customer->product_id = $item;
                        $combo_customer->qty = 1;
<<<<<<< HEAD

                        $save = $combo_customer->save();

                        if(!$save){

                            die('error');
                        }
                    }

                    die('ok');

                } else {

=======

                        $save = $combo_customer->save();

                        if(!$save){

                            die('error');
                        }
                    }

                    die('ok');

                } else {

>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082
                    die('error');
                }

            } else {
    
                die('faltan_items');
            }

            if($combo){

                die($combo);
            } else {

                die('error');
            }

        } else {

            die('error');
        }

    }


    /**
     * Método para buscar un producto por categoría
     */
    public function actionCategory($category_name = false){

        if(!$category_name){
            Response::redirect('/');
        }


        /* Para que reconozca el parámetro GET */
        Utils::pagination();
        /* Si los parámetros por GET no están en la whitelist redirige a: '/' */
        $sort = Utils::whitelistGet(); 


        $path = '/product/category/' . $category_name;

        $category = Category::where('slug', $category_name)->first();

        // Verificamos si la categoría no tiene un parent_id, redireccionamos al inicio
        if($category->parent_id == 0){
            $cat = Category::where('parent_id', $category->id)->get();
            Response::redirect('/');
            //dd($cat);
        }

        $query = Product::where('category_id', $category->id)->where('is_deleted', NULL);

        $sort_path = '';

        if($sort){
            /* Si existen variables GET añadimos el filtro a la consulta */
            $query->orderBy($sort[0], $sort[1]);
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }

        $sortedQuery = $query->paginate(6);

        // En caso de recibir la url /product concatenamos la página 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }

        $message = '';
        if($sortedQuery->isEmpty()){
            $message = 'No se encontraron resultados para la categoría <b>' . $category->name . '</b>.';
        }

        //$include = 'app/views/web/products/filter/category.php';
        $include = 'app/views/web/products/index.php';

        Response::render('index', [
            'include' => $include,
            'title' => 'Catálogo',
            'products' => $sortedQuery,
            'cat' => $category,
            'path' => $path,
            'message' => $message,
            'sort_path' => $sort_path
        ]);
        
    }


    /**
     * Método para buscar un producto por nombre
     */
    public function actionSearch($search = false){

        if(!$search){
            Response::redirect('/');
        }



        /* Para que reconozca el parámetro GET */
        Utils::pagination();
        /* Si los parámetros por GET no están en la whitelist redirige a: '/' */
        $sort = Utils::whitelistGet(); 


        $path = '/product/search/' . $search;

        $query = Product::where('name', 'like', "%$search%")->where('is_deleted', NULL);

        $sort_path = '';

        if($sort){
            /* Si existen variables GET añadimos el filtro a la consulta */
            $query->orderBy($sort[0], $sort[1]);
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }

        $sortedQuery = $query->paginate(3);

        // En caso de no recibir una página del pagination mostramos la número 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }

        $message = '';
        if($sortedQuery->isEmpty()){
            $message = 'La buśqueda no obtuvo ningún resultado con la palabra <b>' . $search . '</b>. Inténtalo con palabras diferentes.';
        }


        $include = 'app/views/web/products/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Catálogo',
            'products' => $sortedQuery,
            'path' => $path,
            'message' => $message,
            'sort_path' => $sort_path
        ]);


    }


    /**
     * Método para filtrar productos por un rango de precio
     */
    public function actionRange_price($slide){

        //dd($search);

        /* Para que reconozca el parámetro GET */
        Utils::pagination();

        $path = '/product/search/' . $search;

        $query = Product::where('name', 'like', "%$search%");


        $sort_path = '';
        if(isset($_GET['sort'])){
            $sort = explode(',', $_GET['sort']);
            $query->orderBy($sort[0], $sort[1]);
            // Para luego concatenarlo
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }
        $sortedQuery = $query->paginate(3);
        //dd($sortedQuery);

        // En caso de recibir la url /product concatenamos la página 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }


        $message = '';
        if($sortedQuery->isEmpty()){
            $message = 'La buśqueda no obtuvo ningún resultado con la palabra <b>' . $search . '</b>. Inténtalo con palabras diferentes.';
        }


        $include = 'app/views/web/products/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Catálogo',
            'products' => $sortedQuery,
            'path' => $path,
            'message' => $message,
            'sort_path' => $sort_path
        ]);


    }


    /**
     * Método para realizar un comentario
     */
    public function actionComment(){

        $is_logged = Utils::isLogged();

        if($is_logged){

            if(isset($_POST)){

                $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : false;
                $text = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : false;
                
                if($product_id && $text){

                    $user_id = Utils::getUser_id();
                    //die($user_id);

                    $comment = new ProductUser();
                    $comment->product_id = $product_id;
                    $comment->user_id = $user_id;
                    $comment->parent_id = 0;
                    $comment->comment = $text;

                    $save = $comment->save();

                    if($save){

                        /* Notificación en el panel administrativo */
                        $product = Product::find($product_id);
                        $notification = new Notification();
                        $notification->image = $product->image;
                        $notification->message = 'Nuevo comentario.';
                        $notification->icon = 'fa fa-comment-o text-aqua';
                        $notification->path = '/product/show/' . $product->slug;
                        $save_notification = $notification->save();

                        if($save_notification){

                            die('saved');
                        } else {

                            die('error');
                        }

                        /* Lógica para enviar un correo al usuario */
                        $user = User::find($user_id);

                        if($user){

                        }

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


    /**
     * Método para eliminar un comentario
     */
    public function actionComment_destroy(){
        $role = Utils::RoleAdmin();

        if($role){
           
            $comment_id = isset($_POST['comment_id']) ? $_POST['comment_id'] : false;
            
            if($comment_id){
                $comment = ProductUser::find($comment_id);
                $deleted = $comment->delete();
    
                if($deleted){
    
                    die('deleted');
                    
                } else {
    
                    die('error');
                }
    
            } else {
    
                die('error');
            }
    
            die('error');

        } else {

            Response::redirect('/');
        }

        die('error');
    }

    /**
     * Método para responder un comentario
     */
    public function actionReply(){
    
        $is_logged = Utils::isLogged();

        if($is_logged){

            if(isset($_POST)){

                $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : false;
                $user_to_reply = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : false;
                $comment_id = isset($_POST['comment_id']) ? htmlspecialchars($_POST['comment_id']) : false;
                $reply = isset($_POST['reply']) ? htmlspecialchars($_POST['reply']) : false;
                
                if($product_id && $user_to_reply && $comment_id && $reply){
    
                    $user_id = Utils::getUser_id();
                    //die($user_id);
    
                    $comment = new ProductUser();
                    $comment->product_id = $product_id;
                    $comment->user_id = $user_id;
                    $comment->parent_id = $comment_id;
                    $comment->comment = $reply;
    
                    $save = $comment->save();
    
                    if($save){

                        
                        $user = User::find($user_id);
                        /* Si es admin eliminamos la notificación para que ya no aparezca */
                        if($user->role_id == 1){
                            /* Algo complicado porque no hay ningun campo en
                             * la tabla notification que identifique la respuesta de un comentario
                             * Por elmomento que el admin elimine la notificacion desde el dashboard
                             */
                            
                        } else {
                            /* En caso que no sea rol admin generamos una notificación en el panel administrativo */
                            $product = Product::find($product_id);
                            $notification = new Notification();
                            $notification->image = $product->image;
                            $notification->message = 'Te respondieron.';
                            $notification->icon = 'fa fa-comments-o text-aqua';
                            $notification->path = '/product/show/' . $product->slug;
                            $save_notification = $notification->save();
    
                            if($save_notification){
    
                                die('saved');
                            } else {
    
                                die('error');
                            }
                        }
                        
                        
                        /* Lógica para enviar un correo al usuario */
                        
    
                        die('saved');
    
                    } else {
    
                        die('error');
    
                    }
                    
     
                } else {
    
                    die('error');
                }
            } else {
                
                die('error');
            }

        } else {
            die('not_logged');
        }

    }


}