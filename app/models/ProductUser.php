<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUser extends Model {

    protected $table = "products_users";

    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'comment'
    ];


    public function replies(){
        return $this->hasMany('app\models\ProductUser', 'parent_id', 'id');
    }


    public function user(){
        return $this->belongsTo('app\models\User');
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }

}
