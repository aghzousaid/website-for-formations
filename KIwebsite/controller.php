<?php

include("DAO.php");
if(isset($_POST["search-data"])){
	$searchVal = $_POST["search-data"];
	$dao = new DAO();
	echo $dao->searchData($searchVal);
}

?>