<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header("location: index.php");
    die();
}

$mail = $_SESSION['mail'];

include('bdd.php');
$bdd->set_charset("utf8");

$resultat = mysqli_query($bdd, "INSERT INTO Commande (mail, etat, date) 
                                VALUES ('$mail', 'validé', now());");

require('fpdf182/fpdf.php');

include('bdd.php');
$bdd->set_charset("utf8");

$res2 = mysqli_query($bdd, "SELECT prenom, nom FROM Clients
                                WHERE mail = '$mail';");
if (mysqli_num_rows($res2) > 0) {
    while ($row2 = mysqli_fetch_array($res2)) {
        $prenom = $row2['prenom'];
        $nom = $row2['nom'];
    }
}

$mail = $_SESSION['mail'];

$pdf = new FPDF();

$pdf->AddPage();

$pdf->Image('./images/logo.png', 140, 0, 50);

define('EURO', chr(128));

$pdf->SetFont('Arial', 'B', 14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(59, 5, utf8_decode('Récapitulatif de votre commande'), 0, 1); //fin de ligne

$pdf->SetFont('Arial', '', 12);

date_default_timezone_set('Europe/Paris');
$timestamp = strtotime(date('H:i'));
$time = date('H:i', $timestamp);

$date = date("d/m/yy");

$pdf->Cell(59, 5, utf8_decode('Facture générée le ') . $date, 0, 0);
$pdf->Cell(59, 5, utf8_decode('à ') . $time, 0, 1); //end of line

// cell vide pour séparer
$pdf->Cell(189, 10, '', 0, 1); //fin de ligne

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(100, 5, 'Facturation', 0, 1); //fin de ligne
$pdf->SetFont('Arial', '', 12);


//add dummy cell at beginning of each line for indentation
$pdf->Cell(90, 5, $prenom, 0, 1);
$pdf->Cell(90, 5, $nom, 0, 1);
$pdf->Cell(90, 5, $mail, 0, 1);

// cell vide pour séparer
$pdf->Cell(189, 10, '', 0, 1); //fin de ligne

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(100, 5, 'Description', 1, 0, 'C');
$pdf->Cell(25, 5, utf8_decode('Quantité'), 1, 0, 'C');
$pdf->Cell(34, 5, 'Prix unitaire', 1, 0, 'C');
$pdf->Cell(30, 5, 'Prix total', 1, 1, 'C'); //fin de ligne

$pdf->SetFont('Arial', '', 12);

$total = 0;
$res = mysqli_query($bdd, "SELECT * FROM Panier, Produits
                               WHERE Panier.id = Produits.id
                               AND mail = '$mail';");
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
        $id = $row['id'];
        $qte = $row['qte'];
        $produit = $row['nom'];

        $prixUnitaire = $row['prix'];
        $totalqte = $row['prix'] * $row['qte'];
        $total = $total + $row['prix'] * $row['qte'];

        $pdf->Cell(100, 5, $produit, 1, 0, 'C');
        $pdf->Cell(25, 5, $qte, 1, 0, 'R');
        $pdf->Cell(34, 5, $prixUnitaire  . EURO, 1, 0, 'R');
        $pdf->Cell(30, 5, $totalqte . EURO, 1, 1, 'R'); //fin de ligne
    }
}

$pdf->Cell(134, 5, '', 0, 0);
$pdf->Cell(25, 5.5, 'Montat total', 0, 0);
$pdf->Cell(30, 5, $total . EURO, 1, 1, 'R'); //fin de ligne

$pdf->Output();
