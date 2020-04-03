<?php
include("head.php");
include('bdd.php');
if (!empty($_POST['c_email']) && !empty($_POST['c_password'])) {
    $mail = $_POST['c_email'];
    $mdp = $_POST['c_password'];

    $resultat = mysqli_query($bdd, "SELECT mail, mdp
                                    FROM Clients
                                    WHERE '$mail' = mail");

    $donnee = mysqli_fetch_assoc($resultat);

    // on vérifie que le mot de passe hashé correspond bien à celui présent dans la base
    if (md5($mdp) == $donnee['mdp']) {
        session_start();
        $_SESSION['mail'] = $donnee['mail'];
        $_SESSION['mdp'] = $donnee['mdp'];
        header("location: shop.php");
    } else {
        include("account.php");
        echo "<script type=\"text/javascript\">" .
        "Swal.fire(
        'Erreur',
        'Identifiants incorrects',
        'error')" . "</script>";
    }
} else {
    include("account.php");
    echo "<script type=\"text/javascript\">" .
    "Swal.fire(
    'Erreur',
    'Certains champs sont vides',
    'error')" . "</script>";
}

