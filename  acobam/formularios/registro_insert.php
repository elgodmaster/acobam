<?php
//1. Crear conexión a la Base de Datos
$conexion = mysql_connect("localhost","root","");
if (!$conexion) {
die("Fallo la conexión a la Base de Datos:" . mysql_error());
}
//2. Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("acobam", $conexion);
if (!$seleccionar_bd) {
die("Fallo la selección de la Base de Datos:" . mysql_error());
}
//3. Tomar los campos provenientes del Formulario

//USUARIOS
$estado = 1;
$tipo = $_POST['tipo'];
$username = $_POST['user'];
$password = $_POST['pass'];
$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];

//CLIENTES
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fijo = $_POST['fijo'];
$movil = $_POST['movil'];
$direccion = $_POST['direccion'];
$nacimiento = $_POST['nacimiento'];
$sexo = $_POST['sexo'];

//4. Insertar campos en la Base de Datos
$insertar1 = mysql_query("INSERT INTO usuarios (estado,tipo_usuario,alias,clave,pregunta,respuesta)
VALUES (1, '{$tipo}','{$username}','{$password}','{$pregunta}','{$respuesta}')", $conexion);

$insertar2 = mysql_query("INSERT INTO clientes (Nombres, Apellidos, tel_casa, tel_celular, direccion, feha_nac, id_usuario, sexo)
VALUES ('{$nombres}','{$apellidos}','{$fijo}','{$movil}','{$direccion}','{$nacimiento}',(SELECT id_usuario FROM usuarios WHERE alias='{$username}'),'{$sexo}')", $conexion);

if (!$insertar1 && !$insertar2) {
die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
}else{
	echo 'Usuario creado satisfactoriamente';
}
//4. Cerrar conexión a la Base de Datos
mysql_close($conexion);
?>