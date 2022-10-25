<?php

namespace App\Controllers;
use App\Models\Products;
use App\Models\user;

class HomeController
{
    public function index()
    {
    $all = Products::get();
        dump($all);
       //return view('home');
    }    

    public function create()
    {
     
    }
}