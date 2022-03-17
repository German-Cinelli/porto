<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

    protected $table = "users";

    //use SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'city',
        'location',
        'address',
        'document',
        'phone',
        'cellphone',
        'rut',
        'confirmed',
        'confirmation_code'
    ];

   
    public function role(){
        return $this->belongsTo('app\models\Role');
    }


    public function orders(){
        return $this->hasMany('app\models\Order');
    }

    
    public function favorites(){
        return $this->belongsToMany('app\models\Favorite', 'favorites');
    }


    public function post_comments(){
        return $this->belongsToMany('app\models\PostUser', 'comments');
    }


    public function product_comments(){
        return $this->belongsToMany('app\models\ProductUser', 'comments');
    }


    public function reviews(){
        return $this->belongsToMany('app\models\Review', 'reviews');
    }

    public function combos_customers(){
        return $this->hasMany('app\models\ComboCustomer');
    }

}
