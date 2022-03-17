<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class ComboItem extends Model {

    protected $table = "combo_item";

    //use SoftDeletes;

    protected $fillable = [
        
    ];

    public function combo(){
        return $this->belongsTo('app\models\Combo');
    }

    public function product_type_attribute_value(){
        return $this->belongsTo('app\models\ProductTypeAttributeValue');
    }

}
