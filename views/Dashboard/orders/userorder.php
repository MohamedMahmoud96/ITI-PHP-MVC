<?php

require_once "../views/Dashboard/header.php";

?>
<h3>orders Details</h3>
<div class="dropdown">
 
  <?php
        foreach ($user_orders as $user_order) :
    ?>
  <h5>
    <?=  $user_order["email"]?>
  </h5>
  <?php
        endforeach
    ?>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">product</th>
      <th scope="col">quntity</th>
      <!-- <th scope="col">order ID</th> -->
      <th scope="col">price</th>
      <th scope="col">total price</th>
      <th scope="col">Deliverd At</th>
      <th scope="col"></th>
      <th scope="col">Options</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($user_orders as $user_order) :
    ?>
      <tr>
        <th scope="row"></th>
        <td><?= $user_order["name"] ?></td>
        <td><?= $user_order["quantity"] ?></td>
        <th><?= $user_order["price"] ?></th>
        <td><?= '$ ' . $user_order["total_price"] ?></td>
        <td><?= $user_order["deliverd_at"] ?></td>
        <td></td>
        <td></td>
        <td></td>

        
<?php 
endforeach
?>
  </tbody>
</table>





<?php
require_once "../views/Dashboard/footer.php";
?>