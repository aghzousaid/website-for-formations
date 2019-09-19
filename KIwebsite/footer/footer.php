<footer class="ft">
    <div class="row" id="row_footer">
        <div class="col" id="footer_col">
            <div  class="footer_title">
                <div>
                    <p>NAVIGATION</p>
                    <!-- <div class="formation_footer"> -->
                    <div class="sidenav">
                        <a href="#about">Acceuil</a>
                        <button class="dropdown-btn">Nos formations 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="e-learning.php">E-Learning</a>
                            <a href="mixtes.php">Mixtes</a>
                        </div>
                        <a href="dpc.php">Le DPC</a>
                        <a href="actualites.php">Actualités</a>
                        <button class="dropdown-btn">Recrutement 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="intervenant.php">Devenir Intervenant</a>
                            <a href="rejoindre_ki.php">Rejoindre Kamedis</a>
                        </div>
                        <a href="faq.php">FAQ</a>
                        <button class="dropdown-btn">Qui sommes-nous ?  
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="a_propos_de_nous.php">À propos de nos</a>
                            <a href="nous_valeurs.php">Nos valeurs</a>
                            <a href="nous_formateurs.php">Nos formateurs</a>
                            <a href="notre_equipe.php">Notre équipe</a>
                        </div>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col" id="footer_col" >
            <div class="footer_title">
                <!-- <div class="icon-bar"> -->
                    <p>NOUS CONTACTER</p>
                    <div class="ki_adress">
                        <h1 class="info_footer">
                        Kamedis Institut 2018<br>
                        2, Boulevard de la Libération<br>
                        93200 Saint-Denis<br>
                        Email : formation@kamedis.fr<br>
                        <span class="tel">Tél : +33 1 47 28 76 21</span>
                        </h1>
                    </div>
                    <div class="social_icon">
                        <div><p>SUIVEZ-NOUS  </p> </div>
                        <div id="size_social_icon">
                        <a href="https://www.facebook.com/kamedisinstitut/" ><i  class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/kamedisinstitut" ><i class="fa fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/kamedis-institut/" ><i class="fa fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/channel/UCLiFV2jkife6jk17CRp7bhw" ><i  class="fa fa-youtube"></i></a> 
                        </div>
                    </div>
                    <!-- <div>
                        <img src="img/odpc.jpg" alt="Avatar" class="logo_odpc">
                    </div> --> 
                <!-- </div> -->
            </div>
        </div>

        <div class="col" id="footer_col">
            <div class="footer_title">
             
                <p>ORGANISME D'AFFILIATION</p>
        
                <div>
                    <a href="https://www.agencedpc.fr/"><img src="img/odpc.jpg" alt="Avatar" class="logo_odpc"></a>
                </div> 
            </div>
            
        </div>
       
    </div>
    <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</footer>
</body>
</html>