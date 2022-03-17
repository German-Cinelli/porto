<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    protected $table = "config";

    public $timestamps = false;
   
    protected $fillable = [
        'company_name',
        'currency',
        'symbol',
        'mail',
        'city',
        'location',
        'address',
        'phone',
        'cellphone',
        'facebook',
        'instagram'
    ];


}
