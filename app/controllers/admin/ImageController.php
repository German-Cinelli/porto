<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use app\models\Image;


class ImageController {

    
    public function actionStore(){
        Utils::isAdmin();


        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {

                    if (file_exists('public/assets/uploads/products/' . $_FILES["files"]["name"][$i])) {
                        echo 'El archivo ' . $_FILES["files"]["name"][$i] . ' ya existe en su librería de imágenes.';
                    } else {
                        
                        /* Subir imagen al servidor */
                        $image = new Image();
                        $image->path = '/assets/uploads/products/' . $_FILES["files"]["name"][$i];
                        $save_image = $image->save();

                        if($save_image){
                            move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'public/assets/uploads/products/' . $_FILES["files"]["name"][$i]);
                            echo 'El archivo ' . $_FILES["files"]["name"][$i] . ' se ha subido correctamente.';
                        } else {
                            echo 'Error al subir imagen al servidor.';
                        }
                        
                    }

                }
            }
        } else {
            echo 'Por favor elija al menos una imagen.';
        }

        die();
        
    }

  
    public function actionUpdate(){
        Utils::isAdmin();
        if(isset($_POST)){
            $id = $_POST['id'];
            $name = $_POST['name'];
            //$name = isset($_POST['name']) ? $_POST['name'] : false;

            if($name){
                $category = Category::find($id);
                $category->name = $name;

                $update = $category->update();

                if($update){
                    die('updated');
                }

                die('error');

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        
    }


    public function actionList(){
        Utils::isAdmin();
        
        $images = Image::all();

        die($images);
    }


}