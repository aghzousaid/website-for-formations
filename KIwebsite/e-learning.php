<?php
    include('header/header.php');
?>  

       
    <div class="row" id="row_elearning">
        <div class="col-sm-4 " id="first_col_elearning" >
                    <form action="e-learning.php" method="POST" id='form_formation' >

                        <div>
                            <select id="mySelect" name="theme">
                                <option>PAR THÈME</option>
                                <option>Algologie</option>
                                <option>Cardiologie</option>
                                <option>Endocrinologie</option>
                                <option>Gériatrie</option>
                                <option>Gynécologie</option>
                                <option>Neurologie</option>
                                <option>Pharmacologie</option>
                                <option>Psychiatrie / Psychologie</option>
                                <option>Situations exceptionnelles</option>
                                <option>Urologie</option>
                            </select>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div>
                            <label id="profession" for="">PAR PROFESSION</label>
                            <div class="form-check">

                                <div class="checkbox">
                                <label><input type="checkbox" value="Médecins généralistes" name="medecin">Médecin</label>
                                </div>
                                
                                <div class="checkbox">
                                <label><input type="checkbox" value="Infermier" name="infermier">Infirmier</label>
                                </div>

                                <div class="checkbox">
                                <label><input type="checkbox" value="Pharmacien" name="pharmacien">Pharmacien</label>
                                </div>
                                <div class="checkbox">
                                <label><input type="checkbox" value="Sage-Femme" name="sagefemme">Sage-Femme</label>
                                </div> 

                                <div class="checkbox">
                                <label><input type="checkbox" value="Kinésithérapeute" name="kine">Kinésithérapeute</label>
                                </div> 
                            </div>
                        </div>
                    
                        <br><br>
                        <div>
                            <button  type="submit" class="btn btn-dark btn-lg" name="make_search">LANCER MA RECHERCHE </button>
                        </div>
        
                        <br><br>
                        

                        <div>
                            <a href="Documents/Catalogue des formations 2.pdf" id="consul_catalogue"target="_blank" >
                                <button type="button" class="btn btn-secondary" >
                                ➢ Consulter le  catalogue des formations 
                                </button>
                            </a>
                        </div>
                    
                    </form>
        </div>

        <div class="col-sm-8" id="second_col_elearning">
            <div class="row" id="titre_elearning">
                <h1 class="titre_body">NOS FORMATIONS E-LEARNING</h1>
                <p  class="titre_body">Découvrez les formations E-Learning de Kamedis Institut : </p>
            </div>
            
            <div class="row" id="top_second_culumn"> 
                <!-- <div class="col" id="fr_tr"> -->
                    <p id="nb_form"><span id="form_trouve"> </span>  &nbsp;formation(s) trouvée(s)</p>
                <!-- </div> -->
                <!-- <div class="col" id="cal_for">
                <a href=""><button type="button" class="btn btn-secondary" target="_blank" >
                        CALENDRIER FORMATION</button>
                </a>
                </div><br> -->
                
            </div>
            <div class="row" id="div_image"> 
            <?php


            $db = mysqli_connect("localhost", "root", "", "image_upload");
            if(isset($_POST['make_search'])){

                $tab = [5];
                $t=0;
                
                if(isset($_POST['medecin'])){
                    if(!empty($_POST['medecin'])){
                        $tab[0] = $_POST['medecin'];
                        $t++;
                    }
                }
                if(isset($_POST['infermier'])){
                    if(!empty( $tab[1] = $_POST['infermier'])){
                        $tab[1] = $_POST['infermier'];
                        $t++;
                    }
                }

                if(isset($_POST['pharmacien'])){
                    if(!empty($tab[2] = $_POST['pharmacien'])){
                        $tab[2] = $_POST['pharmacien'];
                        $t++;
                    }
                }

                if(isset($_POST['sagefemme'])){
                    if(!empty($tab[3] = $_POST['sagefemme'])){
                        $tab[3] = $_POST['sagefemme'];
                        $t++;
                    }
                }

                if(isset($_POST['kine'])){
                    if(!empty(  $tab[4] = $_POST['kine'])){
                        $tab[4] = $_POST['kine'];
                        $t++;
                    }
                }
            

                $k=0;
                for($j=0; $j<5; $j++){
                    if(!empty($tab[$j])){
                        $k++;
                        if($k==1){
                            $public = "".$tab[$j]." ";
                        }
                        else{
                            $public = "".$public."".$tab[$j]." ";
                        } 
                    }
                }
                
                if($_POST['theme'] != 'PAR THEME') { 
                    $theme=$_POST['theme'];
                    if( $t>0){
                        
                        $result =  mysqli_query($db, "SELECT * FROM elearning where theme='$theme' and
                        public='$public'");

                    }
                    else{
                        $result =  mysqli_query($db, "SELECT * FROM elearning where theme='$theme'");

                        $i=0;
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;

                            ?>
                            <script>
                                function OpenNewTab(){
                                    var tmp = '<?php echo 'see_more_elearning.php?theme='.$theme.'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                                    window.location.href =tmp;
                                }
                            </script>
                            <?php
            
                            echo "<br><br><div  onclick='OpenNewTab()' id='img_div' >";
                                echo"<div><img src='images/elearning/".$row['image']."'></div>";
                                echo"<div id='info'>";
                                    echo "<p class='titre' >".$row['titre']."</p>";
                                    echo "<p>".$row['duree']."h</p>";
                                    echo "<p>".$row['public']."</p>";
                                    echo'<a id="link" href="see_more_elearning.php?theme='.$theme.'&titre='.$row['titre'].'&duree='.$row['duree'].'">En savoir plus</a>';
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                }
                else{
                    $result =  mysqli_query($db, "SELECT * FROM elearning where
                    public='$public'");

                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        $i++;

                        ?>
                        <script>
                            function OpenNewTab1(){
                                var tmp = '<?php echo 'see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                                window.location.href =tmp;
                            }
                        </script>
                        <?php


                        echo "<br><br><div  onclick='OpenNewTab1()'  id='img_div'>";
                            echo"<div><img src='images/elearning/".$row['image']."'></div>";
                            echo"<div id='info'>";
                                echo "<p class='titre' >".$row['titre']."</p>";
                                echo "<p>".$row['duree']."h</p>";
                                echo "<p>".$row['public']."</p>";
                                echo'<a href="see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'"> 
                                En savoir plus</a><br>';
                            echo'</div>';
                        echo "</div>";
                    }

                }
            }
            else{

                $result =  mysqli_query($db, "SELECT * FROM elearning ");

                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                    $i++;

                    ?>
                    <script>
                        function OpenNewTab2(){
                            var tmp = '<?php echo 'see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                            window.location.href =tmp;
                        }
                    </script>
                    <?php
                    echo "<br><br><div onclick='OpenNewTab2()' id='img_div'>";
                        echo"<div><img src='images/elearning/".$row['image']."'></div>";
                        echo"<div id='info'>";
                            echo "<p class='titre' >".$row['titre']."</p>";
                            echo "<p>".$row['duree']."h</p>";
                            echo "<p>".$row['public']."</p>";
                            echo'<a href="see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'"> 
                            En savoir plus</a><br>';
                            
                        echo'</div>';
                    echo "</div>";
                }
            }

            echo"<script>";
                echo"document.getElementById('form_trouve').innerHTML = $i";
            echo"</script>";

            ?>
            </div>   
        </div>   
    </div>       



    <div  id="row_res_elearning">
        <div class="row" id="first_row_respon_elearning">
            <h1 class="titre_body">NOS FORMATIONS E-LEARNING</h1>
            <p  class="titre_body">Découvrez les formations E-Learning de Kamedis Institut : </p>
        </div>
        <div class="row" id="sec_row_respon_elearning">
            <form action="e-learning.php" method="POST" id='res_form_formation' >
                <div >
                    <select id="res_mySelect" name="theme">
                        <option>PAR THÈME</option>
                        <option>Algologie</option>
                        <option>Cardiologie</option>
                        <option>Endocrinologie</option>
                        <option>Gériatrie</option>
                        <option>Gynécologie</option>
                        <option>Neurologie</option>
                        <option>Pharmacologie</option>
                        <option>Psychiatrie / Psychologie</option>
                        <option>Situations exceptionnelles</option>
                        <option>Urologie</option>
                    </select>
                </div>
                <div id="cont_col_res_form_ele">
                    <label id="profession" for="">PAR PROFESSION</label>
                    <div class="form-check">

                        <div class="checkbox">
                        <label><input type="checkbox" value="Médecins généralistes" name="medecin">Médecin</label>
                        </div>
                        
                        <div class="checkbox">
                        <label><input type="checkbox" value="Infermier" name="infermier">Infirmier</label>
                        </div>

                        <div class="checkbox">
                        <label><input type="checkbox" value="Pharmacien" name="pharmacien">Pharmacien</label>
                        </div>
                        <div class="checkbox">
                        <label><input type="checkbox" value="Sage-Femme" name="sagefemme">Sage-Femme</label>
                        </div> 

                        <div class="checkbox">
                        <label><input type="checkbox" value="Kinésithérapeute" name="kine">Kinésithérapeute</label>
                        </div> 
                    </div>
                </div>

                <div id="cont_col_res_form_ele">
                    <button  type="submit" class="btn btn-dark btn-lg" name="make_search">LANCER MA RECHERCHE</button>
                </div>
                <div id="cont_col_res_form_ele">
                    <a href="Catalogue des formations 2.pdf" id="consul_catalogue" target="_blank" >
                        <button type="button" class="btn btn-secondary" >
                        ➢ Consulter le  catalogue des formations 
                        </button>
                    </a>
                </div>

            </form>

        </div>
        <div class="row" id="nb_fo_ele_res">
            <!-- <div class="col" id="fr_tr"> -->
                <!-- <span id="res_form_trouve"> </span> &nbsp;formation(s) trouvée(s) -->
                <p id="nb_form"><span id="res_form_trouve"> </span>  &nbsp;formation(s) trouvée(s)</p>
            <!-- </div>
            <div class="col" id="cal_for">
                <a href=""><button type="button" class="btn btn-secondary" target="_blank" >
                    CALENDRIER FORMATION</button>
                </a>
            </div><br> -->

        </div>
        <div  class="row">
        <?php
            $db = mysqli_connect("localhost", "root", "", "image_upload");
            if(isset($_POST['make_search'])){

                $tab = [5];
                $t=0;
            
                if(isset($_POST['medecin'])){
                    if(!empty($_POST['medecin'])){
                        $tab[0] = $_POST['medecin'];
                        $t++;
                    }
                }
                if(isset($_POST['infermier'])){
                    if(!empty( $tab[1] = $_POST['infermier'])){
                        $tab[1] = $_POST['infermier'];
                        $t++;
                    }
                }

                if(isset($_POST['pharmacien'])){
                    if(!empty($tab[2] = $_POST['pharmacien'])){
                        $tab[2] = $_POST['pharmacien'];
                        $t++;
                    }
                }

                if(isset($_POST['sagefemme'])){
                    if(!empty($tab[3] = $_POST['sagefemme'])){
                        $tab[3] = $_POST['sagefemme'];
                        $t++;
                    }
                }

                if(isset($_POST['kine'])){
                    if(!empty(  $tab[4] = $_POST['kine'])){
                        $tab[4] = $_POST['kine'];
                        $t++;
                    }
                }


                $k=0;
                for($j=0; $j<5; $j++){
                    if(!empty($tab[$j])){
                        $k++;
                        if($k==1){
                            $public = "".$tab[$j]." ";
                        }
                        else{
                            $public = "".$public."".$tab[$j]." ";
                        } 
                    }
                }
                
                if($_POST['theme'] != 'PAR THÈME') { 
                    $theme=$_POST['theme'];
                    if( $t>0){
                    
                        $result =  mysqli_query($db, "SELECT * FROM elearning where theme='$theme' and
                        public='$public'");

                    }
                    else{
                        $result =  mysqli_query($db, "SELECT * FROM elearning where theme='$theme'");

                        $i=0;
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                            ?>
                            <script>
                                function OpenNewTab(){
                                    var tmp = '<?php echo 'see_more_elearning.php?theme='.$theme.'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                                    window.location.href =tmp;
                                }
                            </script>
                            <?php

                            echo "<br><br><div onclick='OpenNewTab()'  id='img_div'>";
                                echo"<div><img src='images/elearning/".$row['image']."'></div>";
                                echo"<div id='info'>";
                                    echo "<p class='titre' >".$row['titre']."</p>";
                                    echo "<p>".$row['duree']."h</p>";
                                    echo "<p>".$row['public']."</p>";
                                    echo'<a href="see_more_elearning.php?theme='.$theme.'&titre='.$row['titre'].'&duree='.$row['duree'].'"> 
                                    En savoir plus</a><br>';
                                echo'</div>';
                            echo "</div>";
                        }
                    }
                }
                else{
                    $result =  mysqli_query($db, "SELECT * FROM elearning where
                    public='$public'");

                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        $i++;

                        ?>
                        <script>
                            function OpenNewTab1(){
                                var tmp = '<?php echo 'see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                                window.location.href =tmp;
                            }
                        </script>
                        <?php

                        echo "<br><br><div onclick='OpenNewTab1()'  id='img_div'>";
                            echo"<div><img src='images/elearning/".$row['image']."'></div>";
                            echo"<div id='info'>";
                                echo "<p class='titre' >".$row['titre']."</p>";
                                echo "<p>".$row['duree']."h</p>";
                                echo "<p>".$row['public']."</p>";
                                echo'<a href="see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'"> 
                                En savoir plus</a><br>';
                            echo'</div>';
                        echo "</div>";
                    }

                }
            }
            else{

                $result =  mysqli_query($db, "SELECT * FROM elearning ");

                $i=0;
                while ($row = mysqli_fetch_array($result)) {
                    $i++;
                    ?>
                    <script>
                        function OpenNewTab2(){
                            var tmp = '<?php echo 'see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'' ?>';
                            window.location.href =tmp;
                        }
                    </script>
                    <?php

                    echo "<br><br><div onclick='OpenNewTab2()'  id='img_div'>";
                        echo"<div><img src='images/elearning/".$row['image']."'></div>";
                        echo"<div id='info'>";
                            echo "<p class='titre' >".$row['titre']."</p>";
                            echo "<p>".$row['duree']."h</p>";
                            echo "<p>".$row['public']."</p>";
                            echo'<a href="see_more_elearning.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree='.$row['duree'].'"> 
                            En savoir plus</a><br>';
                        echo'</div>';
                    echo "</div>";
                }
            }

            echo"<script>";
                echo"document.getElementById('res_form_trouve').innerHTML = $i";
            echo"</script>";

            ?>

        </div>
    </div>

<?php 
include('footer/footer.php');

?>


  