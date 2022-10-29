<?php

namespace App\Controllers;
use App\Models\Products;
class HomeController
{
    public function index()
    {
       return view('home');
    }    
   
    public function DBtest(){
        dump(Products::get());
    }
    public function create()
    {
     
    }
}