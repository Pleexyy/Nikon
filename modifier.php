<?php
require 'bdd.php';
session_start();
if (isset($_POST['add'])) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $qte = $_POST['qte'];
        $produit = $_POST['produit'];
        $image = $_POST['image'];

        $mail = $_SESSION['login'];

        $result = $pdo->prepare("SELECT qte FROM Panier, Clients WHERE '$id' = id AND Clients.mail = Panier.mail AND Panier.mail = '$mail';");
        $result->execute();

        /* si le produit est déjà dans le panier, seulement changer sa quantité, sinon, l'ajouter */
        $count = $result->rowCount();
        if ($count > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $qte = $qte + $row['qte'];

            $change = $pdo->prepare("UPDATE Panier SET qte = '$qte' WHERE '$id' = id;");
            $change->execute();
        } else {
            $insertion = $pdo->prepare("INSERT INTO Panier (id, qte, mail) VALUES ('$id' , 1, '$mail');");
            $insertion->execute();
        }

        /* met à jour le stock du produit concerné */
        $stock = $pdo->prepare("UPDATE Produits SET stock = stock - 1 WHERE id = '$id';");
        $stock->execute();

        include("shop.php");
    } else {
        header('location: index.php');
    }
} else if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    /* si c'est le bouton "supprimer" qui est cliqué, supprimer le produit du panier, puis des produits */

    $req = $pdo->prepare("DELETE FROM Panier WHERE '$id' = id;");
    $req->execute();

    $req2 = $pdo->prepare("DELETE FROM Produits WHERE '$id' = id;");
    $req2->execute();

    include("shop.php");
} else if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    // header('location: edit.php');
    include('edit.php');
} else {
    header('location: add.php');
}
