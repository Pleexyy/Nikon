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
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Produits</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <?php
        include('bdd.php');
        $bdd->set_charset("utf8");
        $res = mysqli_query($bdd, "SELECT * FROM Produits;");
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_array($res)) {
        ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <a href="shop-single.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['image']; ?>" alt="Image placeholder" class="img-fluid"></a>
                <div class="block-4-text p-4">
                  <h3><a href="shop-single.php?id=<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></a></h3>
                  <p class="mb-0"><?php echo $row['presentation']; ?></p>
                  <p class="text-primary font-weight-bold"><?php echo $row['prix'] . " €"; ?></p>
                  <?php
                  if (isset($_SESSION['mail'])) {
                    include("connected.php");
                  }
                  ?>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

    </div>

    <div class="col-md-3 order-1 mb-5 mb-md-0">

    </div>
  </div>

  <?php
  include("categorie.php");
  include("footer.php");
  ?>
</body>

</html>