<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model {

    protected $table = "invoice_product";

    protected $fillable = [
        'unit_price',
        'quantity',
        'amount'
    ];

    public function invoice(){
        return $this->belongsTo('app\models\Invoice');
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }

}
