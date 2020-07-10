<?php
include('bdd.php');
session_start();
if (isset($_POST['add'])) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $qte = $_POST['qte'];
        $produit = $_POST['produit'];
        $image = $_POST['image'];

        $mail = $_SESSION['mail'];

        $result = mysqli_query($bdd, "SELECT qte FROM Panier, Clients
                                      WHERE '$id' = id 
                                      AND Clients.mail = Panier.mail 
                                      AND Panier.mail = '$mail';");

        /* si le produit est déjà dans le panier, seulement changer sa quantité, sinon, l'ajouter */

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $qte = $qte + $row['qte'];
            $change = mysqli_query($bdd, "UPDATE Panier SET qte = '$qte' WHERE '$id' = id;");
        } else {
            $insertion = mysqli_query($bdd, "INSERT INTO Panier (id, qte, mail)
                                             VALUES ('$id' , 1, '$mail');");
        }

        /* met à jour le stock du produit concerne */
        
        $stock = mysqli_query($bdd, "UPDATE Produits 
                                     SET stock = stock - 1
                                     WHERE id = '$id';");

        include("shop.php");
    } else {
        header('location: index.php');
    }
} else if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    /* si c'est le bouton supprimer qui est cliqué, supprimer le produit du panier, puis des produits */

    $req = mysqli_query($bdd, "DELETE FROM Panier
                               WHERE '$id' = id;");

    $req2 = mysqli_query($bdd, "DELETE FROM Produits
                                WHERE '$id' = id;");
    include("shop.php");
} else if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    // header('location: edit.php');
    include('edit.php');
} else {
    header('location: add.php');
}
