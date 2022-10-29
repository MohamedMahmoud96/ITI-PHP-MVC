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

