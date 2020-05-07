<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
$mail = $_SESSION['mail'];
if (empty($_SESSION['mail'])) {
  header("location: index.php");
  die();
}
?>

<?php
include("head.php");
?>
<script type="text/javascript" src="js/quantite.js"></script>

<body>

  <!-- Corps de la page -->
  <?php
  include("header.php");
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Panier</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Produit</th>
                  <th class="product-price">Prix</th>
                  <th class="product-quantity">Quantité</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include('bdd.php');
                $bdd->set_charset("utf8");
                $res = mysqli_query($bdd, "SELECT * FROM Panier, Produits
                                           WHERE Panier.id = Produits.id
                                           AND mail = '$mail';");
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="<?php echo $row['image']; ?>" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black"><?php echo $row['nom']; ?></h2>

                      </td>
                      <td><?php echo $row['prix'] . " €" ?></td>
                      <td>
                        <form id="refresh" method="post" action="refresh.php">
                          <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                              <button class="btn btn-outline-primary js-btn-minus" onclick="minus('<?php echo $row['id'] ?>')" type="button">&minus;</button>
                            </div>
                            <input type="hidden" name="id" value='<?php echo $row['id'] ?>'>
                            <input name="qte" type="text" class="form-control text-center" value="<?php echo $row['qte']; ?>" id="<?php echo $row['id'] ?>" placeholder="">
                            <div class="input-group-append">
                              <button class="btn btn-outline-primary js-btn-plus" onclick="plus('<?php echo $row['id'] ?>')" type="button">&plus;</button>
                            </div>
                            <button type="submit" class="buy-now btn btn-sm btn-primary" style="margin-left:25%; margin-top: 10%;"><i class="fas fa-redo-alt"></i></button>
                          </div>
                        </form>
                      </td>
                      <?php
                      $totalqte = $row['prix'] * $row['qte'];
                      ?>
                      <td><?php echo $totalqte . "€" ?></td>
                      <td>
                        <form method="post" action="supprimer.php">
                          <input type="hidden" name="id" value='<?php echo $row['id'] ?> _count'>
                          <input type="submit" class="buy-now btn btn-sm btn-primary" name="delete" value="X">
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-1 mb-3 mb-md-0">
              </div>
              <div class="col-md-6">
                <button onclick="window.location.href='shop.php'" class="btn btn-outline-primary btn-sm btn-block">Continuez les achats</button>
              </div>
            </div>
            <div class="row" id="espacement">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon" style="margin-top: 8%;">Télécharger la facture</label>
                <p>Cliquez sur le bouton pour télécharger votre facture au format pdf.</p>
              </div>
              <div class="col-md-4">
                <form method="get" action="pdf.php" target="_blank">
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 30%;">Télécharger votre facture</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase" id="marge">Total du panier</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php
                    $total = 0;
                    $res = mysqli_query($bdd, "SELECT * FROM Panier, Produits
                                             WHERE Panier.id = Produits.id
                                             AND mail = '$mail';");
                    while ($row = mysqli_fetch_assoc($res)) {
                      $total = $total + $row['prix'] * $row['qte'];
                    } ?>
                    <strong class="text-black"><?php echo $total . " €"; ?></strong>
                  </div>
                </div>
                <div class="row" id="space1">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Procéder au paiement</button>
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