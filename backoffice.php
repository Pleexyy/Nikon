<?php
include('bdd.php');
session_start();

if ($_SESSION['mail'] == "admin@gmail.com") {
    /* afficher page produit avec options pour ajouter produit, supprimer etc... */
} else {
    header("location: index.php");
}
?>