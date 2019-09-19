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
<span class="title_image">Concepteur Rédacteur Médical/Santé (H/F)</span>
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
    
    <b>Au sein du pôle pédagogique, les missions principales sont les suivantes :</b>
    <div class="mission"><br>
        - Vous serez chargé(e) de la conception et de la rédaction d’outils
        pédagogiques : formation présentielle, formation à distance, modules de
        formation, e-learning, serious games, … <br>
        - Vous échangerez avec les experts formateurs pour la préparation de leurs
        interventions et pour la conception des formations dans les délais impartis.<br>
        - Vous échangerez avec les autres services pour assurer le bon suivi des
        dossiers.<br><br>
    </div>
    
    <b>Profil :</b>
    <div class="mission"><br>
        - Pour intégrer notre équipe jeune et dynamique au sein du Pôle pédagogique, nous
        recherchons une personne issue d’une profession de santé (Infirmier(e) diplômé(e)
        d&#39;Etat, Kiné, Orthophoniste, Médecin, …) possédant de bonnes qualités
        rédactionnelles.<br>
        - Une expérience dans un poste similaire n’est pas obligatoire. En effet, le candidat
        retenu sera accompagné et formé en interne.<br>
        - Notre entreprise attache de l’importance à la qualité de vie au travail et au bon
        équilibre vie professionnelle / vie privée.<br>
        - Statut : Cadre au forfait jour<br>
        - Rémunération : Selon profil + tickets restaurant + mutuelle + remboursement 50%
        transports.<br>
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