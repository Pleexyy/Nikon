<?php
include('bdd.php');
if (!empty($_POST['c_email']) && !empty($_POST['c_subject']) && !empty($_POST['c_message'])) {
   $prenom = $_POST['c_fname'];
   $nom = $_POST['c_lname'];
   $mail = $_POST['c_email'];
   $sujet = $_POST['c_subject'];
   $msg = $_POST['c_message'];

   /* insere dans la base les informations du clients et le message envoyé */

   mysqli_query($bdd, "INSERT INTO Messages
                        VALUES ('$prenom', '$nom', '$mail', '$sujet','$msg');");

   include("index.php");
   echo "<script type=\"text/javascript\">" .
      "Swal.fire(
      'Succès!',
      'Votre message a bien été envoyé',
      'success')" . "</script>";
} else {
   include("contact.php");
   echo "<script type=\"text/javascript\">" .
      "Swal.fire({
         icon: 'error',
         title: 'Une erreur est survenue...',
         text: 'Veuillez remplir tous les champs',
       })" . "</script>";
}
