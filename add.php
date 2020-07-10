<?php session_start();
if ($_SESSION['mail'] != "admin@gmail.com") {
  header("location: index.php");
  die();
} ?>
<!DOCTYPE html>
<html lang="fr">

<?php
include("head.php");
?>

<!-- Corps de la page -->
<?php
include("header.php");
?>

<!-- partie inscription -->

<body>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Panneau d'administration</strong></div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Ajouter un produit</h2>
        </div>
        <div class="col-md-7">
          <form action="addToBase.php" method="post">

            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nom du produit</label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_price" class="text-black">Prix du produit</label>
                  <input type="number" class="form-control" id="c_price" name="c_price">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_presentation" class="text-black">Présentation du produit<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_presentation" name="c_presentation" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_image" class="text-black">Image<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_image" name="c_image">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_description" class="text-black">Description du produit<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_description" name="c_description">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_stock" class="text-black">Stock du produit<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="c_stock" name="c_stock">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Ajouter le produit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php
  include("footer.php");
  ?>
</body>

</html>