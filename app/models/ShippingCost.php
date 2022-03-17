<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model {

    protected $table = "shipping_cost";

    public $timestamps = false;
   
    protected $fillable = [
        'cost',
    ];

}