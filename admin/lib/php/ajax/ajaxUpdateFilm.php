<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Film.class.php';
require '../classes/FilmDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
   $update= new FilmDB($cnx);
   
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateFilm($champ, $nouveau, $id);
    print json_encode($update); //facultatif
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

