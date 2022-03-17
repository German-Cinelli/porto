<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model {

    protected $table = "coupons";

    use SoftDeletes;
   
    protected $fillable = [
        'code',
        'description',
        'discount',
        'expiration_date'
    ];

    public function discount_type(){
        return $this->belongsTo('app\models\DiscountType');
    }

    public function orders(){
        return $this->belongsToMany('app\models\Order');
    }

}
