<?php  
	include("templates/conexion.php");
	session_start();
	$user = $_SESSION['usuario'];							              
	$resulttado= mysqli_fetch_array(mysqli_query($con,"SELECT idUsuario FROM usuarios WHERE usuario = '".$user."'"));
	$idUser = $resulttado['idUsuario'];
?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Practicantes Valdivieso Consultores</title>
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
	</head>
	<body>
		<div id="page-wrapper">

			<?php		
			include("templates/menu.php");		
			?>					

			<!-- Main -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="8u 12u(narrower)">
								<div id="content">

									<!-- Content -->

										<article>
										<?php  
											if(!isset($_SESSION['usuario'])) {		
												echo "<script>location.href = 'index.php'</script>";
											} else {
										?>										 
											<section class="wrapper style1">
												<div class="container">
													<div class="row 200%">
														<section class="4u 12u(narrower)">
														<figure>
															<img src="usuarios/obtenerImagen.php?id=<?php echo $idUser; ?>" width="100%">	
														</figure>
														</section>												
														<section class="4u 12u(narrower)">
															<?php
															$sentencia = "SELECT idUsuario,nombre,apellidos,email,nacimiento,sexo,telefono FROM usuarios where usuario='".$user."'";
															$result = mysqli_query($con,$sentencia);
															$rows = mysqli_num_rows($result);
															if ($rows == 0) {    
															//echo "<li>No se han encontrado habitaciones</li>"; 

															}  else {
																while($row = mysqli_fetch_array($result)) {										                  
																	print("<p>Nombre: $row[1]</p>");																  
																	print("<p>Apellidos: $row[2]</p>");
																	print("<p>E-mail: $row[3]</p>");																  
																	print("<p>Fecha de nacimiento: $row[4]</p>");
																  	print("<p>Sexo: $row[5]</p>");
																  	print("<p>Telefono: $row[6]</p><br><br>");
																}              
															}
															session_start();
															$user = $_SESSION['usuario'];								
															$sqlus = "SELECT idUsuario FROM usuarios where usuario='".$user."'";
															$resulus = mysqli_query($con,$sqlus);
															if($resulus) {
																while ($rowus=mysqli_fetch_row($resulus)) { 
																	$idUs = $rowus[0];										
																}										
															}						
															$sentenciause = "SELECT universidad,estudio,ubicacion,domicilio,interes,estado FROM curriculum where idUsuario='".$idUs."'";
															$resultuse = mysqli_query($con,$sentenciause);
															$rowsuse = mysqli_num_rows($resultuse);
															if ($rowsuse == 0) {    
															//echo "<li>No se han encontrado habitaciones</li>"; 

															}  else {
																while($rowuse = mysqli_fetch_array($resultuse)) {										                  
																	print("<p>Universidad: $rowuse[0]</p>");																  
																	print("<p>Licenciatura: $rowuse[1]</p>");																  
																  	print("<p>Ubicación de la universdad: $rowuse[2]</p>");
																  	print("<p>Domicilio: $rowuse[3]</p>");
																  	print("<p>Area de interes: $rowuse[4]</p>");
																  	print("<p>Estado de solicitud: $rowuse[5]</p>");
																}              
															}
															?>
														</section>														
													</div>
												</div>
											</section>	
											<?php  
										}
											?>								
										</article>

								</div>
							</div>
							<?php  
								include("templates/sidebar.html");
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