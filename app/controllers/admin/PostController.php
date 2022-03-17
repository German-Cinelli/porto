<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\Post;
use app\models\Product;


class PostController {


    
    public function actionIndex(){

        Utils::isAdmin();

        $products = Product::where('is_deleted', NULL)->get();

        $include = 'app/views/admin/posts/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'post_menu_active' => 'active menu_open',
            'post_index_active' => 'active',
            'products' => $products
        ]);
    }



    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){

            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : NULL;
            $title = isset($_POST['title']) ? $_POST['title'] : false;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $embedded_content = isset($_POST['embedded_content']) ? $_POST['embedded_content'] : NULL;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;


            if($title && $description && $slug){

                /* Comprobamos si el slug insertado esta libre */
                $s = Post::where('slug', $slug)->first();

                if($s){
                    
                    die('slug');
                } else {

                    $post = new Post();

                    $post->title = $title;
                    $post->slug = $slug;
                    $post->description = $description;
                    $post->description = $embedded_content;

                    if($image){
                        // Subir imagen principal
                        $image_name = $_FILES['file']['name'];
                        $image_type = $_FILES['file']['type'];

                        $random_str = Utils::random_str(8);
                        $image_name_final = '/assets/uploads/posts/' . $random_str . '-' . $image_name;
                            
                        if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                            move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                        } else {
                            die('error');
                        }

                        $post->image = $image_name_final;

                    } else {

                        //$post->image = '/assets/dist/images/not-image-avilable.png';

                    }

                    $save_post = $post->save();
    
                    if($save_post){
                        
                        die('saved');
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
    }



    public function actionShow($id){

        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $post = Post::find($id);

            if($post){
                die($post);

            } else {

                die('error');
            }
        } else {

            die('error');
        }

    }


    public function actionEdit(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){

            $post = Post::with('Product')->find($id);

            if($post){
                die($post);

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        die('error');
    }


    
    public function actionUpdate(){
        Utils::isAdmin();

        if(isset($_POST)){
            //d($_POST);
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : NULL;
            $title = isset($_POST['title']) ? $_POST['title'] : false;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;

            if($product_id == 0){
                $product_id = NULL;
            } 

            if($title && $description && $slug){

                $post = Post::find($id);
                $post->product_id =  $product_id;
                $post->title = $title;
                $post->slug =  $slug;
                $post->description = $description;

                if($image){
                    // Subir imagen principal
                    $image_name = $_FILES['file']['name'];
                    $image_type = $_FILES['file']['type'];

                    $random_str = Utils::random_str(8);
                    $image_name_final = '/assets/uploads/posts/' . $random_str . '-' . $image_name;
                        
                    if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                        move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                    } else {
                        die('error');
                    }

                    $post->image = $image_name_final;
                }

                
                $update = $post->update();


                if($update){
                    
                    die($id);
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


    public function actionDestroy(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $post = Post::find($id);
            $deleted = $post->delete();

            if($deleted){

                die('deleted');
                
            } else {

                die('error');
            }

        } else {

            die('error');
        }

        die('error');
    }


    public function actionList(){
        Utils::isAdmin();

        $posts = Post::orderBy('id', 'DESC')->get();

        echo '{"data": '.$posts.'}';
    }


}