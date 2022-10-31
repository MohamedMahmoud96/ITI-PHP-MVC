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
        //  $user_id=auth()['id'];
        $user_id = $_REQUEST['user_id'];
        $product_id = $_REQUEST['product_id'];
        $product = Product::query("select * from products where id=$product_id;");
        Cart::create(["product_id" => $product[0]['id'], "user_id" => $user_id]);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function deleteCartProduct()
    {
        $product_id = $_REQUEST['product_id'];
        Cart::query("delete from carts WHERE product_id=$product_id;");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function plusQuantity()
    {
        $product_id = $_REQUEST['product_id'];
        $user_id = $_REQUEST['user_id'];
        Cart::query("UPDATE carts set quantity = quantity+1 WHERE `product_id`=$product_id and `user_id`=$user_id;");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function minusQuantity()
    {
        $product_id = $_REQUEST['product_id'];
        $user_id = $_REQUEST['user_id'];

        Cart::query("UPDATE carts set quantity = quantity-1 WHERE `product_id`=$product_id and `user_id`=$user_id and quantity>1;");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
