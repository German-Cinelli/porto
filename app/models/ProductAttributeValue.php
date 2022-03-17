<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model {

    /**
     * Tabla pivote entre
     * product - attribute_value
     */

    protected $table = "product_attribute_values";


    public function product(){
        return $this->belongsTo('app\models\Product');
    }


    public function get_products(){
        return $this->hasMany('app\models\ProductAttributeValue');
    }

}