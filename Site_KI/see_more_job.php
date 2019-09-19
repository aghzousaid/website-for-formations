<?php

    include('header.php');
?>


<script type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
    document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
}
// </script>

<div class="info_page_elearning">
    <div class="ref_el"> 
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="qui_somme_nous.php"></a></li>
                <li class="breadcrumb-item " aria-current="page">Actualités</li>
            </ol>
        </nav> -->
    </div>

    <div class="titre_elearning">
        <div class="shadow-lg p-3 mb-5  rounded">
            <center><h1 class="titre_body">REJOINDRE KAMEDIS INSTITUT</h1>
            <hr align="center" width="300"  border-top: "1px solid">
            <p>NOS OFFRES D'EMPLOIS
            <!-- <p>Découvrez les formations mixtes de Kamedis Institut :
            <p>3h en présentiel et 7h en non présentiel ! -->
            </center>
        </div>
    </div>
</div>

<div class="row" id="row_img_recru">
    <img id="img_recru" src="img/image_recrutement.jpg" alt="">
 
</div>
    
<div class="div_title_image">
<span class="title_image"><?php echo $_GET['intitule'] ?></span>
</div>

<?php
$db = mysqli_connect("localhost", "root", "", "image_upload");
mysqli_set_charset($db, "utf8");

$intitule= $_GET['intitule'];
$result =  mysqli_query($db, "SELECT * FROM recrutement where intitule = '$intitule'" );

$row = mysqli_fetch_array($result)

?>
<div class="row" id="frow_poste">
    <div class="col-md" id="contract">
    <i class="fas fa-file-contract"></i>
    Type de contrat : <?php echo $row['contrat'];?>
    </div>
    <div class="col-md" id="poste">
    <i class="fas fa-calendar-times"></i>
    Prise de poste :  <?php echo $row['disponibilite'];?>
    </div>
    <div class="col-md" id="lieu">
    <i class="fas fa-map-marker-alt"></i>
    <?php echo $row['lieu'];?>
    </div>
</div>

<div id="srow_poste">
    KAMEDIS Institut est un organisme de formation agréé par l’Agence Nationale du DPC -Réf 4035-, habilité à
    dispenser des programmes DPC (Développement Professionnel Continu) pour la formation de tous les
    professionnels de santé.
    <br>
    <br>
    <?php echo $row['equipe'];?>
    <br><br>
    <b>Missions :</b>
    <div class="mission">
        <?php
            $para_competence =explode("•", $row['mission']);
            echo'<p>';
            for( $i=1; $i<sizeof($para_competence); $i++){
                echo  "● ".$para_competence[$i].'<br/>';
            }
            echo'</p>';
        ?>
    </div>
    <br>
    <b>Profil :</b><br>
    <div class="mission">
        <?php
            $para_competence =explode("•", $row['profil']);
            echo'<p>';
            for( $i=1; $i<sizeof($para_competence); $i++){
                echo  "● ".$para_competence[$i].'<br/>';
            }
            echo'</p>';

            if(!empty($row['situation'])){
                echo'<br>';
                $para_competence =explode("•", $row['situation']);
                echo'<p>';
                for( $i=1; $i<sizeof($para_competence); $i++){
                    echo  "● ".$para_competence[$i].'<br/>';
                }
                echo'</p>';
            }
        ?>
    </div>
</div>

<div class="row" id="row_search_job">

<button type="submit" onclick="document.getElementById('modal-wrapper').style.display='block'" class="btn  btn-lg center-block" id="postuler_job" >Postuler</button>

</div>

<?php

include('treat_nous_rejoindre.php');

?>


<br>

<?php

include('footer.php');
  
?>







