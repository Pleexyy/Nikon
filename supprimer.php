<?php
include('bdd.php');
session_start();
if (isset($_POST['id']) && !empty($_POST['id']) && ($_POST['id'])) {
    $id = $_POST['id'];
    $qte = $_POST['qte'];
    $mail = $_SESSION['mail'];

    $req = mysqli_query($bdd, "DELETE FROM Panier
                               WHERE '$id' = id;");

    header('Location: cart.php');
}
