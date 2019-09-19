<?php 

// define variables and set to empty values
$name_error = $prenom_error = $address_error= $codepostale_error= $ville_error= $email_error = $tel_error = $profession_error =
$ti_error = $cv_error = $success = $confirm="";
$name = $prenom= $address = $codepostale= $ville = $email = $tel= $CV =$profession=$ti="";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_POST['email'])) {
  if (empty($_POST["nom"])) {
    $name_error = "Le nom est obligatoire";
  } else {
    $name = test_input($_POST["nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Seulement les caractères et les espaces sont autorisés"; 
    }
  }

  if (empty($_POST["prenom"])) {
    $prenom_error = "Le prénom est obligatoire";
  } else {
    $prenom = test_input($_POST["prenom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
      $prenom_error = "Seulement les caractères et les espaces sont autorisés"; 
    }
  }

  if (empty($_POST["lieu_exercice"])) {
    $address_error = "Le lieu d'exercice est obligatoire";
  } else {
    $address = test_input($_POST["lieu_exercice"]);
    if (!preg_match("/[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/",$address)) {
      $address_error = "Le format de lieu d'exercice est incorrecte"; 
    }
  }

  if (empty($_POST["codepostale"])) {
    $codepostale_error = "Le code postale est obligatoire";
  } else {
    $codepostale = test_input($_POST["codepostale"]);
    // check if postal code is well-formed
    if (!preg_match('#^[0-9]{5}$#',$codepostale)) {
      $codepostale_error = "Le code postale est incorrect"; 
    }
  }


  if (empty($_POST["ville"])) {
    $ville_error = "La ville est obligatoire";
  } else {
    $ville = test_input($_POST["ville"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$ville)) {
      $ville_error = "Seulement les caractères sont autorisés pour la ville"; 
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


  if (empty($_POST["Profession"])) {
    $profession_error = "La profession est obligatoire";
  } 
  else{
      $profession = $_POST["Profession"];
  }

  if (empty($_POST["theme_intervention"])) {
    $ti_error = "Le thème d'intervention est obligatoire";
  }
  else{
      $ti = $_POST["theme_intervention"];
  } 


  if (empty($_FILES["cv"]["name"])) {
     $cv_error = "Le CV est obligatoire";
  } 
  else{
    //   $CV = $_POST["cv"];
  }

  if ($_FILES['cv']['size'] >  4194304) {
    $cv_error = "Votre CV a dépassé la taille maximale qui est 4194304 octet";
    echo'<script>
    swal({
    title: "Attention !!!",
    text: "la taille maximale de CV ne doit pas dépasser 4194304 octets",
    icon: "warning",
    dangerMode: true,
    });
    </script> ';
  }
  else{
        if ($name_error == '' and $prenom_error=='' and $address_error=='' and $codepostale_error=='' and $ville_error=='' 
        and $email_error == '' and $tel_error == '' ){
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
        $mail ->Username = "nepasrepondrek147@gmail.com";
        $mail ->Password = "KamedisInstitut93.";
        // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
        $mail ->SetFrom("nepasrepondrek147@gmail.com","Administrateur du site de Kamedis Institut");
        $mail ->Subject = 'Demande pour devenir Intervenant';
        $mail ->Body =$message_body ;
        $mail ->AddAddress('aghzou@hotmail.fr');
        // $mail ->AddCustomHeader( "X-Confirm-Reading-To: said.aghzou@sbhc.fr" );
        // $mail->AddCustomHeader( "Return-receipt-to: said.aghzou@sbhc.fr" );
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
            $allowedExts = array(
                "pdf", 
                "doc", 
                "docx"
                ); 

            $tmp = explode(".", $_FILES["cv"]["name"]);
            $extension = end($tmp);
            if ( ! ( in_array($extension, $allowedExts ) ) ) {
                //   echo $_FILES["cv"]["name"];
                $cv_error='Attention !! seulement PDF, DOCX et DOC sont acceptés.';
                        echo'<script>
                            swal({
                            title: "Attention !!!",
                            text: "les formats acceptées sont (PDF, DOC ou DOCX) ",
                            icon: "warning",
                            dangerMode: true,
                            });
                        </script> ';
            }else{
                $mail->AddAttachment($_FILES['cv']['tmp_name'],
                $_FILES['cv']['name']);

                    if(!$mail->Send())
                    {
                        $success="Votre contact n'a pas été envoyé!!!!";
                        
                    }
                    else
                    {
                        $success = "Vôtre contact a été bien envoyé";
                        $name = $prenom = $address = $codepostale = $ville = $email = $tel = $CV='';
                        $mail->clearAddresses();
                        $mail->clearAttachments();
                        $mail ->Body = "<html><head><meta charset='utf-8'/></head><body>Votre demande pour devenir Intervenant au sein de Kamedis Institut a été bien prise en compte, vous receverez notre avis
                        dans les meilleurs délais possibles après l'étude de votre dossier par notre équipe.<br>Nous vous remercions pour votre confiance.</body></html>";

                        $mail ->AddAddress($_POST['email']);
                        if(!$mail->Send())
                        {
                            $confirm = "Erreur";
                        
                        }
                        else
                        {
                            $confirm="Un mail de confirmation a été envoyé à votre addresse mail";
                        }
            
                        echo'<center><script>
                                
                            swal({
                            title: "Votre candidature a été bien envoyée !",
                            text: "Nous traiterons votre dossier dans les plus brefs délais.",
                            icon: "success",
                            button: "Retour!",
                            });
            
                            </script></center>';
            
                    }
            }

          }
        }
        else{
            echo'<script>
            
            swal({
                title: "Attention !!!",
                text: "Respecter les conditions de saisie.",
                icon: "warning",
                dangerMode: true,
            });

            </script>';
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_POST['mail'])) {
    if (empty($_POST["nom"])) {
      $name_error = "Le nom est obligatoire";
    } else {
      $name = test_input($_POST["nom"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $name_error = "Seulement les caractères et les espaces sont autorisés"; 
      }
    }
  
    if (empty($_POST["prenom"])) {
      $prenom_error = "Le prénom est obligatoire";
    } else {
      $prenom = test_input($_POST["prenom"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
        $prenom_error = "Seulement les caractères et les espaces sont autorisés"; 
      }
    }
  
    if (empty($_POST["lieu_exercice"])) {
      $address_error = "Le lieu d'exercice est obligatoire";
    } else {
      $address = test_input($_POST["lieu_exercice"]);
      if (!preg_match("/[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/",$address)) {
        $address_error = "Le format de lieu d'exercice est incorrecte"; 
      }
    }
  
    if (empty($_POST["codepostale"])) {
      $codepostale_error = "Le code postale est obligatoire";
    } else {
      $codepostale = test_input($_POST["codepostale"]);
      // check if postale code is well-formed
      if (!preg_match('#^[0-9]{5}$#',$codepostale)) {
        $codepostale_error = "Le code postale est incorrect"; 
      }
    }
  
  
    if (empty($_POST["ville"])) {
      $ville_error = "La ville est obligatoire";
    } else {
      $ville = test_input($_POST["ville"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$ville)) {
        $ville_error = "Seulement les caractères sont autorisés pour la ville"; 
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
  
  
  
    if (empty($_POST["mail"])) {
      $email_error = "L'email est obligatoire";
    } else {
      $email = test_input($_POST["mail"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Le format d'email est invalide"; 
      }
    }
  
  
    if (empty($_POST["Profession"])) {
      $profession_error = "La profession est obligatoire";
    } 
    else{
        $profession = $_POST["Profession"];
    }
  
    if (empty($_POST["theme_intervention"])) {
      $ti_error = "Le thème d'intervention est obligatoire";
    }
    else{
        $ti = $_POST["theme_intervention"];
    } 
  
  
    if (empty($_FILES["cv"]["name"])) {
       $cv_error = "Le CV est obligatoire";
    } 
    else{
      //   $CV = $_POST["cv"];
    }
  
    if ($_FILES['cv']['size'] >  4194304) {
      $cv_error = "Votre CV a dépassé la taille maximale qui est 4194304 octet";
        echo'<script>
        swal({
        title: "Attention !!!",
        text: "la taille maximale de CV ne doit pas dépasser 4194304 octets",
        icon: "warning",
        dangerMode: true,
        });
        </script> ';
      
    }
    else{
            if ($name_error == '' and $prenom_error=='' and $address_error=='' and $codepostale_error=='' and $ville_error=='' 
            and $email_error == '' and $tel_error == '' ){
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
            $mail ->Username = "nepasrepondrek147@gmail.com";
            $mail ->Password = "KamedisInstitut93.";
            // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
            $mail ->SetFrom("nepasrepondrek147@gmail.com","Administrateur du site de Kamedis Institut");
            $mail ->Subject = 'Demande pour devenir Intervenant';
            $mail ->Body =$message_body ;
            $mail ->AddAddress('aghzou@hotmail.fr');
            // $mail ->AddCustomHeader( "X-Confirm-Reading-To: said.aghzou@sbhc.fr" );
            // $mail->AddCustomHeader( "Return-receipt-to: said.aghzou@sbhc.fr" );
            if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
                $allowedExts = array(
                    "pdf", 
                    "doc", 
                    "docx"
                    ); 
        
                $tmp = explode(".", $_FILES["cv"]["name"]);
                $extension = end($tmp);
                if ( ! ( in_array($extension, $allowedExts ) ) ) {
                    //   echo $_FILES["cv"]["name"];
                    $cv_error='Attention !! seulement PDF, DOCX et DOC sont acceptés.';
                            echo'<script>
                                swal({
                                title: "Attention !!!",
                                text: "les formats acceptées sont (PDF, DOC ou DOCX) ",
                                icon: "warning",
                                dangerMode: true,
                                });
                            </script> ';
                }else{
                    $mail->AddAttachment($_FILES['cv']['tmp_name'],
                    $_FILES['cv']['name']);

                        if(!$mail->Send())
                        {
                            $success="Votre contact n'a pas été envoyé!!!!";
                            
                        }
                        else
                        {
                            $success = "Vôtre contact a été bien envoyé";
                            $name = $prenom = $address = $codepostale = $ville = $email = $tel = $CV='';
                            
                            $mail->clearAddresses();
                            $mail->clearAttachments();
                            $mail ->Body = "<html><head><meta charset='utf-8'/></head><body>Votre demande pour devenir Intervenant au sein de Kamedis Institut a été bien prise en compte, vous receverez notre avis
                            dans les meilleurs délais possibles après l'étude de votre dossier par notre équipe.<br>Nous vous remercions pour votre confiance.</body></html>";
                            // $mail ->ReplyTo(]);
                            $mail ->AddAddress($_POST['mail']);
                        
                        
                        
                            // mail($_POST['email'], 'Confirmation', 'test',"FROM: NePasRépondre@sbhc.fr" );
                            // $mail ->AddAttachment('','');
                            // $mail ->SetFrom("saghzou96@gmail.com","Administrateur du site de Kamedis Institut");
                            // $mail ->Subject = 'Confirmation de votre demande pour devenir Intervenant';
                            // $message_body="Votre demande pour devenir Intervenant a été bien prise en compte, vous receverez notre avis
                            // dans les meilleurs délais possibles après l'études de votre dossier";
                            // $mail ->Body =$message_body ;
                            // $mail ->AddAddress($_POST['email']);
                        
                            if(!$mail->Send())
                            {
                                $confirm = "Erreur";
                                  echo'<script>
                    
                                  swal({
                                      title: "Attention !!!",
                                      text: "Vérifier que votre adresse mail est valide,
                                      icon: "warning",
                                      dangerMode: true,
                                  });
                          
                                  </script>';

                            }
                            else
                            {
                                $confirm="Un mail de confirmation a été envoyé à votre addresse mail";
                                echo'<center><script>
                                    
                                swal({
                                title: "Votre candidature a été bien envoyée !",
                                text: "Nous traiterons votre dossier dans les plus brefs délais.",
                                icon: "success",
                                button: "Retour!",
                                });
                
                                </script></center>';

                            }
                
                        }
                }
        
            }
            }
            else{
                echo'<script>
                
                swal({
                    title: "Attention !!!",
                    text: "Respecter les conditions de saisie.",
                    icon: "warning",
                    dangerMode: true,
                });
        
                </script>';
            }
    }
    
}
  


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

