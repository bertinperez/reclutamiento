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
										<ul class="contnedor caption">
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3814.884539883581!2d-96.72903769999999!3d17.0293326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c7228cc3f794a9%3A0x994115a94a8d9413!2sCalle+Hornos+25%2C+Rinconadas+Villas+Xoxo%2C+68166+Santa+Cruz+Xoxocotl%C3%A1n%2C+Oax.!5e0!3m2!1ses-419!2smx!4v1438290313662" width="80%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
												<p>Lic. Judith Reyes Rojas<br>Coordinadora de Vinculación y practicas.</p>
												<p>reclutamiento.vconsultores@gmail.com<br>Teléfono: (951) 205 35 79<br>Horario de atención: 9 a.m. a 6 p.m.</p>
												<p>Hornos 25, Colonia Los Laureles C.P. 71230<br>
												Santa Cruz Xoxocotlan</p>
												
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