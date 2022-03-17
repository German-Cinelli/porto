<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = "roles";
   
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    
    // One To Many
    public function users(){
        return $this->hasMany('app\models\User');
    }

}
