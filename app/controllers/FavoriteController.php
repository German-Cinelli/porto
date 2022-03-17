<?php

namespace app\controllers;

use \Response;
use app\helpers\Utils;


use app\models\User;
use app\models\Product;
use app\models\Post;
use app\models\Favorite;
use app\models\Notification;

class FavoriteController {


    public function actionIndex(){

        
        Utils::issetSession();

        $id_user_session = Utils::getIdUserSession();

        $favorites = Favorite::where('user_id', $id_user_session)->inRandomOrder()->get();
        //dd($favorites);

        
        $include = 'app/views/web/favorites/index.php';
        
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Favoritos',
            'favorites' => $favorites
        ]);

    }

    /**
     * Añadir producto a favorito
     */
    public function actionAdd(){
        
        $is_logged = Utils::isLogged();

        if($is_logged){

            $user_id = Utils::getIdUserSession();

            if(isset($_POST)){

                $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;


                if($product_id){
                    $product = Product::find($product_id);
        
                    if($product){
        
                        /* Comprobamos si el usuario ya marcó el producto como favorito anteriormente */
                        $fav = Favorite::where('user_id', $user_id)
                                        ->where('product_id', $product->id)
                                        ->get();
                        
                        if(count($fav) > 0){
        
                            die('already_exists');
        
                        } else {
        
                            $favorite = new Favorite();
                            $favorite->user_id = $user_id;
                            $favorite->product_id = $product->id;
                            $save = $favorite->save();
        
                            if($save){
        
                                $notification = new Notification();
                                $notification->image = $product->image;
                                $notification->message = 'A alguien le gustó.';
                                $notification->icon = 'fa fa-heart-o text-red';
                                $notification->path = '/product/show/' . $product->slug;
                                $save_notification = $notification->save();
        
                                if($save_notification){
        
                                    die('saved');
        
                                } else {
        
                                    die('error');
                                }
        
                                
        
                            } else {
        
                                die('error');
        
                            }
        
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

        } else {

            die('not_logged');
        }

    }


    /**
     * Remover producto favorito
     */
    public function actionRemove(){
        
        Utils::issetSession();

        $user_id = Utils::getIdUserSession();

        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;

        if($product_id){
            $product = Product::find($product_id);

            if($product){
                $favorite = Favorite::where('user_id', $user_id)
                                    ->where('product_id', $product->id)
                                    ->get();

                if($favorite){
                    $delete = $favorite->delete();

                    if($delete){

                        die('deleted');
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

            die('error');

        }

    }


}