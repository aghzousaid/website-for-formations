<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

  	// Get image name
    $image = $_FILES['image']['name']; 
      
  	// Get theme
    $theme = mysqli_real_escape_string($db, $_POST['theme']);
    // Get titre
    $titre = mysqli_real_escape_string($db, $_POST['titre']);
    // Get public

    $tab = [];


    if(!empty($_POST['medecin'])){
        $tab[0] = $_POST['medecin'];
    }
    if(!empty($_POST['infermier'])){
        $tab[1] = $_POST['infermier'];
      }
      if(!empty($_POST['pharmacien'])){
          $tab[2] = $_POST['pharmacien'];
      }
      if(!empty( $_POST['sagefemme'])){
          $tab[3] = $_POST['sagefemme'];
      }
      if(!empty( $_POST['kine'])){
          $tab[4] = $_POST['kine'];
      }

    $k=0;
    for($j=0; $j<5; $j++){
        if($tab[$j]!=''){
            $k++;
            if($k==1){
              $profession = "".$tab[$j]." ";
            }
            else{
              $profession = "".$profession."".$tab[$j]." ";
            } 
        }
    }

    // $profession = "".$_POST['medecin']." ".$_POST['infermier']." ".$_POST['pharmacien']." ".$_POST['sagefemme']." ".$_POST['kine']."";
    $public = mysqli_real_escape_string($db, $profession);
    // Get region
    $region = mysqli_real_escape_string($db, $_POST['region']);
    // Get ville
    $ville = mysqli_real_escape_string($db, $_POST['ville']);
    // Get code postale
    $code_postale = mysqli_real_escape_string($db, $_POST['code_postale']);
    // Get code date
    $date = mysqli_real_escape_string($db, $_POST['date']);
    // Get ville
    $adresse = mysqli_real_escape_string($db, $_POST['adresse']);
    // Get code postale
    $lat = mysqli_real_escape_string($db, $_POST['lat']);
    // Get code date
    $long = mysqli_real_escape_string($db, $_POST['long']);
    //Get competence
    $competence= mysqli_real_escape_string($db, $_POST['competence']);
    //Get deroule_presentiel
    $deroule_presentiel= mysqli_real_escape_string($db, $_POST['presentiel']);
    //Get deroule_non_presentiel
    $deroule_non_presentiel= mysqli_real_escape_string($db, $_POST['non_presentiel']);
    //Get duree_presentiel
    $duree_presentiel= mysqli_real_escape_string($db, $_POST['duree_presentiel']);
    //Get duree_non_presentiel
    $duree_non_presentiel= mysqli_real_escape_string($db, $_POST['duree_non_presentiel']);
    //Get description 
    $description= mysqli_real_escape_string($db, $_POST['description']);
  	// image file directory
  	$target = "images/mixtes/".basename($image);

  	$sql = "INSERT INTO `mixtes_testes`(`id`, `titre`, `theme`, `public`, `region`, `ville`, `latitude`, `longitude`, `duree_presentiel`, `duree_non_presentiel`, `presentiel`, `non_presentiel`, `competence`, `description`, `dat`, `code_postale`, `adresse`, `image`) VALUES ($titre, $theme, $public, $region, $ville, $lat, $long,
    $duree_presentiel, $duree_non_presentiel, $deroule_presentiel,$deroule_non_presentiel, $competence,$description, $date, $code_postale, $adresse,$image)";
      // execute query
     $requette= mysqli_query($db, $sql);
     echo $requette;
    // if($requette){
    //     echo "problème";
    // }


  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM mixtes_testes ");
?>

<!Doctype html >
<html>
<head>
<meta  charset="utf-8"/>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>


