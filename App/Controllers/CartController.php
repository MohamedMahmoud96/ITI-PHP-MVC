<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Controllers\HomeController;

class CartController
{
    public function index()
    {
    }

    public function addToCart()
    {
        $product_id = $_REQUEST['product_id'];
        $product = Product::query("select * from products where id=$product_id;");
        Cart::create(["product_id" => $product[0]['id'], "user_id" => 1]);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function deleteCartProduct()
    {
        $product_id = $_REQUEST['product_id'];
        Cart::query("delete from carts WHERE product_id=$product_id;");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
