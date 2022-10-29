<?php 
namespace App\Models\admin;
use MvcPhp\Database\Model;
// use Model;
class order_product extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
}
new order_product("order_product");