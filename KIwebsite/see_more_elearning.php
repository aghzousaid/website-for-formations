<?php 
    include('header/header.php');
?>

<div class="info_page_elearning">
    <div class="ref_el">
    </div>

    <div class="titre_elearning">
        <div class="shadow-lg p-3 mb-5 ">
            <center>
            <h1 class="titre_body">
                <?php
                    echo '<span >'.$_GET['theme'].' : </span>';
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
            <div class="col" style="background-color:lavender; "><p id="e_learn">E-LEARNING</p></div>
            <div class="col" > <p id="e_time"><i class="clock outline icon"></i>
                <?php
                    echo "<span>".$_GET['duree']."H</span></p>";
                ?>
            </p></div>
             <!-- /*style="background-color:orange;"* -->
            <div class="col" style="background-color:lavender;"><p id="e_public"><i class="user md icon"></i>
                
            </p></div>
        </div>
    </div>

    <?php
        $db = mysqli_connect("localhost", "root", "", "image_upload");
        $result =  mysqli_query($db, "SELECT * FROM elearning");
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
                    <?php
                   echo '<p>'.htmlEntities($row['deroule_pedagogique']).'</p>';
                    ?>
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
                    echo '<p>'.htmlEntities($row['deroule_pedagogique']).'</p>';
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
                    <button href="inscription.php" data-toggle="modal" data-target="#myModal" class="btn btn-dark">JE M'INSCRIS</button>
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="cl_modal" class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                        <p id="cl_modal">This is a large modal.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                    </div>
                </div>
                    </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</section>

<?php 
    include('footer/footer.php');
?>