<?php


$nom_error = $prenom_error =  $email_error = $tel_error = $civilite_error = $message_error = $success = $confirm="";
$nom = $prenom= $email = $civilite= $tel =$message="";


//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["civilite"])) {
        $civilite_error = "Le civilité est obligatoire";
    } else {
    }

  if (empty($_POST["nom"])) {
    $nom_error = "Le nom est obligatoire";
  } else {
    $nom = test_input($_POST["nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
      $nom_error = "le nom est incorrect"; 
    }
  }

  if (empty($_POST["prenom"])) {
    $prenom_error = "Le prénom est obligatoire";
  } else {
    $prenom = test_input($_POST["prenom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
      $prenom_error = "le prenom est incorrect"; 
    }
  }


  if (empty($_POST["tel"])) {
    $tel_error = "Le numéro de téléphone est obligatoire";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if phone is well-formed
    if (!preg_match("/^(0[1-9])(?:[ _.-]?(\d{2})){4}$/",$tel)) {
      $tel_error = "Le numéro de téléphone est incorrect"; 
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

  if (empty($_POST["message"])) {
    $message_error = "Le message est obligatoire";
  } else {
    $message = test_input($_POST["message"]);

    if(empty( $message)){
        $message_error = "Votre message est vide";
    }
  }

   
  if ($nom_error == '' and $prenom_error=='' and $email_error == '' and  $civilite_error=='' and $tel_error=='' and $message_error==''){

      $message_body = '';
      unset($_POST['btn_submit_contact']);
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
      $mail ->Username = "nepasrepondrek147@gmail.com";
      $mail ->Password = "KamedisInstitut93.";
      // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
      $mail ->SetFrom("nepasrepondrek147@gmail.com","Administrateur du site de Kamedis Institut");
      $mail ->Subject = 'Message envoyé depuis le site de Kamedis Institut';
      $mail ->Body =$message_body ;
      $mail ->AddAddress('aghzou@hotmail.fr');

      
            if(!$mail->Send())
            {
                $success="Votre candidature n'a pas été envoyé !";
                echo"<script>
                
                swal({
                    title: 'Votre Message n a pas été envoyé !',
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
                title: "Votre Message a été bien envoyé !",
                text: "Nous le traiterons dans les plus brefs délais.",
                icon: "success",
                button: "Retour!",
                });

                </script>';
                // $success = "Vôtre contact a été bien envoyé";
                $nom = $prenom = $email = $tel= $message ='';
                $nom_error = $prenom_error =  $email_error = $tel_error = $message_error = $civilite_error="";
    
                
         
                // $index_attachement++;
                $mail ->Body = "<html><head><meta charset='utf-8'/></head><body>Votre message a été bien pris en compte
                par notre Kamedis Institut.<br>Nous vous remercions pour votre confiance.</body></html>";
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
           }   
       
    }
    else{
        
        echo'<script>
        
        swal({
          title: "Attention !!!",
          text: "Corrigez les erreurs indiqués sur le formulaire",
          icon: "warning",
          dangerMode: true,
        });

        </script> ';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>

<script  type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
  document.write('<link rel="stylesheet" type="text/css" href="css/chrome.css"/>');                    
}
</script>










