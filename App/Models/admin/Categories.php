<?php 
namespace App\Models\admin;
use MvcPhp\Database\Model;
// use Model;
class Categories extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
}
new Categories("categories");