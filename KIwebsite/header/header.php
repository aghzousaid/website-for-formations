<!Doctype html>

    <html lang='en'>
    <head>
        <title>KAMEDIS INSTITUT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">

        <link  rel='stylesheet'  href='css/style.css' type='text/css' media='all' />  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Semantic-UI-master/dist/semantic.min.css">
        <link rel="stylesheet" href="Semantic-UI-master/dist/semantic.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="search/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
    </head>
<body>

<header>
<div class="hd_div">
 <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar_zindex" >
  <a class="navbar-brand " href="index.php"><img src="img/logo_kamedis.jpg" height="10" width="10" class="logo_ki"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="nav center-block navbar-nav justify-content-between" >
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nos formations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="e-learning.php">E-Learning</a>
          <a class="dropdown-item" href="mixtes.php">Mixtes</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dpc.php">Le DPC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="actualites.php">Actualités</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Recrutement
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="intervenant.php">Devenir Intervenant</a>
          <a class="dropdown-item" href="rejoindre_ki.php">Nous Rejoindre</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Qui sommes nous ?
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="a_propos_de_nous.php">À propos de nos</a>
          <a class="dropdown-item" href="nous_valeurs.php">Nos valeurs</a>
          <a class="dropdown-item" href="nous_formateurs.php">Nos formateurs</a>
          <a class="dropdown-item" href="notre_equipe.php">Notre équipe</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
        <li class="nav-item order-2 order-md-1">
            <form class="form-inline my-2 my-lg-0 nav-link " action="search.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Recherche ..."  name="searchData">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Recherche</button>
            </form>
        </li>
        <li class="nav-item order-2 order-md-1">
            <button type="button"  id="btn_compte" class="btn btn-dark "><a href="https://elearning.kamedis-institut.fr/" class="nav-link" id="cl_btn"><span class="glyphicon glyphicon-log-in"></span> Mon compte</a><span class="caret"></span></button>
        </li>
    </ul>
  </div>
</nav>    

<script type="text/javascript">
        $(function() {
            $('.act').click(function() {
            if( $(".search-box").is(":hidden") ) 
                {
                    $(".search-box").show();
                    $("input[type='search']").focus();
                }
            else
                {
                    $(".search-box").hide();
                }
            });
        });

        $(function() {
            $(".search-box").click(function() {
                if( $(".search-box").is(":visible") ) {
                    $(".search-box").toggle();
                }
            });
        });

        window.onload = function() {
            // document.getElementById("myText").focus();
        };

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </div>    
</header>

    
       