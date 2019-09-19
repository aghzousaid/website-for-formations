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
<span class="title_image">Assistant Administratif (H/F)</span>
</div>

<div class="row" id="frow_poste">
    <div class="col-md" id="contract">
    <i class="fas fa-file-contract"></i>
    Type de contrat : CDI
    </div>
    <div class="col-md" id="poste">
    <i class="fas fa-calendar-times"></i>
    Prise de poste : immédiate
    </div>
    <div class="col-md" id="lieu">
    <i class="fas fa-map-marker-alt"></i>
    Saint-Denis
    </div>
</div>

<div id="srow_poste">
    KAMEDIS Institut est un organisme de formation agréé par l’Agence Nationale du DPC -Réf 4035-, habilité à
    dispenser des programmes DPC (Développement Professionnel Continu) pour la formation de tous les
    professionnels de santé.
    <br>
    <br>
    Rattaché(e) au service suivi pédagogique, vous assurez le suivi des activités du pôle.
    <br><br>
    <b>Missions :</b>
    <div class="mission">
        - Générer les documents pour les chargés de formation (Feuilles d’émargements, Attestations).<br>
        - Envoyer des attestations individuelles aux participants.<br>
        - Envoyer des attestations auprès des Ordres (des Médecins, Pharmaciens, etc.), attestant de la validation
        des formations de nos participants.<br>
        - Gérer des cas particuliers (contacter participants, rechercher des informations, analyse des cas et
        trouver solution).<br>
        - Surveiller les boîtes mails communes pour les formations et transférer vers les pôles concernés.<br>
        - Numériser et archiver les documents de formation.<br>
    </div>
    <br>
    <b>Profil :</b><br>
    <div class="mission">
        De formation minimum Bac+2, vous justifiez d'une première expérience réussie en tant
        qu'assistant(e) administratif(ive).<br>
        Rigueur, organisation, gestion des priorités, autonomie et bon relationnel.<br>
        Maitrise du Pack Office (notamment Excel et Word).<br>
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







