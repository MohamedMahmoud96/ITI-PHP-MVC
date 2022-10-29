<?php
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
Route::post('admin/users/store', [userController::class,'get_add']);
Route::post('admin/users/delete', [userController::class,'delete']);

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

