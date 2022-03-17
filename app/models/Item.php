<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model {

    protected $table = "items";

    use SoftDeletes;

    protected $fillable = [
        'unit_price',
        'dto',
        'quantity',
        'amount'
    ];

    public function order(){
        return $this->belongsTo('app\models\Order');
    }


    public function product(){
        return $this->belongsTo('app\models\Product');
    }


    /*public function currency(){
        return $this->belongsTo('app\models\Currency');
    }*/

}
