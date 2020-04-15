<?php session_start();
if ($_SESSION['mail']) {
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
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Mon compte</strong></div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Inscrivez-vous</h2>
        </div>
        <div class="col-md-7">
          <form action="inscription.php" method="post" onsubmit="inscription()">

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
                  <label for="c_email" class="text-black">E-mail<span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_password" class="text-black">Mot de passe <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="c_password" name="c_password">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_password2" class="text-black">Confirmation du mot de passe <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="c_password2" name="c_password2">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="S'inscrire">
                </div>
              </div>
            </div>
          </form>
        </div>

        <!-- partie connexion  -->
        <div class="site-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Vous êtes déjà client?</h2>
              </div>
              <div class="col-md-7">
                <!-- formulaire de connexion -->
                <form action="connexion.php" method="post">

                  <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_email" class="text-black">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_password" class="text-black">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="c_password" name="c_password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Se connecter">
                        <span class="forgot">Mot de passe <a href="#">oublié?</a></span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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