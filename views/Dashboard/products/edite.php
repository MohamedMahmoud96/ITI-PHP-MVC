<?php 
require_once "../views/Dashboard/header.php";
?>
 <h3>Edite Product</h3>
 
 <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edite product</p>

                <form  action="./update" Method="post" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" value="<?php echo $productData["name"] ?>" id="form3Example1c" class="form-control" />
                      <input type="text" hidden name="productId" value="<?php echo $productData["id"] ?>" id="form3Example1c" class="form-control" />
                      <label class="form-label"  for="form3Example1c">Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" name="price" value="<?php echo $productData["price"] ?>" id="form3Example3c" class="form-control" />
                      <label class="form-label" for="form3Example3c">Price</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <img src="./public/assets/images/1666995032.jpeg" style="width:200px;height:200px;" alt="product image">
                      <input type="file" name="image"  id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">image</label>
                    </div>
                  </div>

                  <select name="categorieId" class="form-select" aria-label="Default select example">
                      <!-- <option selected>Open this select menu</option> -->
                      <?php 
                       foreach($categorieData as $Categorie):
                      ?> 
                        <option <?php if($Categorie["id"]==$productData["category_id"]){echo "selected";}  ?> value="<?php echo $Categorie["id"]; ?>">
                            <?php echo $Categorie["name"]; ?>
                       </option>
                     <?php 
                      endforeach
                      ?>
                      <!-- <option>one</option> -->
                    </select>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image"> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
require_once "../views/Dashboard/footer.php";

?>