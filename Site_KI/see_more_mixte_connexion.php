   <?php
        $db = mysqli_connect("localhost", "root", "", "image_upload");
        mysqli_set_charset($db, "utf8");
        $theme = $_GET['theme'];
        $titre = $_GET['titre'];
        $result =  mysqli_query($db, "SELECT * FROM mixtes where theme='$theme' and titre='$titre'" );
        // var_dump($result);
        $row = mysqli_fetch_array($result);
        
    ?>