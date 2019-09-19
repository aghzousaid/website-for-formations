<?php
    include('header.php');
?>

<script type="text/javascript">
    if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
        document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
    }
</script>


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
            <div class="shadow-sm p-3 mb-3  rounded">
                <center><h1 class="titre_body">REJOINDRE KAMEDIS INSTITUT</h1>
                <hr align="center" width="300"  border-top: "1px solid">
                <p>NOS OFFRES D'EMPLOIS
                <!-- <p>Découvrez les formations mixtes de Kamedis Institut :
                <p>3h en présentiel et 7h en non présentiel ! -->
                </center>
            </div>
        </div>
    </div>

<div class="container">
    <form action="rejoindre_ki.php" method="post" id="choix_rejoindre">
        <div class="row" >
            <div class="col-md-6" id="col_activite">
                <select class="form-control form-control-lg bg-#00bfa5 teal accent-4" id="activite" name="activite">
                    <option  selected>DOMAINE D’ACTIVITÉ</option>
                    <option value="Compta/Gestion/Finance/Audit">Compta/Gestion/Finance/Audit</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Marketing/Communication/Graphisme">Marketing/Communication/Graphisme</option>
                    <option value="RH/Personnel/Formation">RH/Personnel/Formation</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Assistant/Secrétariat">Assistant/Secrétariat</option>
                    <option value="Santé">Santé</option>
                </select>
            </div>
            <div  class="col-md-6">
                <select class="form-control form-control-lg bg-#00bfa5 teal accent-4" id="contrat" name="contrat">
                    <option value="TYPE DE CONTRAT"selected>TYPE DE CONTRAT</option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stage">Stage</option>
                    <option value="Alternance">Alternance</option>
                </select>
            </div> 
        </div>

        <div class="row" id="row_search_job">
            <button type="submit" name="search_job_name" class="btn btn-secondary btn-lg center-block" id="search_job">Rechercher</button>
        </div>

    </form>
    <br><br>

  

    <div class="row_job" >

         <?php
            $db = mysqli_connect("localhost", "root", "", "image_upload");
            mysqli_set_charset($db, "utf8");
            $result =  mysqli_query($db, "SELECT * FROM recrutement " );


            // $result =  mysqli_query($db, "SELECT * FROM recrutement" );

            if(isset($_POST['search_job_name'])){
                if(isset($_POST['activite']) and $_POST['activite']!="DOMAINE D’ACTIVITÉ"){
                    $domaine = $_POST['activite'];
                    // echo $domaine;
    
                    if(isset($_POST['contrat']) and $_POST['contrat']!="TYPE DE CONTRAT"){
                        $contrat = $_POST['contrat'];
                        // echo $contrat;
    
                        $result =  mysqli_query($db, "SELECT * FROM recrutement where domaine ='$domaine' and contrat = '$contrat'" );
                    }
                    else{
                        if($_POST['contrat']=="TYPE DE CONTRAT"){
                            // echo $domaine;
                            $result =  mysqli_query($db, "SELECT * FROM recrutement where domaine ='$domaine'" );
                        }
                    }
    
                }
                else{
                    if( isset($_POST['contrat']) and $_POST['contrat']!='TYPE DE CONTRAT'){
                        $contrat = $_POST['contrat'];
                        // echo  $contrat;
                        $result =  mysqli_query($db, "SELECT * FROM recrutement where contrat = '$contrat'" );
                    }            
                }
            }


            // $row = mysqli_fetch_array($result);
            // $num_results = mysqli_num_rows($result); 
            // if($num_results > 0){
                // <p ><a href="see_more_job.php">En savoir plus</a></p>
                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                    $i++;
                        echo'<div class="container"  id="job">
                            <center><a href="see_more_job.php?intitule='.$row['intitule'].'"><div id="bloc_job" class="shadow-sm p-1 mb-1 ">
                                        <div class="row" id="desc_post_recrut">
                                            <div class="col-md-6">
                                                <p class="intitule"><b><a href="see_more_job.php?intitule='.$row['intitule'].'">'.$row['intitule'].'</a></b></p>
                                                
                                            </div>
                                            <div class="col-md-6" id="second_div_job">
                                                <p>'.$row['contrat'].'
                                                <p>Saint-Denis (93200)
                                                <p>Publié le : '.date("d/m/Y", strtotime(htmlEntities($row['date_publication']))).'
                                                
                                            </div> 
                                        </div>
                                    </div></a>
                            </center>
                        </div><br><br>';
                }
            // }
                if($i==0){
                    echo'<div id="alert_job" class="alert alert-info" role="alert">
                        Aucun résultat
                    </div>';
                }
            


            ?>
    </div>

<script>

    $('#bloc_job').click(function() {
   window.location.href = $(this).find('a').attr('href');
});

</script>

        
    <!-- <div>
        <center><h1 class="titre_body">REJOINDRE KAMEDIS INSTITUT</h1>
        <hr align="center" width="300"  border-top: "1px solid">
        <p>NOS OFFRES D'EMPLOIS
        </center>
    </div> -->
    </div>

<?php
    include('footer.php');
?>

