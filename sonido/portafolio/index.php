<?php

include("../../conex.php");
include("../../admin/funciones.php");


$pathsubenlaces = "../../fotos/subenlaces/";
$pathsubenlaces2 = "../../fotos/imagenes-video/";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/ventana_modal.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="../fancybox/style_fancybox.css" />

 <script type="text/javascript">
				$(document).ready(function() {
				
				$("a.grouped_elements").fancybox({
						autoDimensions: false,
						width			:700,
						height			:400,
						hideOnOverlayClick:false,
						hideOnContentClick:false,
						showNavArrows			:false
					});

			});

			</script>


</head>

<body>

<?php

$id_enlace_s= $_GET['id_enlace_s'];

$sql_subenlaces = "select * from enlaces_secundarios where id_enlace_s ='".$id_enlace_s."'";

$exec_subenlaces = mysql_query($sql_subenlaces) or die (mysql_error());

$info_subenlaces = mysql_fetch_array($exec_subenlaces);

?>

<h1><?php echo $info_subenlaces['titulo']; ?></h1>
<!-- VER TODO EL PORTAFOLIO -->
<?php
if((empty($_GET['id_imagen_subenlace'])) and (empty($_GET['id_video_subenlace']))  ){
?>

<div class="autocien">
			

<?php

	//buscamos las imagenes
	
	$sql_imagenes = "select * from img_subenlaces where id_enlace_s = ".$id_enlace_s."";

	$exec_imagenes = mysql_query($sql_imagenes) or die (mysql_error());
	
	while($info_imagenes = mysql_fetch_array($exec_imagenes)){
	
		$foto_sub=unafoto($pathsubenlaces,$info_imagenes['id_imagen_subenlace']."-p");

		if(empty($foto_sub)){

			$foto_sub="foto.png";
		}	
	
?>

		<div class="contgrande">
		
			
			<div class="contenedor"><a  rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" ><img src="../fotos/subenlaces/<?php echo $foto_sub ?>" width="200" height="143" alt="imagen" /> </a>
			  
			</div>

	
			<div class="leyenda">
			  <p><a  rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" ><?php echo $info_imagenes['titulo_imagen']; ?></a></p>
			</div>
		
		</div>


<?php } ?>


</div>


<?php

}


if((empty($_GET['id_imagen_subenlace'])) and (empty($_GET['id_video_subenlace']))  ){
?>

<div class="autocien">



<?php

	//buscamos las imagenes
	
	$sql_videos= "select * from video_subenlaces where id_enlace_s = ".$id_enlace_s."";

	$exec_videos = mysql_query($sql_videos) or die (mysql_error());
	
	
	while($info_videos = mysql_fetch_array($exec_videos)){
	
$foto_sub=unafoto($pathsubenlaces2,$info_videos['id_video_subenlace']);
	
		$explode = explode("/",$info_videos['url_video']);
		
		$pos = count($explode)-1;
		
	?>
	
				<div class="contgrande">
				
					
					<div class="contenedor"><a rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']."&id_video_subenlace=".$info_videos['id_video_subenlace']."" ?>"><img src="../fotos/imagenes-video/<?php echo $foto_sub ?>" width="200" height="143" alt="imagen" border="0" /> </a>
					</div>
		
			
					<div class="leyenda">
					  <p><a  rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']."&id_video_subenlace=".$info_videos['id_video_subenlace']."" ?>" ><?php echo $info_videos['titulo_video']; ?></a></p>
					</div>
				
			</div>

<?php } ?>








</div>


<?php

}


	if(! empty($_GET['id_imagen_subenlace'])){
		
		$foto_sub=unafoto($pathsubenlaces,$_GET['id_imagen_subenlace']);


		$sql_imagenes_una = "select * from img_subenlaces where id_imagen_subenlace = ".$_GET['id_imagen_subenlace']."";

		$exec_imagenes_una = mysql_query($sql_imagenes_una) or die (mysql_error());

		$info_imagenes_una = mysql_fetch_array($exec_imagenes_una);
	

?>
<div><a  class="grouped_elements" rel="group1"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes_una['id_enlace_s']; ?>">Volver</a>
		</div>
		<!-- VER VIDEO o FOTO SOLO -->
		<div class="autocien" id="solo">
		<img src="../fotos/subenlaces/<?php echo $foto_sub ?>">

		<p><?php echo $info_imagenes_una['titulo_imagen'] ?></p>
		
		<p><?php echo $info_imagenes_una['texto_imagen'] ?></p>
		</div>



<?php } ?>
<?php
	if(! empty($_GET['id_video_subenlace'])){
	
		$sql_videos= "select * from video_subenlaces where id_video_subenlace = ".$_GET['id_video_subenlace']."";

		$exec_videos = mysql_query($sql_videos) or die (mysql_error());
		
	
		$info_videos = mysql_fetch_array($exec_videos);
		
		$explode = explode("/",$info_videos['url_video']);

		$pos = count($explode)-1;
?>
		<div><a  class="grouped_elements" rel="group1"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']; ?>">Volver</a>
		</div>
		
			<div>
				<?php 
							
						
					if( (array_search("youtu.be",$explode)) or (array_search("www.youtube.com",$explode)) ){
		
							if(strstr($explode[$pos],"=")){
		
								$partir = explode("=",$explode[$pos]);
		
								$valor = $partir[1];
							}else{
		
								$valor = $explode[$pos];
							}?>
		
		
						<iframe width="560" height="349" src="http://www.youtube.com/embed/<?php echo $valor; ?>" frameborder="0" allowfullscreen></iframe>
						<p><?php echo $info_videos['titulo_video']; ?></p>
						<p><?php echo $info_videos['descripcion'] ?></p>
		
					<?php 
					}elseif( (array_search("www.vimeo.com",$explode)) or ((array_search("vimeo.com",$explode))) ){?>
		
		
						<iframe src="http://player.vimeo.com/video/<?php echo $explode[$pos] ?>?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0"></iframe>
						<p><?php echo $info_videos['titulo_video']; ?></p>
						<p><?php echo $info_videos['descripcion'] ?></p>
		
					<?php
					}
		
						
			?>		
		<!-- VER VIDEO o FOTO SOLO -->
	
		</div>

<?php } ?>
</body>
</html>