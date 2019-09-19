<?php

//     function get_data(){
//     $db = mysqli_connect("localhost", "root", "", "image_upload");
//     $result =  mysqli_query($db, "SELECT * FROM mixtes");
//     $mixtes_data = array();

//     while($row=mysqli_fetch_array($result)) 
//     { 

//         $mixtes_data[] = array(
//         'theme'      => htmlEntities($row['theme']),
//         'profession' => htmlEntities($row['profession']), 
//         'region'     => htmlEntities($row['region']), 
//         'lat'        => htmlEntities($row['lat']),
//         'long'       => htmlEntities($row['long']), 
//         'titre'      => htmlEntities($row['titre']),
//         'adresse'    => htmlEntities($row['adresse']),
//         'ville'      => htmlEntities($row['ville']) 

//         // 'theme'      => "said",
//         // 'profession' => "aeede", 
//         // 'region'     => "ededed", 
//         // // 'lat'        => $row['lat'],
//         // // 'long'       => $row['long'], 
//         // 'titre'      => "deefezfrrf",
//         // 'ville'      => "dedefef" 
//         );
//     }
//     var_dump($mixtes_data);
//         return json_encode($mixtes_data); 
//     }
//  $file_name = date('d-m-y').'.json';
//         if(file_put_contents($file_name, get_data()))
//     {
//         // echo $file_name . 'file created';
//     }
//     else{
//         // echo 'Erreur';
//     }
   

?>

<?php
    include('header.php');
