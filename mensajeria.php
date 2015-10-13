<?php  
	include("templates/conexion.php");
	function verify_email($user,&$result) {    
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
												session_start();
												$sql = "SELECT * FROM mensaje WHERE para='".$_SESSION['usuario']."' order by id desc";
												$res = mysqli_query($con,$sql);
												$id = $_GET['id'];												
												if ($id == null) {
											?>	
													<form action="" method="POST">
														<center><button class="submit" type="submit" name="newm" id="newm">Escribir mensaje</button></center>
													</form>			
													<br>									  
												  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
												    <tr>												      
												      <td width="426" align="center" valign="top"><strong>Asunto</strong></td>
												      <td width="321" align="center" valign="top"><strong>De</strong></td>
													  <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
												    </tr>
												    <?php
													$i = 0; 
													while($row = mysqli_fetch_assoc($res)){ ?>
												    <tr bgcolor="<?php if($row['leido'] == "si") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#A9F5A9"; } else { echo "#FFCAB0"; } } ?>">												      
												      <td align="center" valign="top"><a href="mensajeria.php?id=<?=$row['id']?>"><?=$row['asunto']?></a></td>
												      <td align="center" valign="top"><?=$row['de']?></td>
													  <td align="center" valign="top"><?=$row['fecha']?></td>
												    </tr>
													<?php 
													  $i++; 
													} 
													?>
											</table>
												<?php  
												} else {
													$id = $_GET['id'];
													$sql = "SELECT * FROM mensaje WHERE para='".$_SESSION['usuario']."' and id='".$id."'";
													$res = mysqli_query($con,$sql);
													$row = mysqli_fetch_assoc($res);
													?>
													<strong>De:</strong> <?=$row['de']?><br />
													<strong>Fecha:</strong> <?=$row['fecha']?><br />
													<strong>Asunto:</strong> <?=$row['asunto']?><br /><br />
													<strong>Mensaje:</strong><br />
													<?=$row['texto']?>
												<?php
													if($row['leido'] != "si") {
														mysqli_query($con,"UPDATE mensaje SET leido='si' WHERE id='".$id."'",$con);
													}
												}
												?>									
										</article>	
										<article>
											<div id="openMessage" class="registroModal">
											<div>			
												<a href="#close" title="Close" class="close">X</a>		
												<div class="register">
														<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">
															<ul>
															    <li>
															         <h2>Escribir mensaje</h2>				         
															    </li>											    
															    <li>
															    	<label for="to">Para :</label>											    	
															    	 <input name="to" id="to" type="email" placeholder="Email del destinatario." required/>				    	
															    	 <span class="form_hint">Escribe el correo electronico del destinatario.</span>		
															    </li>															    
															    <li>
															    	<label for="to">Asunto :</label>											    	
															    	 <input name="asunto" id="asunto" type="text" placeholder="Asunto." required/>				    	
															    	 <span class="form_hint">Escribe el asunto del emnsaje.</span>		
															    </li>															    
															    <li>
															    	 <label for="message">Mensaje :</label>											    	
															    	 <textarea autofocus rows=15 cols=40 type="text" name="message" id="message" required></textarea>
															    </li>
																<li>																										
																    <button class="submit" type="submit" name="send" id="send">Enviar mensaje</button>				    												    															    															    
																</li>					
															</ul>
														</form>		
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
									
								}
							?>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<?php 
					include("templates/footer.html");		
					if(isset($_POST['newm'])) {
						echo "<script>location.href = '#openMessage'</script>";
					} else if(isset($_POST['send'])) {						
						if(verify_email($_POST['to'],$result) == 1) {  	
							session_start();
							$variable = $_SESSION['usuario'];
					        $sql0 ="select nombre,apellidos from usuarios where usuario = '".$variable."';";        
					        $resul_co =mysqli_query($con,$sql0); 
					        while($row = mysqli_fetch_array($resul_co)) {
					          $nombre = $row[0]." ".$row[1];     
					        }
					        $sql1 ="select usuario from usuarios where email = '".$_POST['to']."';";        
					        $resul_co1 =mysqli_query($con,$sql1); 
					        while($row1 = mysqli_fetch_array($resul_co1)) {
					          $para = $row1[0];     
					        }
							$fecha = date("j/m/Y, g:i a");
							$insert_user = "INSERT INTO mensaje values(null,'".$para."','".$nombre."',null,'".$fecha."','".$_POST['asunto']."','".$_POST['message']."')";
							$r_query1 = mysqli_query($con,$insert_user);
							if ($r_query1) {
								$email = 'reclutamiento.vconsultores@gmail.com';										
								$para = $_POST['to'];	
								$titulo = 'NUEVO MENSAJE';
								$header = 'From: ' . $email;
								$msjCorreo = "Este es un mensaje para notificarle que usted tiene un nuevo mensaje en la página de Practicantes de Valdivieso Consultores\nPara leer su mensaje ingrese a la página ";				
								if (mail($para, $titulo, $msjCorreo, $header)) {
									echo "<script>alert('Los datos de su cuenta se han enviado a su dirección de email.')</script>";
								}
								echo "<script>alert('Mensaje enviado con éxito.')</script>";
							}
						} else {
							echo "<script>alert('No existe un usuario con esa dirección.<br>Escriba una dirección válida.')</script>";
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