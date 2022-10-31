<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use Dotenv\Dotenv;

require_once __DIR__ . '/../src/support/helper.php';
require_once base_path() . '/vendor/autoload.php';

$env = Dotenv::createImmutable(base_path());
$env->load();


require_once base_path() . "/src/Database/DB.php";
require_once base_path() . "/src/Database/Model.php";
require_once base_path() . '/routes/web.php';
app()->run();
