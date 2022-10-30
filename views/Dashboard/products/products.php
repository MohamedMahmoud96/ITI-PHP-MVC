<?php 
require_once "../views/Dashboard/header.php";
?>
 <h3>Items Details</h3>

 <a href="./products/add"  class="btn btn-primary">ADD Product</a>
 
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">image</th>
        <th scope="col">Categgotie</th>
      </tr>
    </thead>
    <tbody>
      <?php 
         foreach($products as $product):
      ?>
      <tr>
        <th scope="row"><?php echo  $product["id"]?></th>
        <td> <?php echo  $product["pName"]?></td>
        <td><?php echo  $product["price"]?></td>
        <td><img src="../public/assets/images/<?php echo $product["picture"]?>" alt="product image"></td>
        <td><?php echo  $product["cName"]?></td>
        <td>
          <form action="./edite" method="post">
             <input type="text" name="productId"hidden value="<?php echo $product["id"]?>">
             <input type="submit" class="btn btn-primary" value="Edite">
          </form>
        </td>
        <td>
        <form action="./products/delete" method="post">
             <input type="text" name="pro_id" hidden value="<?php echo $product["id"]?>">
             <input type="submit" class="btn btn-danger" value="Delete">
          </form>
        </td>

      </tr>
  <?php 
    endforeach
  ?>
    </tbody>
  </table>


 <?php 
require_once "../views/Dashboard/footer.php";
 ?>
