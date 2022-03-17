<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class CouponOrder extends Model {

    protected $table = "coupon_order";

    use SoftDeletes;

    protected $fillable = [
        
    ];

}
