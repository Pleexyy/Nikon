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

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Confirmation</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <span class="icon-check_circle display-3 text-success"></span>
          <h2 class="display-3 text-black">Merci!</h2>
          <i class="fas fa-check-circle" id="validation"></i>
          <p class="lead mb-5" id="space1">Votre commande a été effectuée avec succès.</p>
          <p><a href="shop.php" class="btn btn-sm btn-primary">Retour à la boutique</a></p>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("footer.php");
  ?>
</body>

</html>