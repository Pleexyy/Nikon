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
        <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="cart.php">Panier</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Commande</strong>
        </div>
      </div>
    </div>
  </div>
  <!-- formulaire de paiement -->
  <form action="#" method="get" onsubmit="event.preventDefault(); paiement()">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Détails de la facturation</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">Pays <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Choisissez un pays</option>
                  <option value="4">France</option>
                  <option value="5">Amérique</option>
                  <option value="6">Chine</option>
                  <option value="7">Japon</option>
                  <option value="8">Colombie</option>
                  <option value="9">Angleterre</option>
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Prénom <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Nom <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Nom de l'entreprise </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Adresse <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Adresse de rue">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Appartement, suite...(facultatif)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Etat/Pays <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Code Postal <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Adresse e-mail <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Téléphone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone">
                </div>
              </div>

              <div class="form-group">
                <span class="create"><a href="account.php">Vous n'avez pas de compte ?</a></span>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Créez un compte en entrant les informations ci-dessous. Si vous êtes déjà client
                                            veuillez vous connecter en haut de la page.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Mot de passe du compte</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Notes </label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Ecrivez votre message ici..."></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon de réduction</h2>
                <div class="p-3 p-lg-5 border">

                  <label for="c_code" class="text-black mb-3">Entrez votre code de promotion si vous en avez
                    un.</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Code de réduction" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Appliquer</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row mb-5" id="space1">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Votre commande</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Produit</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Filtre Soft Focus 62 mm <strong class="mx-2">x</strong> 1</td>
                        <td>44,90€</td>
                      </tr>
                      <tr>
                        <td>Flash SB-5000 <strong class="mx-2">x</strong> 1</td>
                        <td>659,00€</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total du panier</strong></td>
                        <td class="text-black">703,9€</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total de la commande</strong></td>
                        <td class="text-black font-weight-bold"><strong>703,9€</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Paiement par virement bancaire</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Paiement par chèque</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="space2">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Envoyer">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </form>

  <?php
  include("footer.php");
  ?>

</body>

</html>