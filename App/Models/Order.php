<?php
namespace App\Models;

use MvcPhp\Database\Model;

class Order extends Model{
    public function __construct($table)
    {
        Model::$table = $table;
    }
}
new Order('orders');