<?php
/* va compter le nombre d'items dans le panier pour l'afficher */
include('bdd.php');
session_start();
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $qte = $_POST['qte'];
    $mail = $_SESSION['mail'];

    $compteur = mysqli_query($bdd, "Select count (id)
                                    FROM Panier;");
}