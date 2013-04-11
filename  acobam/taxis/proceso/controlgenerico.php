<?php

	session_start();
	
	
	//Datos Locales
	$host = "localhost"; $user="root"; $pass=""; $bdatos="acobam";

	$conexion = mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($bdatos,$conexion);
	

?>