<footer >
<div class="container">
    <div class="row" id="row_footer">
        <div class="col-md-4" id="footer_col">
            <div  class="footer_title">
                <div id="nav_margin_top">
                    <p id="navigation">NAVIGATION</p>
                    <!-- <div class="formation_footer"> -->
                    <div class="row" id="col_nav">
                        <div class="col-md sidenav">
                            <a href="#about">Accueil</a>
                            <a href="dpc.php">Le DPC</a>
                            <button class="dropdown-btn">Qui sommes-nous ?  
                                <i id="drpd_mn_nav_footer" class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-container">
                                <a href="a_propos_de_nous.php">À propos de nous</a>
                                <a href="nous_valeurs.php">Nos valeurs</a>
                                <a href="nous_formateurs.php">Nos formateurs</a>
                            </div>
                        </div>
                        <div class="col-md sidenav">
                            <a href="faq.php">FAQ</a>
                            <a href="actualites.php">Actualités</a>
                                <!-- <a href="notre_equipe.php">Notre équipe</a> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="footer_col" >
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
                        <a id="block_social_icon "  class="facebook" href="https://www.facebook.com/kamedisinstitut/" ><i  class="fa fa-facebook"></i></a>
                        <a id="block_social_icon " class="twitter"  href="https://twitter.com/kamedisinstitut" ><i class="fa fa-twitter"></i></a>
                        <a id="block_social_icon " class="linkedin"  href="https://www.linkedin.com/company/kamedis-institut/" ><i class="fa fa-linkedin"></i></a>
                        <!-- <a id="block_social_icon " class="youtube"  href="https://www.youtube.com/channel/UCLiFV2jkife6jk17CRp7bhw" ><i  class="fa fa-youtube"></i></a>  -->
                        </div>
                    </div>
                    <!-- <div>
                        <img src="img/odpc.jpg" alt="Avatar" class="logo_odpc">
                    </div> --> 
                <!-- </div> -->
            </div>
        </div>

        <div class="col-md-4" id="footer_col">
            <div class="footer_title">
             
                <p>ORGANISME D'AFFILIATION</p>
        
                <div class="row" id="row_organisme_affiliation">
                    <a href="https://www.data-dock.fr/?q=node/131"><img src="img/footer/Picto_datadocke.jpg" alt="Avatar" class="logo_datadock"></a>
                    <a href="https://www.agencedpc.fr/"><img src="img/odpc.jpg" alt="Avatar" class="logo_odpc"></a>
                </div>
            </div>
        </div>
       
    </div>

    
    <div id="res_footer" class="row">

        <div class="col" id="footer_col" >
            <div class="footer_title">
                <!-- <div class="icon-bar"> -->
                    <p>NOUS CONTACTER</p>
                    <div class="ki_adress">
                        <h1 class="info_footer">
                        Kamedis Institut 2018<br>
                        Email : formation@kamedis.fr<br>
                        <span class="tel">Tél : +33 1 47 28 76 21</span>
                        </h1>
                    </div>
                    <div class="social_icon">
                        <div><p>SUIVEZ-NOUS  </p></div>
                        <div id="size_social_icon">
                        <a id="block_social_icon"  class="facebook" href="https://www.facebook.com/kamedisinstitut/" ><i  class="fa fa-facebook"></i></a>
                        <a id="block_social_icon" class="twitter"  href="https://twitter.com/kamedisinstitut" ><i class="fa fa-twitter"></i></a>
                        <a id="block_social_icon" class="linkedin" href="https://www.linkedin.com/company/kamedis-institut/" ><i class="fa fa-linkedin"></i></a>
                        <!-- <a id="block_social_icon" class="youtube"  href="https://www.youtube.com/channel/UCLiFV2jkife6jk17CRp7bhw" ><i  class="fa fa-youtube"></i></a>  -->
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
        
                <div id="div_organisme_res">
                    <a href="https://www.data-dock.fr/?q=node/131"><img src="img/footer/Picto_datadocke.jpg" alt="Avatar" class="logo_datadock"></a>
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
</div>
</footer>
</body>
</html>