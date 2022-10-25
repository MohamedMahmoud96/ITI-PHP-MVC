<?php 
namespace App\Models;
use MvcPhp\Database\Model;

class Products extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
 
}
new Products("products");