<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style type="text/css">
		span.surlign1{ color:orange;}
		span.surlign2{ color:red;}
		span.surlign3{ color:blue;}
		span.surlign4{ color:green;}
	</style>
</head>
<body>

<?php


function getTextBetweenTags($string, $tagname) {
	$pattern = "/<$tagname ?.*>(.*)<\/$tagname>/";
	preg_match($pattern, $string, $matches);
	return $matches;
}


include("DAO.php");
if(isset($_POST["search-data"])){
	
	$searchVal = explode(" ",$_POST["search-data"]);
	
	$result="";
	$test= [];
	$tmp= [];

	$dao = new DAO();
	
	$result=$dao->searchData($searchVal);

	$y=0;
	foreach($result as $content){
		$tmp[$y] = $content[0];
		$links[$y] =  $content[1];
		$y++;
	}
	$i=0; 
	$k=0;

	$x=0;
	foreach($result as $content){
		$j=0;
		$titre = getTextBetweenTags( $content[$x], "h3");
		$theme = getTextBetweenTags( $content[$x], "h4");
		$txt = getTextBetweenTags( $content[$x], "h5");

		foreach( $searchVal as $mot){
			if(strlen($mot)>3 and !empty($result)){
				$i++;
				if($i>4){ $i=1;}
					if($j==0){
						$remplace1[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$titre);
						$remplace2[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$theme);
						$remplace3[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$txt);
					}
					else{
						$remplace1[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$remplace1[$j-1]);
						$remplace2[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$remplace2[$j-1]);
						$remplace3[$j]= str_ireplace($mot,'<span class="surlign'.$i.'"><b>'.$mot.'</b></span>',$remplace3[$j-1]);
					}

					$j++;
			}
		}

		$i=0;
	
		if($k==0){		
			$remplace4= str_ireplace($titre,$remplace1[$j-1],$tmp);
		}
		else{
			$remplace4= str_ireplace($titre,$remplace1[$j-1],$remplace6);
		}

		$remplace5= str_ireplace($theme,$remplace2[$j-1],$remplace4);
		$remplace6= str_ireplace($txt,$remplace3[$j-1],$remplace5);

		$k++;

	}


	$final_result="";
	$i=0;
	
	if(!empty($remplace6)){
		foreach($remplace6 as $final_result){ 
				echo htmlspecialchars_decode($final_result);
				echo $links[$i];
				$i++;
		}
	}
	else{
		echo "<div class='alert alert-warning' role='alert' style='margin-top:5mm;'>
		<strong>Oups!!</strong> aucun résultat n'a été trouvé, essayer un autre mot.</div> "; 
	}
	
}

?>
	
	</body>
</html>