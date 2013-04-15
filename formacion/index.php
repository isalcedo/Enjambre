<?php

include("../conex.php");
$pathsalvapantallas = "../fotos/talleres/";
include("../admin/funciones.php");

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
		<link rel="stylesheet" href="../fancybox/style_fancybox.css" />

	<script type="text/javascript">
			$(document).ready(function() {
			
			$("a.grouped_elements").fancybox({
									'transitionIn'	:	'elastic',
									'transitionOut'	:	'elastic',
									'speedIn'		:	600, 
									'speedOut'		:	200, 
										autoDimensions: false,
										width			:500,
										height			:400
								});

				
				
				});
	</script>
    </head>
    <body>
    	<!-- Contenedor general de la p?gina
    	<div class="contenedor_principal"></div>-->
		
    	<!-- Logo y men? de redes sociales-->
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


						$info_enlaces = mysql_fetch_Array($exec_enlaces);

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


				$sql_subenlaces = "select id_talleres,  titulo,DATE_FORMAT(fecha_desde,'%d/%m/%Y') AS fecha_desde
								, DATE_FORMAT(fecha_hasta,'%d/%m/%Y') AS fecha_hasta, descripcion
								from talleres 
								";

				$exec_subenlaces = mysql_query($sql_subenlaces) or die(mysql_error());
				
				

				$paginacion = paginacion(array('totalregistros'     		=> mysql_num_rows($exec_subenlaces),
												'regxpantalla'           	=> 4,
												'url'                     	=> "index.php?accion=ver&buscar=".$buscar."",
												 'registroactual'           =>$_GET['page'],
												));


				@mysql_data_seek($exec_subenlaces , $_GET['page'] );
				
				
				

				if(mysql_num_rows($exec_subenlaces)){
				
				
				
			?>
				  
				   
				   <?php 	
				   
				   
				   
						if(mysql_num_rows($exec_subenlaces)>=4){
				   ?>

							<div class="pagination">

								<?php echo $paginacion; ?>
							</div>
						
						
						
						<?php } 

				   
				   	$y=1;
						while( ($info_subenlaces = mysql_fetch_array($exec_subenlaces)) && ($y <=4)  ){	
						
							$foto=unafoto($pathsalvapantallas,$info_subenlaces['id_talleres']);
				    ?>
				    

				   <strong><?php echo $info_subenlaces['titulo']?></strong>  <a  class="grouped_elements" rel="group1"  href="<?php echo $pathsalvapantallas.$foto ?>">ver</a>

				   <br>
				   <?php echo $info_subenlaces['fecha_desde']?> al <?php echo $info_subenlaces['fecha_hasta'];?> <br>
				  <strong>Descripcion:</strong><?php echo $info_subenlaces['descripcion']; ?>


	        			        <?php
			        
			        	$y++;	
			        }  }  ?>
			        
			      
			      <?php  ?>
			      

				<?php }else{ ?>
				
				
				
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
		</div>
		<div class="pie_pagina">
			
			<?php
			 include("../pie.php");
			
			?>
			
		</div>
    </body>
</html>
