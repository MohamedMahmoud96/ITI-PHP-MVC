<?php

namespace App\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;




class HomeController
{


    public function index()
    {    
        $products = Product::get();
        $categories = Category::get();
        $rooms = Room::get();
        $user = auth();
        $user_id = auth()['id'];
        $cardProducts = Product::query("SELECT products.price, products.id , 
        products.name ,products.image ,carts.quantity 
        FROM products ,users,carts WHERE products.id= carts.product_id
         and users.id=$user_id and carts.user_id=$user_id;");
        $cartProductsIds = [];
        foreach ($cardProducts as $cartProduct) {
            array_push($cartProductsIds, $cartProduct['id']);
        }
        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'cartProducts' => $cardProducts,
            "user" => $user,
            "rooms" => $rooms,
            "cartProductsIds" => $cartProductsIds
        ]);
    }
    // public function search()
    // {

    //     $search = $_POST['search'];
    //     //   dd($search);
    //     $products = Product::query('SELECT * FROM products WHERE  name like " % ' . $search . ' % "');

    //     $categories = Category::get();
    //     $rooms = Room::get();
    //     $user = User::findone('id', '1');

    //     $cardProducts = Product::query("SELECT products.price, products.id , 
    //     products.name ,products.image ,carts.quantity 
    //     FROM products ,users,carts WHERE products.id= carts.product_id
    //      and users.id='1' and carts.user_id='1';");
    //     $cartProductsIds = [];
    //     foreach ($cardProducts as $cartProduct) {
    //         array_push($cartProductsIds, $cartProduct['id']);
    //     }
    //     return view('home', [
    //         'products' => $products,
    //         'categories' => $categories,
    //         'cartProducts' => $cardProducts,
    //         "user" => $user,
    //         "rooms" => $rooms,
    //         "cartProductsIds" => $cartProductsIds
    //     ]);
    // }

    public function create()
    {
        $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user = user::create(['name ' => $_REQUEST['name'], 'email' => $_REQUEST['email'], 'password' => $password]);
    }
}
