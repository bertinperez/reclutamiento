<script type="text/javascript" src="../lib/alertify.js"></script>
<link rel="stylesheet" href="../themes/alertify.core.css" />
<link rel="stylesheet" href="../themes/alertify.default.css" />
<script>
	function alert(mensaje){
				//un alert
				alertify.alert(mensaje, function () {
					//aqui introducimos lo que haremos tras cerrar la alerta.
					//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
				});
			}

	function alertt(mensaje){
		//un alert
		alertify.alert(mensaje, function () {
			//aqui introducimos lo que haremos tras cerrar la alerta.
			//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
			location.href = 'plataforma.php';
		});
	}
</script>
<!-- Header -->
				<div id="header">

					<!-- Logo -->						
						<img src="images/empresa/logo.png" width="700px" height="300px">						

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">Inicio</a></li>
								<li>
									<a>Empresa</a>
									<ul>
										<li><a href="quienesSomos.php">¿Quiénes somos?</a></li>                 
				              			<li><a href="beneficios.php">Beneficios</a></li>       
				              			<li><a href="experiencias.php">Experiencias</a></li>            
									</ul>
								</li>
								<li><a>Vacantes</a>
						          	<ul>
						          	  <li><a href="vacantes.php">Ver Vacantes</a></li>                 
						              <?php  
						              	session_start();		          
						              	$roottt = "administrador";
							          	if(isset($_SESSION['usuario']) and $_SESSION['usuario'] != $roottt) { 
							          		echo "<li><a href='plataforma.php'>Postulate</a></li>";
							          	} else if(isset($_SESSION['usuario']) and $_SESSION['usuario'] == $roottt) {				          		
							          		//echo "<li><a href='administrador.php'>Postulate</a></li>";
							          	}	else if ( !isset($_SESSION['usuario']) ){
							          	   echo "<li><a href='#openModal'>Postulate</a></li>";
							          	}
						              ?>
						          	</ul>
						          </li>
								<li><a href="requisitos.php">Requisitos</a></li>
						          <li><a href="contacto.php">Contacto</a></li>				          
						          <?php	
						          	$tipo = "logout";
						          	if ( $_GET['tipo'] == $tipo ) {
						          		echo "<script>alert('Sesion cerrada con exito')</script>";           											      
						          	}
						          	session_start();		          
						          	$roott = "administrador";
						          	if(isset($_SESSION['usuario']) and $_SESSION['usuario'] != $roott) { 
						          		echo "<li><a>Plataforma</a>";
						          		echo "<ul>";
						          		echo "<li><a href='perfil.php'>Perfil</a></li>";
						          		echo "<li><a href='mensajeria.php'>Mensajeria</a></li>";
						          		echo "<li><a href='templates/logout.php'>Salir</a></li>";
						          		echo "</ul>";
						          		echo "</li>";
						          	} else if(isset($_SESSION['usuario']) and $_SESSION['usuario'] == $roott) {				          		
						          		echo "<li><a>Plataforma</a>";
						          		echo "<ul>";
						          		echo "<li><a href='administrador.php'>Administrar</a></li>";
						          		echo "<li><a href='perfil.php'>Perfil</a></li>";
						          		echo "<li><a href='mensajeria.php'>Mensajeria</a></li>";
						          		echo "<li><a href='templates/logout.php'>Salir</a></li>";
						          		echo "</ul>";
						          		echo "</li>";
						          	}	else if ( !isset($_SESSION['usuario']) ){
						          	   echo "<li><a href='#openModal'>Plataforma</a></li>";
						          	}			          					          	
						          ?>				          
						        </ul>
						</nav>

				</div>