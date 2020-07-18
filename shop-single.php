<!DOCTYPE html>
<html lang="fr">

<?php
include("head.php");
?>

<body>

  <!-- Corps de la page -->
  <?php
  include("header.php");
  ?>

  <?php
  include("produits.php");
  ?>

  <?php
  require 'bdd.php';
  $id =  $_GET['id'];

  $res = $pdo->prepare("SELECT nom, prix, description, image FROM Produits WHERE id = '$id';");
  $res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo $row['image']; ?>" alt="Image" class="img-single" width="50%" style="margin-left: 20%;">
        </div>
        <div class="col-md-6">
          <h2 class="text-black"> <?php echo $row['nom']; ?></h2>
          <p class="mb-4"><?php echo $row['description']; ?></p>
          <p><strong class="text-primary h4"><?php echo $row['prix'] . " €"; ?></strong></p>
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            </div>
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