<?php

include("../conex.php");
$pathsalvapantallas = "../fotos/salvapantallas/";
include("../admin/funciones.php");

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
		
		
					<?php 
						include("../menu_enlaces.php");
					?>
			
		
		</div>
		<div class="sombra"></div>
		
		

<!--Contenido p?gina-->
		<div class="contenedor_general">
			<div class="sombra_cuadro"></div><!-- Sombra del cuadro blanco -->
			<div class="cuadro_texto">
				<?php

							$sql_primer_color = "select color from enlace_principal order by orden asc limit 1";
							$exec_primer_color = mysql_query($sql_primer_color) or die (mysql_error());
							$info_primer_color = mysql_fetch_array($exec_primer_color);
						
						?>

				<div class="titulo_cuadro" style="background:#<?php echo $info_primer_color['color']; ?>">
		
					  <?php
						$sql_enlaces ="select id_enlace_p , nombre, descripcion from enlace_principal where id_enlace_p='10'";

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


				$sql_subenlaces = "select * from salvapantallas";

				$exec_subenlaces = mysql_query($sql_subenlaces) or die(mysql_error());
				
				

				$paginacion = paginacion(array('totalregistros'     		=> mysql_num_rows($exec_subenlaces),
												'regxpantalla'           	=> 7,
												'url'                     	=> "index.php?accion=ver&buscar=".$buscar."",
												 'registroactual'           =>$_GET['page'],
												));


				@mysql_data_seek($exec_subenlaces , $_GET['page'] );
				
				
				

				if(mysql_num_rows($exec_subenlaces)){
				
				
				
			?>
				  <table width="100%" cellspacing="0" id="tablaportafolio">
				  
				   
				   <?php 	
						if(mysql_num_rows($exec_subenlaces)>=7){
				   ?>

						<tr>
						<td colspan="3">
							<div class="pagination">
								<?php echo $paginacion; ?>
							</div>
						</td>
						</tr>
						
						
						
					<?php } 

				   
				   	$y=1;
						while( ($info_subenlaces = mysql_fetch_array($exec_subenlaces)) && ($y <=7)  ){	
						
							$a_inicio	="";
							$a_final 	= "";
						
							$foto=unafoto($pathsalvapantallas,$info_subenlaces['id_salvapantallas']."-1");
							$foto_mini=unafoto($pathsalvapantallas,$info_subenlaces['id_salvapantallas']);
							

							if(! empty($foto)){
							
								/*$a_inicio = "<a href=\"".$pathsalvapantallas.$foto."\" style=\"text-decoration:none\">";
								$a_final = "</a>";*/
							
							}
							
				    ?>
				    
				    <tr>
				     <td width="23%" valign="top">

							<img src="<?php echo $pathsalvapantallas.$foto_mini; ?>" width="110" border="0" align="left" hspace="15">

					  </td>

				  <?php
				  ?>
				      
				    
				      <td width="47%" valign="top"><strong><?php echo $info_subenlaces['titulo']?></strong>
				     
				      </td>
				      
				     
				      <td width="30%" align="right">
				      
				      <?php
				      	if(! empty($foto))
				      	{
				      
				      ?>
				   		<a  href="<?php echo $pathsalvapantallas.$foto ?>">Descargar</a>
				   		
				   	<?php } ?>

					</tr>
			
			        
			        
			        <?php
			        
			        	$y++;	
			        }  }  ?>
			        
			      </table>
			      
			      <?php  ?>
			      
				  <p>&nbsp; </p>

				<?php }else{ ?>
				
				
					<!--<iframe src="./portafolio/index.php?id_enlace_s=<?php echo $_GET['id_enlace_s']?>" width="100%" height="100%">
					
					
					
					</iframe>-->
				
				<?php } ?>
				
				
				
				

				</div>
				
				

			</div>
			
			
			
			
		  <div class="contacto">
			<h2>Cont&aacute;ctenos</h2>
		    
			<?php
			 include("../contacto.php");
			
			?>		    
		    
		  </div>
		</div>
		<div class="pie_pagina">
			
			<?php
			 include("../pie.php");
			
			?>
			
		</div>
    </body>
</html>
