<?php

namespace App\Controllers;


use App\Models\Cart;
use App\Models\Room;
use App\Models\User;
use App\Models\Login;

use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use MvcPhp\Http\Request;
use MvcPhp\Database\Model;
use MvcPhp\validation\Validator;


class HomeController
{
   

    public function index()
    {
        $products = Product::get();   
        $categories = Category::get();
        $rooms = Room::get();
        $user =auth();
        $user_id=$user['id'];
        $cardProducts = Product::query("SELECT products.price, products.id , 
        products.name ,products.image ,carts.quantity 
        FROM products ,users,carts WHERE products.id= carts.product_id
         and users.id=$user_id and carts.user_id=$user_id;");
        $cartProductsIds=[];
        foreach($cardProducts as $cartProduct){
            array_push($cartProductsIds,$cartProduct['id']);
        }
        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'cartProducts' => $cardProducts,
            "user" => $user,
            "rooms" => $rooms,
            "cartProductsIds"=>$cartProductsIds
        ]);
    }
   

    public function create()
    {

    }
}
