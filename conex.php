<?php

// variables //////////////////////////////////////////////
/*
$server = "localhost";              	// Server Host
$user = "danielga_trade";          		// usuario database
$password = "tradequip_438";         			// password database
$database = "danielga_tradequip"; 			// database*/


/*$server	 	= "localhost";              	// Server Host
$user 		= "root";          		// usuario database
$password 	= "admin";         			// password database
$database 	= "enjambre"; 			// database
*/



$server	 	= "localhost";              	// Server Host
$user 		= "enjambre_colect";          		// usuario database
$password 	= "tyho78-LK";         			// password database
$database 	= "enjambre_colectivo"; 			// database


mysql_connect($server, $user, $password) or die("No se puede conectar a la Base de Datos. Consulte con el administrador del sistema");
mysql_select_db($database) or die("No se encuentra la Base de Datos.<br>");

?>
