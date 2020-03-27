<?php
/* va compter le nombre d'items dans le panier pour l'afficher */
$bdd = mysqli_connect('localhost', 'root', '', 'Nikon') or die("Erreur de connexion : " . mysqli_error($bdd));
session_start();
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $qte = $_POST['qte'];
    $mail = $_SESSION['mail'];

    $compteur = mysqli_query($bdd, "Select count (id)
                                    FROM Panier;");
}