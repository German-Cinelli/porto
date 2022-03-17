<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model {

    protected $table = "reviews";

    use SoftDeletes;

    protected $fillable = [
        'score',
        'comment'
    ];


    public function user(){
        return $this->belongsTo('app\models\User');
    }

    public function product(){
        return $this->belongsTo('app\models\Product');
    }

}
