<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model {

    protected $table = "status";

    use SoftDeletes;

    protected $fillable = [
        
    ];
   

    public function orders(){
        return $this->hasMany('app\models\Order');
    }


    public function invoices(){
        return $this->hasMany('app\models\Invoice');
    }

}
