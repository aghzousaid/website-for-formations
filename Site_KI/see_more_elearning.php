<?php 
    include('header.php');

?>


    <div class="info_page_elearning">
        <div class="ref_el">
        </div>

        <div class="titre_elearning">
            <div class="shadow-sm p-3  ">
                <center><h1 class="titre_body">
                    <?php
                                echo '<span >'.$_GET['theme'].'</span>';
                                echo '<span >'.$_GET['titre'].'</span>';
                    ?>
                </h1></center>
            </div>
        </div>
    </div>

    <div class="container"  id="see_more_ele">
        <div class="row" id="row_info_form_ele">
            <div id="col_see_more_ele" class="col-md-4" style="background-color:lavender; "><p id="e_learn">E-LEARNING</p></div>
            <div id="col_see_more_ele" class="col-md-4" > <p id="e_time"><i class="clock outline icon"></i>
                <?php
                    echo "<span>".$_GET['duree']."H</span>";
                ?>
            </p></div>
             <!-- /*style="background-color:orange;"* -->
            <div id="col_see_more_ele" class="col-md-4" style="background-color:lavender;"><p id="e_public"><i class="user md icon"></i>
                <?php
                    echo "<span>".$_GET['public']."</span>";
                ?>
            </p></div>
        </div>


    <?php
        $db = mysqli_connect("localhost", "root", "", "image_upload");
        $result =  mysqli_query($db, "SELECT * FROM elearning");
        $row = mysqli_fetch_array($result);
        // while($row = mysqli_fetch_array($result)){
        //     echo '<p>'.$row['description'].'</p>';
        // }
    ?>
    
    <div class="row" id="content_see_more_ele">
    <div  class="col-md-6" id="intervenant">
        <div class="card mb-3" id="card_height">
            <div class="card-header  text-center text-white" id="title_see_more_ele">
                <h6>DESCRIPTIONS</h6>
            </div>
            <div class="card-body">
                <p class="card-text text-justify">
                    <?php
                        echo '<p>'.htmlEntities($row['description']).'</p>';
                    ?>
                </p>
            </div>
        </div>

        <div class="card  mb-3" id="card_height">
            <div class="card-header text-center text-white" id="title_see_more_ele">
                <h6>COMPÉTENCES VISÉES</h6>
            </div>
            <div class="card-body">
                <p class="card-text justify-content-start" >
                    <?php   
                        $para_competence =explode("●", htmlEntities($row['competence']));
                        echo'<p>';
                        for( $i=1; $i<sizeof($para_competence); $i++){
                            echo  "● ".$para_competence[$i].'<br/>';
                        }
                        echo'</p>';
                    ?>
                </p>
            </div>
        </div>

        <div class="card  mb-3" id="card_height">
            <div class="card-header  text-center text-white" id="title_see_more_ele">
                <h6>DÉROULÉ PÉDAGOGIQUE</h6>
            </div>
            <div class="card-body">
                <p class="card-text justify-content-start">
                    <?php
                        $para_deroule_pedagogique =explode("●", htmlEntities($row['deroule_pedagogique']));
                        echo'<p>';
                        for( $i=1; $i<sizeof($para_deroule_pedagogique); $i++){
                            echo  "● ".$para_deroule_pedagogique[$i].'<br/>';
                        }
                        echo'</p>';
                    ?>
                </p>
            </div>
        </div>


    </div>




    <div  class="col-md-6" id="intervenant">
        <div class="card text-center mb-3" id="card_height_session">
            <div class="card-header  text-white" id="title_see_more_ele">
                <h6>SESSIONS À VENIR</h6>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row" id="info_session">
                    <div class="col">
                    <i class="calendar alternate icon"> </i><p id="date_session_ele">Indisponible</p>
                    </div>
                    <div class="col">
                    <button href="inscription.php" data-toggle="modal" data-target="#myModal" class="btn btn-dark">JE M'INSCRIS</button>
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 id="cl_modal" class="modal-title">Formulaire d'inscription</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <p id="cl_modal">This is a large modal.</p> -->
                            <label for="">Avez-vous un compte DPC ?</label>
                            <input type="checkbox" onclick="validate1()" name="oui" id="response1"> Oui
                            <input type="checkbox" onclick="validate2()"  name="non" id="response2"> Non
                            <!-- action="see_more_elearning.php" -->

                            <form  method="post" action="" name="vform" onsubmit="return validateForm(vform)" id="form_modal_inscription">
                                <div class="form-group">
                                <span id="etoile">* les champs sont obligatoires</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nom" id="formGroupExampleInput" placeholder="Nom *" >
                                    <div id="nom_error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="prenom" id="formGroupExampleInput2" placeholder="Prénom *"  >
                                    <div id="prenom_error"></div>
                                </div>
                                <div class="form-group">
                                    <select name="profession" id="prof" class="form-control">
                                        <option value="">Profession *</option>
                                        <option value="Médecin">Médecin</option>
                                        <option value="Infirmier">Infirmier</option>
                                        <option value="Sage-femme">Sage-femme</option>
                                        <option value="Pharmacien">Pharmacien</option>
                                        <option value="Kinésithérapeute">Kinésithérapeute</option>
                                    </select>
                                    <div id="profession_error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tel" id="formGroupExampleInput2" placeholder="Numéro de téléphone *" >
                                    <div id="tel_error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="mail" class="form-control" name="email" id="formGroupExampleInput2" placeholder="E-mail *"  >
                                    <div id="email_error"></div>
                                </div>
                                <div class="form-group">
                                    <select name="" id="date" name="date" class="form-control">
                                        <option value="">Date *</option>
                                        <option value="Du 05/11/2018 au 10/11/2018">Du 05/11/2018 au 10/11/2018</option>
                                        <option value="Du 15/11/2018 au 20/11/2018">Du 15/11/2018 au 20/11/2018</option>
                                        <option value="Du 25/11/2018 au 30/11/2018">Du 25/11/2018 au 30/11/2018</option>
                                    </select>
                                    <div id="date_error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="integer" name="adeli" class="form-control" id="formGroupExampleInput2" placeholder="Numéro ADELI ( 9 chiffres )" >
                                    <div id="adeli_error"></div>
                                    <small id="emailHelp" class="form-text text-muted"><span id="etoile">Le numéro ADELI est obligatoire pour les Infirmiers et les Kinésithérapeutes.</span></small>

                                </div>
                                <div class="form-group">
                                    <input type="integer" name="rpps" class="form-control" id="formGroupExampleInput2" placeholder="Numéro RPPS ( 11 chiffres )" >
                                    <div id="rpps_error"></div>
                                    <small id="emailHelp" class="form-text text-muted"><span id="etoile">Ce numéro est obligatoire pour les Médecins, Sages-femmes et les Pharmaciens.</span></small>
                                </div>
                                <button type="submit" id="btn_submit_inscr" class="btn justify-content-center">Envoyer</button>
                            </form>

                            <div class="alert alert-info" id="form_modal_div_non" role="alert">
                                Désolé, vous ne pouvez pas s'inscrire. 
                                <br>Pour créer votre compte, veuillez cliquer <a href="https://www.mondpc.fr/index.php/mondpc/inscription">ici</a> .
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                        </div>
                    </div>
                    </div>
                </div>
                    </div>
                    </div>
                </p>
            </div>
        </div>

    </div>

    </div>
    <br>
</div>

<script >
     $('#form_modal_inscription').css('display', 'none');
     $('#form_modal_div_non').css('display', 'none');

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
</script>

 <script type="text/javascript">
    function validate1(){
        if (document.getElementById('response1').checked) {
            document.getElementById('form_modal_inscription').style.display ="block";
            document.getElementById('form_modal_div_non').style.display ="none";
        } else {
            document.getElementById('form_modal_inscription').style.display ="none";
        }
    }

    function validate2(){
        if (document.getElementById('response2').checked) {
            document.getElementById('form_modal_inscription').style.display= "none";
            document.getElementById('form_modal_div_non').style.display ="block";
        } else {
            document.getElementById('form_modal_div_non').style.display ="none";
        }
    }

     document.getElementById('success_send_mail').style.display ="none";
     document.getElementById('wrong_send_mail').style.display ="none";
</script>

<script >

        var nom = document.forms['vform']['nom'];
        var prenom = document.forms['vform']['prenom'];
        var profession = document.forms['vform']['profession'];
        var tel = document.forms['vform']['tel'];
        var email = document.forms['vform']['email'];
        var date = document.forms['vform']['date'];
        var adeli = document.forms['vform']['adeli'];
        var rpps = document.forms['vform']['rpps'];

     
    function validateForm(vform){
        if (nom.value =='' ) {
            nom.style.border = "1px solid red";
            nom_error.textContent = "Le nom est obligatoire";
            nom.focus();
            return false;

        }else{
            var regex = /^[a-zA-Z]+$/;
            if(regex.test(nom.value) == false){
                nom.style.border = "1px solid red";
                nom_error.textContent = "Le nom est incorrect";
                nom.focus();
                return false;
            }
            else{
                nom_error.textContent = "";
                nom.style.border = "";
            }
        }


        if (prenom.value == ''){
            prenom.style.border = "1px solid red";
            prenom_error.textContent = "Le prénom est obligatoire";
            prenom.focus();
            return false;
        }
        else{
            var regex = /^[a-zA-Z]+$/;
            if(regex.test(prenom.value) == false){
                prenom.style.border = "1px solid red";
                prenom_error.textContent = "Le prénom est incorrect";
                prenom.focus();
                return false;
            }
            else{
               
                prenom_error.textContent = "";
                prenom.style.border = "";
            }
        }


        if (profession.value == ''){
            profession.style.border = "1px solid red";
            profession_error.textContent = "La profession est obligatoire";
            profession.focus();
            return false;
        }
        else{
            profession.style.border = "";
            profession_error.textContent = "";
        }


        if (tel.value == ''){
            tel.style.border = "1px solid red";
            tel_error.textContent = "Le numéro de téléphone est obligatoire";
            tel.focus();
            return false;
        }
        else{
            var regex = /^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/;
            if(regex.test(tel.value) == false){
                tel.style.border = "1px solid red";
                tel_error.textContent = "Le numéro de téléphone est incorrect";
                tel.focus();
                return false;
            }
            else{
                
                tel_error.textContent = "";
                tel.style.border = "";
            }
        }


        if (email.value =='') {
            email.style.border = "1px solid red";
            email_error.textContent = "L'E-mail est obligatoire";
            email.focus();
            return false;
        }
        else{
            var regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
            if(regex.test(email.value) == false){
                email.style.border = "1px solid red";
                email_error.textContent = "l'E-mail est incorrect";
                email.focus();
                return false;
            }
            else{
                
                email_error.textContent = "";
                email.style.border = "";
            }
        }



        if (date.value == ''){
            date.style.border = "1px solid red";
            date_error.textContent = "La date est obligatoire";
            date.focus();
            return false;
        }
        else{
            date.style.border = "";
            date_error.textContent = "";
        }


        if (adeli.value == ''){
            if(profession.value=="Infirmier" || profession.value =="Kinésithérapeute" ){
                adeli.style.border = "1px solid red";
                adeli_error.textContent = "le numéro ADELI est obligatoire";
                rpps_error.textContent = "";
                rpps.style.border = "";
                adeli.focus();
                return false;
            }
        }else{
            var regex = /^[0-9]{9}$/;
            if(regex.test(adeli.value) == false){
                adeli.style.border = "1px solid red";
                adeli_error.textContent = "le numéro ADELI est incorrect";
                rpps_error.textContent = "";
                rpps.style.border = "";
                adeli.focus();
                return false;
            }
            else{
                
                adeli_error.textContent = "";
                adeli.style.border = "";
            }
        }

        
        if (rpps.value == '' ){
            if(profession.value=="Médecin" || profession.value =="Pharmacien" || profession.value == "Sage-femme" ){
                rpps.style.border = "1px solid red";
                rpps_error.textContent = "le numéro RPPS est obligatoire";
                adeli_error.textContent = "";
                adeli.style.border = "";
                rpps.focus();
                return false;
            }
        }else{

            var regex = /^[0-9]{11}$/;
            if(regex.test(rpps.value) == false){
                rpps.style.border = "1px solid red";
                rpps_error.textContent = "le numéro RPPS est incorrect";
                adeli_error.textContent = "";
                adeli.style.border = "";
                rpps.focus();
                return false;
            }
            else{
               
                rpps_error.textContent = "";
                rpps.style.border = "";
            }
        }
    }



</script>



<?php 
        $message_body="";
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            $message_body .= "<html><head>
            <meta charset='utf-8'/></head><body>";
            foreach ($_POST as $key => $value){
                
                $message_body .=  "<p>$key : $value</p>";
            }
            $message_body .="</body></html>";

            require 'PHPMailer-master/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail ->IsSmtp();
            $mail ->SMTPDebug = 0;
            $mail ->SMTPAuth = true;
            $mail ->SMTPSecure = 'ssl';
            $mail ->Host = "smtp.gmail.com";
            $mail ->Port = 465; // or 587
            $mail ->IsHTML(true);
            $mail ->Username = "nepasrepondrek147@gmail.com";
            $mail ->Password = "NewKamedisInstitut93.";
            // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
            $mail ->SetFrom("nepasrepondrek147@gmail.com","Administrateur du site de Kamedis Institut");
            $mail ->Subject = "Demande d'inscription à la formation E-Learning " ;
            $mail ->Body =$message_body ;
            $mail ->AddAddress('kamedis@formation.fr');


            if(!$mail->Send())
            {
                echo'<script>
                swal({
                title: "Attention !!!",
                text: "Veuillez vérifier que les informations saisies sont correctes",
                icon: "warning",
                dangerMode: true,
                });
                </script> ';

            }
            else
            {
                echo'<script>
                    swal({
                        title: "Votre demande a été bien envoyé !",
                        text: "Nous traiterons votre dossier dans les plus courts délais.",
                        icon: "success",
                        button: "Retour!",
                    });
                </script>';

            }
        }

    include('footer.php');
?>
