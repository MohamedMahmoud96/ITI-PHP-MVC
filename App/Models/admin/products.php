<?php 
namespace App\Models\admin;
use MvcPhp\Database\Model;
// use Model;
class Products extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
}
new products("products");