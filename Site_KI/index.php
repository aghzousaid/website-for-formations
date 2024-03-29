
<?php 
    include("header.php");
?>

<br>
<br>
<br>
  
<section id="bk_acc">
    <div class="card-deck" id="info_index">
    <div class="card" id="img_index" style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/cancer.jpg" id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">DOULEUR ET CANCER</h5>
        </div>
    </div>
    <div class="card card_next" id="img_index" style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/soins_palliatifs.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">PRISE EN CHARGE DU PATIENT EN FIN DE VIE,<br> À SON DOMICILE</h5>
        </div>
    </div>
    <div class="card card_next" id="img_index" style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/violence_femme.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">VIOLENCES FAITES AUX FEMMES</h5>
        </div>
    </div>
    <div class="card card_next"  style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/attentat.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">VICTIMES D'ATTENTATS</h5>
        </div>
    </div>
    </div>

    <div class="row" id="formation">  
        <div class="col-md-4 ">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div id="dpc_elearning">
                    <div id="icon_dpc_elearning" class="row">
                            <i class="fa fa-laptop" style="font-size:30px;" ></i>
                    </div>
                    <br>
                    <div class="row" id="info_mixte" >
                        <div class="col" id="bk_el_mi">
                            <span id="link_elearning">En E-Learning</span> <br><br>
                        <button type="button" onclick="window.location='e-learning.php'" class="btn btn-secondary" ><a href="e-learning.php" class="btn_elearning">Nos Formations E-Learning</a></button>

                        </div>
                    </div>
            </div>
        </div>
        </div>
        <div class="col-md-4" >
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div id="dpc_mixte_accueil">
                    <div class="row" id="icon_mixte">

                        <div id="icon_user" class="col">
                          
                            <i class="user outline icon" style="font-size:22px;" ></i>
                           
                        </div>
                        <div id="plus"class="col">
                            <i class="plus icon"  ></i>
                        </div>
                        <div id="icon_ele" class="col">
                            <i class="fa fa-laptop"  style="font-size:30px;" ></i>
                        </div>
                    </div>
                    <br>
                  
                    <div class="row" id="info_mixte">
                        <div class="col" id="bk_el_mi">
                            <span  id="link_elearning"> En Présentiel et En E-Learning  </span> <br><br>   
                            <button type="button" class="btn btn-secondary" onclick="window.location='mixtes.php'"><a href="mixtes.php" class="btn_mixte">Nos Formations Mixtes </a></button>
                        </div>          
                    </div>
            </div>
        </div>
        </div>
    </div>
    <br>
    
    <div  id="row_chiffre">
        <div class="shadow p-3 bg-white  rounded row" id="logo_info">
            <div id="top_statistique" class="row justify-content-center">
                Catalogue des formations
                <a href="Catalogue des formations 2018 24092018.pdf" target="_blank"><img src="images/catalogue_img.png" alt=""></a>
            </div>
            
        </div>
        <br>
        <br>
        <br>


        <div class="shadow p-3 bg-white  rounded row" id="logo_info">
            <div id="top_statistique" class="row justify-content-center">
                <b>2018</b>
            </div>

            <div class="col-md col_apropos_mar_top" id="col_apropos">
                <div id="content_col_apropos">
                <i class="fa fa-hourglass-2" style="font-size:35px"></i>
                </div>
                <div id="content_col_apropos">
                <p id="chiffre_aproposdenous">6 ANS</p>
                <p> D'EXPÉRIENCES</p>
                </div>
            </div>
            
            <div class="col-md col_apropos_mar_top" id="col_apropos">
                    <div id="content_col_apropos">
                    <i class="fa fa-user-md" style="font-size:35px"></i>
                    </div>
                    <div id="content_col_apropos">
                    <p id="chiffre_aproposdenous">9600</p>
                    <p>PROFESSIONNELS FORMÉS</p>
                    </div>
                </div>

                <div class="col-md col_apropos_mar_top " id="col_apropos">
                    <div id="content_col_apropos">
                    <i class="fa fa-graduation-cap" style="font-size:35px"></i>
                    </div>
                    <div id="content_col_apropos">
                    <p id="chiffre_aproposdenous">80</p>
                    <p>EXPERTS INTERVENANTS</p>
                    </div>
                </div>
                
            <div class="col-md col_apropos_mar_top" id="col_apropos">
                <div id="content_col_apropos">
                <i class="fas fa-chalkboard-teacher"  style="font-size:35px"></i>
                </div>
                <div id="content_col_apropos">
                <p id="chiffre_aproposdenous">460</p>
                <p> SESSIONS DE FORMATIONS</p>
                </div>
            </div>
            
            <div class="col-md col_apropos_mar_top " id="col_apropos">
                <div id="content_col_apropos">
                <i class="fas fa-clipboard-check" style="font-size:35px"></i>
                </div>
                <div id="content_col_apropos">
                <p id="chiffre_aproposdenous">80%</p>
                <p>DE SATISFACTION</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</section> 




   

<?php 
include('footer.php');
?>
