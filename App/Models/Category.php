<?php
namespace App\Models;

use MvcPhp\Database\Model;

class Category extends Model{
    public function __construct($table)
    {
        Model::$table = $table;
    }
}
new Category('categories');
