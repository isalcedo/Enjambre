<?php

include("../../conex.php");
include("../../admin/funciones.php");


$pathsubenlaces = "../../fotos/subenlaces/";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<link rel="stylesheet" href="../css/ventana_modal.css" type="text/css" />
<script type="text/javascript" src="../admin/js/jquery/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="../fancybox/style_fancybox.css" />


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
	
	$foto_sub=unafoto($pathsubenlaces,$info_imagenes['id_imagen_subenlace']);
	
	
?>

		<div class="contgrande">
		
			
			<div class="contenedor"><img src="../fotos/subenlaces/<?php echo $foto_sub ?>" width="200" height="143" alt="imagen" /> 
			  <div class="vermas"><a  href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" target="_blank"><img src="../images/ver_mas_enjambre.png" alt="ver mas" width="38" height="38" border="0" /></a></div>
			</div>

	
			<div class="leyenda">
			  <p><a href="./portafolio/index.php?id_enlace_s=<?php echo $info_imagenes['id_enlace_s']."&id_imagen_subenlace=".$info_imagenes['id_imagen_subenlace']."" ?>" target="_blank"><?php echo $info_imagenes['titulo_imagen']; ?></a></p>
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
	
	$explode = explode("/",$info_videos['url_video']);
	
	$pos = count($explode)-1;
	
?>
		<div class="contgrande_video">
		<div class="contenedor_video">

		<iframe width="160px" height="160px" src="http://www.youtube.com/embed/<?php echo $explode[$pos] ?>" frameborder="0" allowfullscreen></iframe>
		<p><a href="index.php?id_enlace_s=<?php echo $info_videos['id_enlace_s']."&id_video_subenlace=".$info_videos['id_video_subenlace']."" ?>"><?php echo $info_videos['titulo_video']; ?></a></p>

		</div>
		</div>

<?php } ?>








</div>


<?php

}


	if(! empty($_GET['id_imagen_subenlace'])){
		
		$foto_sub=unafoto($pathsubenlaces,$_GET['id_imagen_subenlace']);


		$sql_imagenes_una = "select * from img_subenlaces where id_enlace_s = ".$_GET['id_imagen_subenlace']."";

		$exec_imagenes_una = mysql_query($sql_imagenes_una) or die (mysql_error());

		$info_imagenes_una = mysql_fetch_array($exec_imagenes_una);
	

?>

		<!-- VER VIDEO o FOTO SOLO -->
		<div class="autocien" id="solo">
		<img src="<?php echo $pathsubenlaces.$foto_sub ?>">

		<p><?php echo $info_imagenes_una['titulo'] ?></p>
		
		<p><?php echo $info_imagenes_una['descripcion'] ?></p>
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

		<!-- VER VIDEO o FOTO SOLO -->
		<div class="autocien" id="solo">
		<iframe width="560" height="349" src="http://www.youtube.com/embed/<?php echo $explode[$pos] ?>" frameborder="0" allowfullscreen></iframe>
		<p><?php echo $info_videos['titulo_video']; ?></p>
		</div>

<?php } ?>
</body>
</html>