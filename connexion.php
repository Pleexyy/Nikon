<?php
include("head.php");
require 'bdd.php';
if (!empty($_POST['c_email']) && !empty($_POST['c_password'])) {
    $mail = $_POST['c_email'];
    $mdp = $_POST['c_password'];

    //Récupère les informations de compte utilisateur pour le nom d'utilisateur donné.
    $sql = "SELECT mail, mdp FROM Clients WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':mail', $mail);

    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //Si $row est FAUX
    if ($user === false) {
        //Impossible de trouver un utilisateur avec ce nom d'utilisateur!
        include("account.php");
        echo "<script type=\"text/javascript\">" .
            "Swal.fire(
        'Erreur',
        'Identifiants incorrects',
        'error')" . "</script>";
    } else {
        //Compte utilisateur trouvé. Vérifiez si le mot de passe donné correspond au
        // hachage de mot de passe que nous avons stocké dans notre table d'utilisateurs.

        //Compare les mots de passe
        $validPassword = password_verify($mdp, $user['mdp']);

        //Si $validPassword est VRAI, l'utilisateur est bien loggé.
        if ($validPassword) {
            session_start();
            //Fourni à l'utilisateur une session de connexion.
            $_SESSION['login'] = $user['mail'];
            $_SESSION['mdp'] = $user['mdp'];

            // redirige vers la page des produits
            header("location: shop.php");
        } else {
            //$validPassword est FAUX. Les mots de passe ne correspondent pas.
            include("account.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
            'Erreur',
            'Identifiants incorrects',
            'error')" . "</script>";
        }
    }
} else {
    include("account.php");
    echo "<script type=\"text/javascript\">" .
        "Swal.fire(
    'Erreur',
    'Certains champs sont vides',
    'error')" . "</script>";
}
