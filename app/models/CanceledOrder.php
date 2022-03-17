<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class CanceledOrder extends Model {

    protected $table = "canceled_orders";

    protected $fillable = [
        'reason'
    ];

    public function order(){
        return $this->belongsTo('app\models\Order');
    }


}
