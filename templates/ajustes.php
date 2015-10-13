<?php
include_once "conexion.php";  		
$v=$_POST["valores"];
$sqlajax = "SELECT texto FROM requisitos WHERE idRequisito =".$v;        
$resulajax = mysqli_query($con,$sqlajax); 
while($rowajax = mysqli_fetch_array($resulajax)) {
	echo $rowajax[0];
} 
?>
 