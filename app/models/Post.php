<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    protected $table = "posts";

    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image'
    ];


    public function post_comments(){
        return $this->hasMany('app\models\PostUser')->where('parent_id', 0);
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }


}
