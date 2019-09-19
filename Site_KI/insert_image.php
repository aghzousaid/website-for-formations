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

    $tab = [5];


    if(!empty($_POST['medecin'])){
        $tab[0] = $_POST['medecin'];
    }

    if(!empty( $tab[1] = $_POST['infermier'])){
      $tab[1] = $_POST['infermier'];
    }
    if(!empty($tab[2] = $_POST['pharmacien'])){
        $tab[2] = $_POST['pharmacien'];
    }
    if(!empty($tab[3] = $_POST['sagefemme'])){
        $tab[3] = $_POST['sagefemme'];
    }
    if(!empty(  $tab[4] = $_POST['kine'])){
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
    // Get duree
    $duree = mysqli_real_escape_string($db, $_POST['duree']);
    //Get competence
    $competence= mysqli_real_escape_string($db, $_POST['competence']);
    //Get deroule_pedagogique
    $deroule_pedagogique= mysqli_real_escape_string($db, $_POST['deroule_pedagogique']);
    //Get description 
    $description= mysqli_real_escape_string($db, $_POST['description']);
  	// image file directory
  	$target = "images/elearning/".basename($image);

  	$sql = "INSERT INTO elearning ( image, theme, titre, public, duree,competence,deroule_pedagogique,description ) VALUES ('$image', '$theme', '$titre', '$public', '$duree','$competence','$deroule_pedagogique','$description')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM elearning");
?>
<!DOCTYPE html>
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
      	echo "<img src='images/elearning/".$row['image']."' >";
        echo "<p>".$row['theme']."</p>";
        echo "<p>".$row['titre']."</p>";
        echo "<p>".$row['duree']."h</p>";
        echo "<p>".$row['public']."</p>";
        print_r(str_word_count($row['public'], 1));
        echo htmlEntities(str_word_count($row['public']));
      echo "</div>";
    }
  ?>
  <form method="POST" action="insert_image.php" enctype="multipart/form-data">
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
    <textarea name="competence" id="" cols="40" rows="5" 	placeholder="Compétence Visée / objectif"></textarea>
    </div>
    <div>
    <textarea name="deroule_pedagogique" id="" cols="40" rows="5" 	placeholder="Deroulé Pédagogique"></textarea>
    </div>
    <div>
    <textarea name="description" id="" cols="40" rows="5" 	placeholder="Description"></textarea>
    </div>
    <div >
        <input type="integer" name="duree" placeholder="La durée de la formation" >
    </div>

  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>