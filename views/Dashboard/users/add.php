<?php 
require_once "../views/Dashboard/header.php";
?>
 <h3>Add User</h3>
 <form action="./store"  class="align-content-center" method="post" enctype="multipart/form-data">

 <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="image" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Upload image">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value="" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Rooms</label>
    <select id="inputState" name="room" class="form-select">
        <?php foreach($rooms as $room):?>
      <option value="<?= $room['room_no'] ?>"><?= $room['room_no'] ?></option>
      <?php endforeach?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">EXT</label>
    <input type="number" value="" name="ext" class="form-control" id="exampleInputPassword1" placeholder="EXT">
  </div>
  <input type="submit" value="Submit" class="btn btn-primary">
</form>

<?php 
require_once "../views/Dashboard/footer.php";

?>