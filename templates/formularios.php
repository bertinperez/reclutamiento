<?php 
$dbhost='localhost';
$dbusername='root';/*usuario de base de datos*/  
$dbuserpass='';/*contraseña, la deje en blanco para pruebas*/  
$dbname='practicantes';/*nombre de la base de datos*/  	  
$con = mysqli_connect ($dbhost, $dbusername, $dbuserpass) or die("Error al intentar conectarse a la BD");/*creamos el enlace a la bd*/

if (!$con) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
/* Función que verifica si el usuario exisre */
function verify_user($user,&$result) {      
	$dbhost='localhost';
$dbusername='root';/*usuario de base de datos*/  
$dbuserpass='';/*contraseña, la deje en blanco para pruebas*/  
$dbname='practicantes';/*nombre de la base de datos*/  	  
$con = mysqli_connect ($dbhost, $dbusername, $dbuserpass) or die("Error al intentar conectarse a la BD");/*creamos el enlace a la bd*/

	if (!$con) {
	  echo "Error: Unable to connect to MySQL." . PHP_EOL;
	  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	  exit;
	}
  $sql = "SELECT usuario FROM usuarios WHERE usuario='$user'";
  $rec = mysqli_query($con,$sql);  
  $count = 0;  
  while($row = mysqli_fetch_object($rec)) {  
    $count++;  
    $result = $row;  
  }  
  if($count == 1)  {  
    return 1;  
  } else {  
    return 0;  
  }  
}

function verify_email($user,&$result) {    
	$dbhost='localhost';
$dbusername='root';/*usuario de base de datos*/  
$dbuserpass='';/*contraseña, la deje en blanco para pruebas*/  
$dbname='practicantes';/*nombre de la base de datos*/  	  
$con = mysqli_connect ($dbhost, $dbusername, $dbuserpass) or die("Error al intentar conectarse a la BD");/*creamos el enlace a la bd*/

	if (!$con) {
	  echo "Error: Unable to connect to MySQL." . PHP_EOL;
	  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	  exit;
	}
  $sql = "SELECT email FROM usuarios WHERE email='$user'";
  $rec = mysqli_query($con,$sql);  
  $count = 0;  
  while($row = mysqli_fetch_object($rec)) {  
    $count++;  
    $result = $row;  
  }  
  if($count == 1)  {  
    return 1;  
  } else {  
    return 0;  
  }  
}

/* Iniciar código para registrar un usario */
if(isset($_POST['register'])) {  //Se vaerifica si el botón register fue presionado 
	if(verify_user($_POST['user'],$result) == 1) {  		
		/* aquí entra si ya existe el usuario*/		
		echo "<script>alert('El usuario que ingreso no esta disponible.<br> Por favor ingrese otro.')</script>";				
	} else {		
		/* aquí entra si el usuario no existe */
		if(verify_email($_POST['email'],$result) == 1) {  		
		/* aquí entra si ya existe el usuario*/		
			echo "<script>alert('Ya existe un usuario con este email.<br> Por favor ingrese otro o recupera tu cuenta.')</script>";				
		} else {
			if ( $_POST['pass'] == $_POST['pass2'] ) {
			/* si las contraseñas coinciden */			
			if ( $_FILES['picture']["error"] > 0 ) {
                /* Cuando ocurre un error al guardar la imagen */
                echo "<script>alert('Error al guardar imagen.');</script>";				
            } else {
            	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png"); //Formatos permitidos para la imagen del usuario
	            $limite_kb = 16384; //Tamaño maximo de la imagen en kb
	            $data="";
                $tipo="";
                $re_user = $_POST['user'];
            	$re_pass = $_POST['pass'];
            	$re_name = $_POST['name'];
            	$re_last = $_POST['lastName'];
            	$re_email = $_POST['email'];	            	
            	$re_date = $_POST['date'];
            	$re_sex = $_POST['sex'];
            	$re_phone = $_POST['phone'];	    
	            if (in_array($_FILES['picture']['type'], $permitidos) && $_FILES['picture']['size'] <= $limite_kb * 1024) { //Verifica que el tamaño se exceda
	            	//y que el formato se encuentre dentro de los permitidos	            	
	            	$imagen_temporal  = $_FILES['picture']['tmp_name'];                     
	            	$tipo = $_FILES['picture']['type'];
	            	$fp = fopen($imagen_temporal, 'r+b');
	            	$data = fread($fp, filesize($imagen_temporal));
	            	fclose($fp);
	            	$data = mysqli_real_escape_string($con,$data);	            	        
	            	$insert_user = "INSERT INTO usuarios values(null,'".$re_user."','".$re_pass."','".$re_name."','".$re_last."','".$re_email."','".$re_date."','".$re_sex."','".$re_phone."','".$data."','".$tipo."');";	            	
					$r_query1 = mysqli_query($con,$insert_user);
					if ($r_query1) {
                        /* Cuando el registro se guarda corractamente*/
                        echo "<script>alert('Usuario registrado.');</script>";				
                        
                    } else {
                        /* Cuando ocurre un error al guardar los datoos */
                        echo "<script>alert('Ocurrio un error al intentar de dar de su usuario.');</script>";
                    }
	            } else {
	            	/* Cuando la imagen es de un formato no permitido o supera el tamaño maximo*/
	            	echo "<script>alert('Imagen no permitida');</script>";				
	            }
            }
			
		} else {			
			/* si las contraseñas no coinciden */			
			echo "<script>alert('Las contraseñas no coinciden,<br>los campos contraseña y confirmar contraseña deben ser iguales.');</script>";					
		}
		}		
	}
} else if(isset($_POST['recovery'])) {
	if(verify_email($_POST['reemail'],$result) == 1) {  		
	/* aquí entra si ya existe el usuario*/		
		$sqlres = "SELECT usuario,password FROM usuarios where email='".$_POST['reemail']."'";
		$resultres = mysqli_query($con,$sqlres);
		if($resultres) {
			while ($rowres=mysqli_fetch_row($resultres)) { 
				$reuser = $rowres[0];										
				$repass = $rowres[1];										
			}				
		}
		$email = 'reclutamiento.vconsultores@gmail.com';										
		$para = $_POST['reemail'];	
		$titulo = 'INFORMACIÓN DE CUENTA';
		$header = 'From: ' . $email;
		$msjCorreo = "Los datos de su cuenta son:\nUsuario: $reuser\n Contraseña: $repass";				
		if (mail($para, $titulo, $msjCorreo, $header)) {
			echo "<script>alert('Los datos de su cuenta se han enviado a su dirección de email.')</script>";
		}		
	} else {
		echo "<script>alert('No existe ninguna cuenta con esta dirección de correo..<br> Por favor ingrese una dirección valida.')</script>";				
	}
}

