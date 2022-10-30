<?php 
namespace App\Controllers;
use App\Models\admin\Products;
use PDO;

class controller{

  public static function search(){

      $search=$_POST['search'];
    //   dump($search);
      $sql='SELECT * FROM products WHERE  name like "%'.$search.'%"' ;
      $products=Products::query($sql)->fetchAll(PDO::FETCH_ASSOC);
     return view("../Dashboard/products/search",["products"=>$products]);
  }


}