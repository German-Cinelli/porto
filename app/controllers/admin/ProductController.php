<?php

namespace app\controllers\admin;

use Illuminate\Database\Capsule\Manager as DB;

use \Response;
use app\helpers\Utils;

use app\models\Product;
use app\models\Category;
use app\models\Image;
use app\models\Item;
use app\models\ImageProduct;
use app\models\ProductType;
use app\models\AttributeValue;
use app\models\Attribute;
use app\models\Plan;

use app\models\ProductAttributeValue;


class ProductController {

  
    public function actionIndex(){
        Utils::isAdmin();

        $products = Product::all();
        $categories = Category::where('parent_id', '<>', 0)->get();
        $product_types = ProductType::all();

        $include = 'app/views/admin/products/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            'product_index_active' => 'active',
            'products' => $products,
            'categories' => $categories,
            'product_types' => $product_types
        ]);
        
    }
    


    public function actionRemoved(){
        Utils::isAdmin();

        $include = 'app/views/admin/products/removed.php';
        $product_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_index_active' => $product_index_active,
        ]);
        
    }


    public function actionCreate(){
        Utils::isAdmin();

        /* Enviamos las categorías que no sean padres */
        $categories = Category::where('parent_id', '<>', 0)->get();
        $product_types = ProductType::all();
        $images = Image::all();
        $attributes = Attribute::all();
        $attribute_values = AttributeValue::all();

        $include = 'app/views/admin/products/create.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            'product_create_active' => 'active',
            'categories' => $categories,
            'product_types' => $product_types,
            'images' => $images,
            'attributes' => $attributes,
            'attribute_values' => $attribute_values
        ]);

    }


    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){

            /* Comprobamos la cantidad de productos que puede ingresar segun el plan */
            $can_insert_product = Utils::CanInsertProduct();

            if($can_insert_product){
                Response::redirect('/admin/product/create');
                die();
            }

            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $brand = isset($_POST['brand']) ? $_POST['brand'] : null;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : false;
            $product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : false;
            $attribute_value_id = isset($_POST['attribute_value_id']) ? $_POST['attribute_value_id'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
            $offer = isset($_POST['offer']) ? $_POST['offer'] : false;

            $stock_alert = isset($_POST['stock_alert']) ? $_POST['stock_alert'] : 5;
            $delivery_delay = isset($_POST['delivery_delay']) ? $_POST['delivery_delay'] : 0;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;

            $images = isset($_POST['image-ids']) ? $_POST['image-ids'] : false;

            //d($images);

            if($name && $slug && $description && $category_id  && $product_type_id && $price && $image){
                
                $product = new Product();

                /* Calcular el precio de acuerdo al descuento */
                $price_final = Utils::calculatePrice($price, $offer);

                $product->slug = $slug;
                $product->name = $name;
                $product->category_id = $category_id;
                $product->product_type_id = $product_type_id;
                $product->description = $description;
                $product->brand = $brand;
                $product->price = $price;
                $product->price_final = $price_final;
                $product->stock = $stock;
                $product->offer = $offer;
                $product->stock_alert = $stock_alert;
                $product->delivery_delay = $delivery_delay;
                


                // Subir imagen principal
                $image_name = $_FILES['file']['name'];
                $image_type = $_FILES['file']['type'];
                
                $random_str = Utils::random_str(8);
                $image_name_final = '/assets/uploads/products/' . $random_str . '-' . $image_name;
                    
                if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                    move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                } else {
                    die('error');
                }

                $product->image = $image_name_final;

                //dd($product);

                $save_product = $product->save();

                if($images){
                    foreach($images as $image){
                        $image_product = new ImageProduct();
                        $image_product->product_id = Product::latest()->first()->id;
                        $image_product->image_id = $image;
                        
                        $save_image_product = $image_product->save();
    
                        //d($save_image_product);
                    } 

                }
                
 
                if($save_product){
                    $p = Product::latest()->first();

                    $product_attribute_value = new ProductAttributeValue();
                    $product_attribute_value->product_id = $p->id;
                    $product_attribute_value->attribute_value_id = $attribute_value_id;

                    $save_product_attribute_value = $product_attribute_value->save();

                    
                    Response::redirect('/admin/product/show/' . $p->id);
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
        
    }


    public function actionShow($id){
        Utils::isAdmin();

        //$p = Utils::stockAlert();
        //dd($p);

        $product = Product::find($id);

        $product_id = $product->id;

        // Cantidad de veces que se ha vendido el producto
        $sold = DB::select("SELECT SUM(quantity) AS totalQuantity FROM items
            INNER JOIN products ON products.id = items.product_id
            WHERE products.id = $product_id;
        ");

        $sold = $sold[0]->totalQuantity;
        

        $include = 'app/views/admin/products/show.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            //'product_index_active' => 'active',
            'product' => $product,
            'sold' => $sold
        ]);
    }



    /**
     * Método para asignar un atributo al producto
     */
    public function actionAssign_attribute(){
        Utils::isAdmin();

        if(isset($_POST)){
            
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $attribute_value_id = isset($_POST['attribute_value_id']) ? $_POST['attribute_value_id'] : false;

            if($product_id && $attribute_value_id){

                $product_attribute_value = new ProductAttributeValue();
                $product_attribute_value->product_id = $product_id;
                $product_attribute_value->attribute_value_id = $attribute_value_id;
                
                $save = $product_attribute_value->save();

                if($save){

                    die('success');

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


    /**
     * Método para cambiar un atributo al producto
     */
    public function actionChange_attribute(){
        Utils::isAdmin();

        if(isset($_POST)){
            
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $attribute_value_id = isset($_POST['attribute_value_id']) ? $_POST['attribute_value_id'] : false;

            if($product_id && $attribute_value_id){

                $product_attribute_value = ProductAttributeValue::where('product_id', $product_id)->first();
                $product_attribute_value->attribute_value_id = $attribute_value_id;
                
                $save = $product_attribute_value->update();

                if($save){

                    die('success');

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



    public function actionShow2(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $product = Product::with('Category')->with('Images')->find($id);


            if($product){
                die($product);

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        die('error');
    }


    public function actionWithStock(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){

            /**
             * Debemos traer los productos que tengan stock, y además
             * los que son a contra-pedido, éstos productos tienen
             * stock = 0
             */
            $product = Product::find($id);

            if($product->stock > 0 || $product->delivery_delay > 0){
                die($product);
            } else {

                die('out_of_stock');
            }
        } else {

            die('out_of_stock');
        }

        die('out_of_stock');
    }


    /**
     * Método para obtener la moneda de un producto
     */
    /*public function actionGetCurrency(){
        Utils::isAdmin();

        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;

        if($product_id){
            $product = Product::find($product_id);

            if($product){
                die(json_encode($product->currency_id));
            } 

        } else {

            die('error');
        }

        die('error');
    }*/


    public function actionAll(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $product = Product::find($id);

            if($product){
                die($product);
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
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : null;
            $product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : null;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
            $brand = isset($_POST['brand']) ? $_POST['brand'] : null;
            $price = isset($_POST['price']) ? $_POST['price'] : null;
            $offer = isset($_POST['offer']) ? $_POST['offer'] : null;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
            $stock_alert = isset($_POST['stock_alert']) ? $_POST['stock_alert'] : 5;
            $delivery_delay = isset($_POST['delivery_delay']) ? $_POST['delivery_delay'] : 0;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : null;

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;
            $images = isset($_POST['arrayOf_images']) ? json_decode($_POST['arrayOf_images']) : null;

            $price_final = Utils::calculatePrice($price, $offer);

            //dd('Precio final: ' . $price_final);

            if($id && $name && $description && $product_type_id  && $category_id  && $price && $slug){
                $product = Product::find($id);
                $product->name =  $name;
                $product->description = $description;
                $product->product_type_id = $product_type_id;
                $product->category_id = $category_id;
                $product->brand = $brand;
                $product->price = $price;
                $product->price_final = $price_final;
                $product->offer = $offer;
                $product->stock = $stock;
                $product->stock_alert = $stock_alert;
                $product->delivery_delay = $delivery_delay;
                $product->slug = $slug;

                if($image){
                    // Subir imagen principal
                    $image_name = $_FILES['file']['name'];
                    $image_type = $_FILES['file']['type'];

                    $random_str = Utils::random_str(8);
                    $image_name_final = '/assets/uploads/products/' . $random_str . '-' . $image_name;
                        
                    if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                        move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                    } else {
                        die('error');
                    }

                    $product->image = $image_name_final;
                }

                
                $update = $product->update();


                /* Gallery */
                ImageProduct::where('product_id', $id)->delete();
            
                for ($i = 0; $i < count($images); $i++) { 
                    $image_product = new ImageProduct();
                    $image_product->product_id = $id;
                    $image_product->image_id = $images[$i];
                    
                    $save_image_product = $image_product->save();
                }

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
            $product = Product::find($id);
            $product->is_deleted = 1;
            $deleted = $product->update();

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
        /*
        //->select('products.name as nameProduct')
        $products = Product::with('Category')->select('products.name as nameProduct','products.category_id')->get();
        $productsTest = Product::join('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.nameCategory')
        ->get();
        echo '{"data": '.$productsTest.'}';
        */
        
        $products = Product::with('Category')->get();

    
        echo '{"data": '.$products.'}';
    }


    public function actionList_removed(){
        Utils::isAdmin();
        
        $products = Product::with('Category')->where('is_deleted', '=', '1')->get();
        
        echo '{"data": '.$products.'}';
    }


    public function actionRestore(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $product = Product::find($id);
            $product->is_deleted = NULL;
            $restored = $product->update();

            if($restored){
                die('restored');

            } else {
                die('error');
                
            }

        } else {
            die('error');

        }

        die('error');
    }


    public function actionGallery(){
        Utils::isAdmin();

        $images = Image::all();

        //$product = Product::find($id);

        $include = 'app/views/admin/products/gallery.php';
        $product_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_index_active' => $product_index_active,
            'images' => $images
            //'product' => $product
        ]);
    }

    public function actionUpload_image(){
        Utils::isAdmin();
        
        $image = isset($_FILES['file']) ? $_FILES['file'] : false;



        $image_name = $_FILES['file']['name'];
        $image_type = $_FILES['file']['type'];
        
        $random_str = Utils::random_str(8);
        $image_name_final = '/assets/uploads/products/' . $random_str . '-' . $image_name;
            
        if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
            move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
        } else {
            die('error');
        }

        
        $product->image = $image_name_final;

    }

    public function actionSave_images($id){
        Utils::isAdmin();

        //dd($_FILES);

        if(isset($_POST)){

            $image = isset($_FILES['file']) ? $_FILES['file'] : false;
            
            $file_gallery_1 = isset($_FILES['file_gallery_1']) ? $_FILES['file_gallery_1'] : false;
            $file_gallery_2 = isset($_FILES['file_gallery_2']) ? $_FILES['file_gallery_2'] : false;
            $file_gallery_3 = isset($_FILES['file_gallery_3']) ? $_FILES['file_gallery_3'] : false;
            $file_gallery_4 = isset($_FILES['file_gallery_4']) ? $_FILES['file_gallery_4'] : false;

            if($image){
      
                /* Subir imagen al servidor */
                $image = isset($_FILES['file']) ? $_FILES['file'] : false;
                $image_name = $_FILES['file']['name'];
                $image_type = $_FILES['file']['type'];
                
                $random_str = Utils::random_str(8);

                $image_name_final = '/assets/uploads/products/' . $random_str . '-' . $image_name;
                    
                if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'){
                    move_uploaded_file($image['tmp_name'], 'public' . $image_name_final);
                } else {
                    die('error');
                }

                $product = Product::find($id);

                $product->image = $image_name_final;
        
                $save_product = $product->save();

                if($save_product){
                    Response::redirect('/admin/product/show/' . $id);
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


    /**
     * Método para destacar un producto
     */
    public function actionFeatured(){
        Utils::isAdmin();

        if(isset($_POST)){
            
            $product_id = isset($_POST['id']) ? $_POST['id'] : false;

            if($product_id){

                $product = Product::find($product_id);
                $product->is_featured = 1;
                $update = $product->update();

                if($update){

                    die('success');

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


    /**
     * Método para quitar producto destacado
     */
    public function actionUnfeatured(){
        Utils::isAdmin();

        if(isset($_POST)){
            
            $product_id = isset($_POST['id']) ? $_POST['id'] : false;

            if($product_id){

                $product = Product::find($product_id);
                $product->is_featured = 0;
                $update = $product->update();

                if($update){

                    die('success');

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