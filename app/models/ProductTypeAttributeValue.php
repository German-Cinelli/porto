<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTypeAttributeValue extends Model {

    /**
     * Tabla pivote entre
     * product_type - attribute_value
     */

    use SoftDeletes;

    protected $table = "product_type_attribute_value";

    public function product_type(){
        return $this->belongsTo('app\models\ProductType');
    }

    public function attribute_value(){
        return $this->belongsTo('app\models\AttributeValue');
    }

}