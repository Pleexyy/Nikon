<?php
require 'bdd.php';
session_start();
if (isset($_POST['id']) && !empty($_POST['id']) && ($_POST['id'])) {
    $id = $_POST['id'];
    $qte = $_POST['qte'];
    $mail = $_SESSION['login'];

    /* met à jour le stock du produit concerne */

    $stock = $pdo->prepare("UPDATE Produits SET stock = stock + '$qte' WHERE id = '$id';");
    $stock->execute();

    /* avant de le supprimer du panier */

    $delete = $pdo->prepare("DELETE FROM Panier WHERE '$id' = id;");
    $delete->execute();

    header('Location: cart.php');
}
