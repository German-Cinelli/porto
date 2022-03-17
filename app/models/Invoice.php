<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    protected $table = "invoices";

    protected $fillable = [
        'date',
        'sub_total',
        'total_amount',
        'debt'
    ];

    public function invoices_products(){
        return $this->hasMany('app\models\InvoiceProduct');
    }

    public function provider(){
        return $this->belongsTo('app\models\Provider');
    }

    public function status(){
        return $this->belongsTo('app\models\Status');
    }

    public function payment_history(){
        return $this->hasMany('app\models\PaymentHistory');
    }

    public function payment_type(){
        return $this->belongsTo('app\models\PaymentType');
    }

}
