<?php 
namespace App\Models;
use Src\Database\Model;
// use Model;
class user extends Model
{
    public function __construct($table)
    {
     Model::$table=$table;
    }
 
}
new user("user");