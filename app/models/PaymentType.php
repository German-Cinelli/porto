<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model {

    protected $table = "payment_type";

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];


    public function orders(){
        return $this->hasMany('app\models\Order');
    }

    public function invoices(){
        return $this->hasMany('app\models\Invoice');
    }


}
