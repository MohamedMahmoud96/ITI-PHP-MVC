<?php
use  App\Controllers\HomeController;
use MvcPhp\Http\Route;




Route::get('/', [HomeController::class, 'index']);  

Route::post('/register', [HomeController::class, 'create']);