<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addClient($data) {
        //$_db->beginTransaction();
        try {
            //$query = "INSERT INTO client ";
            //$query.="  (nom_client,email_client,password_client,";
            //$query.="  adresse,numero,localite,cp)";
            //$query.="  values(:nom_client,:email_client,:password_client,";
            //$query.="  :adresse,:numero,:localite,:cp)";
            $query = "select ajouter_client(:nom_client,:email_client,:password_client,:adresse,:numero,:localite,:cp) as retour";
            // ajouter_client est la fonction embarquée à developper dans la bD
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom_client', $data['nom']);
            $resultset->bindValue(':email_client', $data['email1']);
            $resultset->bindValue(':password_client', $data['password']);
            $resultset->bindValue(':adresse', $data['adresse']);
            $resultset->bindValue(':numero', $data['numero']);
            $resultset->bindValue(':localite', $data['localite']);
            $resultset->bindValue(':cp', $data['codepostal']);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0); // à ne pas oublier ..
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion" . $e->getMessage();
        }
        //$_db->commit();
    }

    public function getClient() {
        try {
            $query = "select * from client";
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

    public function getClientAll($email, $password) {
        $query = "select * from client where email_client=:email and password_client=:password";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':email', $email, PDO::PARAM_STR);
            $resultset->bindParam(':password', $password, PDO::PARAM_STR);
            $resultset->execute();
            $_array = $resultset->fetchAll();
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
