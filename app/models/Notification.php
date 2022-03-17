<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model {

    protected $table = "notifications";

    use SoftDeletes;

    protected $fillable = [
        'image',
        'message'
    ];


}