?>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<div class="login">
			<form action="" method="POST">            						
				<p>							
					<input type="text"name="userlogin" id="v_user" maxlength="25" placeholder="Usuario">
					<input type="password"name="password" id="v_password" placeholder="contraseña">              
					<input name="login" type="submit" id="v_btn_login" value="Entrar" onclick="">              
				</p>            			
			</form>	
			<p>¿No tienes un usuario?  <a href="#openRegister">Registrate ahora</a><span class="fontawesome-arrow-right"></span></p>
			<p>¿Olvidaste tus datos?  <a href="#openRecovery">Recupera tu cuenta</a><span class="fontawesome-arrow-right"></span></p>
		</div>
	</div>
</div>
<div id="openRegister" class="registroModal">
	<div>				
		<a href="#close" title="Close" class="close">X</a>		
		<div class="register">
			<form class="register_form" action="" method="POST" name="register_form" enctype="multipart/form-data">
				<ul>
				    <li>
				         <h2>Formulario de registro</h2>				         
				    </li>
				    <li>
				        <label for="name">Nombre :</label>
				        <input type="text" name="name" id="v_name" placeholder="Escribe tu nombre(s)" required/>
				        <span class="form_hint">Campo obligatorio.</span>
				    </li>
				    <li>
				        <label for="lastName">Apellidos :</label>
				        <input type="text" name="lastName" id="v_last" placeholder="Escribe tus apellidos" required/>
				        <span class="form_hint">Campo obligatorio.</span>
				    </li>
				    <li>
				    	<label for="email">E-mail :</label>
				    	<input type="email" name="email" id="v_email" placeholder="Escribe tu usuario" required/>
				    	<span class="form_hint">Formato admitido "practicantes@example.com"</span>
				    </li>
				    <li>
						<label for="user">Usuario :</label>
				    	<input type="text" name="user" id="r_user" placeholder="Escribe tu usuario." required/>
				    	<span class="form_hint">Este será el usuario que utilizarás para acceder a nuestra plataforma.</span>					    
					</li>				
					<li>
						<label for="pass">Contraseña :</label>
				    	<input type="password" name="pass" id="r_pass" placeholder="Escribe tu contraseña." required/>
				    	<span class="form_hint">No uses la contraseña de otro sitio ni una demasiado obvia, como el nombre de tu mascota.</span>					    
					</li>				
					<li>
						<label for="pass2">Confirmar contraseña :</label>
				    	<input type="password" name="pass2" id="v_pass2" placeholder="Vuelve a escribir tu contraseña." required/>
				    	<span class="form_hint">Repite exactamente la contraseña escrita arriba.</span>					    
					</li>				
					<li>
						<label for="date">Fecha de nacimiento :</label>
				    	<input type="date" name="date" id="v_date" placeholder="Escribe tu telefono." required/>
				    	<span class="form_hint">Selecciona el día, mes y año de tu fecha de nacimiento.</span>					    
					</li>	
					<li>
						<label for="sex">Sexo :</label>
				    	<select name="sex" id="v_sex" required>
							<option value="Masculino">Masculino</option>
							<option value="Femenido">Femenino</option>							
						</select>			
				    	<span class="form_hint">Selecciona el día, mes y año de tu fecha de nacimiento.</span>					    
					</li>	
					<li>
						<label for="picture">Imagen :</label>
						<input name="picture" id="v_picture" type="file"  onChange="ver(form.file.value)" required/>				    	
				    	<span class="form_hint">Usted puede selecciinar imagenes de formato jpg & png.</span>					    
					</li>						
					<li>
						<label for="phone">Telefono :</label>
				    	<input type="tel" name="phone" id="v_phone" placeholder="Escribe tu telefono."/>
				    	<span class="form_hint">Ejemplo: 9512349807.</span>					    
					</li>						
					<li>
					    <button class="submit" type="submit" name="register" id="register">Enviar datos</button>				    
					</li>					
				</ul>
			</form>		
		</div>
	</div>
</div>


<div id="openRecovery" class="registroModal">
	<div>				
		<a href="#close" title="Close" class="close">X</a>		
		<div class="register">
			<form class="register_form" action="" method="POST" name="register_form" enctype="multipart/form-data">
				<ul>
				    <li>
				         <h2>Recuperar datos</h2>				         
				    </li>				    				    
				    <li>
				    	<label for="reemail">E-mail :</label>
				    	<input type="reemail" name="reemail" id="v_email" placeholder="Escribe tu usuario" required/>
				    	<span class="form_hint">Escribe tu dirección de email.</span>
				    </li>				    
					<li>
					    <button class="submit" type="submit" name="recovery" id="recovery">Recuperar Datos</button>				    
					</li>					
				</ul>
			</form>		
		</div>
	</div>
</div>