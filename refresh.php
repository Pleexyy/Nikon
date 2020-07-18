<?php
ini_set('display_errors', 1);
require 'bdd.php';
session_start();

if (!empty($_POST['qte']) && isset($_POST['qte'])) {
    $qte = $_POST['qte'];
    $id = $_POST['id'];

    $get = $pdo->prepare("SELECT qte FROM Panier WHERE id = '$id';");
    $get->execute();

    $donnee = $get->fetch(PDO::FETCH_ASSOC);

    $req = $pdo->prepare("UPDATE Panier SET qte = '$qte' WHERE id = '$id';");
    $req->execute();

    /* met à jour le stock du produit concerné */

    $stock = $pdo->prepare("UPDATE Produits SET stock = stock - ('$qte' - '$donnee[qte]') WHERE id = '$id';");
    $stock->execute();

    header("location: cart.php");
}
