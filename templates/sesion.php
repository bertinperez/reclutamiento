<?php  
//session_start();  
/* Función que verifica el login */
  function login($user,$password,&$result) {  
  
$dbhost='localhost';
$dbusername='root';/*usuario de base de datos*/  
$dbuserpass='';/*contraseña, la deje en blanco para pruebas*/  
$dbname='practicantes';/*nombre de la base de datos*/  
  $con = mysqli_connect($dbhost, $dbusername, $dbuserpass, $dbname);

  if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }   
  $sql = "SELECT usuario, password FROM usuarios WHERE usuario='".$user."' AND password='".$password."';";  
  $rec = mysqli_query($con,$sql);    
  $count = 0;  
  while($row = mysqli_fetch_object($rec)) {  
    $count++;  
    $result = $row;  
  }  
  if($count == 1)  {  
    return 1;  
  }  
  else {  
    return 0;  
  } 
}  

if(!isset($_SESSION['usuario'])) { 
  if (isset($_POST['login']) ) { // Se verifica si el botón login fue presionado
    if ( login($_POST['userlogin'],$_POST['password'],$result) == 1) {
        $_SESSION['usuario'] = $result->usuario;        
        //Redirecciona a la página protegida        
        $root = "administrador";
        if ($_SESSION['usuario'] == $root) {
          echo "<script>location.href = 'administrador.php'</script>";            
        } else {
          echo "<script>location.href = 'plataforma.php?inicio=uno'</script>";          
        }
    } else {
      //Datos incorrectos
      echo "<script>alert('Los datos de usuario son incorrectos.<br>Ingrese un usuario y contraseña validos.')</script>";
    }
  }
}
?> 