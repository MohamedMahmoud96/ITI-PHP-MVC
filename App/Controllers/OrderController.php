<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderController
{
    public function index()
    {
        // $user_id=auth()['id'];
        $user_id ='1';
        $orders = Order::findAll('user_id', $user_id);
        $products = Order::query("SELECT order_product.* , image, name FROM products ,order_product WHERE order_product.order_id IN ( 
                                SELECT orders.id FROM orders WHERE orders.user_id=$user_id) and products.id = order_product.product_id;");
        return view('order', ["orders" => $orders, "products" => $products]);
    }
    public function filterOrderByDate()
    {
        // $user_id = auth()['id'];
        $user_id = '1';
        $from = $_REQUEST['date-from'];
        $to = $_REQUEST['date-to'];
        $filterOrders = Order::query("SELECT * FROM orders WHERE `created_at` between '$from 00:00:00' and '$to 23:59:59' and user_id=$user_id;");
        $orderProducts = Order::query("SELECT order_product.*,image,name FROM `order_product`,products WHERE `order_id` =any (SELECT id FROM orders WHERE `created_at`
         between '$from 00:00:00' and '$to 23:59:59' and user_id=$user_id)and `product_id`=products.id;");

        return view('order', ["orders" => $filterOrders, "products" => $orderProducts]);
    }

    public function MakeOrder()
    {
        Order::create(["user_id" => $_REQUEST['user_id'], "room_no" => $_REQUEST['room'], "total_price" => $_REQUEST['total_price'], "comment" => $_REQUEST["comment"]]);
        $user_id = $_REQUEST['user_id'];
        $order_id = Order::query("select id from orders where user_id=$user_id order by id desc limit 1;")[0]['id'];
        $cartProducts = Cart::findAll("user_id", $user_id);
        foreach ($cartProducts as $cartProduct) {
            $product_id = $cartProduct['product_id'];
            $product = Product::query("select price from products where id=$product_id");
            $productPrice = $product[0]['price'];
            $quantity = $cartProduct['quantity'];
            OrderProduct::create([
                "order_id" => $order_id,
                "product_id" => $product_id,
                "quantity" => $quantity,
                "price" => $productPrice
            ]);
        }
        Cart::query("delete from carts where user_id= $user_id;");
        back();
    }
    public function cancelOrder()
    {
        OrderProduct::destory('order_id', $_REQUEST['order_id']);
        Order::destory('id', $_REQUEST['order_id']);
        back();
    }
}
