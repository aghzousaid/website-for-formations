<?php 
    include('header/header.php');

?>
    <div class="info_page_elearning">
        <div class="ref_el"> 
        </div>

        <div class="titre_elearning">
            <div class="shadow-lg p-3 mb-5  rounded">
                <center><h1 class="titre_body">DEVENIR INTERVENANT</h1>
                <p>Avec Kamedis Institut :
                </center>
            </div>
        </div>
    </div>

    <br><br>
    <div class="presentation_dev_intervenant" >
    
        “ Kamedis Institut organise chaque année des formations DPC diverses et variées au travers de la France.
        Nos intervenants garantissent le succès de nos formations. Rejoignez l’équipe Kamedis Institut afin 
        de renforcer notre équipe d’experts. ”

    </div> 
    <div class="row" id="expert_defin">
        <div class="col" id="col1_expert">
            <div id="question_expert">
            UN EXPERT,<br>C’EST QUOI ?<br><br> 
                <!--  -->
            </div>
            <div>
            <!-- class="def_expert" -->
            C’est un intervenant reconnu par la communauté scientifique et médicale : chef de service, praticien hospitalier, 
            docteur en pharmacie, professeur d’université, auteur d’articles scientifiques, ayant les compétences professionnelles 
            et qualités pédagogiques nécessaires à l’animation d’une formation répondant aux exigences du DPC. 
            </div>
        </div>
        <div class="col"  id="devenir_expert">
            <div >
                <img src="img/recrutement/devenir_expert.jpg" alt="">
            </div>
        </div>
    </div>

    <div  id="pictogramme" >

        <div class="row" id="row_raison_expert">
            <div class="col" >
                <div id="img_expert">
                    <img src="img/recrutement/amelioration.jpg" alt="première pictogramme" >
                </div>
            </div>
            <div class="col">
                    <div class="shadow-lg p-3 mb-5  rounded">
                    <p>Vous contribuez au maintien, à l’actualisation des connaissances et compétences
                    ainsi qu’à l’amélioration des pratiques des professionnels de santé.</p>
                    </div>
            </div>
        </div>
        <br>
        <br>
     
        <div class="row" id="row_raison_expert">
            <div class="col" id="img_expert">
                <img src="img/recrutement/partage-de-connaissances.jpg" alt="deuxième pictogramme" >
            </div>
            <div class="col" id="text_img">
                <div class="shadow-lg p-3 mb-5  rounded">
                <p>Vous partagez votre savoir-faire ainsi que vos connaissances avec des confrères.</p> 
                </div>
            </div>   
        </div>
      
        <br>
        <br>
        <div class="row" id="row_raison_expert">
            <div class="col" id="img_expert">
                <img src="img/recrutement/remuneration.jpg" alt="troisième pictogramme" >         
            </div>
            <div class="col" id="text_img">
                <div class="shadow-lg p-3 mb-5  rounded">
                <p>Vous êtes rémunéré sous forme de droits d’auteur pour chaque intervention.</p> 
                </div>
            </div>
        </div>
      
        
    </div>

<br>

