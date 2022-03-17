<?php

namespace app\controllers\admin;

use \Response;
use \Mailing;
use app\helpers\Utils;

use app\models\Product;
use app\models\FeaturedProduct;


class OfferController {

    
    public function actionIndex(){
        Utils::isAdmin();

        $products = Product::where('is_deleted', NULL)->get();
        //dd($products);
        $featured_products = FeaturedProduct::all();

        //dd($first_featured_product);

        $include = 'app/views/admin/offers/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'offer_menu_active' => 'active',
            'products' => $products,
            'featured_products' => $featured_products
        ]);

    }


    /**
     * Método para crear un producto destacado
     */
    public function actionCreate(){
        Utils::isAdmin();

        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
        $title = isset($_POST['title']) ? $_POST['title'] : false;
        $description = isset($_POST['description']) ? $_POST['description'] : false;
        $remove_product_id = isset($_POST['remove_product_id']) ? $_POST['remove_product_id'] : false;

        //die($remove_product_id);

        if($product_id && $title && $description){
            
            /* Comprobamos si tenemos remove_product_id */
            if($remove_product_id){
                
                // Comprobamos si es verdad que ya hay 2 productos destacados
                $featured = FeaturedProduct::count();
                if($featured == 2){
                    
                    $remove_featured_product = FeaturedProduct::where('product_id', $remove_product_id)->get();
                    $delete = $remove_featured_product[0]->delete();

                    if($delete){

                        /* Crear nuevo producto destacado */
                        $featured_product = new FeaturedProduct();
                        $featured_product->product_id = $product_id;
                        $featured_product->title = $title;
                        $featured_product->description = $description;

                        $save = $featured_product->save();

                        if($save){

                            die('saved');

                        } else {

                            die('error');

                        }

                    } else {

                        die('error');

                    }


                } else {

                     /* Crear nuevo producto destacado */
                     $featured_product = new FeaturedProduct();
                     $featured_product->product_id = $product_id;
                     $featured_product->title = $title;
                     $featured_product->description = $description;

                     $save = $featured_product->save();

                     if($save){

                         die('saved');

                     } else {

                         die('error');

                     }

                }

            } else {

                /* Crear nuevo producto destacado */
                $featured_product = new FeaturedProduct();
                $featured_product->product_id = $product_id;
                $featured_product->title = $title;
                $featured_product->description = $description;

                $save = $featured_product->save();

                if($save){

                    die('saved');

                } else {

                    die('error');

                }

            }
            

        } else {

            die('error');

        }


    }



    /**
     * Método para remover un banner
     */
    public function actionDelete($id){

        $featured_product = FeaturedProduct::find($id);

        if($featured_product){

            $delete = $featured_product->delete();
        }

        Response::redirect('/admin/offer');

        
    }

}