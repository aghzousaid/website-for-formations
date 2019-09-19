<?php 
    include('header/header.php');
?>

<div class="info_page_elearning">
    <div class="ref_el">
    </div>
    
    <div class="titre_elearning">
        <div class="shadow-lg p-3 mb-5">
            <center>
                <h1 class="titre_body_see_more">
                    <?php
                        echo '<span >'.$_GET['theme'].' : </span><br>';
                        echo '<span >'.$_GET['titre'].'</span>';
                    ?>
                </h1>
            </center>
        </div>
    </div>
</div>
<section id="see_more_ele">
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="background-color:lavender; "><p id="e_learn">MIXTES</p></div>
            <div class="col" > <p id="e_time"><i class="clock outline icon"></i>
                <?php
                    echo "<span>Durée Présentiel :  ".$_GET['duree_p']."H et Durée Non Présentiel : ".$_GET['duree_np']."H</span></p>";
                ?>
            </p></div>
   
            <div class="col" style="background-color:lavender;"><p id="e_public"><i class="user md icon"></i>
                
            </p></div>
        </div>
    </div>

    <?php
        $db = mysqli_connect("localhost", "root", "", "image_upload");
        mysqli_set_charset($db, "utf8");
        $theme = $_GET['theme'];
        $titre = $_GET['titre'];
        $result =  mysqli_query($db, "SELECT * FROM mixtes where theme='$theme' and titre='$titre'" );
        $row = mysqli_fetch_array($result);
    ?>

    <div  class="row" id="intervenant">
        <div class="card text-center text-white bg-secondary mb-3">
            <div class="card-body">
                <p class="card-text">
                    <?php
                        echo '<p>'.htmlEntities($row['description']).'</p>';
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div  class="row" id="intervenant">
        <div class="card text-center text-white bg-secondary mb-3">
            <div class="card-header">
                <h4>COMPÉTENCES VISÉES</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?php   
                        echo '<p>'.htmlEntities($row['competence']).'</p>';
                    ?>
                </p>
            </div>
        </div>
    </div>
    
    
    <div  class="row" id="intervenant">
        <div class="card text-center text-white bg-secondary mb-3">
            <div class="card-header">
                <h4>DÉROULÉ PÉDAGOGIQUE</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                <div class="row">
                
                    <div class="col">
                        <center><h4>Présentiel</h4></center>
                        <?php
                         echo '<p>'.htmlEntities($row['presentiel']).'</p>';
                        ?>
                    </div>

                    <div class="col">
                        <center><h4>Non Présentiel</h4></center>
                        <?php
                        echo '<p>'.htmlEntities($row['non_presentiel']).'</p>';
                        ?>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>

    <div  class="row" id="intervenant">
        <div class="card text-center text-white bg-secondary mb-3">
            <div class="card-header">
                <h4>INTERVENANT</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?php
                        $result =  mysqli_query($db, "SELECT * FROM intervenant where titre='$titre'" );

                        while ($row = mysqli_fetch_array($result)) {
                            echo'<div class="row">
                                <div class="col" id="interv">Nom : '.$row['nom'].' </div>
                            
                                <div class="col"  id="interv">Prénom : '.$row['prenom'].'</div>
                                <div class="col" id="see_plus_inter">
                                        <a href="#"> 
                                        <i style="font-size:40px" class="fa">&#xf0a9;</i></a>
                                        <p>En savoir plus</p>
                                </div>           
                            </div>';
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div  class="row" id="intervenant">
        <div class="card text-center text-white bg-secondary mb-3">
            <div class="card-header">
                <h4>SESSIONS Â VENIR</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </h5>
                <p class="card-text">
                    <div class="row" id="info_session">
                    <div class="col" >
                    <i class="map marker alternate icon"></i>LOCALISATION
                    </div>
                    <div class="col">
                    <i class="calendar alternate icon"></i>
                    </div>
                    <div class="col">
                    <button href="" class="btn btn-dark">JE M'INSCRIS</button>
                    </div>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <br>
    <br><br>
</section>

<?php 
    include('footer/footer.php');
?>