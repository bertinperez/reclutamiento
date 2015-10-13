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
																					
										</article>
										<article>
										<figure>
											<center><a href="#openVT"><img name="imgvacante" id="imgvacante" src="images/postulate.png"></a></center>
										</figure>
									</article>

									<div id="openVT" class="registroModal">
									<div>			
										<a href="#close" title="Close" class="close">X</a>		
										<div class="register">
												<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">
													<ul>
													    <li>
													         <h2>Crea tu perfil general</h2>				         
													    </li>											    
													    <li>
													    	<label for="universidad">Procedencia :</label>											    	
													    	 <input name="universidad" id="universidad" type="text" required/>				    	
													    	 <span class="form_hint">Introduce el nombre completo de tu escuela de procedencia.</span>		
													    </li>
													    <li>
													    	 <label for="estudio">Licenciatura :</label>											    	
													    	 <input name="estudio" id="estudio" type="text" required/>				    	
													    	 <span class="form_hint">¿Qué estudias actualmente?</span>		
													    </li>
													    <li>
													    	 <label for="origenUni">Ubicación :</label>											    	
													    	 <input name="origenUni" id="origenUni" type="text" required/>				    	
													    	 <span class="form_hint">¿En dónde se encuentra tu universidad?.</span>		
													    </li>
													    <li>
													    	 <label for="origen">Domicilio :</label>											    	
													    	 <input name="origen" id="origen" type="text" required/>				    	
													    	 <span class="form_hint">Escribe tu domicilio de procedencia.</span>		
													    </li>
													    <li>
													    	 <label for="interes">Area de interes :</label>											    	
													    	 <input name="interes" id="interes" type="text" required/>				    	
													    	 <span class="form_hint">Escribe tu area de interes de acuerdo a tus estudios.</span>		
													    </li>
														<li>																										
														    <button class="submit" type="submit" name="pubcu" id="pubcu">Enviar curriculum</button>				    												    															    															    
														</li>					
													</ul>
												</form>		
											</div>											
									</div>
								</div>					

								</div>
							</div>
							<?php  
								include("templates/sidebar.html");
								session_start();
								if(!isset($_SESSION['usuario'])) {		
									echo "<script>location.href = 'index.php'</script>";
								} else {									
									$variable = $_SESSION['usuario'];
							        $sql0 ="select nombre,apellidos from usuarios where usuario = '".$variable."';";        
							        $resul_co =mysqli_query($con,$sql0); 
							        while($row = mysqli_fetch_array($resul_co)) {
							          $nombre = $row[0]." ".$row[1];     
							        }    
							        $inicio = "uno";
							        if ($_GET['inicio'] == $inicio) {
							        	echo "<script>alertt('Bienvenido $nombre')</script>";									        	
							        }	
								}
							?>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<?php 
					include("templates/footer.html");
					if(isset($_POST['pubcu'])) {
								$usuario = $_SESSION['usuario'];								
								$sqlres = "SELECT idUsuario FROM usuarios where usuario='".$usuario."'";
								$resultres = mysqli_query($con,$sqlres);
								if($resultres) {
									while ($rowres=mysqli_fetch_row($resultres)) { 
										$idUser = $rowres[0];										
									}										
								}								
								$sqlinsert = "INSERT INTO curriculum values(null,".$idUser.",'".$_POST['universidad']."','".$_POST['estudio']."','".$_POST['origenUni']."','".$_POST['origen']."','".$_POST['interes']."','pendiente');";																
								$queryinsert = mysqli_query($con,$sqlinsert);
								if ($queryinsert) {
			                        /* Cuando el registro se guarda corractamente*/
			                        echo "<script>alert('Tu perfil ha sido enviado con éxito.');</script>";									                        
			                    } 
			                    $sqlmail = "SELECT email,nombre FROM usuarios where usuario='".$usuario."'";
								$resultmail = mysqli_query($con,$sqlmail);
								if($resultmail) {
									while ($rowmail=mysqli_fetch_row($resultmail)) { 
										$email = $rowmail[0];										
										$nombre = $rowmail[1];										
									}										
								}								
								$email = $_POST['email'];								
								$uni = $_POST['universidad'];
								$estudio = $_POST['estudio'];
								$interes = $_POST['interes'];
								$para = 'reclutamiento.vconsultores@gmail.com';	
								$titulo = 'CURRICULUM RECIBIDO';
								$header = 'From: ' . $email;
								$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Universidad:\n $uni\n Licenciatura:\n $estudio\n Area de interes:\n $interes";
								if (mail($para, $titulo, $msjCorreo, $header)) {
									
								}
							}
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