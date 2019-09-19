 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KAMEDIS INSTITUT</title>
        <link  rel='stylesheet'  href='style.css' type='text/css' media='all' />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
 </head>
 <body>
  <!--<div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>



<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script> -->




<!-- Updated 4.6.2016 added Pure JS and jQuery Support-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
<div class="nav-bar">
  <ul>
    <li>home</li>
    <li class="mob">profile</li>
    <li class="mob">contact</li>
    <li class="mob">about</li>
    <li class="mob">maps</li>
    <li class="active">
    	<i class="fa fa-search" aria-hidden="true"></i>
		 <div class="search-box">
    		<input type="text" placeholder=""/>
    		<input type="button" value="Search"/>
  		</div>
    </li>
  </ul>
</div>  

<script>

    $(document).ready(function() {
     
     $(".active").click(function() {
        $(".search-box").toggle();
        $("input[type='text']").focus();
      });

  });
</script>



 </body>
</html>