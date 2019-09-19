<?php

//  print_r($_POST['cv']['name']);
// die;

// define variables and set to empty values





$name_error = $prenom_error =  $email_error = $cv_error = $lm_error = $success = $confirm="";
$name = $prenom= $email = $CV= $lm="";


//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $name_error = "Le nom est obligatoire";
  } else {
    $name = test_input($_POST["nom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Seulement les caractères et les espaces sont autorisés"; 
    }
  }

  if (empty($_POST["prenom"])) {
    $prenom_error = "Le prénom est obligatoire";
  } else {
    $prenom = test_input($_POST["prenom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
      $prenom_error = "Seulement les caractères et les espaces sont autorisés"; 
    }
  }


  if (empty($_POST["email"])) {
    $email_error = "L'email est obligatoire";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Le format d'email est invalide"; 
    }
  }

  
    $allowedExts = array(
        "pdf", 
        "doc", 
        "docx"
        ); 


    // var_dump( $_FILES['attach_file']['name'][0]);
    // echo filesize($_POST["attach_file"]);

    
    if(!empty($_FILES['attach_file']['name'][0])){
        $tmp=explode(".", $_FILES['attach_file']['name'][0]);
        $extension1= end($tmp);
    }
    
   
    // echo in_array($extension, $allowedExts );
    // echo $_FILES['attach_file']['size'][0]."<br>";
    if (empty($_FILES['attach_file']['name'][0]) or ($_FILES['attach_file']['size'][0]) > 4194304 or ! ( in_array($extension1, $allowedExts ) )) {
        $cv_error = "Le CV est obligatoire";
    } 
    else{
        $cv_error = '';
    }

    if(!empty($_FILES['attach_file']['name'][1])){
        $tmp=explode(".", $_FILES['attach_file']['name'][1]);
        $extension2= end($tmp);
    }

    // echo $_FILES['attach_file']['size'][1];
    if (empty($_FILES['attach_file']['name'][1]) or ($_FILES['attach_file']['size'][1]) >  4194304 or ! ( in_array($extension2, $allowedExts ) )) {
        $lm_error = "La lettre de motivation est obligatoire";
    } 
    else{
        $lm_error = '';
    }
  

//   if ($name_error == '' and $prenom_error=='' and $email_error == '' and $lm_error == '' and $cv_error=''){
    
  if ($name_error == '' and $prenom_error=='' and $email_error == '' and  $cv_error=='' and   $lm_error==''){

      $message_body = '';
      unset($_POST['butt_submit']);
      $message_body .= "<html><head><meta charset='utf-8'/></head><body>";
      foreach ($_POST as $key => $value){
          
          $message_body .=  "<p>$key: $value</p>";
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
      $mail ->Username = "saghzou96@gmail.com";
      $mail ->Password = "Tablaba69.";
      // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
      $mail ->SetFrom("nepasrepondrek147@gmail.com","Administrateur du site de Kamedis Institut");
      $mail ->Subject = 'Demande pour devenir Intervenant';
      $mail ->Body =$message_body ;
      $mail ->AddAddress('aghzou@hotmail.fr');

      $mail->AddAttachment($_FILES['attach_file']['tmp_name'][0],$_FILES['attach_file']['name'][0]);
      $mail->AddAttachment($_FILES['attach_file']['tmp_name'][1],$_FILES['attach_file']['name'][1]);

      // $mail ->AddCustomHeader( "X-Confirm-Reading-To: said.aghzou@sbhc.fr" );
      // $mail->AddCustomHeader( "Return-receipt-to: said.aghzou@sbhc.fr" );
        // if (isset($_FILES['attach_file']['name']) && $_FILES['attach_file']['name'][0]['error'] == UPLOAD_ERR_OK ) {

        //     $allowedExts = array(
        //         "pdf", 
        //         "doc", 
        //         "docx"
        //         ); 
                


        //         $extension= end(explode(".", $_FILES["attach_file"]["name"][0]));
        //         $ext = end(explode(".", $_FILES["attach_file"]["name"][1]));
        //         if ( ! ( in_array($extension, $allowedExts ) ) or filesize($_FILES["attach_file"]["name"][0] )>1024)  {  
                    
        //             $cv_error='Parcourir uniquement PDF, DOC ou DOCX';
                    
        //         }else{
        //             $mail->AddAttachment($_FILES['attach_file']['tmp_name'][0],$_FILES['attach_file']['name'][0]);
        //             $CV = $_FILES['attach_file']['name'][0];
        //         }

                
        //         if ( ! ( in_array($ext, $allowedExts ) ))  {  

        //             $lm_error='Parcourir uniquement PDF, DOC ou DOCX';

        //         }else{
        //             $mail->AddAttachment($_FILES['attach_file']['tmp_name'][1],$_FILES['attach_file']['name'][1]);
        //             $lm = $_FILES['attach_file']['name'][1];
        //         }
        

            //   $mail->AddAttachment($_FILES['lm']['tmp_name'],
            //   $_FILES['lm']['name']);

            //   for($ct=0;$ct<count($_FILES['attach_file']['tmp_name']);$ct++){
            //     $extension= end(explode(".", $_FILES["attach_file"]["name"][$ct]));

            //     if(  in_array($extension, $allowedExts ) ){
            //         $mail->AddAttachment($_FILES['attach_file']['tmp_name'][$ct],$_FILES['attach_file']['name'][$ct]);
            //     }
            //   }
            // }
            // $mail->attachAll();


            if(!$mail->Send())
            {
                $success="Votre candidature n'a pas été envoyé !";
                echo"<script>
                
                swal({
                    title: 'Votre candidature n a pas été envoyé !',
                    text: 'Essayer de nouveau et respecter les conditions sur vos données',
                    icon: 'warning',
                    dangerMode: true,
                });
    
                </script> ";
                
            }
            else
            {
    
                
                echo'<script>
                    
                swal({
                title: "Votre candidature a été bien envoyée !",
                text: "Nous traiterons votre dossier dans les plus brefs délais.",
                icon: "success",
                button: "Retour!",
                });

                </script>';
                // $success = "Vôtre contact a été bien envoyé";
                $name = $prenom =  $email = $lm= $CV='';
                $name_error = $prenom_error =  $email_error = $cv_error = $lm_error = $success = $confirm="";
    
                
         
                $mail->clearAddresses();
                $mail->clearAttachments();
                // $index_attachement++;
                $mail ->Body = "<html><head><meta charset='utf-8'/></head><body>Votre demande pour devenir Intervenant au sein de Kamedis Institut a été bien prise en compte, vous receverez notre avis
                dans les meilleurs délais possibles après l'étude de votre dossier par notre équipe.<br>Nous vous remercions pour votre confiance.</body></html>";
                // $mail ->ReplyTo(]);
                $mail ->AddAddress($_POST['email']);
    
                if(!$mail->Send())
                {
                    $confirm = "Erreur";
    
                    
                }
                else
                {
                    // $confirm="Un mail de confirmation a été envoyé à votre addresse mail";
                    //   echo'<script>
                    
                    //   swal({
                    //     title: "Votre candidature a bien été envoyée !",
                    //     text: "Nous traiterons votre dossier dans les plus brefs délais.",
                    //     icon: "success",
                    //     button: "Retour!",
                    //   });
    
                    //   </script>';
                }
            
                // echo'<script>
                    
                // swal({
                // title: "Félicitations!",
                // text: "Un mail de confirmation a été envoyé à votre addresse mail.",
                // icon: "success",
                // button: "Retour!",
                // });

                // </script>';

                
        
           }   


        // }
        // else{

        //     echo'<script>
        
        //     swal({
        //       title: "Attention !!! ",
        //       text: "Respectez les formats (PDF, DOC ou DOCX) et la taille de chaque fichier ( <= 1024 octets)",
        //       icon: "warning",
        //       dangerMode: true,
        //     });
  
        //     </script> ';
           


        // }

       
    }
    else{
        
        echo'<script>
        
        swal({
          title: "Attention !!!",
          text: "Respecter les conditions de saisie, les formats (PDF, DOC ou DOCX) et la taille de chaque fichier ( <= 4194304 octets)",
          icon: "warning",
          dangerMode: true,
        });

        </script> ';
    }
}
// else{
//     $index_attachement=0;
// }


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }


