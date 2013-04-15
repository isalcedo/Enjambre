<?php

include("conex.php");
include("./admin/funciones.php");

$pathsalvapantallas= "fotos/palospanas/";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
    <head>
        <meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />
        <meta http-equiv="expires" content="-1" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <link type="text/css" href="css/estilos.css" rel= "stylesheet" />
        <link type="text/css" href="css/reset.css" rel= "stylesheet" />
    	<link href="css/slider.css" rel="stylesheet" type="text/css" />
        <title>Colectivo Enjambre</title>
        <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<script type="text/javascript">
                $(document).ready(function(){	
                    $("#slider").easySlider({
                        auto: true, 
                        continuous: true,
						prevText: 		'',
						nextText: 		'',
						speed: 			1200,
						pause:			4000,
                    });
                });	
            </script>
    </head>
    <body>
    	<!-- Contenedor general de la p�gina
    	<div class="contenedor_principal"></div>-->

    	<!-- Logo y men� de redes sociales-->
		<div class="contenedor_menu_uno">
			
			<?php 
				include("menu.php");
			?>
		</div>

		<!-- Menu principal - Colores-->
		<div class="menu_dos">
			<div class="contenedor_cuadro">
			<div class="cuadro_texto" id="cuadro_texto_index"> 
    <div id="slider"> 
      <ul>
        <?php
						$sql="SELECT * FROM banner ORDER BY id_banner DESC";
						$res=mysql_query($sql) or die (mysql_error());
						while ($row=mysql_fetch_array($res)) {
							if ($row['foto']==0) {
								$explode = explode("/",$row['url_video']);
								$pos = count($explode)-1;
								//determinar si es Youtube
								if( (array_search("youtu.be",$explode)) or (array_search("www.youtube.com",$explode)) ){
									if(strstr($explode[$pos],"=")){
										$partir = explode("=",$explode[$pos]);
										$valor = $partir[1];
									}else{
										$valor = $explode[$pos];
									}
									echo '<li><iframe width="653" height="344" src="http://www.youtube.com/embed/'.$valor.'" frameborder="0" allowfullscreen></iframe></li>';
								}
								//determinar si es Vimeo
								if (array_search("www.vimeo.com",$explode) or array_search("vimeo.com",$explode)) {
									echo '<li><iframe src="http://player.vimeo.com/video/'.$explode[$pos].'?title=0&amp;byline=0&amp;portrait=0" width="653" height="344" frameborder="0"></iframe></li>';
								}
							} else {
								$fotob=unarchivo("fotos/banners/",$row['id_banner']);
								//echo "<li>$fotob</li>"; ?>
								 <li>
								<?php if(! empty($row['link'])){ 
	
										echo  "<a href=\"".$row['link']."\">";
									}
								?>
								 
								 <img src="fotos/banners/<?php echo $fotob ?>" width="653" height="344" />
								 
								<?php if(! empty($row['link'])){ 

										echo  "</a>";
									}
								?>
								</li>
								
								<?php
							}
						}
						?>
      </ul>
    </div>
  </div>
  </div>
  	<div class="contenedor_enlaces">
			<?php
			
				include("menu_enlaces.php");
			
			?>
		<div class="sombra"></div>
		<div class="contacto"> 
    		<h2>Cont&aacute;ctenos</h2>
    		<?php include("contacto.php") ?>
  		</div>
	</div>
		</div>

		<!--Contenido pagina-->
		<div class="contenedor_general">
			<div class="talleres">

	<?php
		$sql_talleres = "select id_talleres, titulo, descripcion
									,DATE_FORMAT(fecha_desde,'%Y-%m-%d')  as fecha_desde
									,DATE_FORMAT(fecha_desde,'%Y-%m-%d')  as fecha_hasta
									from talleres order by id_talleres desc  limit 1 
									";

		$exec_talleres = mysql_query($sql_talleres) or die(mysql_error());

		$info_talleres = mysql_fetch_array($exec_talleres);?>

	<h1>Pr&oacute;ximo taller</h1>
	<p class="fecha_talleres">
		<?php if(mysql_num_rows($exec_talleres)){
		?>
		Del <?php echo $info_talleres['fecha_desde']
		?>  al  <?php echo $info_talleres['fecha_hasta']
		?>
	</p>
	<p class="titulotaller">
		<strong>
		<?php echo $info_talleres['titulo']
		?>
		</strong>
	</p>
	<p>
		<?php	echo $info_talleres['descripcion'];?>
	</p>
	<p>
		<?php }else{
echo "No hay talleres por los momentos";
}?>
	</p>

	<div class="ver_mas">
		<a href="formacion/">
		<img src="images/ver_mas_enjambre.png" alt="Ver m&aacute;s" />
		</a>
	</div>
</div>
			<div class="talleres">

				<?php						$sql_salvapantallas = "select id_salvapantallas, titulo
								from salvapantallas order by id_salvapantallas desc  limit 2 
								";
						$exec_salvapantallas = mysql_query($sql_salvapantallas) or die(mysql_error());?>
				<h1>Salvapantalla pa' los panas</h1>
				<p>
					<?php while ($info_salvapantallas = mysql_fetch_array($exec_salvapantallas)) {

					$foto=unafoto($pathsalvapantallas,$info_salvapantallas['id_salvapantallas']);

					if(! empty($foto)){
					?>

					<a href="palospanas/">
					<img src="<?php	echo $pathsalvapantallas . $foto;?>" width="110" height="74" id="fotosalva">
					</a>

					<?php	}?>

					<!--<a href="salvapantallas/">Ver m&aacute;s </a>-->

					<?php	}?>
				</p>

				<div class="ver_mas">
					<a href="palospanas/">
					<img src="images/ver_mas_enjambre.png" alt="Ver m&aacute;s" />
					</a>
				</div>
			</div>
		</div>
		
<div class="pie_pagina"> 
  <?php include("pie.php"); ?>
</div>
    </body>
</html>
