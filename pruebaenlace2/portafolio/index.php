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
<!--<script type="text/javascript" src="../../admin/js/jquery/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../../fancybox/jquery.fancybox-1.3.4.pack.js"></script>-->
<link rel="stylesheet" type="text/css" href="../../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
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


<style type="text/css">

body {
	font-family: Arial, Helvetica, sans-serif;
	color: #352525;
	margin: 0px;
	padding: 0px;
}
a {
	color: #352525;
}
a:hover {
	text-decoration: none;
}
h1 {
	color: #FFF;
	font-size: 20px;
	background-color: #352525;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 10px;
	margin-left: 0px;
	padding: 3px;
}
h2 {
	font-size: 16px;
	padding: 0px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 0px;
	width: 600px;
}
.autocien {
	float: left;
	width: 100%;
}
#solo p {
	font-size: 14px;
	text-align: left;
	padding: 0px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 20px;
	margin-left: 0px;
	width: 560px;
}
.contgrande {
	float: left;
	width: 180px;
	margin-right: 20px;
	margin-bottom: 20px;
	height: 146px;
}
.contenedor {
	float: left;
	height: 110px;
	width: 180px;
	position: relative;
	overflow: hidden;
}
.contenedor .vermas {
	float: right;
	height: 38px;
	width: 38px;
	position: absolute;
	z-index: 2;
	top: 72px;
	right: 0px;
}
.contgrande .leyenda {
	width: 100%;
	float: left;
}
.contgrande .leyenda p {
	font-size: 12px;
	text-align: center;
	padding: 0px;
	margin-top: 5px;
	margin-right: 10px;
	margin-bottom: 5px;
	margin-left: 10px;
	line-height: 13px;
}
.contenedor_general_modal {
	float: left;
	width: 600px;
	margin: 10px;
}
.volver {
	font-size: 12px;
	font-weight: bold;
	text-align: right;
	float: left;
	width: 100%;
	margin-bottom: 10px;
}
.contenedor_general_modal #solo .textoley {
	margin: 0px;
	padding: 0px;
	font-size: 13px;
	line-height: 16px;
	width: 600px;
}

</style>
<!--<link href="../../css/ventana_modal.css" rel="stylesheet" type="text/css" />-->
</head>

<body>
<div class="contenedor_general_modal">

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
		
			
			<div class="contenedor"><a class="grouped_elements" rel="group2"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" ><img src="../fotos/subenlaces/<?php echo $foto_sub ?>" width="200" height="143" alt="imagen" /></a> 

			</div>

	
			<div class="leyenda">
			  <p><a class="grouped_elements"  rel="group2" href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" ><?php echo $info_imagenes['titulo_imagen']; ?></a></p>
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
				
					<div class="contenedor">
                        <img src="../fotos/imagenes-video/<?php echo $foto_sub ?>" alt="imagen" border="0" />
                        <div class="vermas"><a rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']."&id_video_subenlace=".$info_videos['id_video_subenlace']."" ?>" ><img src="../../images/ver_mas.png" alt="ver mas" width="38" height="38" border="0" /></a></div>
					</div>
			
					<div class="leyenda">
					  <p><strong><a rel="group2" class="grouped_elements" href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']."&id_video_subenlace=".$info_videos['id_video_subenlace']."" ?>" ><?php echo $info_videos['titulo_video']; ?></a></strong></p>
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

		<div class="volver"><a  class="grouped_elements" rel="group1"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes_una['id_enlace_s']; ?>">Volver</a>
</div>

		<!-- VER VIDEO o FOTO SOLO -->
		<div class="autocien" id="solo">
		
	
		
		<img src="../fotos/subenlaces/<?php echo $foto_sub ?>">

		<h2><?php echo $info_imagenes_una['titulo_imagen'] ?></h2>
		
		<p class="textoley"><?php echo $info_imagenes_una['texto_imagen'] ?></p>
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
		<div class="volver"><a  class="grouped_elements" rel="group1"  href="./portafolio/index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']; ?>">Volver</a>
		</div>
		
		
		<div class="autocien" id="solo">

		<?php 
		
			
			if( (array_search("youtu.be",$explode)) or (array_search("www.youtube.com",$explode)) ){

					if(strstr($explode[$pos],"=")){

						$partir = explode("=",$explode[$pos]);

						$valor = $partir[1];
					}else{

						$valor = $explode[$pos];
					}?>
				
				<iframe width="600" height="338" src="http://www.youtube.com/embed/<?php echo $valor; ?>" frameborder="0" allowfullscreen></iframe>
				<h2><?php echo $info_videos['titulo_video']; ?></h2>
				<p class="textoley"><?php echo $info_videos['texto_video']; ?></p>


			<?php 
			}elseif( (array_search("www.vimeo.com",$explode)) or ((array_search("vimeo.com",$explode))) ){
			
			?>


				<iframe src="http://player.vimeo.com/video/<?php echo $explode[$pos] ?>?title=0&amp;byline=0&amp;portrait=0" width="600" height="338" frameborder="0"></iframe>
<h2><?php echo $info_videos['titulo_video']; ?></h2>
				<p class="textoley"><?php echo $info_videos['texto_video']; ?></p>

			<?php
			}

		
			?>		
		<!-- VER VIDEO o FOTO SOLO -->
	
		
		       
        
		
		</div>

<?php } ?>
</div>
</body>
</html>