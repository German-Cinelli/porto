<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeValue extends Model {

    protected $table = "attribute_value";

    //use SoftDeletes;

    public function attribute(){
        return $this->belongsTo('app\models\Attribute' , 'attribute_id');
    }

    public function product_types(){
        return $this->belongsToMany('app\models\ProductType', 'product_type_attribute_value', 'product_type_id');
        
    }

    public function products(){
        return $this->belongsToMany('app\models\Product');
    }

}