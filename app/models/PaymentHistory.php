<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model {

    protected $table = "payment_history";

    protected $fillable = [
        'payment',
        'debt',
    ];


    public function invoice(){
        return $this->belongsTo('app\models\Invoice');
    }


}