?>


<div id="modal-wrapper" class="modal center-block">

    <form id="modal_marg" class="modal-content justify-content-center "  action="<?= htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data" >


        
    <div class="imgcontainer">
        <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
        <img src="img/logo_kamedis.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container input_job">
        <div class="alert alert-danger" role="alert">
            les champs * sont obligatoires.
        </div>

        <div>
            <label  for="#nom">Nom *</label><br>
            <input  id ="width_input_job" name="nom" type="text" class="form-control"  value="<?= $name ?>"  required/>
            <div class="error">
                <span ><?= $name_error ?></span>
            </div>
        </div>
        
        <div>
            <label  for="#prenom">Prenom *</label><br>
            <input id ="width_input_job" name="prenom" type="text"  class="form-control"  value="<?= $prenom ?>" required/>
            <div class="error">
            <span ><?= $prenom_error ?></span>
            </div>
        </div>   
        
        <div>
            <label  for="#email">Email *</label><br>
            <input id ="width_input_job_email" name="email" type="email" class="form-control"  value="<?= $email ?>"required/>
            <div class="error">
                <span ><?= $email_error ?></span>
            </div>
        </div>
        
        <div>
        <label >CV *</label>
            <input type="file"  id="myFile_f" multiple="multiple" class="form-control-file" value ="<?= $CV ?>" name="attach_file[]"   required/>
            <div class="error">
                <span></span>
            </div>
        </div>

        <div>
            <label >Lettre de motivation *</label>
            <input type="file" id="myFile_s" multiple="multiple" class="form-control-file" value ="<?= $lm?>" name="attach_file[]"  required/>
            <div class="error">
                <span></span>
            </div>
        </div>

        <div id="btn_submit_job">
        <button type="submit" id="but_cand_sub" name="butt_submit" class="btn center-block" >Envoyer</button>

        </div>
    </div>
    
    </form>

  
