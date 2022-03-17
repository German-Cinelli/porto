<?php

namespace app\controllers\admin;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\Category;
use app\models\Product;

use app\helpers\Utils;
use \Response;


class CategoryController {

    
  
    public function actionIndex(){
        
        Utils::isAdmin();
        
        $categories = Category::orderBy('order', 'ASC')->get();
        //dd($categories);

        $include = 'app/views/admin/categories/index.php';
       
        Response::render('admin/dashboard', [
            'include' => $include,
            'product_menu_active' => 'active menu_open',
            'category_index_active' => 'active',
            'categories' => $categories
        ]);
        
    }



     /**
     *
     */
    public function actionStore(){
        Utils::isAdmin();

        if(isset($_POST)){

            /* Comprobamos la cantidad de categorías que puede ingresar segun el plan */
            $can_insert_category = Utils::CanInsertCategory();

            if($can_insert_category){
                die('warning');
            }

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;

            if($name && $slug){

                /* Comprobamos si el slug ya existe */
                $cat = Category::where('slug', $slug)->first();

                if($cat){
                    die('already_exists');
                } else {

                    $category = new Category();
                    $category->name = $name;
                    $category->slug = $slug;
                    $save = $category->save();

                    if($save){
                        $category = Category::latest()->first();

                        $item = '<li class="dd-item dd3-item" data-id="'.$category->id.'" >
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><span id="label_show'.$category->id.'">'.$category->name.'</span>
                                <span class="span-right">/<span id="link_show'.$category->id.'">'.$category->slug.'</span> &nbsp;&nbsp; 
                                    <a class="edit-button" id="'.$category->id.'" label="'.$category->name.'" link="'.$category->slug.'" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil text-yellow"></i></a>
                                    <a class="del-button" id="'.$category->id.'"><i class="fa fa-trash text-red"></i></a>
                                </span> 
                            </div>';

                        $arr['type'] = 'add';

                        die($item);
        
                        //die('saved');
                    }

                    //die('error');

                }

                
 
            } else {

                die('error');
            }
        } else {
            
            die('error');
        }
    }

  
    /**
     *
     */
    public function actionShow(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        $category = Category::find($id);

        if($category){
            die($category);
        }

        die('error');
    }


     /**
      *
      */
    public function actionUpdate(){
        Utils::isAdmin();
        
        if(isset($_POST)){

            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : false;
            
            if($id && $name && $slug){

                // Comprobamos si el slug esta disponible
                $cat = Category::where('slug', '=', $slug)->first();

                if($cat && $cat->id != $id){
                    die('error');
                }

                $category = Category::find($id);
                $category->name = $name;
                $category->slug = $slug;

                $update = $category->update();

                if($update){
                    $arr = [
                        'id' => $id,
                        'name' => $name,
                        'slug' => $slug
                    ];
                    die(json_encode($arr));
                } else {
                    die('error');
                }

                die('error');

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        
    }


    /**
     * Actualizar árbol menu
     * Método para editar el arbol de categorías-subcategorías y posociones
     */
    public function actionUpdate2(){
        Utils::isAdmin();

        $data = json_decode($_POST['data']);
        print_r($data);

        function parseJsonArray($jsonArray, $parentID = 0) {

            $return = array();
            foreach ($jsonArray as $subArray) {
                $returnSubSubArray = array();
                if (isset($subArray->children)) {
                    $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
                }

                $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
                $return = array_merge($return, $returnSubSubArray);
            }

        return $return;

        }

        $readbleArray = parseJsonArray($data);

        $i=0;
        foreach($readbleArray as $row){
        $i++;
        
            DB::table('categories')
                ->where('id', $row['id'])
                ->update(['parent_id' => $row['parentID'], 'order' => $i]);

            //$db->exec("update tbl_menu set parent = '".$row['parentID']."', sort = '".$i."' where id = '".$row['id']."' ");
        }
        
        
    }

    

     /**
      * Método para eliminar un registro de la DB (Borrado lógico)
      *
      */
    public function actionDestroy(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $parent = Category::findOrFail($id);

            $array_of_ids = $this->getChildren($parent);
            // Appending the parent category id
            array_push($array_of_ids, $id);

            /* Debemos actualizar el category_id de cada producto y setearle 'Sin categorizar' */
            foreach($array_of_ids as $id){

                $update_category_id = DB::select("UPDATE products SET category_id = 72 
                    WHERE category_id = $id
                ");

               
            }
            
            // Destroying all of them
            $destroy = Category::destroy($array_of_ids);

        }
        

        //$deleted = Category::find($id)->delete();

        if($destroy){
            die('deleted');
        }

        die('error');

    }


    private function getChildren($category){
        $ids = [];

        foreach ($category->children as $cat) {
            $ids[] = $cat->id;
            $ids = array_merge($ids, $this->getChildren($cat));
        }

        return $ids;
    }


    /**
     * Método para devolver todas las categorias
     */
    public function actionList(){
        Utils::isAdmin();
        
        $categories = Category::with('subcategories')->get();

        echo '{"data": '.$categories.'}';
    }


    /**
     * Método para devolver todas las categorias removidas
     */
    public function actionList_removed(){
        Utils::isAdmin();
        
        $categories = Category::onlyTrashed()->get();
        
        echo '{"data": '.$categories.'}';
        
    }


    /**
     * Método para restaurar una categoría
     */
    public function actionRestore(){
        Utils::isAdmin();

        $id = $_POST['id'];

        $restored = Category::withTrashed()->find($id)->restore();

        if($restored){
            die('restored');
        }

        die('error');

    }


}