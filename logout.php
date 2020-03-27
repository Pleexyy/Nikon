<?php
session_start();

if (empty($_SESSION['mail'])) {
    header("location: index.php");
    die();
}

// $bdd = mysqli_connect('localhost', 'root', '', 'Nikon') or die("Erreur de connexion : " . mysqli_error($bdd));
// $session = $_SESSION['mail'];

// $req = mysqli_query($bdd, "DELETE FROM Panier;");


// Suppression des variables de session et de la session
$_SESSION = array();
session_unset();
session_destroy();


// Suppression des cookies de connexion automatique
setcookie('mail', '');
setcookie('mdp', '');
include("index.php");

echo "<script type=\"text/javascript\">" .
    "Swal.fire(
    'Succès!',
    'Vous êtes désormais déconnecté!',
    'success'
    )" . "</script>";
