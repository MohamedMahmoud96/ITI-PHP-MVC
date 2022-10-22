<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

use Dotenv\Dotenv;

require_once __DIR__ .'/../src/support/helper.php';
require_once base_path() . '/vendor/autoload.php';
require_once base_path() . '/routes/web.php';

$env = Dotenv::createImmutable(base_path()); 
$env->load();
app()->run();


