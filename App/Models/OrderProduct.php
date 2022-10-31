<?php
namespace App\Models;

use MvcPhp\Database\Model;

class OrderProduct extends Model{
    public function __construct($table)
    {
        Model::$table = $table;
    }   
}
new OrderProduct('order_product');
