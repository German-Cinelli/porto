<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model {

    protected $table = "favorites";

    use SoftDeletes;


    public function user(){
        return $this->belongsTo('app\models\User');
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }
    
}
