<?php  
/*$dbhost='mysql.hostinger.es';/*nombre de servidor*/  
$dbhost='localhost';
$dbusername='root';/*usuario de base de datos*/  
$dbuserpass='';/*contraseña, la deje en blanco para pruebas*/  
$dbname='practicantes';/*nombre de la base de datos*/  	  
$con = mysqli_connect ($dbhost, $dbusername, $dbuserpass) or die("Error al intentar conectarse a la BD");/*creamos el enlace a la bd*/  
?>