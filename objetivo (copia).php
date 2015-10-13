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

										<article>																									<div class="register">
												<form class="register_form" action="" method="POST" name="register_form" enctype="multipart/form-data">
													<ul>
													    <li>
													         <h2>ActualizarInformación</h2>				         
													    </li>
													    <li>
													        <label for="entrada">Objetivo :</label>
													        <?php 
														        $sql0 ="select objetivo from empresa where idEmpresa = 1";        
														        $resul_co =mysql_query($sql0); 
														        while($row = mysql_fetch_array($resul_co)) {
														       		echo "<textarea autofocus rows=30 cols=50 type=text name=entrada>" . $row[0] . "</textarea>";
														        }    
													         ?>											        					        
													    </li>											    
														<li>
														    <button class="submit" type="submit" name="update" id="update">Actualizar Información</button>				    
														</li>					
													</ul>
												</form>		
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
									if (isset($_POST['update']) )  {
									$updateqs = "UPDATE empresa SET objetivo='".$_POST['entrada']."' where idEmpresa=1";	            	
									$queryqs = mysql_query($updateqs);
									if ($queryqs) {
							            /* Cuando el registro se guarda corractamente*/
							            echo "<script>alert('Información actualizada con éxito.');</script>";				            
							        } else {
							        	echo "<script>alert('Ocurrio un error al intentar actualizar la información.<br>Por favor vuelta a intentarlo.');</script>";				            
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>