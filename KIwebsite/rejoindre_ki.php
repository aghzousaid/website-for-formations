<?php
    include('header/header.php');
?>
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

    <form action="rejoindre_ki.php" method="post" id="choix_rejoindre">
        <div class="row" >
            <div class="col" id="col_activite">
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
            <div  class="col">
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
            <button type="submit" class="btn btn-secondary btn-lg center-block" id="search_job">Rechercher</button>
        </div>

    </form>
    <br>
    <br>
    <br>
    <br>

    <form id="choix_rejoindre_res" action="rejoindre_ki.php" method="post">            
        <div class="row" id="row_activite_contrat_res">
            <select class="form-control form-control-lg bg-#00bfa5 teal accent-4" id="activite" name="activite">
                <option  selected><span id="domaine_activite">DOMAINE D’ACTIVITÉ</span></option>
                <option value="Compta/Gestion/Finance/Audit">Compta/Gestion/Finance/Audit</option>
                <option value="Informatique">Informatique</option>
                <option value="Marketing/Communication/Graphisme">Marketing/Communication/Graphisme</option>
                <option value="RH/Personnel/Formation">RH/Personnel/Formation</option>
                <option value="Commerce">Commerce</option>
                <option value="Assistant/Secrétariat">Assistant/Secrétariat</option>
                <option value="Santé">Santé</option>
            </select>
        </div>
        <div  class="row" id="row_activite_contrat_res">
            <select class="form-control form-control-lg bg-#00bfa5 teal accent-4" id="contrat" name="contrat">
                <option value="TYPE DE CONTRAT"selected>TYPE DE CONTRAT</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Stage">Stage</option>
                <option value="Alternance">Alternance</option>
            </select>
        </div> 

        <div class="row" id="row_search_job">
            <button type="submit" class="btn btn-secondary btn-lg center-block" id="search_job">Rechercher</button>
        </div>
    </form> 


    <br>
    <br>
    <br>
    <br>

    <div class="row_job">

         <?php
            $db = mysqli_connect("localhost", "root", "", "image_upload");
            mysqli_set_charset($db, "utf8");
            $result =  mysqli_query($db, "SELECT * FROM recrutement " );


            // $result =  mysqli_query($db, "SELECT * FROM recrutement" );
           
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

            $k=0;
            while ($row = mysqli_fetch_array($result)) { 
                echo'<div class="row " id="job">
                    <center><div id="bloc_job" class="shadow-lg p-1 mb-2  rounded ">
                                <div class="row">
                                    <div class="col">
                                        <p class="intitule"><b><a href="'.$row['poste'].'">'.$row['intitule'].'</a></b>

                                    </div>
                                    <div  class="col">
                                        <p><b>'.$row['contrat'].'</b>
                                        <p><b>Saint-Denis (93200)</b>
                                        <p>Publié le : '.$row['date_publication'].'
                                    </div> 
                                </div>
                           
                            </div>
                    </center>
                </div><br><br>';
            }
           
          ?>
    </div>
<?php
    include('footer/footer.php');
?>

<script type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
    document.write('<link rel="stylesheet" type="text/css" href="css/chrome.css"/>');                    
}
</script>