<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;


class HelpController {

    public function actionIndex(){
        Utils::isAdmin();

        $include = 'app/views/admin/help/index.php';
        $help_index_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'help_index_active' => $help_index_active,
        ]);
        
    }

}