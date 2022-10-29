<?php 
require_once "../views/Dashboard/header.php";
?>
 <h3>categorie Details</h3>

 <a href="./categories/add"  class="btn btn-primary">ADD Categorie</a>
 
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col-4">Option</th>
        <!-- <th scope="col">Name</th> -->
        
      </tr>
    </thead>
    <tbody>
      <?php 
         foreach($Data as $categorie):
      ?>
      <tr>
        <th scope="row"><?php echo  $categorie["id"]?></th>
        <td> <?php echo  $categorie["name"]?></td>
    
        <td>
          <form action="./categories/edite" method="post">
             <input type="text" name="id"hidden value="<?php echo $categorie["id"]?>">
             <input type="submit" class="btn btn-primary" value="Edite">
          </form>
          
        </td>
        <td>
        <form action="./delete" method="post">
             <input type="text" name="id" hidden value="<?php echo $categorie["id"]?>">
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
