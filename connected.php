<form method="post" action="ajouter.php">
    <input type="hidden" name="id" value='<?php echo $row['id'] ?>'>
    <input type="hidden" name="qte" value="1">
    <input type="hidden" name="produit" value='<?php echo $row['produit'] ?>'>
    <input type="hidden" name="image" value='<?php echo $row['image'] ?>'>
    <input type="submit" class="buy-now btn btn-sm btn-primary" name="add" value="Ajouter au panier">
    <?php if ($_SESSION['mail'] == "admin@gmail.com") {
        echo '<input type="submit" class="buy-now btn btn-sm btn-primary" name="supprimer" value="Supprimer">';
    } ?>
</form>