<?php

class MedicamentDB extends Medicament{
	 private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
        public function updateMedicament($champ, $nouveau, $id) {

        try {
            // PREPARER LA REQUETE COMME VU PRECEDEMMENT
            $query = "UPDATE medicament set " . $champ . " = '" . $nouveau . "' where id_medicament ='" . $id . "'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    public function getMedicament(){
        try{
            $query = "select * from medicament";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_array[] = $data;
            }    
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
     public function getAllMedicament(){
        try{
            $query = "select * from vue_medicament_genre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_array[] = $data;
            }   
            
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
   
}

