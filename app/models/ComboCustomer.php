<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ComboCustomer extends Model {

    protected $table = "combo_customer";

    use SoftDeletes;

    protected $fillable = [
        
    ];

    public function combo(){
        return $this->belongsTo('app\models\Combo');
    }

    public function user(){
        return $this->belongsTo('app\models\User');
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }

}
