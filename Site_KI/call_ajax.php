<?php
include('config.php');
$s1=$_REQUEST["n"];
$select_query="select * from elearning where image like '%".$s1."%' or theme like '%".$s1."%' or
titre like '%".$s1."%' or duree like '%".$s1."%' or competence like '%".$s1."%' or description like '%".$s1."%' or 
deroule_pedagogique like '%".$s1."%'";
$sql=mysqli_query($link,$select_query) or die (mysqli_error($link));
$s="";
while($row=mysqli_fetch_array($sql))
{
	$s=$s."
	<a class='link-p-colr' href='view.php?titre=".$row['titre']."'>
		<div class='live-outer'>
            	<div class='live-im'>
                
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['theme']."</p>
                    </div>
                    <div class='live-product-price'>
						
                    </div>
                </div>
            </div>
	</a>
	"	;
}
echo $s;
?>