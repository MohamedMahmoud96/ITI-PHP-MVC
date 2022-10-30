<?php


use App\Controllers\CartController;
use  App\Controllers\HomeController;

use  App\Controllers\LoginController;
use App\Controllers\LogoutController;

use App\Controllers\OrderController;

use MvcPhp\Http\Route;







Route::get('/home', [HomeController::class, 'index']);
Route::get('/users', function () {
    return view('admin/users/users');
});
Route::get('/admin', function () {
    return view('admin/index');
});
Route::get("/add/new/user", function () {
    return view('register');
});
Route::post('/insertuser', [HomeController::class, 'create']);

Route::get('/logout', [LogoutController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);


Route::get('/', [HomeController::class, 'index']);
Route::post("/cart/addto", [CartController::class, 'addToCart']);
Route::post("/cart/delete", [CartController::class, 'deleteCartProduct']);
Route::post("/cart/addquantity", [CartController::class, 'plusQuantity']);
Route::post("/cart/minusquantity", [CartController::class, 'minusQuantity']);
Route::post("/order/create", [OrderController::class, 'makeOrder']);
Route::get("/order/get", [OrderController::class, 'index']);
Route::post("/order/filter", [OrderController::class, 'filterOrderByDate']);
Route::post("/order/delete", [OrderController::class, 'cancelOrder']);
Route::post('/search', [HomeController::class, 'search']);