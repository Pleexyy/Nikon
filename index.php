<!DOCTYPE html> <!-- Balise HTML -->
<html lang="fr">
<!-- Langue française -->

<?php
include("head.php");
?>

<body>
  <!-- Corps de la page -->
  <?php
  include("header.php");
  ?>

  <div class="site-blocks-cover" style="background-image: url(images/nikon.png);" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">Découvrez le meilleur de Nikon</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">“La photographie est la synthèse d’une situation. L’instant où tout s’assemble. L’idéal
              insaisissable.”
              – Elliot Erwitt </p>
            <p>
              <a href="shop.php" class="btn btn-sm btn-primary">Acheter</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php
  include("info.php");
  include("categorie.php");
  ?>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Grosse vente!</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5">
          <a href="#"><img src="images/chat.jpg" alt="Image placeholder" class="img-fluid2 rounded"></a>
        </div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a href="#">10% de réduction sur l'ensemble de la boutique</a></h2>
          <p class="post-meta mb-4"> <span class="block-8-sep">&bullet;</span>
            24 janvier 2020</p>
          <p class="post-meta">Profitez des soldes d'hiver pour vous procurer du matériel photo à prix réduit.
            Réductions valables sur tout le site, alors qu'attendez vous?</p>
          <p><a href="#" class="btn btn-primary btn-sm">Acheter</a></p>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("footer.php");
  ?>
</body>

</html>