<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: index.php");
    die();
}

$mail = $_SESSION['login'];

$id = $_POST['id'];

require 'bdd.php';

$select = $pdo->prepare("SELECT * FROM Panier WHERE mail = '$mail';");
$select->execute();

$rep = $pdo->prepare("SELECT id FROM Panier WHERE mail = '$mail';");
$rep->execute();

$donnee = $rep->fetch(PDO::FETCH_ASSOC);

$selectn = $pdo->prepare("SELECT nom FROM Produits WHERE id = '$donnee[id]';");
$selectn->execute();

$ress = $selectn->fetch(PDO::FETCH_ASSOC);

/* insère les infos du panier dans la page commande */

while ($res = $select->fetch(PDO::FETCH_ASSOC)) {
    $resultat = $pdo->prepare("INSERT INTO Commande (nom, qte, mail, etat, date) VALUES ('$ress[nom]', $res[qte], '$mail', 'validé', now());");
    $resultat->execute();
}

require('fpdf182/fpdf.php');

require 'bdd.php';

/* affiche les informations du client */

$res2 = $pdo->prepare("SELECT prenom, nom  FROM Clients WHERE mail = '$mail';");
$res2->execute();

/* affiche les produits du panier */
$productCount = $res2->rowCount();
if ($productCount > 0) {
    while ($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
        $prenom = $row2['prenom'];
        $nom = $row2['nom'];
    }
}

$mail = $_SESSION['login'];

$pdf = new FPDF();

$pdf->AddPage();

$pdf->Image('./images/logo.png', 140, 0, 50);

define('EURO', chr(128));

$pdf->SetFont('Arial', 'B', 14);

// Cell(width , height , text , border , end line , [align] )
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

$res = $pdo->prepare("SELECT * FROM Panier, Produits WHERE Panier.id = Produits.id AND mail = '$mail';");
$res->execute();

$productCount = $res->rowCount();
if ($productCount > 0) {
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
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

$req = $pdo->prepare("DELETE FROM Panier WHERE mail = '$mail';");
$req->execute();