?>

        
            <div class="row" id="row_elearning">
                <div class="col-sm-4" id="first_col_mixtes">

                    <form action="mixtes.php" method="POST">
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
                            <option>Pédiatrie</option>
                        </select>
                        <br><br><br>

                        <label id="profession" for="">PAR PROFESSION</label>
                        <div class="form-check">
                            <div class="checkbox">
                            <label><input type="checkbox" value="Médecins généralistes" name="medecin">Médecin</label>
                            </div>
                            
                            <div class="checkbox">
                            <label><input type="checkbox" value="Infirmier" name="infermier">Infirmier</label>
                            </div>

                            <div class="checkbox">
                            <label><input type="checkbox"  value="Pharmaciens" name="pharmacien">Pharmacien</label>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox" value="Sage-Femme" name="sagefemme">Sage-Femme</label>
                            </div> 

                            <div class="checkbox">
                            <label><input type="checkbox" value="Kinésithérapeute" name="kine">Kinésithérapeute</label>
                            </div> 
                        </div>

                            <select id="mySelect_mixte" name="region">
                                <option>PAR RÉGION</option>
                                <option value="Ile De France">Île-de-France</option>
                                <option>Auvergne-Rhône-Alpes</option>
                                <option>Bourgogne-Franche-Comté</option>
                                <option>Bretagne</option>
                                <option>Centre-Val de Loire</option>
                                <option>Corse</option>
                                <option>Grand Est</option>
                                <option>Hauts-de-France</option>
                                <option>Normandie</option>
                                <option>Nouvelle-Aquitaine</option>
                                <option>Occitanie</option>
                                <option>Pays de la Loire</option>
                                <option value ="Provence-Alpes-Côte d Azur">Provence-Alpes-Côte d'Azur</option>
                            </select>
                        <br><br><br><br>
                        <button  type="submit" class="btn btn-dark btn-lg" name="make_search">LANCER MA RECHERCHE </button>

                        <br><br><br>
                        <a href="Catalogue des formations 2.pdf" id="consul_catalogue"target="_blank" >
                            <button type="button" class="btn btn-secondary" >
                            ➢ Consulter le  catalogue des formations 
                            </button>
                        </a>
                    </form>
                </div>

                <div class="col-sm-8" id="second_col_elearning">
                    <div class="row" id="titre_elearning">
                        <h1 class="titre_body">NOS FORMATIONS MIXTES</h1>
                        <!-- <hr class="titre_body" width="300"  border-top: "1px solid"> -->
                        <p  class="titre_body">Découvrez les formations mixtes de Kamedis Institut : </p>
                    </div>
                    <div class="row" id="top_second_culumn"> 
                        <p id="nb_form"><span id="form_trouve"> </span>  &nbsp;formation(s) trouvée(s)</p>
                    </div>

                    <div class="row" id="row_map">
                        <div id="map" ></div>
                    </div>
                    
                    <div class="row" id="div_image"> 
                        <?php
                            $db = mysqli_connect("localhost", "root", "", "image_upload");
                            mysqli_set_charset($db, "utf8");

                            $string = file_get_contents("07-08-18.json");
                            $json_a = json_decode($string, true);

                            // foreach ($json_a as $person_name => $person_a) {
                            //     echo $person_a['theme'];
                            //     echo $person_a['adresse'];
                            // }

                            //     $data[] = array(
                            //     'theme'      => htmlEntities($row['theme']),
                            //     'profession' => htmlEntities($row['profession']), 
                            //     'region'     => htmlEntities($row['region']), 
                            //     'lat'        => htmlEntities($row['lat']),
                            //     'long'       => htmlEntities($row['long']), 
                            //     'titre'      => htmlEntities($row['titre']),
                            //     'adresse'    => htmlEntities($row['adresse']),
                            //     'ville'      => htmlEntities($row['ville'])
                            //     ); 
                            $FormationParPage = 5;
                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");
                            $FormationsTotales = mysqli_num_rows($result);
                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                            $_GET['page'] = intval($_GET['page']);
                            $pageCourante = $_GET['page'];
                            } else {
                            $pageCourante = 1;
                            }
                            $depart = ($pageCourante-1)*$FormationParPage;




                            if(isset($_POST['make_search'])){

                                $tab = [];
                                $t=0;
                            
                                if(isset($_POST['medecin'])){
                                    if(!empty($_POST['medecin'])){
                                        $tab[0] = $_POST['medecin'];
                                        // echo "step1";
                                        $t++;
                                    }
                                }
                                if(isset($_POST['infermier'])){
                                    if(!empty(  $_POST['infermier'])){
                                        $tab[1] = $_POST['infermier'];
                                        $t++;
                                    }
                                }

                                if(isset($_POST['pharmacien'])){
                                    if(!empty($_POST['pharmacien'])){
                                        $tab[2] = $_POST['pharmacien'];
                                        // echo "step2";
                                        $t++;
                                    }
                                }

                                if(isset($_POST['sagefemme'])){
                                    if(!empty($_POST['sagefemme'])){
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
                                            $public = $tab[$j];
                                        }
                                        else{
                                            $public = "".$public.", ".$tab[$j]."";
                                            // echo $public;
                                        } 
                                    }
                                }
                                for($j=0; $j<5; $j++){
                                    $tab[$j]='';
                                }
                                
                                if($_POST['theme'] != 'PAR THÈME') { 
                                    $theme=$_POST['theme'];
                                    if(( $t>0)){
                                        if(($_POST['region'] != 'PAR RÉGION' )){
                                            $region= $_POST['region'];
                                            // echo  $region;

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                            (public='$public' or public1='$public' or public2='$public') and region='$region'");


                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;
                                            
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                           (public='$public' or public1='$public' or public2='$public') and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                            
                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;

                                                ?>
                                                <script>
                                                    function OpenNewTab(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab()' class='post' id='img_div'>";
                                                echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                    echo"<div id='info'>";
                                                    echo "<p class='titre' >".$row['titre']."</p>";
                                                    echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                    echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                    echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                    echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                    echo'<a href="see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                                    En savoir plus</a><br>';
                                                    echo'</div>';
                                                echo "</div>";
                                            }

                                            foreach ($json_a as $formations => $formation) {
                                                // echo $formation['theme'];
                                                // echo $formation['adresse'];
                                            
                                                /*echo "<script >
                                                    var data =[];
                                                    ls_for = {
                                                        'theme' :".$formation['theme'].",
                                                        'profession' : ".$formation['profession'].", 
                                                        'region'     : ".$formation['region'].", 
                                                        'lat'        : ".$formation['lat'].",
                                                        'long'       : ".$formation['long'].", 
                                                        'titre'      : ".$formation['titre'].",
                                                        'adresse'    : ".$formation['adresse'].",
                                                        'ville'      : ".$formation['ville']."
                                                    };  

                                                    
                                                    data.push(ls_for);
                                                


                                            </script>";*/
                                            
                                            }
                                        }
                                        else{
                                        
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                            (public='$public' or public1='$public' or public2='$public')");

                                            
                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;


                                            
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                           (public='$public' or public1='$public' or public2='$public') ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");


                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;

                                                ?>
                                                <script>
                                                    function OpenNewTab1(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab1()' class='post' id='img_div'>";
                                                echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                    echo"<div id='info'>";
                                                    echo "<p class='titre' >".$row['titre']."</p>";
                                                    echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                    echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                    echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                    echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                    echo'<a href="see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                    En savoir plus</a>';
                                                    echo'</div>';
                                                echo "</div>";
                                            }
                                        }
                                    
                                    }
                                    else{
                                        if($_POST['region'] != 'PAR RÉGION'){
                                            $region = $_POST['region'];  
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and region='$region'");

                                            
                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                <script>
                                                    function OpenNewTab2(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                
                                                echo "<br><br><div onclick='OpenNewTab2()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                        echo"<div id='info'>";
                                                        echo "<p class='titre' >".$row['titre']."</p>";
                                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                        echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                        En savoir plus</a><br>';
                                                        echo'</div>';
                                                echo "</div>";
                                            }
                                        }else{

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme'");


                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme'ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                            
                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                <script>
                                                    function OpenNewTab3(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab3()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                        echo"<div id='info'>";
                                                        echo "<p class='titre' >".$row['titre']."</p>";
                                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                        echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                                        En savoir plus</a>';
                                                        echo'</div>';
                                                echo "</div>";
                                            }
                                        }

                                    }
                                }
                                else{
                                    if($t>0){
                                        if($_POST['region'] != 'PAR RÉGION'){
                                            $region = $_POST['region'];

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') and region='$region'");

                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;



                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                            // echo $public;

                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                <script>
                                                    function OpenNewTab4(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab4()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                        echo"<div id='info'>";
                                                        echo "<p class='titre' >".$row['titre']."</p>";
                                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                        echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                        En savoir plus</a>';
                                                        echo'</div>';
                                                echo "</div>";
                                            }
                                        }
                                        else{

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public')");

                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;
                                        
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                <script>
                                                    function OpenNewTab5(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab5()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                        echo"<div id='info'>";
                                                        echo "<p class='titre' >".$row['titre']."</p>";
                                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                        echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                                        En savoir plus</a>';
                                                        echo'</div>';
                                                echo "</div>";
                                            }
                                        }
                                    }
                                    else{
                                        if($_POST['region'] != 'PAR RÉGION'){
                                            $region = $_POST['region'];
                                            // echo $region;
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where region='$region'");

                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;
                
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                <script>
                                                    function OpenNewTab6(){
                                                        var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                        window.location.href =tmp;
                                                    }
                                                </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab6()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                        echo"<div id='info'>";
                                                        echo "<p class='titre' >".$row['titre']."</p>";
                                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                        echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                        En savoir plus</a>';
                                                        echo'</div>';
                                                echo "</div>";
                                            }
                                        
                                        }
                                        else{

                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");

                                            $FormationsTotales = mysqli_num_rows($result);
                                            $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                            $_GET['page'] = intval($_GET['page']);
                                            $pageCourante = $_GET['page'];
                                            } else {
                                            $pageCourante = 1;
                                            }
                                            $depart = ($pageCourante-1)*$FormationParPage;
                                           
            
                                            $result =  mysqli_query($db, "SELECT * FROM mixtes_testes ORDER BY id DESC LIMIT  ".$depart.",".$FormationParPage."");
            
                
                                            $i=0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $i++;
                                                ?>
                                                    <script>
                                                        function OpenNewTab7(){
                                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                            window.location.href =tmp;
                                                        }
                                                    </script>
                                                <?php
                                                echo "<br><br><div onclick='OpenNewTab7()' class='post' id='img_div'>";
                                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                            echo"<div id='info'>";
                                                            echo "<p class='titre' >".$row['titre']."</p>";
                                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                            En savoir plus</a><br>';
                                                    echo'</div>';
                                                echo "</div>";
                                            }

                                        }
                                    }
                                }
                            }
                            else{
                                

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");

                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;
                               

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes ORDER BY id DESC LIMIT  ".$depart.",".$FormationParPage."");

    
                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                        <script>
                                            function OpenNewTab7(){
                                                var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                window.location.href =tmp;
                                            }
                                        </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab7()' class='post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                echo"<div id='info'>";
                                                echo "<p class='titre' >".$row['titre']."</p>";
                                                echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                                En savoir plus</a><br>';
                                        echo'</div>';
                                    echo "</div>";
                                }

                            }

                                echo"<script >";
                                    echo"document.getElementById('form_trouve').innerHTML = $FormationsTotales
                                    </script>";
                                    

                            mysqli_close($db);
                    ?>


                        
                            <br><br><br><br>
                            <!-- <map name="">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1duzGdMSCE7Y7JzQ9WmHSbCSwOWpS54Oc" width="640" height="480"></iframe>
                            </map> -->
                    </div>
                    <br><br><br><br><br>
                </div>
            </div>
        </div>

    </div>
    
    <div  id="row_res_elearning">
            <div class="row" id="first_row_respon_elearning">
                <h1 class="titre_body">NOS FORMATIONS MIXTES</h1>
                <p  class="titre_body">Découvrez les formations mixtes de Kamedis Institut : </p>
            </div>
            <div class="row" id="sec_row_respon_elearning">
                <form action="mixtes.php" method="POST" id='res_form_formation' >
                    <div>
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
                            <option>Pédiatrie</option>
                        </select>
                    </div>  
                    <div id="cont_col_res_form_ele">
                        <label id="profession" for="">PAR PROFESSION</label>
                        <div class="form-check">
                            <div class="checkbox">
                            <label><input type="checkbox" value="Médecins généralistes" name="medecin">Médecin</label>
                            </div>
                            
                            <div class="checkbox">
                            <label><input type="checkbox" value="Infirmier" name="infermier">Infirmier</label>
                            </div>

                            <div class="checkbox">
                            <label><input type="checkbox"  value="Pharmaciens" name="pharmacien">Pharmacien</label>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox" value="Sage-Femme" name="sagefemme">Sage-Femme</label>
                            </div> 

                            <div class="checkbox">
                            <label><input type="checkbox" value="Kinésithérapeute" name="kine">Kinésithérapeute</label>
                            </div> 
                        </div>
                    </div>
                    <div >
                        <select id="mySelect_mixte" name="region">
                            <option>PAR RÉGION</option>
                            <option value="Ile De France">Île-de-France</option>
                            <option>Auvergne-Rhône-Alpes</option>
                            <option>Bourgogne-Franche-Comté</option>
                            <option>Bretagne</option>
                            <option>Centre-Val de Loire</option>
                            <option>Corse</option>
                            <option>Grand Est</option>
                            <option>Hauts-de-France</option>
                            <option>Normandie</option>
                            <option>Nouvelle-Aquitaine</option>
                            <option>Occitanie</option>
                            <option>Pays de la Loire</option>
                            <option value ="Provence-Alpes-Côte d Azur">Provence-Alpes-Côte d'Azur</option>
                        </select>
                    </div>  
                    <div id="cont_col_res_form_ele">
                        <button  type="submit" class="btn btn-dark btn-lg" name="make_search">LANCER MA RECHERCHE </button>
                    </div>

                    <div id="cont_col_res_form_ele">
                        <a href="Catalogue des formations 2.pdf" id="consul_catalogue"target="_blank" >
                            <button type="button" class="btn btn-secondary" >
                            ➢ Consulter le  catalogue des formations 
                            </button>
                        </a>
                    </div>
                </form>

            </div>

            <div class="row" id="nb_fo_ele_res">
                <p id="nb_form"><span id="res_form_trouve"> </span>  &nbsp;formation(s) trouvée(s)</p>
            </div>
            <div  id="res_div_image" class="row">
            <?php
                $db = mysqli_connect("localhost", "root", "", "image_upload");
                mysqli_set_charset($db, "utf8");

                $string = file_get_contents("07-08-18.json");
                $json_a = json_decode($string, true);

                // foreach ($json_a as $person_name => $person_a) {
                //     echo $person_a['theme'];
                //     echo $person_a['adresse'];
                // }

                //     $data[] = array(
                //     'theme'      => htmlEntities($row['theme']),
                //     'profession' => htmlEntities($row['profession']), 
                //     'region'     => htmlEntities($row['region']), 
                //     'lat'        => htmlEntities($row['lat']),
                //     'long'       => htmlEntities($row['long']), 
                //     'titre'      => htmlEntities($row['titre']),
                //     'adresse'    => htmlEntities($row['adresse']),
                //     'ville'      => htmlEntities($row['ville'])
                //     ); 
                $FormationParPage = 5;
                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");
                $FormationsTotales = mysqli_num_rows($result);
                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                $_GET['page'] = intval($_GET['page']);
                $pageCourante = $_GET['page'];
                } else {
                $pageCourante = 1;
                }
                $depart = ($pageCourante-1)*$FormationParPage;




                if(isset($_POST['make_search'])){

                    $tab = [];
                    $t=0;
                
                    if(isset($_POST['medecin'])){
                        if(!empty($_POST['medecin'])){
                            $tab[0] = $_POST['medecin'];
                            // echo "step1";
                            $t++;
                        }
                    }
                    if(isset($_POST['infermier'])){
                        if(!empty(  $_POST['infermier'])){
                            $tab[1] = $_POST['infermier'];
                            $t++;
                        }
                    }

                    if(isset($_POST['pharmacien'])){
                        if(!empty($_POST['pharmacien'])){
                            $tab[2] = $_POST['pharmacien'];
                            // echo "step2";
                            $t++;
                        }
                    }

                    if(isset($_POST['sagefemme'])){
                        if(!empty($_POST['sagefemme'])){
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
                                $public = $tab[$j];
                            }
                            else{
                                $public = "".$public.", ".$tab[$j]."";
                                // echo $public;
                            } 
                        }
                    }
                    for($j=0; $j<5; $j++){
                        $tab[$j]='';
                    }
                    
                    if($_POST['theme'] != 'PAR THÈME') { 
                        $theme=$_POST['theme'];
                        if(( $t>0)){
                            if(($_POST['region'] != 'PAR RÉGION' )){
                                $region= $_POST['region'];
                                // echo  $region;

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                (public='$public' or public1='$public' or public2='$public') and region='$region'");


                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;
                                
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                (public='$public' or public1='$public' or public2='$public') and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                
                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;

                                    ?>
                                    <script>
                                        function OpenNewTab_n(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab_n()' class='res_post' id='img_div'>";
                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                        echo"<div id='info'>";
                                        echo "<p class='titre' >".$row['titre']."</p>";
                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                        echo'<a href="see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                        En savoir plus</a><br>';
                                        echo'</div>';
                                    echo "</div>";
                                }

                                foreach ($json_a as $formations => $formation) {
                                    // echo $formation['theme'];
                                    // echo $formation['adresse'];
                                
                                    /*echo "<script >
                                        var data =[];
                                        ls_for = {
                                            'theme' :".$formation['theme'].",
                                            'profession' : ".$formation['profession'].", 
                                            'region'     : ".$formation['region'].", 
                                            'lat'        : ".$formation['lat'].",
                                            'long'       : ".$formation['long'].", 
                                            'titre'      : ".$formation['titre'].",
                                            'adresse'    : ".$formation['adresse'].",
                                            'ville'      : ".$formation['ville']."
                                        };  

                                        
                                        data.push(ls_for);
                                    


                                </script>";*/
                                
                                }
                            }
                            else{
                            
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                                (public='$public' or public1='$public' or public2='$public')");

                                
                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;


                                
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and
                               (public='$public' or public1='$public' or public2='$public') ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");


                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;

                                    ?>
                                    <script>
                                        function OpenNewTab11(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab11()' class='res_post' id='img_div'>";
                                    echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                        echo"<div id='info'>";
                                        echo "<p class='titre' >".$row['titre']."</p>";
                                        echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                        echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                        echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                        echo "<p> ".htmlEntities($row['ville'])."</p>";
                                        echo'<a href="see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                        En savoir plus</a>';
                                        echo'</div>';
                                    echo "</div>";
                                }
                            }
                        
                        }
                        else{
                            if($_POST['region'] != 'PAR RÉGION'){
                                $region = $_POST['region'];  
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and region='$region'");

                                
                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme' and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                    <script>
                                        function OpenNewTab12(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    
                                    echo "<br><br><div onclick='OpenNewTab12()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                            echo"<div id='info'>";
                                            echo "<p class='titre' >".$row['titre']."</p>";
                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                            En savoir plus</a><br>';
                                            echo'</div>';
                                    echo "</div>";
                                }
                            }else{

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme'");


                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where theme='$theme'ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                
                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                    <script>
                                        function OpenNewTab13(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$theme.'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab13()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                            echo"<div id='info'>";
                                            echo "<p class='titre' >".$row['titre']."</p>";
                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                            En savoir plus</a>';
                                            echo'</div>';
                                    echo "</div>";
                                }
                            }

                        }
                    }
                    else{
                        if($t>0){
                            if($_POST['region'] != 'PAR RÉGION'){
                                $region = $_POST['region'];

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') and region='$region'");

                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;



                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') and region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");
                                // echo $public;

                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                    <script>
                                        function OpenNewTab14(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab14()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                            echo"<div id='info'>";
                                            echo "<p class='titre' >".$row['titre']."</p>";
                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                            En savoir plus</a>';
                                            echo'</div>';
                                    echo "</div>";
                                }
                            }
                            else{

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') ");

                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;
                            
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where (public='$public' or public1='$public' or public2='$public') ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                    <script>
                                        function OpenNewTab15(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab15()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                            echo"<div id='info'>";
                                            echo "<p class='titre' >".$row['titre']."</p>";
                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                            En savoir plus</a>';
                                            echo'</div>';
                                    echo "</div>";
                                }
                            }
                        }
                        else{
                            if($_POST['region'] != 'PAR RÉGION'){
                                $region = $_POST['region'];
                                // echo $region;
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where region='$region'");

                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                $_GET['page'] = intval($_GET['page']);
                                $pageCourante = $_GET['page'];
                                } else {
                                $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;
    
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes where region='$region' ORDER BY id DESC LIMIT ".$depart.",".$FormationParPage."");

                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                    <script>
                                        function OpenNewTab16(){
                                            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                            window.location.href =tmp;
                                        }
                                    </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab16()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                            echo"<div id='info'>";
                                            echo "<p class='titre' >".$row['titre']."</p>";
                                            echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                            echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                            echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                            echo "<p> ".htmlEntities($row['ville'])."</p>";
                                            echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'"> 
                                            En savoir plus</a>';
                                            echo'</div>';
                                    echo "</div>";
                                }
                            
                            }
                            else{

                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");

                                $FormationsTotales = mysqli_num_rows($result);
                                $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                                    $_GET['page'] = intval($_GET['page']);
                                    $pageCourante = $_GET['page'];
                                    } else {
                                    $pageCourante = 1;
                                }
                                $depart = ($pageCourante-1)*$FormationParPage;
                               
            
                                $result =  mysqli_query($db, "SELECT * FROM mixtes_testes ORDER BY id DESC LIMIT  ".$depart.",".$ParPage."");
            
            
                                $i=0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    ?>
                                        <script>
                                            function OpenNewTab17(){
                                                var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                                window.location.href =tmp;
                                            }
                                        </script>
                                    <?php
                                    echo "<br><br><div onclick='OpenNewTab17()' class='res_post' id='img_div'>";
                                        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                                echo"<div id='info'>";
                                                echo "<p class='titre' >".$row['titre']."</p>";
                                                echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                                echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                                echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                                echo "<p> ".htmlEntities($row['ville'])."</p>";
                                                echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                                En savoir plus</a><br>';
                                        echo'</div>';
                                    echo "</div>";
                               }

                            }
                        }
                    }
                }
                else{

                    $result =  mysqli_query($db, "SELECT * FROM mixtes_testes");

                    $FormationsTotales = mysqli_num_rows($result);
                    $pagesTotales = ceil($FormationsTotales/$FormationParPage);
                    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                        $_GET['page'] = intval($_GET['page']);
                        $pageCourante = $_GET['page'];
                        } else {
                        $pageCourante = 1;
                    }
                    $depart = ($pageCourante-1)*$FormationParPage;
                   

                    $result =  mysqli_query($db, "SELECT * FROM mixtes_testes ORDER BY id DESC LIMIT  ".$depart.",".$FormationParPage."");


                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        $i++;
                        ?>
                            <script>
                                function OpenNewTab17(){
                                    var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].'' ?>';
                                    window.location.href =tmp;
                                }
                            </script>
                        <?php
                        echo "<br><br><div onclick='OpenNewTab17()' class='res_post' id='img_div'>";
                            echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                                    echo"<div id='info'>";
                                    echo "<p class='titre' >".$row['titre']."</p>";
                                    echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                                    echo "<p>Public : ".htmlEntities($row['public'])."</p>";
                                    echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                                    echo "<p> ".htmlEntities($row['ville'])."</p>";
                                    echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'&public='.$row['public'].' "> 
                                    En savoir plus</a><br>';
                            echo'</div>';
                        echo "</div>";
                   }

                }

                        echo"<script >";
                            echo"document.getElementById('res_form_trouve').innerHTML = $FormationsTotales
                            </script>";
                        
                        mysqli_close($db);


                ?>

                <!-- </nav> -->



            </div>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div id="pagination" class="pagination justify-content-center">
                    <?php
                        for($i=1;$i<=$pagesTotales;$i++) {
                            if($i == $pageCourante) {
                            ?>
                                <a class="page-link" href="#"><?php echo $i; ?> <span class="sr-only">(current )</span></a>
                            <?php

                            } 
                            elseif ($i == $pageCourante+1){
                            ?>
                                <a  class="next" href="mixtes.php?page=<?php echo $i;?>"><?php echo $i ?></a>
                            <?php
                            }
                            else {
                            ?> 
                                <a  href="mixtes.php?page=<?php echo $i;?>"><?php echo $i ?></a>
                            <?php
                            }
                        }
                    ?>

                </div>

                <script src='js/jquery-ias.min.js'></script>
                <script type="text/javascript">
                    
                   if( window.innerWidth <= 900 ){
                        var ias = jQuery.ias({
                        container:  '#res_div_image',
                        item:       '.res_post',
                        pagination: '#pagination',
                        next:       '.next'
                        });
                    }
                  else{
                        var ias = jQuery.ias({
                        container:  '#div_image',
                        item:       '.post',
                        pagination: '#pagination',
                        next:       '.next'
                        });

                  }
                  



                    // ias.extension(new IASSpinnerExtension({
                    //     src: 'images/mixtes/ajax-loader.gif', // optionally
                    // }));

                </script>

    </div>
                                  




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0" ></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.2.0.min.js"></script>

