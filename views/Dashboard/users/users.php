<?php 
require_once "../views/Dashboard/header.php";
?>
 <h3>User Details</h3>
 <a href="./users/add"  class="btn btn-primary">ADD user</a>
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">email</th>
        <th scope="col">room</th>
        <th scope="col">ext</th>
        <th scope="col">options</th>

      </tr>
    </thead>
    <tbody>
      <?php 
      foreach($usersData as $user):
      ?>
      <tr>
        <th scope="row"><?php echo $user["id"] ?></th>
        <td><?php echo $user["email"] ?></td>
        <td><?php echo $user["room_no"] ?></td>
        <td><?php echo $user["ext"] ?></td>
        <td>
          <form action="./users/edit" method="post">
            <input type="text" hidden value="<?php echo $user["id"] ?>" name="userid"> 
            <input type="submit" class="btn btn-primary" value="Edite" name="">
          </form>
      </td>
      <td>
          <form action="./users/delete" method="post">
            <input type="text" hidden value="<?php echo $user["id"] ?>" name="userid"> 
            <input type="submit" class="btn btn-danger" value="Delete" name="">
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