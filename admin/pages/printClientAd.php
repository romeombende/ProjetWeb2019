<?php

require '../lib/php/pgConnect.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/Client.class.php';
require '../lib/php/classes/ClientDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
$client_genreDB = new ClientDB($cnx);
$liste = $client_genreDB->getClient();

$nbrClient = count($liste);

require '../fpdf/fpdf.php';


$pdf = new FPDF('P', 'cm', 'A4');
$pdf->setFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8);
$pdf->Image('../images/carr-pharmacie2.jpg',5,3);
$pdf->cell(3.5, 1, 'Catalogue des client', 0, 0, 'C');
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->setXY(3, 2);
$x = 3;
$y = 3;

$pdf->SetXY($x, $y);
$pdf->cell(1, 1, 'Id_client', 0, 0, 'C');
$pdf->SetXY($x + 3, $y);
$pdf->cell(1, 1, utf8_decode('Nom '), 0, 0, 'C');
$pdf->SetXY($x + 7, $y);
$pdf->cell(1, 1, utf8_decode('Email'), 0, 0, 'C');
$pdf->SetXY($x + 10, $y);
$pdf->cell(1, 1, utf8_decode(''), 0, 0, 'C');
$pdf->SetXY($x + 13, $y);
$pdf->cell(1, 1, utf8_decode('Adresse'), 0, 0, 'C');
$y += 2;

$y + 2;


for ($i = 0; $i < $nbrClient; $i++) {

    $pdf->SetXY($x, $y);
    $pdf->cell(1, 1, $liste[$i]['id_client'], 0, 0, 'C');
    $pdf->SetXY($x + 3, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['nom']), 0, 0, 'C');
    $pdf->SetXY($x + 7, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['email_client']), 0, 0, 'C');
    $pdf->SetXY($x + 10, $y);
    //$pdf->cell(1, 1, utf8_decode($liste[$i]['']), 0, 0, 'C');
   // $pdf->SetXY($x + 13, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['adresse']), 0, 0, 'C');
    $y += 2;
    if ($y % 25 == 0) {
        $pdf->AddPage();
        $pdf->setX(8);
        $pdf->cell(3.5, 1, 'Catalogue des client', 0, 0, 'C');
        $pdf->SetFillColor(200, 10, 10);
        $pdf->SetDrawColor(0, 0, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setXY(3, 2);
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->cell(1, 1, 'Id', 0, 0, 'C');
        $pdf->SetXY($x + 3, $y);
        $pdf->cell(1, 1, utf8_decode('nom_medicament'), 0, 0, 'C');
        $pdf->SetXY($x + 7, $y);
        $pdf->cell(1, 1, utf8_decode('concentration'), 0, 0, 'C');
        $pdf->SetXY($x + 10, $y);
        $pdf->cell(1, 1, utf8_decode('prix'), 0, 0, 'C');
        $pdf->SetXY($x + 13, $y);
        $pdf->cell(1, 1, utf8_decode('stock'), 0, 0, 'C');
        $y += 2;
    }
}



$pdf->Output();