<script>
  var map;
  var lokasi = [];

//   var data = 
// [{
//         "lat": "49.0798947",
//         "lng": "6.149807799999962",
//         "alamat": "Dago, Bandung",
//         "keterangan": "Aman ga ada begal",
//         "type": "parking"
//     },
//     {
//         "lat": "-7.7955798",
//         "lng": "110.3694896",
//         "alamat": "Yogyakarta, DIY",
//         "keterangan": "Ayo membaca buku",
//         "type": "library"
//     },
//     {
//         "lat": "-7.2574719",
//         "lng": "112.7520883",
//         "alamat": "Surabaya",
//         "keterangan": "Discon belanja",
//         "type": "info"
//     }
// ];
  

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 46, lng: 2},
      zoom: 5,
      zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_TOP
      }
    });
  }
  google.maps.event.addDomListener(window, 'load', initMap);

// function findLokasi() {
//     var d = new google.maps.InfoWindow();
//     var e;

//     $.each(data, function(i, b) {
//         // membuat maker dari lat, lng
//         e = new google.maps.Marker({
//             position: new google.maps.LatLng(b.lat, b.lng),
//             map: map
//         });

//         lokasi.push(e);

//         // membuat info window alamat
//         google.maps.event.addListener(e, 'click', (function(a, i) {
//             return function() {
//                 //	alert(a.position.lat());
//                 //	console.log(a.location);
//                 d.setContent('<div><h3>' + b.lat + '</h3><p>' + + '</p>');
//                     // tombol triger.y untuk menjalankan fungsi jarak
//                     // +
//                     // '<button class="detail" data-alamat="' + b.alamat + '" data-lat="' + b.lat + '" data-lng="' + b.long + '">Detail</button></div>');
//                 d.open(map, a)
//             }
//         })(e, i))
//     });
// }
    function findLokasi() {
    $.ajax({
        type: "GET",
        url: "07-08-18.json",
        dataType: "json",
        success: function(data){
            var d = new google.maps.InfoWindow();
            var e;

            $.each(data, function(i, b){ 
                e = new google.maps.Marker({
                    position: new google.maps.LatLng(b.lat, b.long),
                    map: map
                });
                
                lokasi.push(e);

                google.maps.event.addListener(e, 'click', (function(a, i){
                    return function(){
                        d.setContent('<div><h3>'+ b.theme+'</h3><br><h3>'+ b.titre+'</h3><br>'+ b.adresse+'<div>');
                        d.open(map, a)
                    }
                })(e, i))
            });
        }
    });
    }

    $(function(){
        findLokasi();
    });
//     // var d = new google.maps.InfoWindow();
    // var e;

    // $.each(perusahaan, function(i, b) {
    //     // membuat maker dari lat, lng
    //     e = new google.maps.Marker({
    //         position: new google.maps.LatLng(b.lat, b.lng),
    //         icon: icons[b.type].icon,
    //         map: map
    //     });

    //     lokasi.push(e);

    //     // membuat info window alamat
    //     google.maps.event.addListener(e, 'click', (function(a, i) {
    //         return function() {
    //             //	alert(a.position.lat());
    //             //	console.log(a.location);
    //             d.setContent('<div><h3>' + b.alamat + '</h3><p>' + b.keterangan + '</p>'
    //                 // tombol triger.y untuk menjalankan fungsi jarak
    //                 +
    //                 '<button class="detail" data-alamat="' + b.alamat + '" data-lat="' + b.lat + '" data-lng="' + b.lng + '">Detail</button></div>');
    //             d.open(map, a)
    //         }
    //     })(e, i))
    // });

</script>

    <?php 
    include('footer.php');

    ?>


    