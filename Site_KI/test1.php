


 <?php

//  function get_data(){
//     $db = mysqli_connect("localhost", "root", "", "formation");
//     $result =  mysqli_query($db, "SELECT * FROM mixtes");
//     $mixtes_data = array();

//     while($row=mysqli_fetch_array($result)) 
//     { 

//       $mixtes_data[] = array(
//         'theme'      => htmlEntities($row['theme']),
//         'profession' => htmlEntities($row['profession']), 
//         'region'     => htmlEntities($row['region']), 
//         'lat'        => htmlEntities($row['lat']),
//         'long'       => htmlEntities($row['long']), 
//         'titre'      => htmlEntities($row['titre']),
//         'ville'      => htmlEntities($row['ville']) 

        // 'theme'      => "said",
        // 'profession' => "aeede", 
        // 'region'     => "ededed", 
        // // 'lat'        => $row['lat'],
        // // 'long'       => $row['long'], 
        // 'titre'      => "deefezfrrf",
        // 'ville'      => "dedefef" 
//       );
//     }
//     var_dump($mixtes_data);
//     return json_encode($mixtes_data); 
//  }

//  $file_name = date('d-m-y').'.json';
//  if(file_put_contents($file_name, get_data()))
//  {
//    echo $file_name . 'file created';
//  }
//  else{
//    echo 'Erreur';
//  }

 ?>


 <?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=image_upload;charset=utf8", "root", "");
$videosParPage = 1;
$videosTotalesReq = $bdd->query('SELECT id FROM mixtes');
$videosTotales = $videosTotalesReq->rowCount();
$pagesTotales = ceil($videosTotales/$videosParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$videosParPage;
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <?php
      $videos = $bdd->query('SELECT * FROM mixtes ORDER BY id DESC LIMIT '.$depart.','.$videosParPage);


      while($vid = $videos->fetch()) {
      ?>
      <b>N°<?php echo $vid['id']; ?> - <?php echo $vid['titre']; ?></b><br />
      <i><?php echo $vid['description']; ?></i>
      <br /><br />
      <?php
      }
      ?>


      <?php
      for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
            echo $i.' ';
         } else {
            echo '<a href="test1.php?page='.$i.'">'.$i.'</a> ';
         }
      }
      ?>
   </body>
</html>