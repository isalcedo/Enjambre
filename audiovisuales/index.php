<?php

include("../conex.php");
$id_enlace = $_GET['id_enlace'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
    <head>
        <meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />
        <meta http-equiv="expires" content="-1" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <link type="text/css" href="../css/estilos.css" rel= "stylesheet" />
        <link type="text/css" href="../css/reset.css" rel= "stylesheet" />
        <title>Colectivo Enjambre</title>
        <script type="text/javascript" src="../admin/js/jquery/jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />

        
        <script type="text/javascript">
			$(document).ready(function() {
				
				$("a.grouped_elements").fancybox({
						autoDimensions: true,
						width			:650,
						hideOnOverlayClick:false,
						hideOnContentClick:false,
						showNavArrows			:false
					});
			});

			</script>

        
    </head>
    <body>
		<div class="contenedor_menu_uno">
			
			<?php 
				include("../menu.php");
			?>
			
		</div>
		
		<!-- Menu principal - Colores-->
		<div class="menu_dos">
		<div class="contenedor_cuadro">
			<div class="cuadro_texto">
						
						<?php

							$sql_primer_color = "select color from enlace_principal order by orden asc limit 1";
							$exec_primer_color = mysql_query($sql_primer_color) or die (mysql_error());
							$info_primer_color = mysql_fetch_array($exec_primer_color);
						
						?>
			
							<div class="titulo_cuadro" style="background:#<?php echo $info_primer_color['color']; ?>">
														
							  <?php
								$sql_enlaces ="select id_enlace_p , nombre, descripcion from enlace_principal where id_enlace_p='".$id_enlace."'";
			
								$exec_enlaces = mysql_query($sql_enlaces) or die (mysql_error());
			
								$info_enlaces = mysql_fetch_array($exec_enlaces);

						 	 ?>
							 	
							
								<p class="titulo"><?php  echo $info_enlaces['nombre'];?></p>
							</div>
							<div class="texto_cuadro">
							  
							  <?php
							  
							  	if(empty($_GET['id_enlace_s'])){
							  
							  ?>
							
							 <?php 
							 
							 	echo $info_enlaces['descripcion'];
							 
							 ?>

			<?php


				$sql_subenlaces = "select * from enlaces_secundarios  where id_enlace_p = '".$id_enlace."'";

				$exec_subenlaces = mysql_query($sql_subenlaces) or die(mysql_error());

				if(mysql_num_rows($exec_subenlaces)){
			?>
				  <table width="100%" cellspacing="0" id="tablaportafolio">
				    
				   
				   <?php 	
						while($info_subenlaces = mysql_fetch_array($exec_subenlaces)){				    	
				    ?>
				    
				    
				    <tr>
				      <td width="70%"><strong><?php echo $info_subenlaces['nombre']?></strong></td>
				      
				      <?php
				      ?>
				      
				      <td width="30%" align="right">
				    
				   	 <a  class="grouped_elements" rel="group1"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_subenlaces['id_enlace_s']; ?>">Ver trabajos</a>

				  	<!--<a href="./portafolio/index.php?id_enlace_s=<?php echo $info_subenlaces['id_enlace_s']; ?>">Ver trabajos</a>--></td>
				      
					</tr>
			
			        
			        
			        <?php }  }  ?>
			        
			      </table>
			      
			      <?php  ?>
			      
				  <p>&nbsp; </p>

				<?php }else{ ?>
				
				
					<!--<iframe src="./portafolio/index.php?id_enlace_s=<?php echo $_GET['id_enlace_s']?>" width="100%" height="100%">
					
					
					
					</iframe>-->
				
				<?php } ?>
				
				
				
				

				</div>
				
				

			</div>
			
		<div class="sombra_cuadro"></div><!-- Sombra del cuadro blanco -->
  </div>
  	<div class="contenedor_enlaces">
			<?php
			
				include("../menu_enlaces.php");
			
			?>
		<div class="sombra"></div>
		<div class="contacto">
			<h2>Cont&aacute;ctenos</h2>
		    
			<?php
			 include("../contacto.php");
			
			?>		    
		    
		  </div>
	</div>
		</div>
		

<!--Contenido p?gina-->
		<div class="contenedor_general">
			
			
			
		  
		</div>
		<div class="pie_pagina">
			
			<?php
			 include("../pie.php");
			
			?>
			
		</div>
    </body>
</html>
