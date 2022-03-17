<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

    protected $table = "orders";

    use SoftDeletes;

    protected $fillable = [
        'mercadopago_payment_id',
        'full_name',
        'shipping_city',
        'shipping_location',
        'shipping_address',
        'shipping_cost',
        'sub_total',
        'dto',
        'total_amount'
    ];

    public function items(){
        return $this->hasMany('app\models\Item');
    }


    public function user(){
        return $this->belongsTo('app\models\User');
    }


    public function status(){
        return $this->belongsTo('app\models\Status');
    }


    public function payment_type(){
        return $this->belongsTo('app\models\PaymentType');
    }

    public function shipping_method(){
        return $this->belongsTo('app\models\ShippingMethod');
    }

    public function payment_method(){
        return $this->belongsTo('app\models\PaymentMethod');
    }


    public function canceled_order(){
        return $this->hasMany('app\models\CanceledOrder');
    }


    public function coupons(){
        return $this->belongsToMany('app\models\Coupon');
    }
    

}
