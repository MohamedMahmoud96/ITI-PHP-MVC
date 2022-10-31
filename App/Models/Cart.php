<?php

namespace App\Models;

use MvcPhp\Database\Model;

class Cart extends Model
{
    public function __construct($table)
    {
        Model::$table = $table;
    }
}
new Cart('carts');
