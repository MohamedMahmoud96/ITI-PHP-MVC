<?php

use App\Controllers\Auth\LoginController;
use  App\Controllers\HomeController;
use App\Controllers\OrderController;
use MvcPhp\Http\Route;




Route::get('/', [HomeController::class, 'index']);
Route::get('/mayada',function()
{
    echo 'mayada';
});
Route::get('/auth/login',[LoginController::class,'index']);
Route::post('/auth/login', [LoginController::class, 'login']); 
Route::post('/register', [HomeController::class, 'create']);
// Route::get("./category/products/{$category_id}", [HomeController::class, 'getProductsCategory']);
Route::post("/cart/addto", [HomeController::class, 'addToCart']);
// Route::post("./order/create/$user_id",[OrderController::class,'makeOrder']); 111