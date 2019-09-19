
<?php 
    include("header/header.php");
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
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card card_next" id="img_index" style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/soins_palliatifs.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">PRISE EN CHARGE DU PATIENT EN FIN DE VIE,<br> À SON DOMICILE</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card card_next" id="img_index" style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/violence_femme.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">VIOLENCES FAITES AUX FEMMES</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card card_next"  style="max-width: 18rem;">
        <img class="card-img-top" src="img/acceuil/attentat.jpg"  id="img_index"  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">VICTIMES D'ATTENTATS</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    </div>

    <div class="row" id="formation">  
        <div class="col-sm-5">
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
        <div class="col-sm-5" >
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div id="dpc_mixte">
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
</section> 


<?php 
include('footer/footer.php');
?>
