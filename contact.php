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
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Contactez-nous</h2>
        </div>
        <div class="col-md-7">
          <!-- formulaire de contact -->
          <form action="formulaire.php" method="post" onsubmit="validation()">

            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Prénom</label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Nom</label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email" class="text-black">E-mail <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_subject" class="text-black">Sujet <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_subject" name="c_subject">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_message" class="text-black">Message <span class="text-danger">*</span></label>
                  <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control" placeholder="300 caractères maximum..."></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Envoyer">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5 ml-auto">
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Paris</span>
            <p class="mb-0">99 bvd Raspail, 75006 Paris</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Paris</span>
            <p class="mb-0">191 Rue de Courcelles, 75017 Paris</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Londres</span>
            <p class="mb-0">1 The Crescent, Surbiton KT6 4BN, Royaume-Uni</p>
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