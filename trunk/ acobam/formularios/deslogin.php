<?php 
	include('../proceso/loguear.php');

	if($_SESSION["idpu657_logeado"]=="root"){
		
	}
	else{
			if($_SESSION["idpu657_logeado"]=="nivel1"){
								
			}
			else{
				if($_SESSION["idpu657_logeado"]=="nivel2"){
				
			}
			else{
				if($_SESSION["idpu657_logeado"]=="nivel3"){
				
			}
			else
		{
			if($_SESSION["idpu657_logeado"]=="nivel4"){
				
			}
			else
			{
				if($_SESSION["idpu657_logeado"]==""){
					echo "<script language='javascript'> alert('Debe loguearse antes de Cerrar una Sesión ') </script>";
					echo "<script language='javascript'> top.location.href='login.php'; </script>";
				}else{
					echo "<script language='javascript'> alert('Usted no ha iniciado sesion ') </script>";
					echo "<script language='javascript'> location.href='login.php'; </script>";
					}
			}}
		}
	}
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<script type="text/javascript">
function validar()
{
	
	if( document.login.pass.value==''){
		
			
		alert('Antes de Cerrar Sesión debe ingresar la contraseña de la sesión actual');
		document.getElementById('pass').focus();
			
	}
	else{
		
		document.getElementById('login').submit();
		}
	
	
}
</script>
</head>

<body style="background-image:url(../imagenes/Imagen fondo aurora celeste.png); 
text-align:center; 
background-repeat:no-repeat;
background-position:center;
" >
<br>

<div id="logo" class="logo" >
<form id="login" name="login"  class="loginn curved" action="menu_usuario.php" method="post">
	<input type="hidden" value="2" id="accion" name="accion">
    <label>ACOBAM de R.l <br>Cooperativa de Transporte<br><br><em>CIERRE DE SESIÓN EMPLEADO</em><br><br></label>
	
   <input type="text" value="<? echo $_SESSION['idpu657_logeado']; ?>" size="23"  disabled="true" maxlength="15" id="sesion" class="curvita" name="sesion">
    <br><br>
	<input type="password" placeholder="Contraseña" size="23" maxlength="15" id="pass" class="curvita" name="pass"> 
    <br><br>
    <input type="button" id="cerrar" name="cerrar" onClick="validar();" value="Cerrar Sesión" class="curvita">
    &nbsp;&nbsp;&nbsp;
    <input type="button" id="cancelar" value="Cancelar" name="cancelar" class="curvita">
    <br>
</form>
</div>
</body>
</html>