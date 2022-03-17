<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PostUser extends Model {

    protected $table = "posts_users";

    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'comment'
    ];


    /*public function parent(){
        return $this->belongsTo('app\models\Comment', 'parent_id');
    }*/

    public function replies(){
        return $this->hasMany('app\models\PostUser', 'parent_id', 'id');
    }


    public function user(){
        return $this->belongsTo('app\models\User');
    }

    public function post(){
        return $this->belongsTo('app\models\Post');
    }

}
