<?php

$sql_contacto= "select   id_contacto,telefonos, correo, direccion
								  from contactos 
								";
								
				
$exec_contacto = mysql_query($sql_contacto);

$info_contacto = mysql_fetch_array($exec_contacto);
	

?>



<?php

	if(mysql_num_rows($exec_contacto)){

?>

<p>
	<br/>
	Direcci&oacute;n:
	<br/>
	<?php echo $info_contacto['direccion']; ?>
	<br/><br>
	Tel&eacute;fono:<?php echo $info_contacto['telefonos']; ?>			  <br />

    <strong>Correo:</strong> <a href="mailto:<?php echo $info_contacto['correo'] ?>"><?php echo $info_contacto['correo'] ?></a>	
</p>



<?php  } ?>