<?php 
namespace App\Controllers\admin;

use App\Models\admin\products;
use App\Models\admin\Categories;
use App\Models\admin\orders;
use App\Models\admin\order_product;

use PDO;

class orderController
{
//  ==============================================================

// ================================================================
public function index(){
    $sql="SELECT
            orders.id as ordr_id,
            users.id as usr_id,
            users.email,
            users.room_no,
            status,
            total_price,
            deliverd_at
    FROM orders
    JOIN users
    ON
    orders.user_id =users.id";
    $user_orders=orders::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return view("../Dashboard/orders/index",["user_orders"=>$user_orders]);
}
//  ==============================================================
public function cancle(){

        $id=$_POST["id"];
        $value=["status"=>"cancled"];
        orders::update($value,$id);
      return header("location:".$_SERVER["HTTP_REFERER"]);
}
public function to_delvery(){

    $id=$_POST["id"];
    // dump($id);
    $value=["status"=>"out for delivery"];
    orders::update($value,$id);
  return header("location:".$_SERVER["HTTP_REFERER"]);
}
public function done(){

    $id=$_POST["id"];
    // dump($id);
    $date=date('Y/m/d h:i:s',time());;
    // dump($date);
    $value=["status"=>"done","deliverd_at"=>$date];
    orders::update($value,$id);
    return header("location:".$_SERVER["HTTP_REFERER"]);
}
// ================================================================
public function delete(){
    $id=$_POST["id"];
    order_product::destory("order_id",$id);
    orders::destory("id",$id);
    return header("location:".$_SERVER["HTTP_REFERER"]);
}

// =========================================================
public function user_order(){
    // users.email,
    $sql="SELECT
                orders.id as ordr_id,
                order_product.*,
                products.*,
                products.price as pro_price,
            FROM orders
            JOIN order_product
            ON orders.id = order_product.order_id 
            JOIN products
            ON order_product.product_id = products.id
                    ";
    $user_orders=products::query($sql)->fetchAll(PDO::FETCH_ASSOC);
     dump($user_orders);
}
//  ==============================================================

// ================================================================
// public function store(){


// }
//  ==============================================================

// ================================================================
// public function edite(){


// }
//  ==============================================================

// ================================================================
//  ==============================================================

// ================================================================
// public function update(){


// }
//  ==============================================================

// ================================================================



}