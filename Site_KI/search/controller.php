<?php
include("DAO.php");
if(isset($_POST["search-data"])){
	
	$searchVal = trim($_POST["search-data"]);
	echo $_POST["search-data"]."said<br><br><br>";
	$dao = new DAO();
	echo $dao->searchData($searchVal);
}
else{
	echo "erro";
}

?>