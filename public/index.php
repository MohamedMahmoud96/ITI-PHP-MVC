<?php 
<<<<<<< HEAD

ini_set('display_errors', 1);

=======
ini_set('display_errors', 1);
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
error_reporting(E_ALL);

use Dotenv\Dotenv;

require_once __DIR__ .'/../src/support/helper.php';
require_once base_path() . '/vendor/autoload.php';
<<<<<<< HEAD
$env = Dotenv::createImmutable(base_path()); 
$env->load();

require_once "../src/Database/DB.php";
require_once "../src/Database/Model.php";
=======

$env = Dotenv::createImmutable(base_path()); 
$env->load();


require_once base_path() . "/src/Database/DB.php";
require_once base_path() . "/src/Database/Model.php";
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
require_once base_path() . '/routes/web.php';
app()->run();


