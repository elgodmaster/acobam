<?php
 require_once("../lib/config.php");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACOBAM</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<div id="contenedor"> <!-- dentro de contenedor va el contenido de la pagina -->
	<div id="banner"> <!-- encabezado de la pagina web -->
 <img src="../imagenes/Captura.PNG" alt="Menu" width="1000" height="100"  align="top"  /> 
	</div>
    
    
    <br>
	<div id="menu"  align="center" class="menu"> <!-- este div es la barra de navegacion (menu) -->
	  	  <a class="menu" href="mantenimiento_unidad.php">| Ingreso de Unidad |</a>
	  <a class="menu" href="man_perfil.php">| Agregar perfiles|</a>
  	  <a class="menu" href="menu_motoristas.php">| Motoristas |</a>
      <a class="menu" href="<?php echo Conectar :: ruta2();?>">| Unidades |</a>
      <a class="menu" href="menu_clientes.php">| Clientes |</a>
      <a class="menu" href="ayuda.php">| Ayuda |</a>
      <a class="menu" href="../index.html">| Cerrar Sesi&oacute;n|</a>
     </div>
      
                <div id="menuacobam" class="curved" >
	<table width="100%">
<tr>
<td>
<a  href="empleado.php">
<img src="../imagenes/User - Resource.png"width="128" height="128" alt="">
</a>
<br>Ingresar Empleados
</td>
<td>
<a href="mantenimiento_empleado.php">
<img src="../imagenes/editar.jpg" width="128" height="128" alt="">
</a>
<br>Editar Empleados
</td>
<td>
<a href="reporte_empleado.php">
<img src="../imagenes/report.png" width="128" height="128" alt="">
</a>
<br>Reporte de Empleados
</td>
</tr>
</table>
</div>
			
</div>
</div>

	<div id="abajo" ><!-- Este div es el pie de página --> 
		<marquee behavior="alternate">ACOBAM de R.L &copy; COOPERATIVA DE TRANSPORTE</marquee>
	</div>
</div>
</body>
</html>