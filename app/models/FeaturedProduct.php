<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedProduct extends Model {

    protected $table = "featured_products";

    use SoftDeletes;

    protected $fillable = [
        'title',
        'description'
    ];

    public function product(){
        return $this->belongsTo('app\models\Product');
    }

    
}
