<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

    protected $table = "categories";

    //use SoftDeletes;
   
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'slug',
        'order'
    ];

    public function parent(){
        return $this->belongsTo('app\models\Category', 'parent_id');
    }

    public function children(){
        return $this->hasMany('app\models\Category', 'parent_id', 'id');
    }

    public function products(){
        return $this->hasMany('app\models\Product');
    }

}
