<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {

    protected $table = "inbox";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status'
    ];

}
