<?php

namespace App\Controllers;

use App\Models\Login;
use App\Models\Products;
use App\Models\user;
use MvcPhp\Database\Model;
use MvcPhp\Http\Request;

class HomeController
{
    public function index()
    {
       
        return view('home');    
    }    

    public function create()
    {
        $password = password_hash($_REQUEST['password'],PASSWORD_DEFAULT);
        $user = user::create(['name '=> $_REQUEST['name'], 'email' => $_REQUEST['email'], 'password' => $password]);
        
    }
}