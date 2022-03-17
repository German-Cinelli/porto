<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model {

    protected $table = "providers";

    //use SoftDeletes;

    protected $fillable = [
        'business_name',
        'rut',
        'city',
        'location',
        'address',
        'phone',
        'cellphone'
    ];


    public function invoices(){
        return $this->hasMany('app\models\Invoice');
    }

}
