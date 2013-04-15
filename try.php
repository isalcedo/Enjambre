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