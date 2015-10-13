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
 
			var cod = document.getElementById('ntestimonio').value;
			var campo1 = document.getElementById("rtestimonio");
			var ajax2 = objetoAjax();
			 
			//se puede enviar por GET los valores tambien en este caso elegi POST
			// ajax.open("GET", "ajuste1.php?"+"valores="+cod, true);
			// ajax.send(null);
			 
			ajax2.open("POST", "templates/ajustes5.php", true);
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

										<article>																									<div class="register">
												<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">
													<ul>
													    <li>
													         <h2>Agregar testimonios</h2>				         
													    </li>
													    <li>
													        <label for="name">Nombre :</label>
													        <input type="text" name="name" id="name" placeholder="Nombre de un practicante" required/>
						        							<span class="form_hint">Escribe al nombre de un practicante.</span>
													    </li>											    
													    <li>
													        <label for="university">Universidad :</label>
													        <input type="text" name="university" id="university" placeholder="Universidad" required/>
						        							<span class="form_hint">Escribe la universidad de procedencia de un practicante.</span>
													    </li>											    											    
													    <li>
													        <label for="date">Fecha :</label>
													        <input type="date" name="date" id="date" placeholder="Fecha" required/>
						        							<span class="form_hint">Selecciona la fecha del día de hoy.</span>
													    </li>											    											    
													    <li>
															<label for="picture">Imagen :</label>
															<input name="picture" id="v_picture" type="file"  onChange="ver(form.file.value)" required/>				    	
													    	<span class="form_hint">Usted puede selecciinar imagenes de formato jpg & png.</span>					    
														</li>						
														<li>
													    	<label for="testimonio">Testimonio :</label>											    	
													    	<textarea autofocus rows=15 cols=50 type="text" name="testimonio" id="testimonio" required></textarea>
													    </li>
														<li>
															<button class="submit" type="submit" name="new" id="new" onclick="#openRegister">Enviar Testimonio</button>				    													
														</li>					
													</ul>
												</form>		
											</div>	
											<div class="register">
												<form class="register_form" action="" method="POST" name="update_form" enctype="multipart/form-data">																										    
													<ul>
													    <li>
													         <h2>Eliminar Testimonio</h2>				         
													    </li>											    
													    <li>
													        <label for="ntestimonio">Testimonio # :</label>
													        <select name="ntestimonio" id="ntestimonio" onChange="traerDatos2();">
													        <option value="Selecciona una opción...">Selecciona una opción...</option>
																<?php  																		
																	$sqlllena = "SELECT idTestimonio FROM testimonios"; 
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
													    	<label for="rtestimonio">Testimonio :</label>											    	
													    	 <textarea autofocus rows=15 cols=50 type="text" name="rtestimonio" id="rtestimonio" readonly=""></textarea>
													    </li>
														<li>
															<button class="submit" type="submit" name="delete" id="delete">Elliminar Testimonio</button>																
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
									if(isset($_POST['new'])) {
									$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png"); //Formatos permitidos para la imagen del usuario
						            $limite_kb = 16384; //Tamaño maximo de la imagen en kb
						            $data="";
					                $tipo="";				                
					                if (in_array($_FILES['picture']['type'], $permitidos) && $_FILES['picture']['size'] <= $limite_kb * 1024) { //Verifica que el tamaño se exceda
						            	//y que el formato se encuentre dentro de los permitidos	            	
						            	$imagen_temporal  = $_FILES['picture']['tmp_name'];                     
						            	$tipo = $_FILES['picture']['type'];
						            	$fp = fopen($imagen_temporal, 'r+b');
						            	$data = fread($fp, filesize($imagen_temporal));
						            	fclose($fp);
						            	$data = mysqli_real_escape_string($con,$data);	            	        
											$sqlinsert = "INSERT INTO testimonios values(null,'".$_POST['name']."','".$_POST['university']."','".$_POST['date']."','".$_POST['testimonio']."','".$data."','".$tipo."');";
											$queryinsert = mysqli_query($con,$sqlinsert);
											if ($queryinsert) {
						                        /* Cuando el registro se guarda corractamente*/
						                        echo "<script>alert('Testimonio agregado con éxito.');</script>";									                        
						                    }
				                    } else {
							            	/* Cuando la imagen es de un formato no permitido o supera el tamaño maximo*/
						            	echo "<script>alert('Imagen no permitida');</script>";				
						            }
								} else if(isset($_POST['delete'])) {
									$sqlDelete = "DELETE from testimonios where idTestimonio=".$_POST['ntestimonio'];	            	
									$queryDelete = mysqli_query($con,$sqlDelete);
									if ($queryDelete) {
										echo "<script>alert('El testimonio ha sido eliminado con éxito.');</script>";											
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