<?php

if(isset($_POST["limit"], $_POST["start"]))
{

    $db = mysqli_connect("localhost", "root", "", "image_upload");
                            mysqli_set_charset($db, "utf8");

$result =  mysqli_query($db, "SELECT * FROM mixtes ORDER BY id DESC LIMIT  ".$_POST["start"].",".$_POST["limit"]."");


$i=0;
while ($row = mysqli_fetch_array($result)) {
    $i++;
    ?>
    <script>
        function OpenNewTab7(){
            var tmp = '<?php echo 'see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'' ?>';
            window.location.href =tmp;
        }
    </script>
    <?php
    echo "<br><br><div onclick='OpenNewTab7()' id='img_div'>";
        echo"<div><img src='images/mixtes/".$row['image']."' class='img_mixte'></div>";
                echo"<div id='info'>";
                echo "<p class='titre' >".$row['titre']."</p>";
                echo "<p>Présentiel : " .$row['duree_presentiel']."h et Non Présentiel: " .$row['duree_non_presentiel']."h</p>";
                echo "<p>Public : ".htmlEntities($row['profession'])."</p>";
                echo "<p>Le : ".date("d/m/Y", strtotime(htmlEntities($row['dat'])))."</p>";
                echo "<p> ".htmlEntities($row['ville'])."</p>";
                echo'<a href="see_more_mixtes.php?theme='.$row['theme'].'&titre='.$row['titre'].'&duree_p='.$row['duree_presentiel'].'&duree_np='.$row['duree_non_presentiel'].'"> 
                En savoir plus</a><br>';
        echo'</div>';
    echo "</div>";
}
}

?>