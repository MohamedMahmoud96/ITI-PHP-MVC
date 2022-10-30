<?php
use  App\Controllers\admin\HomeController;
use  App\Controllers\admin\userController;
use  App\Controllers\admin\productsController;
use  App\Controllers\admin\orderController;
use  App\Controllers\admin\categoriesController;
use  App\Controllers\Controller;


use MvcPhp\Http\Route;

Route::get('home', [HomeController::class, 'index']);  

Route::post('admin/search', [Controller::class, 'search']);  


Route::get('dbb', [HomeController::class, 'DBtest']);

Route::post('register', [HomeController::class, 'create']);

// =========================== Admin pages ====================
Route::get('admin', [HomeController::class, 'dash']);
// ============== user routes =========================
Route::get('admin/users', [userController::class, 'index']);
Route::get('admin/users/add', [userController::class, 'add']);
Route::post('admin/users/store', [userController::class,'store']);
Route::post('admin/users/delete', [userController::class,'delete']);

// ============== categories routes =========================
Route::get('admin/categories', [categoriesController::class, 'index']);
Route::get('admin/categories/add', [categoriesController::class, 'add']);
Route::post('admin/categories/store', [categoriesController::class, 'store']);
Route::post('admin/categories/edite', [categoriesController::class, 'edite']);
Route::post('admin/categories/update', [categoriesController::class, 'update']);
Route::post('admin/categories/delete', [categoriesController::class, 'delete']);

// ============== products routes =========================
Route::get('admin/products', [productsController::class, 'index']);
Route::get('admin/products/add', [productsController::class, 'add']);
Route::post('admin/products/store', [productsController::class, 'store']);
Route::post('admin/products/edite', [productsController::class, 'edite']);
Route::post('admin/products/update', [productsController::class, 'update']);
Route::post('admin/products/delete', [productsController::class, 'delete']);

// ============================= Orders routes ====================
Route::get('admin/orders', [orderController::class, 'index']);
Route::get('admin/orders/add', [orderController::class, 'add']);
Route::post('admin/orders/cancle', [orderController::class, 'cancle']);
Route::post('admin/orders/delevery', [orderController::class, 'to_delvery']);
Route::post('admin/orders/done', [orderController::class, 'done']);
Route::post('admin/orders/delete', [orderController::class, 'delete']);
Route::post('admin/orders/userorder', [orderController::class, 'user_order']);

// Route::get('admin/orders/edite', [orderController::class, 'edite']);
// Route::get('admin/orders/update', [orderController::class, 'update']);

