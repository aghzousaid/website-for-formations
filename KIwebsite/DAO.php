<?php
include("config.php");
class DAO{
	
	public function dbConnect(){
		
		$dbhost = DB_SERVER; // set the hostname
		$dbname = DB_DATABASE ; // set the database name
		$dbuser = DB_USERNAME ; // set the mysql username
		$dbpass = DB_PASSWORD;  // set the mysql password

		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
			$dbConnection->exec("set names utf8");
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;

		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	
	}
	
	public function searchData($searchVal){
		
		
		try {
			
			$dbConnection = $this->dbConnect();
			$dbConnection->quote($searchVal);

			$stmt1 = $dbConnection->prepare("SELECT * FROM `elearning` WHERE `image` like ? or `theme` like ? or
			`titre` like ? or `duree` like ? or `competence` like ? or `description` like ? or 
			`deroule_pedagogique` like ? ");			
			
			$stmt2 = $dbConnection->prepare("SELECT * FROM `mixtes` WHERE `theme` like ? or `profession` like ?
			or `region` like ? or `lat` like ? or `long` like ? or `titre` like ? or `ville` like ?
			or `dat` like ? or `adresse` like ? or `code_postale` like ? or `presentiel` like  ? or `non_presentiel` like ?
			or `description` like ? or `competence` like ? or `duree_presentiel` like ? or `duree_non_presentiel` like ? or `image` like ? ");
			
			

			$stmt3 = $dbConnection->prepare("SELECT * FROM `recrutement` WHERE `domaine` like ? or `contrat` like ? or `intitule` like ? 
			or `date_publication` like ? or `poste` like ? ");
			
			$stmt1->setFetchMode(PDO:: FETCH_ASSOC);
			$stmt1->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%'));  		
	
			$Count1 = $stmt1->rowCount(); 

			$stmt2-> setFetchMode(PDO:: FETCH_ASSOC);		
			$stmt2->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%' , '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%', '%' . $searchVal . '%',  '%' . $searchVal . '%', '%' . $searchVal . '%'));
			$Count2 = $stmt2->rowCount(); 

			$stmt3->setFetchMode(PDO:: FETCH_ASSOC);		
			$stmt3->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%'));
			$Count3 = $stmt3->rowCount(); 
		     
			$result ="" ;
			$fin_result="";
			if ($Count1  > 0){
				while($data=$stmt1->fetch(PDO::FETCH_ASSOC)) {										
				   $result = $result .'<div class="search-result"><a style="text-decoration:none;" href="'.$data['link'].'">'.$data['titre'].'</a> </div>';				

				}
			
			}

			if ($Count2  > 0){
				while($data=$stmt2->fetch(PDO::FETCH_ASSOC)) {										
				   $result = $result .'<div class="search-result"><a style="text-decoration:none;" href="'.$data['link'].'">'.$data['titre'].'</a> </div>';				

				}
			
			}

			if ($Count3  > 0){
				while($data=$stmt3->fetch(PDO::FETCH_ASSOC)) {										
				   $result = $result .'<div class="search-result"><a style="text-decoration:none;" href="'.$data['link'].'">'.$data['intitule'].'</a> </div>';				
				}
				
			}

			$fin_result = $result;
			
			return $fin_result;
		
		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}	
	
}

?>

