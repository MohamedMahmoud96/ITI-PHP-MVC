<?php

namespace App\Controllers\admin;
use App\Models\admin\users;
class userController
{

   public function index()
   {
     $usersData= users::get();
      return view('../Dashboard/users/users',["usersData"=>$usersData]);
   }  
// =================================================
   public function add()
   {
      return view('../Dashboard/users/add');
   }  
// =================================================
public function get_add()
{   
   $userData=[
      // "name"=>$_POST["name"],
      "email"=>$_POST["email"],
      "password"=>$_POST["password"],
      // "password"=> password_hash($_POST["password"],PASSWORD_DEFAULT),
      "room_no"=>1,
      "ext"=>8
   ];
   users::create($userData);

   return  dump($_POST["name"]);
} 

// =================================================
   public function edite()
   {
      $singleuser=users::find("id",$_POST["userid"]);
      return view('../Dashboard/users/edite',["user"=>$singleuser]);
   }  

// =================================================

   public function delete()
   {
      
      users::destory("id",$_POST["userid"]);
      return  header('Location:http://localhost/iti/php/iti-php-project/admin/users');
   } 
   
// =================================================
   
    








}//end class






