<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model {

    protected $table = "product_type";

    public $timestamps = false;

    public function products(){
        return $this->hasMany('app\models\Product');
    }

    public function attribute_values(){
        return $this->belongsToMany('app\models\AttributeValue', 'product_type_attribute_value', 'product_type_id');
    }

}