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
        </div>

        <div class="titre_elearning">
			<br>
            <div class="shadow-sm p-3   rounded">
                <center><h1 class="titre_body">RÉSULTATS DE LA RECHERCHE :</h1>
                <hr align="center" width="300"  border-top: "4px solid">
                </center>
            </div>
        </div>
    </div>
    
<section class="shadow-sm p-3  bg-white rounded" id="top_section_search">
<div id="section_search">


		<div id="div_container">

			<div id="search-result-container"  style="border:solid 1px #BDC7D8;color:black; height:100%; ">
			
			</div>

		</div>


		<script>
				
				function getParameter(theParameter) { 
						var params = window.location.search.substr(1).split('?');						
						for (var i = 0; i < params.length; i++) {
							var p=params[i].split('=');

							if (p[0] == theParameter) {
								p[1]= p[1].split('+').join(' ');
								return decodeURIComponent(p[1]);
							}
						}
					return false;
				}

				

				var value;
				value=getParameter('searchData');
				console.log(value);

				
				if (value.length != 0) {
					searchData(value);
				} else {     
				} 	 

                function searchData(val){
                    $('#search-result-container').show();
                    $('#search-result-container').html('<div><img src="img/preloader.gif" width="50px;" height="50px"> <span style="font-size: 20px;">Veuillez Patienter...</span></div>');
                    $.post('controller.php',{'search-data': val}, function(data){

						if(data != "" && $.trim(data).length != 0 ){
							$('#search-result-container').html("<div class='alert alert-success' role='alert' > Mot clé de la recherche : <strong>" +val+"</strong></div><div id='color_result'>" +data+"</div>");
						}

						
                    }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                                    
                    alert(thrownError); //alert with HTTP error
                                                    
                    });
                }
		</script>

</div>

</section>
<!-- <br><br> -->
<!-- <br>
		<br><br>
		<br><br> -->



<?php 
include("footer.php");

?>

