<!-- <html ng-app="mySuperApp"> -->
    <html>

    
  <head>
    <meta charset="utf-8">
    <title>
      Popups
    </title>
    
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- <link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">
    <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script> -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:300,700");
@import url("https://fonts.googleapis.com/css?family=Roboto:400,700");
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");

/* Body */

body {
  background: #fff;
}

body,
input,
select,
textarea {
  background: none;
  color: #646464;
  font-family: "Lato", Helvetica, sans-serif;
  font-size: 15pt;
  font-weight: 300;
  line-height: 1.75em;
}

input,
textarea {
  border: none !important;
  outline: none !important;
  resize: none !important;
  width: 100% !important;
  -moz-appearance: none !important;
  -webkit-appearance: none !important;
  -o-appearance: none;
  -ms-appearance: none;
  appearance: none;
}

h2,
h3 {
  color: #545454;
  font-weight: 700;
  line-height: 1.5em;
  margin: 0 0 1em 0;
  letter-spacing: -0.01em;
}

h2 {
  font-size: 1.75em;
}

h3 {
  font-size: 1.25em;
}

ul {
  list-style: disc;
  margin: 0 0 2em 0;
  padding-left: 1em;
}

ul.actions {
  cursor: default;
  list-style: none;
  padding-left: 0;
}

ul.actions li {
  display: inline-block;
  padding: 0 1em 0 0;
  vertical-align: middle;
}

ul.actions li:last-child {
  padding-right: 0;
}

.contact-container {
  width: 100%;
  /*   padding-top: 20%; */
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}


/* Checkbox */

input[type="checkbox"] {
  -moz-appearance: none;
  -webkit-appearance: none;
  -o-appearance: none;
  -ms-appearance: none;
  appearance: none;
  display: block;
  float: left;
  margin-right: -2em;
  opacity: 0;
  width: 1em;
  z-index: -1;
}

input[type="checkbox"] + label {
  text-decoration: none;
  color: #646464;
  cursor: pointer;
  display: inline-block;
  font-size: 1em;
  font-weight: 300;
  padding-left: 2.4em;
  padding-right: 0.75em;
  position: relative;
}

input[type="checkbox"] + label:before {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  text-transform: none !important;
}

input[type="checkbox"] + label:before {
  background: rgba(144, 144, 144, 0.075);
  border-radius: 0.5em;
  border: solid 1px rgba(144, 144, 144, 0.25);
  content: '';
  display: inline-block;
  height: 1.65em;
  left: 0;
  line-height: 1.58125em;
  position: absolute;
  text-align: center;
  top: 0;
  width: 1.65em;
}

input[type="checkbox"]:checked + label:before {
  background: #494d53;
  border-color: #494d53;
  color: #ffffff;
  content: '\f00c';
}

input[type="checkbox"]:focus + label:before {
  border-color: #47cdd9;
  box-shadow: 0 0 0 1px #47cdd9;
}

input[type="checkbox"] + label:before {
  border-radius: 0.5em;
}


/* Buttons */

input[type="submit"],
input[type="reset"],
input[type="button"],
.button {
  -moz-appearance: none;
  -webkit-appearance: none;
  -o-appearance: none;
  -ms-appearance: none;
  appearance: none;
  -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -o-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  background-color: transparent;
  border-radius: 0.5em;
  border: solid 1px rgba(144, 144, 144, 0.25) !important;
  color: #545454 !important;
  cursor: pointer;
  display: inline-block;
  font-size: 0.8em;
  font-weight: 700;
  height: 3.5em;
  letter-spacing: 0.1em;
  line-height: 3.5em;
  overflow: hidden;
  padding: 0 2em;
  text-align: center;
  text-decoration: none;
  text-overflow: ellipsis;
  text-transform: uppercase;
  white-space: nowrap;
}

input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
.button:hover {
  background-color: rgba(144, 144, 144, 0.075);
  color: #545454 !important;
}

input[type="submit"]:active,
input[type="reset"]:active,
input[type="button"]:active,
.button:active {
  background-color: rgba(144, 144, 144, 0.2);
}

input[type="submit"].icon,
input[type="reset"].icon,
input[type="button"].icon,
.button.icon {
  padding-left: 1.35em;
}

input[type="submit"].icon:before,
input[type="reset"].icon:before,
input[type="button"].icon:before,
.button.icon:before {
  margin-right: 0.5em;
}

#submit {
  background: #47cdd9;
  color: #fff !important;
  border-color: #fff !important
}


/* Popup */

.cd-popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(94, 110, 141, 0.9);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
  overflow-y: auto;
  z-index: 10000;
}

.cd-popup.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}

