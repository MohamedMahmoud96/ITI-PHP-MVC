<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\user;
use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use App\Models\Room;
use MvcPhp\Database\Model;
use MvcPhp\validation\Validator;

class HomeController
{
    public function index()
    {
        //  $user=$_SESSION['user'];
        $products = Product::get();
        $categories = Category::get();
        $rooms = Room::get();
        $user = User::find('1');
        // $user = User::find($_SESSION['user']->id);
        $cardProducts = Product::query("SELECT products.price , products.name ,products.image ,carts.quantity FROM products ,users,carts WHERE products.id= carts.product_id and users.id=1 and carts.user_id='1';");
        $product = Product::query("SELECT * FROM products WHERE id=1");
        // dump($product);
        // dump($user);
        // dump($rooms);
        // dump($cardProducts);
        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'cartProducts' => $cardProducts,
            "user" => $user,
            "rooms" => $rooms
        ]);
    }
    /******filter product on category_id *******/
    // public function getProductsCategory($id){
    //     $productsCategory=Product::query("select * from products where category_id=$id;");
    //     $categories= Category::get();
    //     return view('home', ['products' => $productsCategory, 'categories' => $categories]);
    // }
    /*********add to cart********/
    public function addToCart()
    {
        dump($_REQUEST['product_id']);
        // $product = Product::query("select * from products where id=$product_id;");
        // Cart::create(["product_id" => $product['id'], "user_id" => $_SESSION["user" . "id"]]);
        // $this->index();
    }
    public function create()
    {
    }
}