<div id="contact_intervenant">

    <div class="row" id="titre_devenir_intervenant">
        <center> 
        <div class="shadow-lg p-3 mb-5  rounded center-block">
                <b>JE DEVIENS INTERVENANT</b>
        </div> 
        </center>  
    </div>

    <?php
        include("send_mail_intervenant.php");
    ?>

    <form id="test_form_res" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
    <div class="test_form_res_input">

        <div id="champ_obli_res">
            <label>* Les champs sont obligatoires</label>
        </div>

        <input id="row_form" name="nom" type="text" class="form-control" placeholder="Nom *"  value="<?= $name ?>"  required/>
        <div class="error">
            <span ><?= $name_error ?></span>
        </div>

        <input  id="row_form"name="prenom" type="text"  class="form-control" placeholder="Prenom *"   value="<?= $prenom ?>" required/>
        <div class="error">
            <span ><?= $prenom_error ?></span>
        </div>

        <input id="row_form" type="text" name="lieu_exercice" class="form-control" placeholder="Lieu d'exercice, ex : 10 rue ... *" value="<?= $address ?>" required/>
        <div class="error">
            <span ><?= $address_error ?></span>
        </div>

        <div  id="row_form_cp_ville" class="form-inline">
            <div id="small_input1_cp">
                <input type="text" class="form-control" 
                placeholder="Code postale *"  name="codepostale" value="<?= $codepostale ?>" required/> 
                
            </div>
            <br>
            <div id="small_input2_ville">
                <input type="text" class="form-control" placeholder="Ville *"  name="ville" value="<?= $ville ?>"required/><br>
            </div>
            <div class="next_error">
                <span ><?= $codepostale_error ?></span>
                <br>
                <span ><?= $ville_error ?></span>
            </div>
        </div>

        <div id="row_form">
        <label  class="my-1 mr-2" for="Profession">Profession *</label>
        <select class="custom-select my-1 mr-sm-2" name="Profession" value="<?= $profession ?>" required>
                <option value="" selected >Aucune</option>
                <option value="Médecin">Médecin</option>
                <option value="Inférmier">Inférmier</option>
                <option value="Sage-Femme">Sage-Femme</option>
                <option value="Pharmacien">Pharmacien</option>
        </select>
        <div class="error">
            <span><?= $profession_error ?></span>
        </div>
        </div>

        <div id="row_form">
        <label class="my-1 mr-2" for="#Profession">Thème d’intervention  *</label>
            <select class="custom-select my-1 mr-sm-2" name="theme_intervention"  value="<?= $ti ?>"  required>
            <option value="" selected >Aucun</option>
                <option >Douleur et Cancer</option>
                <option >Douleurs migraineuses</option>
                <option >Douleurs neuropathiques</option>
                <option >La prise en charge de la douleur chronique </option>
                <option >Mise en œuvre des soins palliatifs </option>
                <option >Prescription d’une activité physique adaptée</option>
                <option >Reconnaître, évaluer et orienter</option>
                <option >Suivi et accompagnement d’un patient douloureux</option>
                <option >La juste prescription des anticoagulants oraux</option>
                <option >Insuffisance cardiaque</option>
                <option >Troubles du rythme cardiaque</option>
                <option >Prise en charge de l'endométriose </option>
                <option >Prise en charge de la douleur par l'IDE</option>
                <option >Prise en charge du patient en fin de vie, à son domicile</option>
                <option >Fièvre prolongée </option>
                <option >Thrombose Et cancer </option>
                <option >Amélioration de la prise en charge du patient atteint de Parkinson </option>
                <option >Maladie d’Alzheimer </option>
                <option >Prise en charge de l’AVC </option>
                <option >De l’hyperactivité au TDA/H</option>
                <option >Annonce d’une maladie grave</option>
                <option >Diagnostic de la dépression</option>
                <option >Prise en charge des victimes d’attentat</option>
                <option >Violences faites aux femmes</option>
                <option >Cancer de la prostate</option>
                <option >Cancer de la vessie </option>
                <option >Cystite aiguë simple, compliquée ou récidivante chez la femme </option>
                <option >Dysfonction érectile et andrologie   </option>
                <option >Incontinence urinaire chez la femme </option>
            </select>
        <div class="error">
            <span><?= $ti_error ?></span>
        </div>
        </div>

        <input id="row_form"  name="tel" type="tel"  class="form-control" placeholder="Téléphone, ex: 0123458612 *"  value="<?= $tel ?>"required/>
        <div class="error">
            <span ><?= $tel_error ?></span>
        </div>

        <input id="row_form_email" name="email"  class="form-control" placeholder="Email*" value="<?= $email ?>"required/>
        <div class="error">
            <span ><?= $email_error ?></span>
        </div>

        <div  id="row_form" >
        <label class="my-1 mr-2" for="#cv">CV (PDF, DOCX, DOC) *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="cv" id="cv_intervenant" value="<?= $CV ?>"  required/>
        <div class="error">
            <span><?= $cv_error ?></span>
        </div>
        </div>

        <div class="submit_div_res" id="row_form">
            <button class="btn btn-primary btn-lg center-block" name="butt_submit" type="submit" id='btn_intervenant' value="btn_intervenant" ata-submit="...Sending" >Envoyer</button>
        </div>
        <br>
        <br><br>
        <div class="success"><?= $success ?></div>
        <div class="confirm"><?= $confirm ?></div>
    </div>
    </form>

    <div class="row">
    <form id="test_form"  action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">

        <div class="form-row" id="row_form">
            <div class="col" id="input_contact">
                <input  name="nom" type="text" class="form-control" placeholder="Nom 
                                                                        *"  value="<?= $name ?>"  required/>
            
                <div class="error">
                <span ><?= $name_error ?></span>
                </div>
            </div>
            
            <div class="col"  id="input_next" >
                <input  name="prenom" type="text"  class="form-control" placeholder="Prenom 
                                                                *"   value="<?= $prenom ?>" required/>
            
                <div class="next_error">
                <span ><?= $prenom_error ?></span>
                </div>                                                  
            </div>
        </div>

        <div class="form-row"  id="row_form">
            <div class="col" id="input_contact">
                <input type="text" name="lieu_exercice" class="form-control" 
                placeholder="Lieu d'exercice, ex : 10 rue ...
                                    *" value="<?= $address ?>" required/>
                <div class="error">
                <span ><?= $address_error ?></span>
                </div>
                
            </div>
        
        
            <div class="col" >
                <div  class="form-inline" >
                    <div  id="small_input1">
                        <input type="text" class="form-control" 
                        placeholder="Code postale                 *" 
                        onblur="verifieCodePostale()" name="codepostale" value="<?= $codepostale ?>" required/> 
                        
                    </div>
                    <br>
                    <div id="small_input2">
                        <input type="text" class="form-control" 
                        placeholder="Ville                        *"  name="ville"
                        onblur="verifieVille()" value="<?= $ville ?>"required/><br>
                    </div>
                    <div class="next_error">
                        <span ><?= $codepostale_error ?></span>
                        <br>
                        <span ><?= $ville_error ?></span>
                    </div>
                </div>
                
            </div>

        </div>

        <div class="form-row"  id="row_form">
            <div class="col" id="input_contact">
                <input name="tel" type="tel"  class="form-control" placeholder="Téléphone, ex: 0123458612                                  *"  onblur="verifieTel()" value="<?= $tel ?>"required/>
                <div class="error">
                    <span ><?= $tel_error ?></span>
                </div>
            </div>
            <div class="col" id="input_contact">
                <input name="mail" type="email" class="form-control" placeholder="Email                                         
                            *"  onblur="verifieEmail()" value="<?= $email ?>"required/>
                <div class="next_error">
                    <span ><?= $email_error ?></span>
                </div>
            </div>
        </div>

        <div id="champ_obli">
            <label>* Les champs sont obligatoires</label>
        </div>

        <div class="Pr">
        <div class="form-inline" >
            <label class="my-1 mr-2" for="Profession">Profession *</label>
            <select class="custom-select my-1 mr-sm-2" name="Profession" value="<?= $profession ?>" required>
                    <option value="" selected >Aucune</option>
                    <option value="Médecin">Médecin</option>
                    <option value="Inférmier">Inférmier</option>
                    <option value="Sage-Femme">Sage-Femme</option>
                    <option value="Pharmacien">Pharmacien</option>
            </select>
            <div class="error">
                <span><?= $profession_error ?></span>
            </div>
        </div>
        </div>

        <div class="TI">
        <div class="form-inline" >
            <label class="my-1 mr-2" for="#Profession">Thème d’intervention  *</label>
            <select class="custom-select my-1 mr-sm-2" name="theme_intervention"  value="<?= $ti ?>"  required>
                    <option value="" selected >Aucun</option>
                    <option >Douleur et Cancer</option>
                    <option >Douleurs migraineuses</option>
                    <option >Douleurs neuropathiques</option>
                    <option >La prise en charge de la douleur chronique </option>
                    <option >Mise en œuvre des soins palliatifs </option>
                    <option >Prescription d’une activité physique adaptée</option>
                    <option >Reconnaître, évaluer et orienter</option>
                    <option >Suivi et accompagnement d’un patient douloureux</option>
                    <option >La juste prescription des anticoagulants oraux</option>
                    <option >Insuffisance cardiaque</option>
                    <option >Troubles du rythme cardiaque</option>
                    <option >Prise en charge de l'endométriose </option>
                    <option >Prise en charge de la douleur par l'IDE</option>
                    <option >Prise en charge du patient en fin de vie, à son domicile</option>
                    <option >Fièvre prolongée </option>
                    <option >Thrombose Et cancer </option>
                    <option >Amélioration de la prise en charge du patient atteint de Parkinson </option>
                    <option >Maladie d’Alzheimer </option>
                    <option >Prise en charge de l’AVC </option>
                    <option >De l’hyperactivité au TDA/H</option>
                    <option >Annonce d’une maladie grave</option>
                    <option >Diagnostic de la dépression</option>
                    <option >Prise en charge des victimes d’attentat</option>
                    <option >Violences faites aux femmes</option>
                    <option >Cancer de la prostate</option>
                    <option >Cancer de la vessie </option>
                    <option >Cystite aiguë simple, compliquée ou récidivante chez la femme </option>
                    <option >Dysfonction érectile et andrologie   </option>
                    <option >Incontinence urinaire chez la femme </option>
            </select>
            <div class="error">
                <span><?= $ti_error ?></span>
            </div>
        </div>
        </div>

        <div class="CV">
            <div class="form-inline">
                <label class="my-1 mr-2" for="#cv">CV (PDF, DOCX, DOC) *</label>
                <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" id="cv_intervenant_simple" name="cv" value="<?= $CV ?>"  required/>
                <div class="error">
                    <span><?= $cv_error ?></span>
                </div>
            </div>
        </div>


        <div id="submit_div">
            <button class="btn btn-primary" name="butt_submit" type="submit" id="submit_button" ata-submit="...Sending" >Envoyer</button>
        </div>
        <br>
        <br><br>
        <div class="success"><?= $success ?></div>
        <div class="confirm"><?= $confirm ?></div>

    </form>
    </div>

    <b id="after_submit"></b>

