<?php

namespace App\Models;

use MvcPhp\Database\Model;

class User extends Model
{
    public function __construct($table)
    {
        Model::$table = $table;
    }
}
new User("users");
