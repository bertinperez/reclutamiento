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
												<h2>¿QUIÉNES SOMOS?</h2>
												<?php			
													$consulta = "SELECT nosotros FROM empresa";
													if ($resultado = mysqli_query($con, $consulta)) {

													    /* obtener el array asociativo */
													    while ($fila = mysqli_fetch_row($resultado)) {
													        //printf ("<p>$fila[0]</p>");		
													        $quienes = str_replace("\n","<br>",$fila[0]);													        
													        //echo ("<p>nl2br($fila[0])</p>"); 
													        //echo "<p>$fila[nosotros]</p>";										
													    }
													    print("<p>$quienes</p>");

													    /* liberar el conjunto de resultados */
													    //mysqli_free_result($resultado);
													}		
													/*if ($resultado = mysqli_query($con, "SELECT nosotros FROM empresa")) {
														echo "<p>$resultado[nosotros]</p>";										
													}*/						
													//$resultado = mysql_fetch_array(mysql_query("SELECT nosotros FROM empresa"));																							
												?>																				
										</article>
										<article>
											<ul class="contnedor caption">
											    <li>
											        <figure>
											            <div><img src="images/empresa/mision.png" alt="music image"></div>
											            <figcaption>
											                <h3>MISION</h3>
											                <?php
																$resultado = mysqli_fetch_array(mysqli_query($con,"SELECT mision FROM empresa"));										
																//echo "<span>$resultado[mision]</span>";
																print("<span>$resultado[mision]</span>");
															?>																		                									                        
											            </figcaption>
											        </figure>
											    </li>
											</ul>
										</article>
										<article>
											<ul class="contnedor caption">
											    <li>
											        <figure>
											            <div><img src="images/empresa/vision.png" alt="music image"></div>
											            <figcaption>
											                <h3>VISION</h3>
											                <?php
																$resultado = mysqli_fetch_array(mysqli_query($con,"SELECT vision FROM empresa"));
																print("<span>$resultado[vision]</span>");
															?>																		                									                        
											            </figcaption>
											        </figure>
											    </li>
											</ul>
										</article>
										<article>
											<ul class="contnedor caption">
											    <li>
											        <figure>
											            <div><img src="images/empresa/objetivo.png" alt="music image"></div>
											            <figcaption>
											                <h3>OBJETIVO</h3>
											                <?php
																$resultado = mysqli_fetch_array(mysqli_query($con,"SELECT objetivo FROM empresa"));										
																print("<span>$resultado[objetivo]</span>");
															?>																		                									                        
											            </figcaption>
											        </figure>
											    </li>
											</ul>
										</article>							
									<article>
											<ul class="contnedor caption">
											    <li>
											        <figure>
											            <div><img src="images/empresa/valores.png" alt="music image"></div>
											            <figcaption>
											                <h3>VALORES</h3>
											                <?php										              
												              $sentencia = "SELECT valor FROM valores;";
												              $result = mysqli_query($con,$sentencia);
												              $rows = mysqli_num_rows($result);
												              if ($rows == 0) {    
												                //echo "<li>No se han encontrado habitaciones</li>"; 
												                
												              }  else {
												                while($row = mysqli_fetch_array($result)) {										                  
												                  print("<p>$row[valor]</p>");
												                }              
												              }
												              ?>  																		                									                        
											            </figcaption>
											        </figure>
											    </li>
											</ul>
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