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
          <h2 class="h3 mb-3 text-black">Modifier le produit</h2>
        </div>
        <div class="col-md-7">
          <form action="editToBase.php" method="post">

            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_newfname" class="text-black">Nouveau nom du produit</label>
                  <input type="text" class="form-control" id="c_newfname" name="c_newfname">
                  <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
                </div>
                <div class="col-md-6">
                  <label for="c_newprice" class="text-black">Nouveau prix du produit</label>
                  <input type="number" class="form-control" id="c_newprice" name="c_newprice">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_newpresentation" class="text-black">Nouvelle présentation du produit<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_newpresentation" name="c_newpresentation" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_newimage" class="text-black">Nouvelle image<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_newimage" name="c_newimage">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_newdescription" class="text-black">Nouvelle description du produit<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_newdescription" name="c_newdescription">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Modifier le produit">
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