</div>

<script type="text/javascript">
var control1 = 0;

$('#cv_intervenant').bind('change', function() {
  //this.files[0].size gets the size of your file.
  if(this.files[0].size > 4194304)  {
        
          swal({
          title: "Attention !!!",
          text: "Le CV a dépassé la taille maximale ( 4194304 octets )",
          icon: "warning",
          dangerMode: true,
          });
  }
  else{
      control1 = 1;
  }

});

$('#cv_intervenant').bind('change',function () {
  if (control1 == 1) {

      $('#btn_intervenant').prop('disabled', false);

  } else {

      $('#btn_intervenant').prop('disabled', true);
  }
});

$('#cv_intervenant_simple').bind('change', function() {
  //this.files[0].size gets the size of your file.
  if(this.files[0].size > 4194304)  {
        
          swal({
          title: "Attention !!!",
          text: "Le CV a dépassé la taille maximale ( 4194304 octets )",
          icon: "warning",
          dangerMode: true,
          });
  }
  else{
      control1 = 1;
  }

});

$('#cv_intervenant').bind('change',function () {
  if (control1 == 1) {

      $('#submit_button').prop('disabled', false);
      
  } else {
    
      $('#submit_button').prop('disabled', true);

  }
});

 if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
        document.write('<link rel="stylesheet" type="text/css" href="css/chrome.css"/>');                    
    }
</script>


<br><br>

<?php

require('footer/footer.php');
  
?>