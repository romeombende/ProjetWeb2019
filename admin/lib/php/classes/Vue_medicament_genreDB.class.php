<?php

class Vue_medicament_genreDB {
	 private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
	 public function getMedicamentByGenre($id_genre) {
        print 'coucou';
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_medicament_genre where ref=:id_genre";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_genre', $id_genre);
            $resultset->execute();
            $this->_db->commit();
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

