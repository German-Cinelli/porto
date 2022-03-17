<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model {

    protected $table = "newsletters";

    use SoftDeletes;
   
    protected $fillable = [
        'email',
    ];

}
