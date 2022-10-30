<?php

namespace App\Controllers\admin;
use App\Models\admin\Products;

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
        $sql="SELECT * from products";
        return  Products::query($sql);
    }
    public function test(){
        return view("users");
    }



//   =================== Dashboard Pages ===========================


public function dash()
{
   return view('../Dashboard/index');
}  



public function admin_prducts()
{
   return view('../Dashboard/products/products');
}  

public function admin_orders()
{
   return view('Dashboard/orders/orders');
}  





}






