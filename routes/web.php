<?php

use App\Controllers\CartController;
use  App\Controllers\HomeController;

use  App\Controllers\LoginController;
use App\Controllers\LogoutController;

use App\Controllers\OrderController;

use  App\Controllers\admin\HomeController;
use  App\Controllers\admin\userController;
use  App\Controllers\admin\productsController;
use  App\Controllers\admin\orderController;
use MvcPhp\Http\Route;


Route::get('home', [HomeController::class, 'index']);

Route::get('dbb', [HomeController::class, 'DBtest']);

Route::post('register', [HomeController::class, 'create']);

// =========================== Admin pages ====================
Route::get('admin', [HomeController::class, 'dash']);
// ============== user routes =========================
Route::get('admin/users', [userController::class, 'index']);
Route::get('admin/users/add', [userController::class, 'add']);
Route::post('admin/users/store', [userController::class, 'get_add']);
Route::post('admin/users/delete', [userController::class, 'delete']);

// ============== products routes =========================
Route::get('admin/products', [productsController::class, 'index']);
Route::get('admin/products/add', [productsController::class, 'add']);
Route::post('admin/products/store', [productsController::class, 'store']);
Route::post('admin/products/edite', [productsController::class, 'edite']);
Route::post('admin/products/update', [productsController::class, 'update']);
Route::post('admin/products/delete', [productsController::class, 'delete']);


// ============================= Orders routes ====================
Route::get('admin/orders/index', [orderController::class, 'index']);
Route::get('admin/orders/add', [orderController::class, 'add']);
Route::get('admin/orders/store', [orderController::class, 'store']);
Route::get('admin/orders/edite', [orderController::class, 'edite']);
Route::get('admin/orders/update', [orderController::class, 'update']);
Route::get('admin/orders/delete', [orderController::class, 'delete']);



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
