<?php
include_once "conexion.php";  		
$v=$_POST["valores"];
$sqlajax = "SELECT  idUsuario FROM curriculum WHERE idCurriculum =".$v;        
$resulajax = mysqli_query($con,$sqlajax); 
while($rowajax = mysqli_fetch_array($resulajax)) {
	$idUser = $rowajax[0];
} 

$sqlajax2 = "SELECT  nombre,apellidos FROM usuarios WHERE idUsuario =".$idUser;
$resulajax2 = mysqli_query($con,$sqlajax2); 
while($rowajax2 = mysqli_fetch_array($resulajax2)) {
	$datos = "Nombre : ".$rowajax2[0]." ".$rowajax2[1]."\n";
}

$sqlajax3 = "SELECT  universidad,estudio,interes FROM curriculum WHERE idCurriculum =".$v;        
$resulajax3 = mysqli_query($con,$sqlajax3); 
while($rowajax3 = mysqli_fetch_array($resulajax3)) {
	$curriculum = $datos."Universidad de procedencia : ".$rowajax3[0]."\nLicenciatura : ".$rowajax3[1]."\nArea de interes : ".$rowajax3[2];
}

echo $curriculum;

?>
 