<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Command.class.php';
require '../classes/CommandDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new ComandDB($cnx);
    $retour = $search->getCommandAll($_GET['email'],$_GET['password']);    
    print json_encode($retour);    
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
