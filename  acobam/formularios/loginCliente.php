<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
<link rel="shortcut icon" href="imagenes/kuser.ico" type="image/x-icon">
<script language="JavaScript" type="text/JavaScript">
function cerrar()
{
   if(confirm("�Desea realmente cerrar la sesi�n?"))
   {
   location.href='plantillaC.php'
     document.form1.ir.value='del';
     document.form1.submit();
   }
}
function entrar()
{
 if (document.form1.cusuario.value=="" || document.form1.cpassword.value=="")
 {
  alert('Debe escribir el login del usuario y la contrase�a');
 }
 else
 {
  document.form1.ir.value='ent';
  document.form1.submit();		
 }
}
function limpia()
{
	document.form1.cusuario.value="";
	document.form1.cpassword.value="";
}
</script> 
</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<form name="form1" action="plantillaC.php" method="post" >
<input type=hidden name="ir">

				
<?php if(!isset($_SESSION['login']))
{  
	
?>		
<div  class="curved loginn" >
	<table border="0" width="100%"  >
	<tr>
		<td colspan="2">
		<p >Inicio de Sesi�n</td>
	</tr>
	<tr>
		<td >Usuario</td>
		<td><input type="text" name="cusuario" size="20" tabindex="1"></td>
	</tr>
	<tr>
		<td >Contrase�a</td>
		<td class="label"><input type=password name="cpassword" size="20" tabindex="2"></td>
	</tr>
	<tr>
		<td colspan="2"><p align="center"><input type="button"  class="curvita" value="Entrar" name="B1" onclick="entrar()" tabindex="3"></td>
	</tr>
</table>
</div>
	<p align="center"><a href="registro.php"  target="_self" tabindex="4" class="otro">Registrarse</a> 
    <div  align="center">
      <p align="center"><a href="../index.html" target="_self" tabindex="4" class="otro">Inicio</a> 
  </div>
    
			<?php
			}
			if(isset($_SESSION['login']))
			{
			?>
            <br>
            <fieldset style="width: 50%;margin: auto">
  <p class="us" align="center">USUARIO: <?PHP echo $_SESSION['login'];?></p> <p align="center">
  
			</fieldset>
			
			&nbsp;<p align="center"><input type="button" value="Cerrar sesi�n" name="B1" onclick="cerrar()"> </p> 
			<?php
			
			
			}?>
             
			
			</td>
		<td width="71%" valign="top" height="464">&nbsp;</td>
	</tr>
	
</table>
</form>
</body>
</html>
<?php
if (((isset($_POST['ir']))&&($_POST['ir']=="del"))||((isset($_GET['ir']))&&($_GET['ir']=="del")))
{
			unset( $_SESSION['login'] );
             //session_destroy();
             echo "<script language='javascript'>";
             echo"location.href='loginCliente.php';";
       		 echo "</script>";
}


/*if ((isset($_POST['ir']))&&($_POST['ir']=="ent"))
{
if (isset($_POST['cusuario']) && isset($_POST['cpassword']))
{
$u=$_POST['cusuario'];
$p=$_POST['cpassword'];
include("../archivos/conexion.inc");

$consulta = mysql_query("SELECT  * FROM cliente WHERE trim(usuario)=trim('$u') && trim(clave)=PASSWORD(trim('$p')) ",$conexion);
while( $row = mysql_fetch_array($consulta))
{
         $_SESSION['login']=$u;   
        
}
*/
if (isset($_SESSION['login']))
{
 echo"<script language='javascript'>";        
         echo"location.href='plantillaC.php';";
         echo"</script>";
}/*
if (!isset($_SESSION['login']))
{
 echo " <script language='javascript'>";
         echo"alert('Datos no coinciden');";
         echo "</script>";
}
}
} */
?>