<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/mixtes/".$row['image']."' >";
        echo "<p>".$row['theme']."</p>";
        echo "<p>".$row['titre']."</p>";
        echo "<p>Présentiel:" .$row['duree_presentiel']."h et Non Présentiel:" .$row['duree_non_presentiel']."h</p>";
        echo "<p>".$row['public']."</p>";
        print_r(str_word_count($row['public'], 1));
        echo htmlEntities(str_word_count($row['public']));
      echo "</div>";
    }
  ?>
  <form method="POST" action="insert_mixte.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
    <div>
      <select id="mySelect" name="theme">
          <option>PAR THEME</option>
          <option>Algologie</option>
          <option>Cardiologie</option>
          <option>Endocrinologie</option>
          <option>Gériatrie</option>
          <option>Gynécologie</option>
          <option>Neurologie</option>
          <option>Pharmacologie</option>
          <option>Psychiatrie / Psychologie</option>
          <option>Situations exceptionnelles</option>
          <option>Urologie</option>
      </select>
    </div>
    <div>
    <textarea name="titre" id="" cols="40" rows="5" 	placeholder="Donner le titre de la formation"></textarea>
    </div>
    <div>    
        <label for="">PAR PROFESSION</label>
        <div class="form-check">
            <div class="checkbox">
            <label><input type="checkbox" value="Médecins généralistes" name="medecin">Médecin</label>
            </div>
            
            <div class="checkbox">
            <label><input type="checkbox" value="Infermier" name="infermier">Infermier</label>
            </div>

            <div class="checkbox">
            <label><input type="checkbox"  value="Pharmacien" name="pharmacien">Pharmacien</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="Sage-Femme" name="sagefemme">Sage-Femme</label>
            </div> 

            <div class="checkbox">
            <label><input type="checkbox" value="Kinésithérapeute" name="kine">Kinésithérapeute</label>
            </div> 
        </div>
    </div>
    <div>    
        <label for="">PAR REGION</label>
        <div>
        <select id="mySelect" name="region">
            <option>Île-de-France</option>
            <option>Auvergne-Rhône-Alpes</option>
            <option>Bourgogne-Franche-Comté</option>
            <option>Bretagne</option>
            <option>Centre-Val de Loire</option>
            <option>Corse</option>
            <option>Grand Est</option>
            <option>Hauts-de-France</option>
            <option>Normandie</option>
            <option>Nouvelle-Aquitaine</option>
            <option>Occitanie</option>
            <option>Pays de la Loire</option>
            <option>Provence-Alpes-Côte d'Azur</option>
          
        </select>
        </div>

    </div>
    <div>
     <textarea name="competence" id="" cols="40" rows="5" 	placeholder="Compétence Visée / objectif"></textarea>
    </div>
    <div>
     <textarea name="description" id="" cols="40" rows="5" 	placeholder="Description"></textarea>
    </div>
    <label for="">Déroulé Pédagogique</label>
    <div>
     <textarea name="presentiel" id="" cols="40" rows="5" 	placeholder="Non Présentiel"></textarea>
    </div>
    <div>
     <textarea name="non_presentiel" id="" cols="40" rows="5" 	placeholder="Présentiel"></textarea>
    </div>

    <div>
     <textarea name="duree_presentiel" id="" cols="40" rows="5" 	placeholder="Durée Non Présentiel"></textarea>
    </div>
    <div>
     <textarea name="duree_non_presentiel" id="" cols="40" rows="5" 	placeholder="Durée Présentiel"></textarea>
    </div>
    <div>
     <textarea name="ville" id="" cols="40" rows="5" 	placeholder="Ville"></textarea>
    </div>
    <div>
     <textarea name="code_postale" id="" cols="40" rows="5" 	placeholder="Code Postale"></textarea>
    </div>
    <div>
     <label for="">Date</label>
        <div>
            <input type="date" name="date">
        </div>
    </div>
    <div>
     <textarea name="adresse" id="" cols="40" rows="5" 	placeholder="Adresse"></textarea>
    </div>
    <div>
     <textarea name="lat" id="" cols="40" rows="5" 	placeholder="Latitude"></textarea>
    </div>
    <div>
     <textarea name="long" id="" cols="40" rows="5" 	placeholder="Longitude"></textarea>
    </div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>