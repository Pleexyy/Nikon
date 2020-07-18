<?php
session_start();
require 'bdd.php';
if (empty($_SESSION['login'])) {
    header("location: index.php");
    die();
}

$mail = $_SESSION['login'];

$values = $pdo->prepare("SELECT * FROM Panier WHERE mail = '$mail';");
$values->execute();

while ($data = $values->fetch(PDO::FETCH_ASSOC)) {
    $update = $pdo->prepare("UPDATE Produits SET stock = stock + '$data[qte]' WHERE id = '$data[id]';");
    $update->execute();
}

// Suppression des variables de session et de la session
$_SESSION = array();
session_unset();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('mail', '');
setcookie('mdp', '');

// supprime le panier de l'utilisateur s'il se deconnecte

$delete = $pdo->prepare("DELETE FROM Panier WHERE mail = '$mail';");
$delete->execute();

include("index.php");

echo "<script type=\"text/javascript\">" .
    "Swal.fire(
    'Succès!',
    'Vous êtes désormais déconnecté!',
    'success'
    )" . "</script>";