</div>

<script  type="text/javascript">
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}


if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
  document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
}


var control1 = 0;
var control2 = 0;

$('#myFile_f').bind('change', function() {
  //this.files[0].size gets the size of your file.
  if(this.files[0].size > 4194304)  {
        
          swal({
          title: "Attention !!!",
          text: "Vous avez dépassé la taille maximale ( 4194304 octets )",
          icon: "warning",
          dangerMode: true,
          });
  }
  else{
      control1 = 1;
  }

});

$('#myFile_s').bind('change', function() {

  //this.files[0].size gets the size of your file.
  if(this.files[0].size > 4194304)  {
          swal({
          title: "Attention !!!",
          text: "Vous avez dépassé la taille maximale ( 4194304 octets )",
          icon: "warning",
          dangerMode: true,
          });
  }
  else{
      control2 = 1;
  }
});




$('#myFile_f').bind('change',function () {
  if (control1 == 1) {

      $('#but_cand_sub').prop('disabled', false);
      // document.getElementById('but_cand_sub').disabled = true;

  } else {
      //If there is text in the input, then enable the button

      $('#but_cand_sub').prop('disabled', true);

  }
});

$('#myFile_s').bind('change',function () {
  if (control2 == 1) {

      $('#but_cand_sub').prop('disabled', false);
      // document.getElementById('but_cand_sub').disabled = true;

  } else {
      //If there is text in the input, then enable the button

      $('#but_cand_sub').prop('disabled', true);

  }
});



</script>










