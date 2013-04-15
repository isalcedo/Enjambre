<div class="menu_uno">
	<a href="/" style="text-decoration:none"><img src="http://www.enjambre.com.ve/images/logo_enjambre.png" alt="Logo Enjambre"  border="0"/></a>
	<div class="botones">
	
	
		<?php
	
			$sql_submenu = "select titulo, url , e.nombre_directorio
							from submenu_superior as s
							join enlace_principal as e on e.id_enlace_p =s.url
							";
			$exec_submenu = mysql_query($sql_submenu) or die (mysql_error());
			
			

			while($info_submenu = mysql_fetch_Array($exec_submenu)){
		?>

			<a href="http://www.enjambre.com.ve/<?php echo $info_submenu['nombre_directorio']."/index.php?id_enlace=".$info_submenu['url']."";  ?>"><?php echo $info_submenu['titulo']; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;

			<!--<a href="http://www.enjambre.com.ve/formacion/">pr&oacute;ximos talleres</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.enjambre.com.ve/salvapantallas">salvapantalla pa' los panas</a>
			-->
		
		<?php } ?>
		
		<div class="socialmedia">
			<a href="http://www.facebook.com/profile.php?id=100002064523173" target="_blank" ><img src="http://www.enjambre.com.ve/images/icon_fb.png" alt="Facebook" /></a>
			<a href="http://vimeo.com/24419379" target="_blank" ><img src="http://www.enjambre.com.ve/images/icon_vimeo.png" alt="Vimeo" /></a>
			<a href="http://youtube.com/colectivoenjambre" target="_blank" ><img src="http://www.enjambre.com.ve/images/icon_youtube.png" alt="Youtube" /></a>
		</div>
	</div>
</div>
