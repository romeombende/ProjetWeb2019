<?php

require '../lib/php/pgConnect.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/Command.class.php';
require '../lib/php/classes/CommandDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
$commandDB = new CommandDB($cnx);
$liste = $commandDB->getCommand();

$nbrCommand = count($liste);

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
$pdf->cell(1, 1, 'Id_command', 0, 0, 'C');
$pdf->SetXY($x + 3, $y);
$pdf->cell(1, 1, utf8_decode('Id_medicament '), 0, 0, 'C');
$pdf->SetXY($x + 7, $y);
$pdf->cell(1, 1, utf8_decode('Id_client'), 0, 0, 'C');
$pdf->SetXY($x + 10, $y);
$pdf->cell(1, 1, utf8_decode(''), 0, 0, 'C');
$pdf->SetXY($x + 13, $y);
$pdf->cell(1, 1, utf8_decode('Quantinte'), 0, 0, 'C');
$y += 2;

$y + 2;


for ($i = 0; $i < $nbrCommand; $i++) {

    $pdf->SetXY($x, $y);
    $pdf->cell(1, 1, $liste[$i]['id_command'], 0, 0, 'C');
    $pdf->SetXY($x + 3, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['id_medicament']), 0, 0, 'C');
    $pdf->SetXY($x + 7, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['id_client']), 0, 0, 'C');
    $pdf->SetXY($x + 10, $y);
    //$pdf->cell(1, 1, utf8_decode($liste[$i]['']), 0, 0, 'C');
   // $pdf->SetXY($x + 13, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['quantite']), 0, 0, 'C');
    $y += 2;
    if ($y % 25 == 0) {
        $pdf->AddPage();
        $pdf->setX(8);
        $pdf->cell(3.5, 1, 'Commande', 0, 0, 'C');
        $pdf->SetFillColor(200, 10, 10);
        $pdf->SetDrawColor(0, 0, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setXY(3, 2);
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->cell(1, 1, 'Id', 0, 0, 'C');
        $pdf->SetXY($x + 3, $y);
        $pdf->cell(1, 1, utf8_decode('id_medicament'), 0, 0, 'C');
        $pdf->SetXY($x + 7, $y);
        $pdf->cell(1, 1, utf8_decode('id_cmient'), 0, 0, 'C');
        $pdf->SetXY($x + 10, $y);
        $pdf->cell(1, 1, utf8_decode('quantite'), 0, 0, 'C');
        $pdf->SetXY($x + 13, $y);
        $pdf->cell(1, 1, utf8_decode('stock'), 0, 0, 'C');
        $y += 2;
    }
}



$pdf->Output();

