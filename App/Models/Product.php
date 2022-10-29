<?php 
namespace App\Models;
use MvcPhp\Database\Model;

class Product extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
 
}
new Product("products");