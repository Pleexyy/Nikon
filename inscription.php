<?php
session_start();
require 'bdd.php';
if (!empty($_POST['c_email']) && !empty($_POST['c_password']) && !empty($_POST['c_password2'])) {
    $prenom = $_POST['c_fname'];
    $nom = $_POST['c_lname'];
    $mail = $_POST['c_email'];
    $mdp = $_POST['c_password'];
    $mdp2 = $_POST['c_password2'];

    if ($mdp == $mdp2) {

        $sql = "SELECT COUNT(mail) AS num FROM Clients WHERE mail = :mail";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':mail', $mail);

        $stmt->execute();

        //Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Si le nom d'utilisateur fourni existe déjà
        if ($row['num'] > 0) {
            include("index.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
            'Erreur',
            'Adresse e-mail déjà utilisée',
            'error')" . "</script>";
        }

        //Hache le mot de passe car nous ne voulons PAS stocker nos mots de passe en texte brut.
        $passwordHash = password_hash($mdp, PASSWORD_BCRYPT, array("cost" => 12));

        //Préparez notre instruction INSERT.
        $sql = "INSERT INTO Clients (mail, prenom, nom, mdp) VALUES (:mail, :prenom, :nom, :mdp)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':mdp', $passwordHash);

        //Exécute et insére le nouveau compte.
        $result = $stmt->execute();

        //Si le processus d'inscription réussit.
        if ($result) {
            include("account.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
                'Vous etes désormais inscrit!',
                'Veuillez vous connecter',
                'success')" . "</script>";
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
