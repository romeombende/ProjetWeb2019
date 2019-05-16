<?php

class CommandeDAO {

    private $_db;

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }
    
    public function AjoutCommande($id_medicament,$id_client) {
        try{
			$query = "INSERT INTO commande(quantite,id_client,id_medicament) VALUES(:quantite,:id_client,:id_medicament)";
			$res= $this->_db->prepape
                     //   $resultset = $this->_db->prepare($query);
			$resultset->bindParam(':quantite',1,PDO::PARAM_INT);
			$resultset->bindParam(':id_client',$id_client,PDO::PARAM_INT);
			$resultset->bindParam(':id_medicament',$id_medicament,PDO::PARAM_INT);
			$retour=$resultset->execute();
			return $retour;
		}catch(PDOException $e){
			print "Echec de l'insertion".$e->getMessage();
		}
        
    }

}