.cd-popup-container {
  overflow-x: hidden;
  border: none;
  position: relative;
  width: 82% !important;
  max-width: 82% !important;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  background: #fff;
  border-radius: .25em .25em .4em .4em;
  text-align: center;
  box-shadow: none;
  -webkit-transform: translateY(-40px);
  -moz-transform: translateY(-40px);
  -ms-transform: translateY(-40px);
  -o-transform: translateY(-40px);
  transform: translateY(-40px);
  /* Force Hardware Acceleration in WebKit */
  -webkit-backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  transition-duration: 0.3s;
}

.cd-popup-container p {
  margin: 0;
  padding: 3em 1em;
  padding-top: 1em;
}

.cd-popup-container .cd-popup-close {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 30px;
  height: 30px;
}

.cd-close-button {
  color: #545454;
  border-bottom: none;
}

.cd-popup-container .cd-popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}

.cd-popup-container .cd-popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 8px;
}

.is-visible .cd-popup-container {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}

@media only screen and (min-width: 1170px) {
  .cd-popup-container {
    margin: 2em auto;
  }
}


/* Contact Form */

label:hover {
  cursor: text !important;
}

.contact-form {
  background: #ffffff !important;
  height: auto;
  margin: 100px auto;
  max-width: 82%;
  overflow: hidden !important;
  width: 100%;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
  -webkit-box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
  box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
}

@media (max-width: 500px) {
  .contact-form {
    margin: 0;
    padding-top: 1em;
    width: 100% !important;
    max-width: 100% !important;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
    -moz-box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
    -webkit-box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
    box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
  }
}

.contact-form .email,
.contact-form .message,
.contact-form .name {
  overflow-x: hidden;
  position: relative !important;
  -moz-border-radius: none !important;
  -webkit-border-radius: none !important;
  border-radius: none !important;
}

.contact-form .email input:focus,
.contact-form .email textarea:focus,
.contact-form .message input:focus,
.contact-form .message textarea:focus,
.contact-form .name input:focus,
.contact-form .name textarea:focus {
  background: #f4f5f6 !important;
}

.contact-form .email label,
.contact-form .message label,
.contact-form .name label {
  color: #cbd0d3 !important;
  left: 23px !important;
  position: absolute !important;
  top: 23px !important;
  -moz-transition: all, 150ms !important;
  -o-transition: all, 150ms !important;
  -webkit-transition: all, 150ms !important;
  transition: all, 150ms !important;
}

.contact-form .email.typing label,
.contact-form .message.typing label,
.contact-form .name.typing label {
  color: #3498db !important;
  font-size: 10px !important;
  top: 7px !important;
}

.contact-form .email,
.contact-form .name {
  width: calc(50% - 1px) !important;
}

@media (max-width: 500px) {
  .contact-form .email,
  .contact-form .name {
    width: 100% !important;
  }
}

.contact-form .email input,
.contact-form .name input {
  padding: 23px 0 8px 23px !important;
}

.contact-form .email {
  border-left: 1px #e6e6e6 solid !important;
  float: right !important;
}

@media (max-width: 500px) {
  .contact-form .email {
    border-left: none !important;
    border-top: 1px #e6e6e6 solid !important;
  }
}

.contact-form .message {
  border-bottom: 1px #e6e6e6 solid !important;
  border-top: 1px #e6e6e6 solid !important;
  clear: both !important;
}

.contact-form .message textarea {
  height: 200px !important;
  padding: 23px !important;
}

.contact-form .name {
  float: left !important;
}

.contact-form .submit {
  background: #f4f5f6 !important;
  display: block !important;
  overflow: hidden !important;
  padding: 23px !important;
  margin-bottom: 2em;
}

.contact-form .submit .user-message {
  float: left !important;
  padding-top: 22px !important;
}

@media (max-width: 500px) {
  .contact-form .submit .user-message {
    float: none !important;
    padding: 0 0 10px !important;
  }
}
    </style>
 
    
  </head>
  <body>
      
  <div class="contact-container">
  <h2>Feel free to get in touch.</h2>
  <ul class="actions">
    <li><a href="#" id="contact" class="button big">Contact Us</a></li>
  </ul>
</div>

