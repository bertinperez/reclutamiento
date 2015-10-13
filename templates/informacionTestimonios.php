<?php	
include_once "conexion.php";  			
$idTes = $_GET['id'];
//echo "<script>alert('$idUser')</script>"; 	
?>

<div id="wrapper">
	<div class="container" id="profile">
		<div class="row divider">
			<div class="3u">
				<section>							
					<!--<p><a href="#"><img src="images/plataforma/perfil.png" alt=""></a></p>-->
					<figure>
						<img src="templates/obtenerImagenTestimonios.php?idim=<?php echo $idTes; ?>" width="100%">	
					</figure>
				</section>
			</div>
			<div class="3u">
				<section>							
					<?php						
						$sentenciates = "SELECT nombre,universidad,fecha,testimonio FROM testimonios where idTestimonio=".$idTes;
						$resulttes = mysql_query($sentenciates);
						$rowstes = mysql_num_rows($resulttes);
						if ($rowstes == 0) {    
						//echo "<li>No se han encontrado habitaciones</li>"; 	

						} else {							
							while($rowtes = mysql_fetch_array($resulttes)) {										                  
							  echo "<p>Nombre: $rowtes[0]</p>";
							  echo "<p>Universidad: $rowtes[1]</p>";
							  echo "<p>Fecha: $rowtes[2]</p>";
							  echo "<p>Testimonio: $rowtes[3]</p>";							  
							}              
						}						
						?> 			
				</section>
			</div>					
		</div>
	</div>				
