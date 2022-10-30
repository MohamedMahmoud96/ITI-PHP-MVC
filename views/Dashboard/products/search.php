<?php 
require_once "../views/Dashboard/header.php";

foreach($products as $product):
?>
<div class="d-flex justify-content-around">

    <div class="card" style="width: 13rem;">
    <img class="card-img-top" src="../public/assets/images/<?=$product["picture"]?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title text-center"><?= $product["name"] ?></h5>
    </div>
    </div>

</div>




<?php 
endforeach;
require_once "../views/Dashboard/footer.php";

?>



