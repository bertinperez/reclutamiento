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
												include("templates/formularios.php");		
												include("templates/sesion.php");									
											?>											
										</article>
										<article>
											<?php										              
								              $sentencia = "SELECT idTestimonio FROM testimonios;";
								              $result = mysqli_query($con,$sentencia);
								              $rows = mysqli_num_rows($result);
								              if ($rows == 0) {    
								                //echo "<li>No se han encontrado habitaciones</li>"; 
								                
								              }  else {
								                while($row = mysqli_fetch_array($result)) {										                

								               		//include("templates/informacionTestimonios.php?id=$row[0]");
													/*<!<center>
														<img src="templates/obtenerImagenTestimonios.php?id=<?php echo $row['idTestimonio']; ?>" width="90%">
													</center>*/
											?>
											<section class="wrapper style1">
												<div class="container">
													<div class="row 200%">
														<section class="4u 12u(narrower)">
														<figure>
															<img src="templates/obtenerImagenTestimonios.php?idim=<?php echo $row[0]; ?>" width="100%">	
														</figure>
														</section>												
														<section class="4u 12u(narrower)">
															<?php						
															$sentenciates = "SELECT nombre,universidad,fecha,testimonio FROM testimonios where idTestimonio=".$row[0];
															$resulttes = mysqli_query($con,$sentenciates);
															$rowstes = mysqli_num_rows($resulttes);
															if ($rowstes == 0) {    
															//echo "<li>No se han encontrado habitaciones</li>"; 	

															} else {							
																while($rowtes = mysqli_fetch_array($resulttes)) {										                  
																  print("<p>Nombre: $rowtes[0]</p>");
																  print("<p>Universidad: $rowtes[1]</p>");
																  print("<p>Fecha: $rowtes[2]</p>");
																  print("<p>Testimonio: $rowtes[3]</p>");
																}              
															}						
															?> 			
														</section>														
													</div>
												</div>
											</section>		
											<?php										               
								                }              
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