<div class="cd-popup contact" role="alert">
  <form name="contactform" id="contactform" class="contact-form">
    <div class="cd-popup-container" style="">
      <p style="">
        <a href="" class="cd-popup-close cd-close-button">
          <i class="fa fa-times" style="pointer-events:none;"></i>
        </a>
      </p>

      <div class="name">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" />
      </div>
      <div class="email">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" />
      </div>
      <div class="message">
        <label for="message">Message</label>
        <textarea name="message" id="message" name="message"></textarea>
      </div>
      <br>
      <div style="text-align:left">
        <input type="checkbox" id="human" name="human" />
        <label for="human">I am a human and not a robot.</label>
      </div>
      <br>
      <div class="submit">
        <p class="user-message" id="contactblurb"> Questions, suggestions, and general comments are all welcome!</p>
        <input type="submit" name="submit" id="submit" value="Send" />
      </div>
    </div>
  </form>
</div>

<div class="cd-popup notification" role="alert">
  <div class="cd-popup-container">
    <a href="" class="cd-popup-close cd-close-button"><i class="fa fa-times" style="pointer-events:none;"></i></a>
    <p>
      <h3 id="notification-text">Thanks for getting in touch!</h3>
    </p>
  </div>
</div>
  <!-- <body class="padding" ng-controller="PopupCtrl">
    <button class="button button-dark" ng-click="showPopup()">
      show
    </button>
    <button class="button button-primary" ng-click="showConfirm()">
      Confirm
    </button>
    <button class="button button-positive" ng-click="showAlert()">
      Alert
    </button>
    
    <script id="popup-template.html" type="text/ng-template">
      <input ng-model="data.wifi" type="text" placeholder="Password">
    </script> -->



       <script >

// Check for valid email syntax
function validateEmail(email) {
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(email);
}

function closeForm() {
document.contactform.name.value = '';
document.contactform.email.value = '';
document.contactform.message.value = '';

$('.email').removeClass('typing');
$('.name').removeClass('typing');
$('.message').removeClass('typing');

$('.cd-popup').removeClass('is-visible');
$('.notification').addClass('is-visible');
$('#notification-text').html("Thanks for contacting us!");
}

$(document).ready(function($) {

/* ------------------------- */
/* Contact Form Interactions */
/* ------------------------- */
$('#contact').on('click', function(event) {
event.preventDefault();

$('#contactblurb').html('Questions, suggestions, and general comments are all welcome!');
$('.contact').addClass('is-visible');

if ($('#name').val().length != 0) {
$('.name').addClass('typing');
}
if ($('#email').val().length != 0) {
$('.email').addClass('typing');
}
if ($('#message').val().length != 0) {
$('.message').addClass('typing');
}
});

//close popup when clicking x or off popup
$('.cd-popup').on('click', function(event) {
if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
event.preventDefault();
$(this).removeClass('is-visible');
}
});

//close popup when clicking the esc keyboard button
$(document).keyup(function(event) {
if (event.which == '27') {
$('.cd-popup').removeClass('is-visible');
}
});

/* ------------------- */
/* Contact Form Labels */
/* ------------------- */
$('#name').keyup(function() {
$('.name').addClass('typing');
if ($(this).val().length == 0) {
$('.name').removeClass('typing');
}
});
$('#email').keyup(function() {
$('.email').addClass('typing');
if ($(this).val().length == 0) {
$('.email').removeClass('typing');
}
});
$('#message').keyup(function() {
$('.message').addClass('typing');
if ($(this).val().length == 0) {
$('.message').removeClass('typing');
}
});

/* ----------------- */
/* Handle submission */
/* ----------------- */
$('#contactform').submit(function() {
var name = $('#name').val();
var email = $('#email').val();
var message = $('#message').val();
var human = $('#human:checked').val();

if (human) {
if (validateEmail(email)) {
if (name) {
  if (message) {

// Handle submitting data somewhere
// For a tutorial on submitting the form to a Google Spreadsheet, see:
// https://notnaturaltutorials.wordpress.com/2016/03/20/submit-form-to-spreadsheet/

/*
    var googleFormsURL = "https://docs.google.com/forms/d/1dHaFG67d7wwatDtiVNOL98R-FwW1rwdDwdFqqKJggBM3nFB4/formResponse";
    // replace these example entry numbers
    var spreadsheetFields = {
      "entry.212312005": name,
      "entry.1226278897": email,
      "entry.1835345325": message
    }
    $.ajax({
      url: googleFormsURL,
      data: spreadsheetFields,
      type: "POST",
      dataType: "xml",
      statusCode: {
        0: function() {

        },
        200: function() {

        }
      }
    });
*/
    
    closeForm();

  } else {
    $('#notification-text').html("<strong>Please let us know what you're thinking!</strong>");
    $('.notification').addClass('is-visible');
  }
} else {
  $('#notification-text').html('<strong>Please provide a name.</strong>');
  $('.notification').addClass('is-visible');
}
} else {
$('#notification-text').html('<strong>Please use a valid email address.</strong>');
$('.notification').addClass('is-visible');
}
} else {
$('#notification-text').html('<h3><strong><em>Warning: Please prove you are a human and not a robot.</em></strong></h3>');
$('.notification').addClass('is-visible');
}

return false;
});
});
//         angular.module('mySuperApp', ['ionic'])
// .controller('PopupCtrl',function($scope, $ionicPopup, $timeout) {

