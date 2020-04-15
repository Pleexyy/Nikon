<?php
session_start();
include("bdd.php");
if (!empty($_POST['c_email']) && !empty($_POST['c_password']) && !empty($_POST['c_password2'])) {
    $prenom = $_POST['c_fname'];
    $nom = $_POST['c_lname'];
    $mail = $_POST['c_email'];
    $mdp = $_POST['c_password'];
    $mdp2 = $_POST['c_password2'];

    if ($mdp == $mdp2) {
        // On hash le mot de passe
        $hashed_password = md5($mdp);

        $resultat = mysqli_query($bdd, "SELECT mail
                                        FROM Clients
                                        WHERE '$mail' = mail;");

        $donnee = mysqli_fetch_assoc($resultat);
        // mot de passe hashé inséré dans la base
        if ($mail != $donnee['mail']) {
            $resultat = mysqli_query($bdd, "INSERT INTO Clients VALUES
                                            ('$mail', '$prenom', '$nom', '$hashed_password');");
            include("account.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
                'Vous etes désormais inscrit!',
                'Veuillez vous connecter',
                'success')" . "</script>";
        } else {
            include("index.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
            'Erreur',
            'Adresse e-mail déjà utilisée',
            'error')" . "</script>";
        }
    } else {
        include("account.php");
        echo "<script type=\"text/javascript\">" .
            "Swal.fire(
        'Erreur',
        'Les mots de passes ne sont pas identiques!',
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
