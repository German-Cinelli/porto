<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountType extends Model {

    protected $table = "discount_type";

    use SoftDeletes;
   
    protected $fillable = [
       
    ];

    public function coupons(){
        return $this->hasMany('app\models\Coupons');
    }

}
