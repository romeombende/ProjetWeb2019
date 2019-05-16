<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Medicament.class.php';
require '../classes/MedicamentDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
   $update= new MedicamentDB($cnx);
   
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateMedicament($champ, $nouveau, $id);
    print json_encode($update); //facultatif
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

