<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Registro de Unidad</title>
<style>
	 table.form{width: 100%}		
    td.label{text-align: left;width: 40%}
    td.control{text-align: left;width: 60%}   
</style>
<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<link rel="stylesheet" type="text/css" href="../css/blitzer/jquery-ui-1.8.16.custom.css">
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="../js/validaciones.js" type="text/javascript"></script>

<script src="../js/jquery-1.6.2.min.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $(".fecha_nac").datepicker({ 
        minDate: "-100Y", 
        maxDate: "-15Y",
        changeMonth: true,
        changeYear: true,
        showOn: "button",
		  buttonImage: "../imagenes/calendar.gif",
		  buttonImageOnly: true
    });
    $(".date-pick").datepicker({
        maxDate: "+0D",
        changeMonth: true,
        changeYear: true,
        showOn: "button",
		  buttonImage: "../imagenes/calendar.gif",
		  buttonImageOnly: true
    })
    $(".accordion").accordion({
    		autoHeight: false,
			navigation: true	
    });
});

function validarvacios()
{

 	if(confirm('Desea registrar los datos'))
 	{
	document.formulario2.ir.value="write";
   	document.formulario2.submit();
	}
  }


</script>

</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1>INGRESO DE UNIDAD<br />
</h1>
<form name="formulario2" id="formulario2" method="POST" action="<?php $PHP_SELF ?>">
<input type=hidden name="ir">
	<div  class="accordion" style="margin: auto; width: 50%; font-size: 13px;"  >
    <h3><a href="#">Datos Generales</a></h3>
           <div >
        <table  class=" form" >
        <tr>
        <td class="label"><label>Tipo Unidad</label></td>
        <td class="control"><select name="unidad">
        							<option value="m">Microbus</option>
        							<option value="p">Pickup</option>
                                    <option value="t">Taxi</option>
        							</select></td>
          </tr>
		<tr>
			<td  ><label>Placa</label></td>
			<td class="label">
			<input type="text" name="placa" size="30" title="P999-999" placeholder="P999-999"  tabindex="4"></td>
		</tr>
        <tr>
			<td width="250" class="der" ><label>Matricula</label></td>
			<td width="330">
			<input type="text" name="matricula" size="30" tabindex="4" title="P999-999" placeholder="P999-999" ></td>
		</tr>
		<tr>
			<td width="250"  height="24" class="der"><label>Tarjeta de circulaci&oacute;n</label></td>
			<td width="330" height="24">
			<input type="text" name="tarjeta" size="30" id="telefono"  maxlength="9"  tabindex="5" title="P999999-9999" placeholder="P999999-9999"></td>
		</tr>
        <tr>
			<td class="label"><label>Disponibilidad</label></td>
			<td class="control"><select name="disponibilidad">
        							<option value="di">Disponible</option>
        							<option value="no">No disponible</option>
                                    </select></td>
		</tr>
		<tr>
			<td width="250" class="der"><label>Descripci&oacute;n</label></td>
			<td width="330"><textarea rows="2" name="diescripcion" cols="29" tabindex="6"></textarea></td>
		</tr>
          <tr>
			<td width="250"  height="24" class="der"><label>Capacidad</label></td>
			<td width="330" height="24">
			<input type="text" name="capacidad" size="19" id="telefono"  maxlength="9" tabindex="5" lt="" title="" placeholder=""></td>
		</tr>          
		<tr>
			<td colspan="2">
			<p align="center"><input type="button" value="Ingresar" name="boton" onclick="validarvacios()" tabindex="9"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<a href="../index.html" class="otro">Regresar</a></td>
		</tr>

		</table></div>
  </div>
</form>

</body>

</html>



<?php
//esto significa que el usuario presionó el botón de guardar
if ($_POST['ir']=="write")
{
include("../archivos/conexion.inc");
$query1="SELECT * from unidad";
$result1=mysql_query($query1);
$registros=mysql_num_rows($result1);
$codigo="100".$registros+1; 

//consulta para verificar que el login del usuario no exista
$consul = mysql_query("SELECT placa FROM unidad WHERE trim(placa)=trim('$_POST[matricula]') ",$conexion);
//si encuentra un login igual:
if( $row = mysql_fetch_array($consul) )
{
echo " <script language='javascript'>";
echo "alert('Ya existe ese nombre de usuario, cambielo por favor');"; //manda el mensaje
echo "document.formulario2.placa.value='';"; //borra el login ingresado y recupera el resto de campos sin incluir las contraseñas
echo "document.formulario2.unidad.value='$_POST[unidad]';";
echo "document.formulario2.apellido.value='$_POST[apellido]';";
echo "document.formulario2.tel.value='$_POST[tel]';";
echo "document.formulario2.direccion.value='$_POST[direccion]';";
echo "document.formulario2.genero.value='$_POST[genero]';";
echo "document.formulario2.email.value='$_POST[email]';";
echo "document.formulario2.fecha_nacimiento.value='$_POST[fecha_nacimiento]';";
echo "document.formulario2.sangre.value='$_POST[sangre]';";
echo "document.formulario2.tipo_doc.value='$_POST[tipo_doc]';";
echo "document.formulario2.numero_tipo.value='$_POST[numero_tipo]';";
echo "</script>";
}
else
{
//sino al login igual se procede a registrar al nuevo usaurio

$inserr2=mysql_query("INSERT INTO cliente(id_cliente,nombre,apellido,telefono,direccion,sexo,correo,fecha_nacimiento,tiposangre) VALUES('$_POST[user]','$_POST[nombre]','$_POST[apellido]','$_POST[tel]','$_POST[direccion]','$_POST[genero]','$_POST[email]','$_POST[fecha_nacimiento]','$_POST[sangre]')",$conexion);


# recupero el id_cliente del registro recien agregado
$id_cliente=$registros+1;

$inserr3= mysql_query("INSERT INTO tipo_documento_cliente(id_tipo_documento_cliente,id_cliente,numero,nombre_tipo_cliente) VALUES(NULL,$id_cliente,'$_POST[numero_tipo]','$_POST[tipo_doc]')",$conexion);

$inserr= mysql_query("INSERT INTO usuario(id_usuario,clave,pseudonimo,id_cliente) VALUES('$_POST[user]',PASSWORD('$_POST[passwrd1]'),'$_POST[user]',$id_cliente)",$conexion);

echo " <script language='javascript'>";
echo "alert('Sus datos han sido guardados');"; //mensaje aviasndo que los datos fueron guardados


echo"location.href='Ingreso_Unidad.php';"; //redireccionando a listadoclientes.php, donde se mostrará el nuevo registro
echo "</script>";
}
}
?>