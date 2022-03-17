<?php

use Illuminate\Database\Capsule\Manager as Database;

$database = new Database();

$database->addConnection([
    "driver" => "mysql",
    "host" => "localhost",
    "port" => 3306,
    "username" => "root",
    "password" => "",
    "database" => "sevenparts",
    "charset" => 'utf8',
    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
]);

$database->setAsGlobal();

$database->bootEloquent();