//  // Triggered on a button click, or some other target
//  $scope.showPopup = function() {
//    $scope.data = {}

//    // An elaborate, custom popup
//    var myPopup = $ionicPopup.show({
//      template: '<input type="password" ng-model="data.wifi">',
//      title: 'Enter Wi-Fi Password',
//      subTitle: 'Please use normal things',
//      scope: $scope,
//      buttons: [
//        { text: 'Cancel' },
//        {
//          text: '<b>Save</b>',
//          type: 'button-positive',
//          onTap: function(e) {
//            if (!$scope.data.wifi) {
//              //don't allow the user to close unless he enters wifi password
//              e.preventDefault();
//            } else {
//              return $scope.data.wifi;
//            }
//          }
//        },
//      ]
//    });
//    myPopup.then(function(res) {
//      console.log('Tapped!', res);
//    });
//    $timeout(function() {
//       myPopup.close(); //close the popup after 3 seconds for some reason
//    }, 6000);
//   };
//    // A confirm dialog
//    $scope.showConfirm = function() {
//      var confirmPopup = $ionicPopup.confirm({
//        title: 'Consume Ice Cream',
//        template: 'Are you sure you want to eat this ice cream?'
//      });
//      confirmPopup.then(function(res) {
//        if(res) {
//          console.log('You are sure');
//        } else {
//          console.log('You are not sure');
//        }
//      });
//    };

//    // An alert dialog
//    $scope.showAlert = function() {
//      var alertPopup = $ionicPopup.alert({
//        title: 'Don\'t eat that!',
//        template: 'It might taste good'
//      });
//      alertPopup.then(function(res) {
//        console.log('Thank you for not eating my delicious ice cream cone');
//      });
//    };
// });
</script>
  </body>
