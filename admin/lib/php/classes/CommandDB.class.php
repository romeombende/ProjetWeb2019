
<?php

class CommandDB extends Command {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addCommand($id_client,$id_medicament) {

        try {

            $query = "INSERT INTO command(quantite,id_client,id_medicament) values(:quantite,:id_client,:id_medicament)";
            $qt=1;
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':quantite',$qt,PDO::PARAM_INT);
            $resultset->bindParam(':id_client',$id_client,PDO::PARAM_INT);
            $resultset->bindParam(':id_medicament',$id_medicament,PDO::PARAM_INT);
            $resultset->execute();
          // $retour = $resultset->fetchColumn(0); // à ne pas oublier ..
         //  return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion" . $e->getMessage();
        }
        //$_db->commit();
    }

    public function getCommand() {
        try {
            $query = "select * from command";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

    public function getCommandAll() {
        $query = "select * from command";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                // nous n'employerons pas d'objet, afin de faciliter la conversion en Json dans le 
                //fichier ajax ajaxRechercheClient.php
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }

}
