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

        // si le produit est déjà dans le panier, seulement changer sa quantité, sinon, l'ajouter
        $result = mysqli_query($bdd, "SELECT qte FROM Panier, Clients
                                      WHERE '$id' = id 
                                      AND Clients.mail = Panier.mail 
                                      AND Panier.mail = '$mail';");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $qte = $qte + $row['qte'];
            $change = mysqli_query($bdd, "UPDATE Panier SET qte = '$qte' WHERE '$id' = id;");
        } else {
            $insertion = mysqli_query($bdd, "INSERT INTO Panier (id, qte, mail)
                                             VALUES ('$id' , 1, '$mail');");
        }
        include("shop.php");
    } else {
        header('location: index.php');
    }
} else if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    $req = mysqli_query($bdd, "DELETE FROM Panier
                               WHERE '$id' = id;");

    $req2 = mysqli_query($bdd, "DELETE FROM Produits
                               WHERE '$id' = id;");
    include("shop.php");
} else if (isset($_POST['modifier'])) {
    header('location: edit.php');
} else {
    header('location: add.php');
}