</html>



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
      $name_error = "Seulement les caractères est les espaces sont autorisés"; 
    }
  }

  if (empty($_POST["prenom"])) {
    $prenom_error = "Prenom is required";
  } else {
    $prenom = test_input($_POST["prenom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
      $prenom_error = "Seulement les caractères est les espaces sont autorisés"; 
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

  if (empty($_POST["cv"])) {
    $cv_error = "Le CV est obligatoire";
  } 
  else{
      $CV = $_POST["cv"];
  }
  

  if (empty($_POST["lm"])) {
    $lm_error = "La lettre de motivation est obligatoire";
  } 
  else{
      $lm = $_POST["lm"];
  }
  

  if ($name_error == '' and $prenom_error=='' and $email_error == '' and $lm_error == '' and $cv_error=''){
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
      $mail ->Password = "NAJAH96.";
      // $mail->AddReplyTo("saghzou96@gmail.com", "Reply to name");
      $mail ->SetFrom("saghzou@gmail.com","Administrateur du site de Kamedis Institut");
      $mail ->Subject = 'Demande pour devenir Intervenant';
      $mail ->Body =$message_body ;
      $mail ->AddAddress('aghzou@hotmail.fr');
      // $mail ->AddCustomHeader( "X-Confirm-Reading-To: said.aghzou@sbhc.fr" );
      // $mail->AddCustomHeader( "Return-receipt-to: said.aghzou@sbhc.fr" );
    //   && isset($_FILES['lm']) && $_FILES['lm']['error'] == UPLOAD_ERR_OK
      if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
          $allowedExts = array(
              "pdf", 
              "doc", 
              "docx"
            ); 
  
          $extension = end(explode(".", $_FILES["cv"]["name"]));
          if ( ! ( in_array($extension, $allowedExts ) ) ) {
              echo $_FILES["cv"]["name"];
              $cv_error='Please provide another file type [E/2].';
          }else{
              $mail->AddAttachment($_FILES['cv']['tmp_name'],
              $_FILES['cv']['name']);
          }

        //   $extension = end(explode(".", $_FILES["lm"]["name"]));
        //   if ( ! ( in_array($extension, $allowedExts ) ) ) {
        //       echo $_FILES["lm"]["name"];
        //       $cv_error='Please provide another file type [E/2].';
        //   }else{
        //       $mail->AddAttachment($_FILES['lm']['tmp_name'],
        //       $_FILES['lm']['name']);
        //   }
      }
   
      if(!$mail->Send())
      {
          $success="Votre contact n'est pas envoyé!!!!";
          
          
      }
      else
      {
          $success = "Vôtre contact a été bien envoyé";
          $name = $prenom =  $email = $lm= $CV='';

          
      }
      $mail->clearAddresses();
      $mail->clearAttachments();
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
          $confirm="Un mail de confirmation a été envoyé à votre addresse mail";
          echo'<script>
        
          swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
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

<!-- <div id="modal-wrapper" class="modal center-block">-->

  <form class="modal-content animate" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">

  
        
    <!--<div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="img/logo_kamedis.jpg" alt="Avatar" class="avatar">

    </div> -->

    <div class="input_job">
        <div>
        <label class="my-1 mr-2" for="#nom">Nom *</label><br>
        <input  id ="width_input_job"name="nom" type="text" class="form-control"   value="<?= $name ?>"  required/>
        <div class="error">
            <span ><?= $name_error ?></span>
        </div>
        </div>
        
        <div>
        <label class="my-1 mr-2" for="#prenom">Prenom *</label><br>
        <input id ="width_input_job" name="prenom" type="text"  class="form-control"  value="<?= $prenom ?>" required/>
        <div class="next_error">
        <span ><?= $prenom_error ?></span>
        </div>
        </div>   
        
        <div>
        <label class="my-1 mr-2" for="#email">Email *</label><br>
        <input id ="width_input_job_email"name="email" type="email" class="form-control" value="<?= $email ?>"required/>
        <div class="next_error">
            <span ><?= $email_error ?></span>
        </div>
        </div>
        
        <div>
        <label class="my-1 mr-2" for="#cv">CV *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="cv" value="<?= $CV ?>"  required/>
        <div class="error">
            <span><?= $cv_error ?></span>
        </div>
        </div>

        <div>
        <label class="my-1 mr-2" for="#lm">Lettre de motivation *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="lm" value="<?= $lm ?>"  required/>
        <div class="error">
            <span><?= $lm_error ?></span>
        </div>
        </div>
        
        <div id="btn_submit_job">
        <button type="submit" name="envoi" class="btn  btn-lg" >Envoyer</button>

        </div>

    </div>
    
  </form>

     <div class="success"><?= $success ?></div>
    <div class="confirm"><?= $confirm ?></div>
  
<!-- </div> -->



    <!-- <div>
        <label class="my-1 mr-2" for="#cv">CV *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="cv"   required/>
        <div class="error">
            <span><?= $cv_error ?></span>
        </div>
        </div>

        <div>
        <label class="my-1 mr-2" for="#lm">Lettre de motivation *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="lm"  required/>
        <div class="error">
            <span><?= $lm_error ?></span>
        </div>
        </div> -->





        
<!-- <div id="modal-wrapper" class="modal center-block">-->

  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data" >

  
        
<!--<div class="imgcontainer">
  <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
  <img src="img/logo_kamedis.jpg" alt="Avatar" class="avatar">

</div> -->

<div class="input_job">
    <div>
    <label class="my-1 mr-2" for="#nom">Nom *</label><br>
    <input  id ="width_input_job"name="nom" type="text" class="form-control"   value="<?= $name ?>"  required/>
    <div class="error">
        <span ><?= $name_error ?></span>
    </div>
    </div>
    
    <div>
    <label class="my-1 mr-2" for="#prenom">Prenom *</label><br>
    <input id ="width_input_job" name="prenom" type="text"  class="form-control"  value="<?= $prenom ?>" required/>
    <div class="next_error">
    <span ><?= $prenom_error ?></span>
    </div>
    </div>   
    
    <div>
        <label class="my-1 mr-2" for="#email">Email *</label><br>
        <input id ="width_input_job_email"name="email" type="email" class="form-control" value="<?= $email ?>"required/>
        <div class="next_error">
            <span ><?= $email_error ?></span>
        </div>
    </div>
    
    <!-- <div>
    <label class="my-1 mr-2" for="#cv">CV *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="cv"   required/>
        <div class="error">
            <span><?= $cv_error ?></span>
        </div>
    </div> -->
    <div class="form-inline">
       <label class="my-1 mr-2" for="#cv">CV *</label>
        <input type="file"  class="custom my-1 mr-sm-2" class="form-control-file" name="cv" value="<?= $CV ?>"  required/>
        <div class="error">
            <span><?= $cv_error ?></span>
        </div>
    </div>
    
    <div id="btn_submit_job">
    <button type="submit" name="envoi" class="btn  btn-lg" >Envoyer</button>

    </div>

</div>

</form>


 <div class="success"><?= $success ?></div>
<div class="confirm"><?= $confirm ?></div>