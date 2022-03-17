<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model {

    protected $table = "payment_method";

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function orders(){
        return $this->hasMany('app\models\Order');
    }

}
