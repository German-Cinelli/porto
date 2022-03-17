<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    protected $table = "products";

    //use SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'brand',
        'price',
        'price_final',
        'stock',
        'offer',
        'image',
        'is_featured',
        'delivery_delay',
        'tags',
        'stock_alert'
    ];

    public function get_attribute_values(){
        return $this->hasMany('app\models\ProductAttributeValue');
    }


    public function category(){
        return $this->belongsTo('app\models\Category');
    }

    public function product_type(){
        return $this->belongsTo('app\models\ProductType', 'product_type_id');
    }

    public function attribute_values(){
        return $this->belongsToMany('app\models\AttributeValue', 'product_attribute_values');
    }


    /*public function currency(){
        return $this->belongsTo('app\models\Currency');
    }*/


    public function images(){
        return $this->belongsToMany('app\models\Image');
    }


    public function items(){
        return $this->belongsToMany('app\models\Item', 'items');
    }


    public function invoices_products(){
        return $this->belongsToMany('app\models\InvoiceProduct', 'invoice_product');
    }


    public function featured_products(){
        return $this->belongsToMany('app\models\FeaturedProduct', 'featured_products');
    }


    public function favorites(){
        return $this->belongsToMany('app\models\Favorite', 'favorites');
    }


    public function posts(){
        return $this->hasMany('app\models\Post');
    }
    

    public function reviews(){
        return $this->hasMany('app\models\Review', 'reviews');
    }


    public function product_comments(){
        return $this->hasMany('app\models\ProductUser')->where('parent_id', 0);
    }


    public function combos_customers(){
        return $this->hasMany('app\models\ComboCustomer');
    }
    
    
}
