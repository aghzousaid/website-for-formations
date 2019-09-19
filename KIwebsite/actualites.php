<?php
    include("header/header.php");
?>


    <script type="text/javascript">
    if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
        document.write('<link rel="stylesheet" type="text/css" href="chrome.css"/>');                    
    }

    $(function() {
        $('.scroll-down').click (function() {
            $('html, body').animate({scrollTop: $('section.ok').offset().top }, 'slow');
            return false;
        });
    });

    $(function() {
    $('a[href*=#]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
    });
    });
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
            <div class="shadow-lg p-3 mb-5  rounded">
                <center><h1 class="titre_body">NOS DERNIÈRES ACTUALITÉS</h1>
                <!-- <p>Découvrez les formations mixtes de Kamedis Institut :
                <p>3h en présentiel et 7h en non présentiel ! -->
                </center>
            </div>
        </div>
    </div>

    <section class="body_actualite">
        <center>
            <div class="row" id="first_actualites">
                <div class="col"> 
                    <div class="actualite1">

                        <div class="module_ai mid" >
                        
                        <a href="see_more_ai.php"><h2>Intelligence artificielle : sa place dans notre futur système de santé</h2></a>
                    
                            <p>
                            <div id="desc_ai">
                                            
                                <p>
                                    Des robots-chirurgiens, des implants connectés pour suivre les patients, 
                                    des médicaments livrés par des drones… Face à un développement croissant des nouvelles technologies, 
                                    l’intelligence artificielle (IA) entrainera des changements majeurs dans la gestion de notre santé.
                                </p>

                            </div>
                            
                            </p>
                        
                        </div>

                        <br style="clear: both;">

                        <!-- <DIV STYLE="position:absolute; top:1000px; left:200px; width:200px; height:25px; ">
                        <CENTER><FONT SIZE="+2" COLOR="00ff00">Looking Into The Future</FONT></CENTER>
                        </DIV> -->

                        <!-- <div style="position:relative; height:400px">
                            <div style="position:absolute;z-index:10">
                                <img src="img/Actualités/Tabac.jpg">
                            </div>
                            <div style="position:absolute;top:360px; width:600px; height:400px; z-index:1;font-size:200%">
                                <center><b>Ma maison...</b></center>
                                </div> 
                        </div> -->
                    </div>
                </div>
                <div class="col" id="col_act2">
                    <div id="actualite2">
                        <div class="module_cancer mid">
                        
                            <a href="en_savoirplus_cancer.php"><h2>Journée mondiale contre le cancer : des progrès médicaux considérables</h2></a>
                        
                                <p>
                                    <div id="desc_ai">
                                                    
                                        <p>
                                        La journée mondiale contre le cancer a lieu chaque année le 4 février. Cette journée nous rappelle 
                                        à tous l’importance de la prévention et du dépistage précoce dans la lutte contre cette maladie.
                                        </p>

                                    </div>
                                </p>
                        </div>
                    </div>
                </div>

                <div class="col" id="col_act3">
                    <!-- <div>
                        <center id="actualite3">
                                <img src="img/Actualités/Jhonny-01-01.jpg" alt="">
                                <br>
                                <TABLE BORDER="0" cellpadding="0" CELLSPACING="0">
                            <TR>

                            <TD WIDTH="500" HEIGHT="400" BACKGROUND="img/Actualités/Jhonny-01-01.jpg" VALIGN="bottom">

                            <FONT SIZE="+3" COLOR="yellow">Joe Burns at Work</FONT></TD>

                            </TR>

                            <img src="img/Actualités/Jhonny-01-01.jpg" alt="">
                        </TABLE>
                        </center>
                    </div> -->

                    <div id="actualite3">
                        <div class="module_alzheimer mid">

                            <a href="en_savoir_plus_alzheimer.php"><h2>
                            La maladie d’Alzheimer, bien plus qu’une perte de mémoire</h2></a>
                        
                            <p>
                                <div id="desc_ma" >
                                                
                                    <p>
                                    La maladie d’Alzheimer est une maladie neurodégénérative qui 
                                    touche plus de 900 000 personnes en France. Cette maladie s’accompagne 
                                    d’une perte de la mémoire, de difficultés de langage, de troubles émotionnels 
                                    et d’altération de la perception visuelle, mais aussi de perturbations 
                                    des gestes de la vie quotidienne.
                                    </p>

                                </div>
                            </p>

                        </div>

                    </div>

                </div>
            </div>
        </center>
       


        <div class="row">
            <section class="scroll">
                 <div><b id="plus_act">PLUS D'ACTUALITÉS</b></div>
                 <div id="scrollb"><a href="#end_actualites" id="scrollbtn"class="scroll-down" address="true"></a></div>


            </section>
         </div> 

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <div class="row" id="end_actualites">
                <div class="col" id="first">
                    
                        <div class="module_depression mid_d" id="module_depression">
                            <a href="see_more_depression.php"><h2 id="titre_depression">
                                Dépression ou coup de blues ?</h2></a>
                                <br>
                                <div>
                                    <p id="desc_depr">
                                    </p>
                                    <a id="see_more_depression" href="see_more_depression.php">

                                    </a>
                                </div>


                            <p>
                                <div id="desc_ai">                                                
                                    <script>

                                        $("#module_depression").mouseover(function()
                                        {
                                            $('#desc_depr')
                                            .html('Un Français sur cinq a déjà souffert ou souffrira d’une dépression au cours de sa vie.');

                                            $('#see_more_depression')
                                            .html('En savoir plus &ensp;');
                                        });


                                    </script>

                                    <script>


                                        $("#module_depression").mouseout(function()
                                        {
                                            $('#desc_depr')
                                                .html('');

                                            $('#see_more_depression')
                                            .html('');

                                        });
                                    </script>
                                </div>
                            </p>
                        </div>
                   
                </div>

                <div class="col" id="second">
                    <div class="module_grippe mid_d" id="module_grippe">
                        <a href="see_more_grippe.php"><h2 id="titre_depression">
                        La France touchée par une épidémie de grippe ?</h2></a>
                            <br><br>
                            <div>
                                <p id="desc_grippe">
                                
                                </p>
                                <a id="see_more_grippe" href="see_more_grippe.php">

                                </a>
                            </div>
                        <p>
                            <div id="desc_ai">
                                <script>

                                    $("#module_grippe").mouseover(function()
                                    {
                                        $('#desc_grippe')
                                        .html('Fièvre élevée, fatigue intense, maux de tête, toux sèche, courbatures… La grippe est de retour !');

                                        $('#see_more_grippe')
                                        .html('En savoir plus &ensp;');

                                    });
                                </script>

                                <script>
                                    $("#module_grippe").mouseout(function()
                                    {
                                        $('#desc_grippe')
                                        .html('');

                                        $('#see_more_grippe')
                                        .html('');
                                    });
                                </script>
                            </div>
                        </p>
                    </div>
                    
                </div>

                
                <div class="col" id="third">
                <div class="module_migraine mid_d" id="module_migraine">
                        <a href="see_more_migraine.php"><h2 id="titre_depression">
                        La migraine, plus qu’un mal de tête ordinaire</h2></a>
                            <br><br><br>
                            <div>
                                <p id="desc_migraine">
                                
                                </p>
                                <a id="see_more_migraine" href="see_more_migraine.php">
                                </a>
                            </div>
                        <p>
                            <div id="desc_ai">             
                                <script>
                                    $("#module_migraine").mouseover(function()
                                    {
                                        $('#desc_migraine')
                                        .html('12 % de la population souffre de douleurs migraineuses.');
                                        $('#see_more_migraine')
                                        .html('En savoir plus &ensp;');
                                    });
                                </script>

                                <script>
                                    $("#module_migraine").mouseout(function()
                                    {
                                        $('#desc_migraine')
                                            .html('');

                                        $('#see_more_migraine')
                                        .html('');
                                    });
                                </script>
                            </div>
                        </p>
                    </div>
                    
                </div>


                </div>
            </div>
        
            </div>
         
        <br><br><br><br><br>
    </section>
<?php
    include("footer/footer.php");
?>
