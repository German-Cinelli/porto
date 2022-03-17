<?php

namespace app\controllers;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Pagination\Paginator;

use app\helpers\Utils;
use \Response;

use app\models\User;
use app\models\Post;
use app\models\Product;
use app\models\PostUser;
use app\models\Review;
use app\models\Notification;



class BlogController {


    
    public function actionIndex(){

        /* Para que reconozca el parámetro GET */
        Utils::pagination();
        /* Si los parámetros por GET no están en la whitelist redirige a: '/' */
        $sort = Utils::whitelistGet(); 

        $path = '/blog';

        $query = Post::where('created_at', '<>', NULL);

        $sort_path = '';

        if($sort){
            /* Si existen variables GET añadimos el filtro a la consulta */
            $query->orderBy($sort[0], $sort[1]);
            $sort_path = '&sort=' . $sort[0] . ',' . $sort[1]; // Output: &sort=name,asc
        }

        $sortedQuery = $query->paginate(4);

        // En caso de no recibir una página del pagination mostramos la número 1
        if(!isset($_GET['page'])){
            Response::redirect($path . '/?page=1' . $sort_path);
        }

        $message = '';
        if($sortedQuery->isEmpty()){
            $message = 'No se encontraron resultados.';
        }

        // 3 últimos posts
        $recent_posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

        // 3 post mas populares
        $popular_posts = DB::table('posts_users')
                 ->select('post_id', DB::raw('count(*) as total'))
                 ->groupBy('post_id')
                 ->orderBy('total', 'DESC')
                 ->take(3)
                 ->get();
        //dd($popular_posts[0]->post_id);
        
        $include = 'app/views/web/blog/index.php';
        
        Response::render('index', [
            'include' => $include,
            'title' => 'Noticias',
            'posts' => $sortedQuery,
            'path' => $path,
            'message' => $message,
            'sort_path' => $sort_path,
            'recent_posts' => $recent_posts,
            'popular_posts' => $popular_posts
        ]);

    }



    public function actionShow($slug){

        $include = 'app/views/web/blog/show.php';

        $post = Post::where('slug', $slug)->first();

        if($post){

            //dd($post->comments);

            Response::render('index', [
                'include' => $include,
                'title' => 'Noticias',
                'post' => $post
            ]);

        } else {

            Response::redirect('/');

        }
        
    }


    /**
     * Método para realizar un comentario
     */
    public function actionComment(){

        $is_logged = Utils::isLogged();

        if($is_logged){

            if(isset($_POST)){

                $post_id = isset($_POST['post_id']) ? htmlspecialchars($_POST['post_id']) : false;
                $text = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : false;
                
                if($post_id && $text){

                    $user_id = Utils::getUser_id();
                    //die($user_id);

                    $comment = new PostUser();
                    $comment->post_id = $post_id;
                    $comment->user_id = $user_id;
                    $comment->parent_id = 0;
                    $comment->comment = $text;

                    $save = $comment->save();

                    if($save){

                        /* Notificación en el panel administrativo */
                        $post = Post::find($post_id);
                        $notification = new Notification();
                        $notification->image = $post->image;
                        $notification->message = 'Nuevo comentario.';
                        $notification->icon = 'fa fa-comment-o text-aqua';
                        $notification->path = '/blog/show/' . $post->slug;
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
                $comment = PostUser::find($comment_id);
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

                $post_id = isset($_POST['post_id']) ? htmlspecialchars($_POST['post_id']) : false;
                $user_to_reply = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : false;
                $comment_id = isset($_POST['comment_id']) ? htmlspecialchars($_POST['comment_id']) : false;
                $reply = isset($_POST['reply']) ? htmlspecialchars($_POST['reply']) : false;
                
                if($post_id && $user_to_reply && $comment_id && $reply){
    
                    $user_id = Utils::getUser_id();
                    //die($user_id);
    
                    $comment = new PostUser();
                    $comment->post_id = $post_id;
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
                            $post = Post::find($post_id);
                            $notification = new Notification();
                            $notification->image = $post->image;
                            $notification->message = 'Te respondieron.';
                            $notification->icon = 'fa fa-comments-o text-aqua';
                            $notification->path = '/blog/show/' . $post->slug;
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


    /**
     * Método para publicar una reseña de un producto
     */
    public function actionReview(){
        $is_logged = Utils::isLogged();

        if($is_logged){

            if(isset($_POST)){

                $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : false;
                $score = isset($_POST['score']) ? htmlspecialchars($_POST['score']) : false;
                $text = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : false;
                
                if($product_id && $score && $text){

                    $user_id = Utils::getUser_id();

                    /* Comprobamos si el usuario ya dejó su reseña en el producto 
                     * Solo podrá dejar 1 reseña por producto
                     */
                    $rev = Review::where('user_id', $user_id)->where('product_id', $product_id)->first();

                    if($rev){

                        die('already_exists');
                    } else {

                        /* Creamos la reseña */
                        $review = new Review();
                        $review->product_id = $product_id;
                        $review->user_id = $user_id;
                        $review->score = $score;
                        $review->comment = $text;

                        $save = $review->save();

                        if($save){

                            /* Notificación en el panel administrativo */
                            $product = Product::find($product_id);
                            $notification = new Notification();
                            $notification->image = $product->image;
                            $notification->message = 'Nueva reseña.';
                            $notification->icon = 'fa fa-star-o text-yellow';
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