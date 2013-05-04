<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Registro de clientes</title>

<style type="text/css">
body{
	font-family: Comic Sans MS, Arial;
}
.formulario{
	background-color: rgb(223, 241, 250);
	padding: 10px;
	width: 700px;
	margin: auto;
}
.title{
	text-align: center;
}
</style>
</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1 class="title">REGISTRO DE CLIENTES<br />
</h1>
<div class="formulario">
<form action="registro_insert.php" method="post">
<table align="center">
<tr><td>Nombres:</td><td><input type="text" name="nombres"></td><td>Apellidos:</td><td><input type="text" name="apellidos"></td></tr>
<tr><td>Telefono Fijo:</td><td><input type="text" name="fijo"></td><td>Telefono Movil:</td><td><input type="text" name="movil"></td></tr>
<tr><td>Direccion:</td><td><input type="text"name="direccion"></td></tr>
<tr><td>Fecha de Nacimiento:</td><td><input type="text" name="nacimiento"></td></tr>
<tr><td>Sexo:</td><td><input type="radio" name="sexo" value="M">Masculino</td><td><input type="radio" name="sexo" value="F">Femenino</td></tr>
<tr><td>Tipo de Usuario:</td><td><SELECT name="tipo"><OPTION value="0">Cliente</OPTION><OPTION value="1">Empleado</OPTION></SELECT></tr>
<tr><td>Alias/Nombre de Usuario:</td><td><input type="text" name="user"></td><td>Clave:</td><td><input type="password" name="pass"></td></tr>
<tr><td>Pregunta de Seguridad:</td><td><SELECT name="pregunta"><OPTION value="0">Nombre de mi mascota de la infancia</OPTION><OPTION value="1">Mi superheroe favorito</OPTION><OPTION value="2">Mi comida favorita</OPTION></SELECT></tr>
<tr><td>Respuesta:</td><td><input type="text" name="respuesta"></td></tr>
</table >
<table align="center"><tr><td><input type="submit" Value="Enviar"></td></tr></table>
</form>
</div>
</body>
</html>