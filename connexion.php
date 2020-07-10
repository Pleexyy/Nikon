<?php
include("head.php");
require 'bdd.php';
if (!empty($_POST['c_email']) && !empty($_POST['c_password'])) {
    $mail = $_POST['c_email'];
    $mdp = $_POST['c_password'];

    //Retrieve the user account information for the given username.
    $sql = "SELECT mail, mdp FROM Clients WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':mail', $mail);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if ($user === false) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        include("account.php");
        echo "<script type=\"text/javascript\">" .
            "Swal.fire(
        'Erreur',
        'Identifiants incorrects',
        'error')" . "</script>";
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify($mdp, $user['mdp']);

        //If $validPassword is TRUE, the login has been successful.
        if ($validPassword) {
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['mail'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header("location: shop.php");
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
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
