<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $table = "images";
   
    protected $fillable = [
        'path',
    ];

    
    public function products(){
        return $this->belongsToMany('app\models\Product');
    }

}
