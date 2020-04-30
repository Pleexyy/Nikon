<form method="post" action="modifier.php">
    <input type="hidden" name="id" value='<?php echo $row['id'] ?>'>
    <input type="hidden" name="qte" value="1">
    <input type="hidden" name="produit" value='<?php echo $row['produit'] ?>'>
    <input type="hidden" name="image" value='<?php echo $row['image'] ?>'>
    <input type="submit" class="buy-now btn btn-sm btn-primary" name="add" value="Ajouter au panier">
    <?php if ($_SESSION['mail'] == "admin@gmail.com") {
        echo '<input type="submit" class="buy-now btn btn-sm btn-primary" name="ajouter" value="Ajouter un produit" style="margin-top: 1%";>';
        echo '<input type="submit" class="buy-now btn btn-sm btn-primary" name="supprimer" value="Supprimer le produit" style="margin-top: 1%";>';
        echo '<input type="submit" class="buy-now btn btn-sm btn-primary" name="modifier" value="Modifier le produit" style="margin-top: 1%";>';
    } ?>
</form>