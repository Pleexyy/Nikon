<?php
include('bdd.php');
session_start();
if ($_SESSION['login'] == "admin@gmail.com") {
    if (isset($_POST) && !empty($_POST)) {
        $id = $_POST['id'];
        $nom = $_POST['c_newfname'];
        $prix = $_POST['c_newprice'];
        $presentation = $_POST['c_newpresentation'];
        $image = $_POST['c_newimage'];
        $description = $_POST['c_newdescription'];
        $stock = $_POST['c_newstock'];

        /* requete qui met à jour le produit dans la base (droit admin) */

        $update = $pdo->prepare("UPDATE Produits SET nom = '$nom', prix = $prix, presentation = '$presentation', image = '$image', description = '$description', stock = '$stock' WHERE id = '$id';");
        $update->execute();

        include("shop.php");
    }
} else {
    header('location: index.php');
}
