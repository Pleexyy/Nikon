<?php
ini_set('display_errors', 1);
$bdd = mysqli_connect('localhost', 'root', '', 'Nikon') or die("Erreur de connexion : " . mysqli_error($bdd));
session_start();

if (!empty($_POST['qte']) && isset($_POST['qte'])) {
    $qte = $_POST['qte'];
    $id = $_POST['id'];

    $req = mysqli_query($bdd, "UPDATE Panier
                               SET qte = '$qte'
                               WHERE id = '$id';");

    header("location: cart.php");
}
