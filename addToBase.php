<?php
include('bdd.php');
session_start();
if ($_SESSION['mail'] == "admin@gmail.com") {
    if (isset($_POST) && !empty($_POST)) {
        $nom = $_POST['c_fname'];
        $prix = $_POST['c_price'];
        $presentation = $_POST['c_presentation'];
        $image = $_POST['c_image'];
        $description = $_POST['c_description'];
        $stock = $_POST['c_stock'];

        /* insere nouveau produit dans la base, depuis le backoffice si admin connecte */
        
        $insertion = mysqli_query($bdd, "INSERT INTO Produits (nom, prix, stock, presentation, image, description)
                                         VALUES ('$nom', '$prix', '$stock', '$presentation', '$image', '$description');");
        include("shop.php");
    }
} else {
    header('location: index.php');
}
