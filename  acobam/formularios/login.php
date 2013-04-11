<?php include('../proceso/loguear.php');
							




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
		
			if(document.getElementById('rol').value=='ninguno')
			{
				alert('Antes de Iniciar Sesión debe Elejir nivel e ingresar una contaseña');
			}
			else{
					alert('Antes de Iniciar Sesión debe ingresar una contraseña para el rol elejido');
				}
	}
	else{
		if(document.getElementById('rol').value=='ninguno')
			{
				alert('Antes de Iniciar Sesión debe Elejir un rol');
			}
			else{
				document.getElementById('login').submit();
				}
		}
	
}
</script>
</head>

<body style="background-image:url(../imagenes/Imagen fondo aurora celeste.png); 
text-align:center; 
background-repeat:no-repeat;
background-position:center;
">
<body background="../imagenes/Imagen fondo aurora celeste.png">
<br><br>

<div id="logo" class="logo" >
<form id="login" name="login" class="loginn curved" action="plantillaA.php" method="post">
	<input type="hidden" value="1" id="accion" name="accion">
	<label>ACOBAM de R.l <br>Cooperativa de Transporte<br><br><em>INICIO DE SESIÓN EMPLEADO</em><br><br></label>
    <select id="rol" name="rol"  size="1" class="curvita">
    	<option value="ninguno">Elija su Rol</option>
		<option value="nivel1">Administrador</option>
        <option value="nivel2">Gerente</option>
        <option value="nivel3">Secretaria</option>
        <option value="nivel4">Otros Empleados</option>
    </select>
    <br><br>
	<input type="password" placeholder="Contraseña" size="23" maxlength="15" id="pass" class="curvita" name="pass"> 
    <br><br>
    <input type="button" id="iniciar" name="iniciar" onClick="validar();" value="Iniciar" class="curvita">
    &nbsp;&nbsp;&nbsp;
    <input type="button" id="cancelar" value="Cancelar" name="cancelar" class="curvita" onClick="windows.location('../index.html')">
</form>
</div>
</body>
</html>