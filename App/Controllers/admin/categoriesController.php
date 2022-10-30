<?php
namespace App\Controllers\admin;
use App\Models\admin\Categories;
use App\Models\admin\Pages;
use App\Controllers\controller;
use App\Models\admin\Products;

class categoriesController extends controller
{

   public function index()
   {
     $Data= Categories::get();
      return view('../Dashboard/categories/index',["Data"=>$Data]);
   }  
// =================================================
   public function add()
   {
      return view('../Dashboard/categories/add');
   }  
// =================================================
public function store()
{   
   $CategorieData=[
      "name"=>$_POST["name"],
   ];
   Categories::create($CategorieData);

   return  header('Location:'.$_SERVER["HTTP_REFERER"]);
} 

// =================================================
   public function edite()
   {
      $categorie=Categories::find("id",$_POST["id"]);
      return view('../Dashboard/categories/edite',["categorie"=>$categorie]);
   }  

// =================================================
public function update()
{
       $value=["name"=>$_POST["name"]];
       Categories::update($value,$_POST["id"]);
       return  header('Location:'.$_SERVER["HTTP_REFERER"]);
}  


// ======================================================
   public function delete()
   {
      
      Categories::destory("id",$_POST["id"]);
      return  header('Location:'.$_SERVER["HTTP_REFERER"]);
   } 
   
// =================================================
   
    








}//end class






