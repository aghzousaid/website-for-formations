<?php
    include("header.php");
?>


    <script type="text/javascript">
    if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
        document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
    }
    </script>

    <div class="info_page_elearning">
        <div class="ref_el">
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="qui_somme_nous.php"></a></li>
                    <li class="breadcrumb-item " aria-current="page">Actualités</li>
                </ol>
            </nav> -->
        </div>

        <div class="titre_elearning">
            <div class="shadow-sm p-3 mb-5  rounded">
                <br>
                <center><h1 class="titre_body">NOS DERNIÈRES ACTUALITÉS</h1>
                <hr align="center" width="300"  border-top: "4px solid">

                <!-- <p>Découvrez les formations mixtes de Kamedis Institut :
                <p>3h en présentiel et 7h en non présentiel ! -->
                </center>
            </div>
        </div>
    </div>

    <div class="container body_actualite">
        <?php
            $db = mysqli_connect("localhost", "root", "", "image_upload");
            mysqli_set_charset($db, "utf8");
            $result =  mysqli_query($db, "SELECT * FROM actualite" );
        ?>
      
        <div class="row justify-content-md-center" id='first_row_actualite'>
            <?php
                $i=0;
                    // while ($i<=2 ) {
                        while ($row = mysqli_fetch_array($result)){
                        $i++; 
                        
                            echo'<div class="col-md mb-3" id="card"> 
                                <div class="card " style="width: 18rem;height:100%;" >
                                    <div class=" justify-content-center">
                                        <a href="see_more_actualite.php?titre='.$row['titre'].'"><img class="card-img-top"  id="img_ai" src='.$row['image'].' alt="Card image cap"></a>
                                    </div>
                                    <div class="card-body ">
                                        <h5 class="card-title" id="text_left_mg">'.$row['titre'].' : '.$row['titre_descr'].' </h5>
                                        <p class="card-text" id="text_left_mg">'.$row['description'].' </p>
                                    </div>
                                    <div>
                                        <a id="link_lire_la_suite" href="see_more_actualite.php?titre='.$row['titre'].'" class="btn btn-outline-info">LIRE LA SUITE</a>
                                    </div>
                                </div>
                            </div>';
                        }
                    // }
            ?>
        </div>

        
    </div>
<?php
    include("footer.php");
?>
