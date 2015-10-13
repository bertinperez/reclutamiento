<?php  
	include("templates/conexion.php")
?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Administrador - Practicantes Valdivieso Consultores</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="lib/alertify.js"></script>
		<link rel="stylesheet" href="themes/alertify.core.css" />
		<link rel="stylesheet" href="themes/alertify.default.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
		function objetoAjax(){
	        var xmlhttp=false;
	        try {
	               xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	        } catch (e) {
	               try {
	                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	               } catch (E) {
	                       xmlhttp = false;
	               }
	        }
	 
	        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	               xmlhttp = new XMLHttpRequest();

	        }

	        return xmlhttp;

		}

		function traerDatos2() {

		var cod = document.getElementById('nombre').value;
		var campo1 = document.getElementById("beneficio");
		var ajax2 = objetoAjax();
		 
		//se puede enviar por GET los valores tambien en este caso elegi POST
		// ajax.open("GET", "ajuste1.php?"+"valores="+cod, true);
		// ajax.send(null);
		 
		ajax2.open("POST", "templates/ajustes2.php", true);
		ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax2.send("valores="+cod);
		 
		ajax2.onreadystatechange=function() {
			if (ajax2.readyState==4)
			{					
				if(ajax2.status==200) {					 												
					campo1.value = ajax2.responseText;					 									
				} else {
					alert("Estado: " + ajax2.status + "\nMotivo: " + ajax2.statusText);
				}
			}
		}
}
	</script>
	</head>
	<body>
		<div id="page-wrapper">

			<?php		
			include("templates/menuAdministrador.html");		
			?>					

			<!-- Main -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="8u 12u(narrower)">
								<div id="content">

									<!-- Content -->

										<article>																									
											<div class="register">
												<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">
													<ul>
													    <li>
													         <h2>Actualizar Información</h2>				         
													    </li>
													    <li>
													        <label for="nombre">Beneficio # :</label>
													        <select name="nombre" id="nombre" onChange="traerDatos2();">
													        <option value="Seleccione una opción...">Seleccione una opción...</option>
																<?php  
																	$texto = "Texto";
																	$sqlllena = "SELECT idBeneficio FROM beneficios"; 
																	$resultllena = mysqli_query($con,$sqlllena);
																	if($resultllena) {
																		while ($rowllena=mysqli_fetch_row($resultllena)) { 
																			echo'<OPTION VALUE="'.$rowllena[0].'">'.$rowllena[0].'</OPTION>';		
																		}										
																	} else {

																	}
																?>
															</select>
													    </li>											    
													    <li>
													    	<label for="beneficio">Beneficio :</label>											    	
													    	 <textarea autofocus rows=15 cols=50 type="text" name="beneficio" id="beneficio"></textarea>
													    </li>
														<li>
															<button class="submit" type="submit" name="new" id="new" onclick="#openRegister">Nuevo</button>				    
															<button class="submit" type="submit" name="delete" id="delete">Eliminar</button>				    														   
														</li>					
													</ul>
												</form>		
											</div>
											<div id="openRegister" class="registroModal">
												<div>			
													<a href="#close" title="Close" class="close">X</a>		
													<div class="register">
															<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">
																<ul>
																    <li>
																         <h2>Agregar Beneficio</h2>				         
																    </li>											    
																    <li>
																    	<label for="beneficio">Beneficio :</label>											    	
																    	 <textarea autofocus rows=10 cols=50 type="text" name="newbeneficio" id="newbeneficio"></textarea>
																    </li>
																	<li>																										
																	    <button class="submit" type="submit" name="newb" id="newb">Guardar</button>				    												    															    
																	    <button class="submit" type="reset" name="reset" id="reset">Limpiar</button>				    												    															    
																	</li>					
																</ul>
															</form>		
														</div>
												</div>
											</div>	
										</article>																	

								</div>
							</div>
							<?php  
								include("templates/sidebar.html");
								session_start();
								if(!isset($_SESSION['usuario'])) {		
									echo "<script>location.href = 'index.php'</script>";
								} else {
									if(isset($_POST['delete'])) {
									$sqlDelete = "DELETE from beneficios where idBeneficio=".$_POST['nombre'];	            	
									$queryDelete = mysqli_query($link,$sqlDelete);
									if ($queryDelete) {
										echo "<script>alert('El registro ha sido eliminado.');</script>";				            
									}
									} else if(isset($_POST['new'])) {
										echo "<script>location.href = '#openRegister'</script>";          
									} else if(isset($_POST['newb'])) {
										$sqlinsert = "INSERT INTO beneficios values(null,'".$_POST['newbeneficio']."');";
										$queryinsert = mysqli_query($link,$sqlinsert);
										if ($queryinsert) {
					                        /* Cuando el registro se guarda corractamente*/
					                        echo "<script>alert('Beneficio agregado con éxito.');</script>";				
					                        
					                    }
									}																
								}								
							?>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<?php 
					include("templates/footer.html")
				?>

		</div>

		<!-- Scripts -->			
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>