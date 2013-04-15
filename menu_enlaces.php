<?php


$array_color = array(	1=> "color_uno",
						2=> "color_dos",
						3=> "color_tres",
						4=> "color_cuatro",
						5=> "color_cinco",
						6=> "color_seis",
						7=> "color_siete",
						8=> "color_ocho"	
					);

	$sql_enlaces = "select id_enlace_p,color, nombre,nombre_directorio from enlace_principal where mostrar_enmenu =1 order by orden asc";
	
	$exec_enlaces  = mysql_query($sql_enlaces) or die (mysql_error());
	
	
	if(mysql_num_rows($exec_enlaces)){


		$y= 1;
		while($info_enlaces = mysql_fetch_array($exec_enlaces)){
		
			$clase = $array_color[$y];
			
		?>

			<div class="general_color" style="background:#<?php echo $info_enlaces['color']; ?>;">
				<div class="color_enlace" >
					<a href="http://www.enjambre.com.ve/<?php echo $info_enlaces['nombre_directorio']; ?>/index.php?id_enlace=<?php echo $info_enlaces['id_enlace_p'] ?>"><?php echo $info_enlaces['nombre']; ?></a>
				</div>
			</div>

		<?php
	
			$y++;
		}
	
	}
?>


<!--<div class="color_uno">
	<div class="color_enlace">
		<a href="audiovisuales">audiovisuales</a>
	</div>
</div>
<div class="color_dos">
	<div class="color_enlace">
		<a href="#">formaci&oacute;n</a>
	</div>
</div>
<div class="color_tres">
	<div class="color_enlace">
		<a href="#">alquiler de equipos</a>
	</div>
</div>
<div class="color_cuatro">
	<div class="color_enlace">
		<a href="#">gr&aacute;fica y editorial</a>
	</div>
</div>
<div class="color_cinco">
	<div class="color_enlace">
		<a href="#">campa&ntilde;as comunicacionales</a>
	</div>
</div>
<div class="color_seis">
	<div class="color_enlace">
		<a href="#">asesor&iacute;as de proyectos</a>
	</div>
</div>
<div class="color_siete">
	<div class="color_enlace">
		<a href="#">producci&oacute;n de eventos</a>
	</div>
</div>
<div class="color_ocho">
	<div class="color_enlace">
		<a href="#">cabina de audio</a>
	</div>
</div>-->