<?php 
    include('header.php');

?>


<script type="text/javascript">
    if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
        document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
    }
</script> 
   <div class="info_page_elearning_dpc">
        <div class="ref_el">
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
             
                <li class="breadcrumb-item"><a href="nos_formations.php"></a></li>
                <li class="breadcrumb-item " aria-current="page">DPC</li>
                </ol>
            </nav> -->
        </div>

        <div class="titre_elearning">
            <div class="shadow-sm p-3  rounded"><center><h1 class="titre_body">LE DPC</h1>
                Une obligation triennale, remplissez-là dans les meilleures conditions avec Kamedis Institut 
                </center>
            </div>
        </div>
    </div>

        <!-- <div>
            <center><h1 class="titre_body">LE DPC</h1>
            Une obligation triennale, remplissez-là dans les meilleures conditions avec Kamedis Institut 
            </center>
        </div> -->
        
        <br><br>
        <div class="container">
            <div id="f_row_dpc">

                <div id="lg_odpc">
                        <a href="https://www.agencedpc.fr/"><img src="img/odpc.jpg" class="logo_odpc"></a>
                </div>
                
                <div id="desc_dpc">
                    <div class="text-justify"  id="div_s_sol">
                        <p>Initié par la loi Hôpital, Patients, Santé et Territoires (HPST) en 2009 et adapté par la loi 
                        de Modernisation du système de Santé en 2016, ce dispositif de formation est dédié aux professionnels 
                        de santé de France (au sens du Code de Santé Publique, chapitre IV). Ce dispositif réglementé permet 
                        à chaque professionnel de santé de suivre un parcours de DPC et ainsi remplir leur obligation triennale.</p>
                    </div>
                </div>
            </div>

            <div id="first_desc">
                        <p>
                        <b>Le DPC permet l’amélioration de la qualité et de la sécurité des soins à travers : </b>
                        <div id="second_desc">
                            •	L’Evaluation et l'amélioration des pratiques professionnelles et de gestion des risques<br>
                            •	Le maintien et l’actualisation des connaissances et des compétences<br>
                            •	La prise en compte des priorités de santé publique
                        </div>
                        </p>
            </div>
        </div>

        <br><br><br><br>
        <div class="meth_insc_dpc">
            <br><br>
            <div id="methode_dpc">
                <center >
                    Méthodes de formation DPC
                </center>
            </div>
            <br><br>
            <div class="row" id="mtd_dpc">
                <div class="col-md-6" >
                    <div id="dpc_elearning">

                            <center>

                            <div id="icon_dpc_elearning">
                                    <i class="fa fa-laptop" style="font-size:90px;" ></i>
                            </div>
                            
    
                            
                            <div class="row">
                                <div class="col">
                                    <span id="link_elearning">En E-Learning</span> <br><br>
                                <button type="button" class="btn btn-secondary" ><a href="e-learning.php" class="btn_elearning">Nos Formations E-Learning</a></button>

                                </div>
                            </div>
                            </center>
                    </div>
                </div>


                <div class="col-md-6" >
                    <div id="dpc_mixte">
                        <div class="row" id="icon_mixte">

                            <div id="icon_user" class="col">
                                <center>
                                <i class="user outline icon" style="font-size:70px;" ></i>
                                </center>
                            </div>
                            <div id="plus" class="col">
                                <i class="plus icon"  ></i>
                            </div>
                            <div id="icon_ele" class="col">
                                <i class="fa fa-laptop"  style="font-size:95px;" ></i>
                            </div>
                        
                        <br><br><br>
                        </div>

                        <!-- <i class="material-icons" style="font-size:36px"></i><br>     -->
                        <div class="row" id="info_mixte">
                            <div class="col">
                                En Présentiel et en E-Learning <br><br>   
                                <button type="button" class="btn btn-secondary" ><a href="mixtes.php" class="btn_mixte">Nos Formations Mixtes </a></button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <!-- <svg height="100%" width="100%">
            <line x1="0" y1="130" x2="2000" y2="130" style="stroke:rgb(0,0,0);stroke-width:1" />
            </svg> -->
        </div>

 

        <div class="inscr_dpc">
            <div id="inscr_form">
                <center>
                Comment s’inscrire à une formation DPC ? <br>
                    2 étapes possibles
                </center> 
            </div>

            <br><br><br>
            <div class="row" id="inscr_form_dpc">
                <div class="col" id="inscri_ki">

                    <center>
                        <h4>PAR KAMEDIS INSTITUT</h4>
                        
                 
                        <div id="border_fr_el">
                            <p>En savoir plus</p>
                            <a href=""><i style="font-size:30px" class="fa">&#xf0a9;</i></a>
                        </div>

                    </center>
                </div>
                <div class="col" id="inscri_a_n_dpc">
                    <center>
                        <h4>PAR L’AGENCE NATIONAL DU DPC</h4>
                        
                        <div id="border_fr_mix">
                            <p>En savoir plus</p>
                            <a href=""><i style="font-size:30px" class="fa">&#xf0a9;</i></a>
                        </div>
                    </center>
                </div>
            </div>

        </div>

        <br> <br> <br> 
        <div class="dpc_fin"> 
            <center>
                          N’HESITEZ PLUS ! <br> 
                SUIVEZ UNE FORMATION DPC AVEC KAMEDIS INSTITUT
            </center>
        </div>
        </div>
        
        

  

<?php 
    include('footer.php');
?>