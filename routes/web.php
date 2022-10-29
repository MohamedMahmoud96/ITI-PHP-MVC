<<<<<<< HEAD
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

=======
<?php
use  App\Controllers\HomeController;
use  App\Controllers\LoginController;
use App\Controllers\LogoutController;
use MvcPhp\Http\Route;





Route::get('/', [HomeController::class, 'index']);  
Route::get('/home', [HomeController::class, 'index']);  
Route::get('/users', function(){
    return view('admin/users/users');
});  
Route::get('/admin', function(){
    return view('admin/index');
});  
Route::get("/add/new/user", function(){
    return view('register');
});
Route::post('/insertuser', [HomeController::class, 'create']);

Route::get('/logout', [LogoutController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
