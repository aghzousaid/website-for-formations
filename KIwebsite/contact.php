<?php
    include('header/header.php');
?>


<div class="info_page_elearning">
    <div class="ref_el">
    </div>
        <div class="titre_elearning">
            <div class="shadow-lg p-3 mb-5  rounded">
                <center><h1 class="titre_body">CONTACT</h1>

                </center>
            </div>
        </div>
</div>

<?php
    include("email_contact.php");
?>


<section>
<div class="body_contact">
<div class="content">
    <div class="wrapper animated bounceInLeft">
      <div class="company-info">
        <h3>KAMEDIS INSTITUT</h3>
        <ul id="ul_contact">
          <li><i class="fa fa-road"></i> 2, Boulevard de la Libération <br>93200 SAINT-DENIS </li>
          <li><i class="fa fa-phone"></i> +33 1 47 28 76 21</li>
          <li><i class="fa fa-envelope"></i>formation@kamedis.fr</li>
        </ul>
      </div>
      <div class="contact">
        <h3>ENVOYEZ-NOUS UN MESSAGE </h3>
        <form method="post" action="contact.php">
          <p class="full">
            <label for="">Civilité *</label>
            <select id="input_contact" name="civilite" required>
                <option value=""></option>
                <option >Homme</option>
                <option >Femme</option>
            </select>
            <span class="error_contact"><?= $civilite_error ?></span>
          </p>
          <p  class="full">
            <label>Nom *</label>
            <input id="input_contact"type="text" value="<?=$nom ?>" name="nom" required>
            <span class="error_contact"><?= $nom_error ?></span>
          </p>
          <p  class="full">
            <label>Prénom *</label>
            <input id="input_contact" type="text" name="prenom" value="<?=$prenom?>"required>
            <span class="error_contact"><?= $prenom_error ?></span>
          </p>
          <p class="full">
            <label>Email Address *</label>
            <input id="input_contact" type="text" name="email" value="<?=$email ?>" required>
            <span class="error_contact"><?= $email_error ?></span>
          </p>
          <p  class="full">
            <label>Téléphone *</label>
            <input id="input_contact"type="text" name="tel" value="<?=$tel ?>"required>
            <span class="error_contact"><?= $tel_error ?></span>
          </p>
          <p class="full">
            <label>Message *</label>
            <textarea id="input_contact" name="message" rows="5"  required> <?php echo $message; ?></textarea>
            <span class="error_contact"><?= $message_error ?></span>
          </p>
          <p>
           <center>* Les champs sont obligatoires </center>   
          </p>
          <p class="full">
            <button type="submit" name="btn_submit_contact">Envoyer</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
</section>

<?php
    include('footer/footer.php');
?>

