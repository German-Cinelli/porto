<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Combo extends Model {

    protected $table = "combos";

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function combos_items(){
        return $this->hasMany('app\models\ComboItem');
    }

    public function combos_customers(){
        return $this->hasMany('app\models\ComboCustomer');
    }

}
