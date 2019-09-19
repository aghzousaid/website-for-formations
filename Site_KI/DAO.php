<?php
include("config.php");
	
class DAO{
	
	var $link = [];
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
	
	
	public function searchData($searchVal_tab){
		
		global $link;
		try {
			
			$dbConnection = $this->dbConnect();

			$tab =[];
			$tabtwo =[];
			$i=0;
			$l=0;
			$result ="" ;
			$fin_result="";

			foreach( $searchVal_tab as  $searchVal){
				if(strlen($searchVal)>3){
			$dbConnection->quote($searchVal);

			$stmt1 = $dbConnection->prepare("SELECT * FROM `elearning` WHERE `image` like ? or `theme` like ? or
			`titre` like ? or `duree` like ? or `competence` like ? or `description` like ? or 
			`deroule_pedagogique` like ? ");			
			
			$stmt2 = $dbConnection->prepare("SELECT * FROM `mixtes_testes` WHERE `theme` like ? or `public` like ?
			or `region` like ? or `titre` like ? or `ville` like ?  or `adresse` like ?  or `presentiel` like  ? or `non_presentiel` like ?
			or `description` like ? or `competence` like ? ");
			
			$stmt3 = $dbConnection->prepare("SELECT * FROM `recrutement` WHERE `domaine` like ? or `contrat` like ? or `intitule` like ? 
			or `date_publication` like ? or `profil` like ? ");

			$stmt4 = $dbConnection->prepare("SELECT * FROM `actualite` WHERE `date` like ? or `titre` like ? or `titre_descr` like ? 
			or `description` like ? or `detail` like ?  or `image` like ? or `lien` like ? ");
			
			$stmt1->setFetchMode(PDO:: FETCH_ASSOC);
			$stmt1->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%'));  		
			$Count1 = $stmt1->rowCount(); 

			$stmt2-> setFetchMode(PDO:: FETCH_ASSOC);		
			$stmt2->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%' , '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%'));
			$Count2 = $stmt2->rowCount(); 

			$stmt3->setFetchMode(PDO:: FETCH_ASSOC);		
			$stmt3->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%'));
			$Count3 = $stmt3->rowCount(); 

			$stmt4->setFetchMode(PDO:: FETCH_ASSOC);		
			$stmt4->execute( array('%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',  '%' . $searchVal . '%',
			'%' . $searchVal . '%', '%' . $searchVal . '%', '%' . $searchVal . '%'));
			$Count4 = $stmt4->rowCount();
			 
			if ($Count1  > 0){
				while($data=$stmt1->fetch(PDO::FETCH_ASSOC)) {
	
					$result = "<div class='search-result'>
					<h3>".$data['titre']."</h3>
					<h4>".$data['theme']."</h4><h5>".$data['description']."</h5>";	

					$link= "<a style='color:;text-decoration:none;' href='".$data['link']."'>LIRE LA SUITE</a></div>";

					if(!empty($result) and !empty($link)){
						if(!in_array( [$result,$link], $tabtwo)){
							$tabtwo[$l] = [$result,$link];
							$l++;
					    }
					}
				}
			}

			if ($Count2  > 0){
				while($data=$stmt2->fetch(PDO::FETCH_ASSOC)) {										
				   $result = "<div class='search-result'>
				   <h3>".$data['titre']."</h3><h4>".$data['theme']."</h4><h5>".$data['description']."</h5>";			
				   
				   $link= "<a style='text-decoration:none;' href='".$data['link']."'>LIRE LA SUITE</a></div>";
				  
				   if(!empty($result) and !empty($link)){
						if(!in_array( [$result,$link], $tabtwo)){
							$tabtwo[$l] = [$result,$link];
							$l++;
						}
				   }
				}
			}

			if ($Count3  > 0){
				while($data=$stmt3->fetch(PDO::FETCH_ASSOC)) {										
				   $result = '<div class="search-result"><h3>'.$data['intitule'].'</h3>
				   <h4>'.$data['domaine'].'</4><h5>'.$data['contrat'].'</h5>';	
				   
				   $link= "<a style='color:;text-decoration:none;' href='".$data['link']."'>LIRE LA SUITE</a></div>";

				   if(!empty($result)  and !empty($link)){
						if(!in_array( [$result,$link], $tabtwo)){
							$tabtwo[$l] = [$result,$link];
							$l++;
					    }
			   		}
				}
			}


			
			if ($Count4  > 0){
				while($data=$stmt4->fetch(PDO::FETCH_ASSOC)) {										
				   $result = '<div class="search-result"><h3>'.$data['titre'].'</h3>
				   <h4>'.$data['titre_descr'].'</4><h5>'.$data['description'].'</h5>';
				   
				   $link= "<a style='color:;text-decoration:none;' href='".$data['link']."'>LIRE LA SUITE</a></div>";
				   
				   if(!empty($result) and !empty($link)){
					   if(!in_array( [$result,$link], $tabtwo)){
						$tabtwo[$l] = [$result,$link];
						$l++;
					   }

				   }
				}		
			}

			}
			}

			
			return $tabtwo;
		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	

}


?>

