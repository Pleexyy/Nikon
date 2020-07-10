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

        //Bind the provided username to our prepared statement.
        $stmt->bindValue(':mail', $mail);

        //Execute.
        $stmt->execute();

        //Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //If the provided username already exists - display error.
        //TO ADD - Your own method of handling this error. For example purposes,
        //I'm just going to kill the script completely, as error handling is outside
        //the scope of this tutorial.
        if ($row['num'] > 0) {
            include("index.php");
            echo "<script type=\"text/javascript\">" .
                "Swal.fire(
            'Erreur',
            'Adresse e-mail déjà utilisée',
            'error')" . "</script>";
        }

        //Hash the password as we do NOT want to store our passwords in plain text.
        $passwordHash = password_hash($mdp, PASSWORD_BCRYPT, array("cost" => 12));

        //Prepare our INSERT statement.
        //Remember: We are inserting a new row into our users table.
        $sql = "INSERT INTO Clients (mail, prenom, nom, mdp) VALUES (:mail, :prenom, :nom, :mdp)";
        $stmt = $pdo->prepare($sql);

        //Bind our variables.
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':mdp', $passwordHash);

        //Execute the statement and insert the new account.
        $result = $stmt->execute();

        //If the signup process is successful.
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
