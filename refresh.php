<?php
ini_set('display_errors', 1);
include('bdd.php');
session_start();

if (!empty($_POST['qte']) && isset($_POST['qte'])) {
    $qte = $_POST['qte'];
    $id = $_POST['id'];

    $get = mysqli_query($bdd, "SELECT qte
                               FROM Panier
                               WHERE id = '$id';");

    $donnee = mysqli_fetch_assoc($get);

    $req = mysqli_query($bdd, "UPDATE Panier
                               SET qte = '$qte'
                               WHERE id = '$id';");

    /* met à jour le stock du produit concerne */
        
    $stock = mysqli_query($bdd, "UPDATE Produits 
                                 SET stock = stock - ('$qte' - '$donnee[qte]')
                                 WHERE id = '$id';");

    header("location: cart.php");
}
