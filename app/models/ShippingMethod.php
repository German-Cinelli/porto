<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingMethod extends Model {

    protected $table = "shipping_method";

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'message',
        'cost'
    ];

    public function orders(){
        return $this->hasMany('app\models\Order');
    }

}
