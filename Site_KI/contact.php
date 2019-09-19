<?php
    include('header.php');
?>


<div class="info_page_elearning">
    <div class="ref_el">
    </div>
        <div class="titre_elearning">
            <br>
            <div class="shadow-sm p-3 rounded">
                <center><h1 id="titre_contact" class="titre_body">FORMULAIRE DE CONTACT</h1>
                <hr align="center" width="300"  border-top: "4px solid">
                </center>
            </div>
        </div>
</div>

<?php
    include("email_contact.php");

    $tab[0] = ["said","aghzou"];
    $tab[1] = ["said","aghzou"];
    foreach ($tab AS $tabn){
      // foreach ($tabn AS $key=>$value)
      //   {
        echo $tabn[0]."<br>";
            // echo var_dump($tabn);
        // }
    }

?>
<section>
<div class="body_contact">
<div class="content">
    <div class="wrapper animated bounceInLeft">
      <div class="company-info">
        <h6><b>KAMEDIS INSTITUT</b></h6>
        <ul id="ul_contact">
          <li><i class="fa fa-road"></i> 2, Boulevard de la Libération <br>93200 SAINT-DENIS </li>
          <li><i class="fa fa-phone" id="tel_contact"></i><a>+33 1 47 28 76 21</a> </li>
          <li><i class="fa fa-envelope"></i>formation@kamedis.fr</li>
        </ul>
        <ul id="ul_contact">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2621.292273499771!2d2.3387108508041465!3d48.92887470359433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ecff2b63661%3A0xae071c854b90a36c!2s2+Boulevard+de+la+Lib%C3%A9ration%2C+93200+Saint-Denis!5e0!3m2!1sfr!2sfr!4v1543191823243" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </ul>
      </div>
      <div class="contact">
        <h6><b>ENVOYEZ-NOUS UN MESSAGE</b> </h6>
        <form method="post" action="contact.php">
          <p class="full">
            <label for="">Civilité <span id="etoile">*</span></label>
            <select id="input_contact" name="civilite" required>
                <option value=""></option>
                <option >Madame</option>
                <option >Monsieur</option>
                <option >Mademoiselle</option>
            </select>
            <span class="error_contact"><?= $civilite_error ?></span>
          </p>
          <p  class="full">
            <label>Nom <span id="etoile">*</span></label>
            <input id="input_contact"type="text" value="<?=$nom ?>" name="nom" required>
            <span class="error_contact"><?= $nom_error ?></span>
          </p>
          <p  class="full">
            <label>Prénom <span id="etoile">*</label>
            <input id="input_contact" type="text" name="prenom" value="<?=$prenom?>"required>
            <span class="error_contact"><?= $prenom_error ?></span>
          </p>
          <p class="full">
            <label>Adresse Email <span id="etoile">*</label>
            <input id="input_contact" type="text" name="email" value="<?=$email ?>" required>
            <span class="error_contact"><?= $email_error ?></span>
          </p>
          <p  class="full">
            <label>Téléphone <span id="etoile">*</label>
            <input id="input_contact" type="text" name="tel" value="<?=$tel ?>"required>
            <span class="error_contact"><?= $tel_error ?></span>
          </p>

          <p  class="full">
            <label>Objet <span id="etoile">*</label>
            <select id="input_contact" name="objet" value="<?=$objet ?>" required>
              <option value=""></option>
              <option  id="">Demande d'inscription.</option>
              <option  id="">Demande d'attestation DPC.</option>
              <option  id="">Suivi indemnisation.</option>
              <option  id="">Autres.</option>
            </select>
            <span class="error_contact"><?= $objet_error ?></span>
          </p>

          <p class="full">
            <label>Message <span id="etoile">*</label>
            <textarea id="input_contact" name="message" rows="5"  required> <?php echo $message; ?></textarea>
            <span class="error_contact"><?= $message_error ?></span>
          </p>
          <p>
           <center class="color_condition_contact">* Les champs sont obligatoires </center>   
          </p>
          <p class="full" id="btn_contact">
            <button type="submit" name="btn_submit_contact">Envoyer</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<?php
    include('footer.php');
?>

