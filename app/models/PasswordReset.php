<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordReset extends Model {

    use SoftDeletes;

    protected $table = "password_resets";

    protected $fillable = [
        'email',
        'token',
    ];

}
