<?php
namespace App\Controllers\admin;
use App\Models\admin\products;
use App\Models\admin\Categories;
use PDO;

class productsController
{
    public function index()
    {
      $sql="SELECT
                products.id,
                price,
                picture,
                products.name as pName,
                categories.name as cName
               FROM products
               JOIN categories
               ON
               products.category_id =categories.id";
        $products=products::query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return view("../Dashboard/products/products",["products"=>$products]);
    }
    // add new product
    public function add()
    {
      $categoires= Categories::get();
      return view("../Dashboard/products/add",["categoiresData"=>$categoires]);
    }
    // get data and add product
    public function store()
    {
        if (isset($_POST)) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['categorieId'];

            $file = $_FILES['image'];
            $file_type = $_FILES['image']['type'];
            $arr = explode('/', $file_type);
            $ext = end($arr);
            $image = time() . ".$ext";
            move_uploaded_file($file['tmp_name'],"../public/assets/images/".$image);
              $data = [
                "name" => $name,
                "price" =>  $price,
                "picture" => $image,
                "category_id" => $category,
              ];
            Products::create($data);
               return view("../Dashboard/products/add",["success" => "Product Added Successfully"]);
            }
    }

    public function edite()
    {
                $id=$_POST["productId"];
                 $product=products::find("id",$id);
                 $categories=Categories::get();
              return view("../Dashboard/products/edite",["productData"=>$product,"categorieData"=>$categories]);
    }
    public function update()
    {

        
        if (isset($_POST)) {
            $name = $_POST['name'];
            $pro_id=$_POST["productId"];
            $price = $_POST['price'];
            $category = $_POST['categorieId'];
            $img=products::find("id",$pro_id);
           
            $oldimage=$img["picture"];
            $image='';

            if($_FILES["image"]!=''){
                $file = $_FILES['image'];
                $file_type = $_FILES['image']['type'];
                $arr = explode('/', $file_type);
                $ext = end($arr);
                $image = time() . ".$ext";
                move_uploaded_file($file['tmp_name'], "../public/assets/images/" . $image);
            }

             if($image==''){
                $image=$oldimage;
             }
            
            
            $data = [
                "name" => $name,
                "price" =>  $price,
                "picture" => $image,
                "category_id" => $category,
            ];
              Products::update($data,$pro_id);
              dump("sucss");
            //    return view("../Dashboard/prod", ["success" => "Product Added Successfully"]);
            }
        
    }
    // delete product
    public function delete()
    {
        $id = $_POST["pro_id"];
         products::destory("id",$id);
    }
}