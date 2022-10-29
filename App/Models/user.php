<?php 
namespace App\Models;
use MvcPhp\Database\Model;

class user extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
 
}
new user("users");