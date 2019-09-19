<?php 
    include('header.php');

    $db = mysqli_connect("localhost", "root", "", "image_upload");
    mysqli_set_charset($db, "utf8");
    $titre = $_GET['titre'];
    $result =  mysqli_query($db, "SELECT * FROM actualite where titre='$titre'" );
    $row = mysqli_fetch_array($result);
?>

    <div class="info_page_elearning">
         <div class="ref_el">
            <!--<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">ACCEUIL</a></li>
                    <li class="breadcrumb-item"><a href="qui_somme_nous.php">QUI SOMMES-NOUS ?</a></li>
                    <li class="breadcrumb-item " aria-current="page">NOS FORMATEURS</li>
                </ol>
            </nav>-->
        </div> 

        <div class="titre_elearning">
            <div class="shadow-sm p-3 mb-1  rounded">
                <center>
                <br>
                <p><?php echo $_GET['titre'] ?></p>
                <p>Publié le : <?php echo date("d/m/Y", strtotime(htmlEntities($row['date']))) ?><p>
                <hr align="center" width="300"  border-top: "4px solid">
                </center>
            </div>
        </div>
    </div>

<section class="container" id="sec_see_more_act_ia">
     <!-- <div class="shadow-lg  rounded"> -->
    <div class="row rounded" id="image_desc_see_more_ai">
        <img src="<?php echo $row['image'] ?>" alt="">
    </div>
    <!-- </div> -->

    <!-- <div class="shadow-lg p-3 mb-5  rounded"> -->
        
        <p id="m_top_desc_see_more_ai" class="text-justify ">
            <?php  
                $para_competence =explode("•", $row['detail']);
                
                for( $i=1; $i<sizeof($para_competence); $i++){
                    echo  $para_competence[$i].'<br/><br/>';
                }
            
            ?>
        <a id="link_ia" href="<?php echo $row['lien']?>"><?php echo $row['lien']?></a>
        
        </p>

    <!-- </div> -->

</section>
<?php 
    include('footer.php');
?>