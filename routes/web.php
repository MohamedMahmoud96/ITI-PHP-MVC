<?php
use  App\Controllers\HomeController;
use MvcPhp\Http\Route;




Route::get('home', [HomeController::class, 'index']);  

Route::get('dbb', [HomeController::class, 'DBtest']);

Route::post('register', [HomeController::class, 'create']);