<?php
session_start();
include('bdd.php');
if (empty($_SESSION['mail'])) {
    header("location: index.php");
    die();
}

$mail = $_SESSION['mail'];

// Suppression des variables de session et de la session
$_SESSION = array();
session_unset();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('mail', '');
setcookie('mdp', '');

/* supprime le panier de l'utilisateur s'il se deconnecte */

$delete = mysqli_query($bdd, "DELETE FROM Panier
                              WHERE mail = '$mail';");

include("index.php");

echo "<script type=\"text/javascript\">" .
    "Swal.fire(
    'Succès!',
    'Vous êtes désormais déconnecté!',
    'success'
    )" . "</script>";
