<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model {

    protected $table = "attribute";

    //use SoftDeletes;

    public function attribute_values(){
        return $this->hasMany('app\models\AttributeValue', 'attribute_value');
    }


}