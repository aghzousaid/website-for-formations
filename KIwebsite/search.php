<?php 
    include("header/header.php");
?>

<script type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf('chrome')!=-1){
    document.write('<link rel="stylesheet" type="text/css" href="css/chrome.css"/>');                    
}
</script>

<section id="section_search">


		<div style="width: 700px;margin:40px auto; margin-top:auto;">

			<div>
			<p id="resultrech" style="color:white; margin-top:40mm; background-color: #14A096; height:10mm; " >RÉSULTATS DE LA RECHERCHE : </p>
			</div>
			<div id="search-result-container"  style="border:solid 1px #BDC7D8; height:auto;display:none; ">
			
			</div>

			<div class="search-result"  style="border:solid 1px #BDC7D8;display:none; ">
			Aucun résultat ...
			</div>
		</div>


		<script>
				
				function getParameter(theParameter) { 
				var params = window.location.search.substr(1).split('&');
				
				for (var i = 0; i < params.length; i++) {
					var p=params[i].split('=');
					if (p[0] == theParameter) {
					return decodeURIComponent(p[1]);
					}
				}
				return false;
				}

				
				// $(document).on("click", "#display-button" , function() { 
                    var value = getParameter('searchData');
                    if (value.length != 0) {
                        //alert(99933);
                        searchData(value);
                    } else {     
                        //  $('#search-result-container').hide();
                    } 	 
                // });

                // This function helps to send the request to retrieve data from mysql database...
                function searchData(val){
                    $('#search-result-container').show();
                    $('#search-result-container').html('<div><img src="preloader.gif" width="50px;" height="50px"> <span style="font-size: 20px;">Veuillez patienter...</span></div>');
                    $.post('controller.php',{'search-data': val}, function(data){
                                    
						if(data != "" && $.trim(data).length != 0 ){
							// $('#head_search').html(');
							$('#search-result-container').html(data);
						}
                        else{				
							$('#search-result-container').html("<div class='alert alert-warning' role='alert' style='margin-top:5mm;'> Aucun résultat ... </div>");
						}
						
                    }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                                    
                    alert(thrownError); //alert with HTTP error
                                                    
                    });
                }
		</script>

</section>

<?php 
	include("footer/footer.php");
?>