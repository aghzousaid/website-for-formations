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
<span class="title_image">Téléprospecteur (H/F)</span>
</div>

<div class="row" id="frow_poste">
    <div class="col" id="contract">
    <i class="fas fa-file-contract"></i>
    Type de contrat : CDI
    </div>
    <div class="col" id="poste">
    <i class="fas fa-calendar-times"></i>
    Prise de poste : immédiate
    </div>
    <div class="col" id="lieu">
    <i class="fas fa-map-marker-alt"></i>
    Saint-Denis
    </div>
</div>

<div  id="srow_poste">
    Kamedis Institut est une entreprise qui crée et propose des formations DPC à
    destination des professionnels de santé.
    <br>
    <br>
    
    <!-- <b>Dans le cadre du poste de Téléprospecteur (H/F), les missions sont les suivantes :</b>
    <div class="mission"><br>
        <p>
        - Contacter les professionnels de santé par téléphone pour compléter les sessions de formation<br>
        - Communiquer sur les formations dispensées<br>
        - Expliquer les mécanismes de financement<br>
        - Développer et fidéliser le portefeuille clients de l’entreprise<br>
        </p>
        <br><br><br>
    </div> 
   
    <b>Profil :</b>
    <div class="mission"><br>
        <p>
        - Une première expérience similaire est demandée.<br>
        - Bonne élocution et communication, organisation et rigueur.<br>
        - Etre à l’aise au téléphone et faire preuve d’adaptabilité.<br>
        - CDI à pourvoir dès que possible.<br>
        - Durée du travail : 39h/semaine<br>
        - Rémunération : 1709 € bruts/mois + tickets restaurant<br>
        </p>
    </div> -->

    <b>Dans le cadre du poste de Téléprospecteur (H/F), les missions sont les suivantes :</b><br><br>
    <div class="mission">
        - Communiquer sur les formations dispensées.<br/>
        - Contacter les professionnels de santé par téléphone pour compléter les sessions de formation.<br/>
        - Vous échangerez avec les autres services pour assurer le bon suivi des dossiers.<br><br> 
    </div>
  
    
    <b class="profil_">Profil :</b><br><br>
    <div class="mission">
        - Une première expérience similaire est demandée.<br>
        - Bonne élocution et communication, organisation et rigueur.<br>
        - Etre à l’aise au téléphone et faire preuve d’adaptabilité.<br>
        - CDI à pourvoir dès que possible.<br>
        - Durée du travail : 39h/semaine.<br>
        - Rémunération : 1709 € bruts/mois + tickets restaurant.<br>
    </div>
</div>

<div class="row" id="row_search_job">
<button type="submit" onclick="document.getElementById('modal-wrapper').style.display='block'" class="btn  btn-lg center-block" id="postuler_job" >Postuler</button>
</div>


<?php

include('treat_nous_rejoindre.php');

?>


<br><br>

<?php

require('footer.php');
  
?>