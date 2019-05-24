<?php

class ClientDB extends Client {
	 private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
	public function addClient($data){
		
		try{
			
			$query = "select ajouter_contact(:nom_contact,:email_contact,:password_contact,:adresse,:numero,:localite,:cp,:message) as retour";
			
			$resultset = $this->_db->prepare($query);
			$resultset->bindValue(':nom_contact',$data['nom']);
			$resultset->bindValue(':email_contact',$data['email1']);
			$resultset->bindValue(':password_contact',$data['password']);
			$resultset->bindValue(':adresse',$data['adresse']);
			$resultset->bindValue(':numero',$data['numero']);
			$resultset->bindValue(':localite',$data['localite']);
			$resultset->bindValue(':cp',$data['codepostal']);
                        $resultset->bindValue(':message',$data['comment']);
			$resultset->execute();
			$retour = $resultset->fetchColumn(0); // à ne pas oublier ..
			return $retour;
		}catch(PDOException $e){
			print "Echec de l'insertion".$e->getMessage();
		}
		
		
	}
	
    public function getContact(){
        try{
            $query = "select * from contact";
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
		public function getContactAll($email,$password){
        $query="select * from contact where email_contact=:email and password_contact=:password";
        try {
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(':email',$email, PDO::PARAM_STR);
        $resultset->bindValue(':password',$password, PDO::PARAM_STR);

        $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
         
                $_array[] = $data;               
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }

  
   
}

