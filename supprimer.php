<?php
include('bdd.php');
session_start();
if (isset($_POST['id']) && !empty($_POST['id']) && ($_POST['id'])) {
    $id = $_POST['id'];
    $qte = $_POST['qte'];
    $mail = $_SESSION['mail'];

    /* met à jour le stock du produit concerne */

    $stock = mysqli_query($bdd, "UPDATE Produits 
                                 SET stock = stock + '$qte'
                                 WHERE id = '$id';");

    /* avant de le supprimer du panier */

    $req = mysqli_query($bdd, "DELETE FROM Panier
                               WHERE '$id' = id;");

    header('Location: cart.php');
}
