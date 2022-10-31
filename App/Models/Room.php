<?php

namespace App\Models;

use MvcPhp\Database\Model;

class Room extends Model
{
    public function __construct($table)
    {
        Model::$table = $table;
    }
}
new Room('rooms');
