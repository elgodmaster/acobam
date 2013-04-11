<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Registro de Motoristas</title>

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>


<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<link rel="stylesheet" type="text/css" href="../css/blitzer/jquery-ui-1.8.16.custom.css">
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="../js/jquery-1.6.2.min.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.form.js"></script>
<script src="../js/validaciones.js" type="text/javascript"></script>
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


jQuery(function($){
	$.mask.definitions['~']='[27]';
	$("#telefono").mask("~999-9999"); //formato de telefono
	
	$("#dui").mask("99999999-9"); //formato de DUI

});



</script>

</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1>REGISTRO DE MOTORISTAS<br />
</h1>
<form name="formulario2" id="formulario2" method="POST" action="<?php $PHP_SELF ?>">
<input type=hidden name="ir">
	<div  class="accordion" style="margin: auto; width: 50%; font-size: 13px;"  >
    <h3><a href="#">Datos Personales</a></h3>
       <div>
    	
        <table  class=" form" >
		<tr>
			<td  ><label>Nombre</label></td>
			<td class="label">
			<input type="text" name="user" size="40" onblur="vnombre(this.form.user.value,this.form.user)" tabindex="4"></td>
		</tr>
        <tr>
			<td width="250" class="der" ><label>Apellido</label></td>
			<td width="330">
			<input type="text" name="apellido" size="40" onblur="vnombre(this.form.apellido.value,this.form.apellido)" tabindex="4"></td>
		</tr>
		<tr>
			<td width="250"  height="24" class="der"><label>Tel&eacute;fono</label></td>
			<td width="330" height="24">
			<input type="text" name="tel" size="22" id="telefono"  maxlength="9" onblur="vtel(this.form.tel.value,this.form.tel)" tabindex="5" lt="(2/7)999-9999" title="(2/7)999-9999" placeholder="(2/7)999-9999"></td>
		</tr>
		<tr>
			<td width="250" class="der"><label>Direcci&oacute;n</label></td>
			<td width="330"><textarea rows="2" name="direccion" cols="29" tabindex="6"></textarea></td>
		</tr>
        <tr>
          <td class="label"><label>Genero</label></td>
          <td class="control"><select name="genero">
            <option value="m">Masculino</option>
            <option value="f">Femenino</option>
            </select></td>
        </tr>
          <tr>
            <td class="label"><label>Tipo de Documento</label></td>
            <td class="control"><select name="tipo_doc">
                                    <option value="d">DUI</option>
                                        
                                    </select></td>
                                      
          </tr>   
     <tr>        
        <td class="label"><label>Numero de documento</label></td>
        <td class="control"><input type="text" name="numero_tipo" /></td>
        </tr>   
        <tr>        
        <td class="label"><label>Numero de Licencia</label></td>
        <td class="control"><input type="text" name="licencia" /></td>
        </tr>                            
		     		<tr>
			<td colspan="2">
			<p align="center"><input type="button" value="Guardar" class="curvita" name="boton" onclick="validarvacios()" tabindex="9" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<a href="menu_motoristas.php"" class="otro">Regresar</a></td>
		</tr>

		</table>
        
        </div>
  </div>
</form>

</body>

</html>



<?php
//esto significa que el usuario presionó el botón de guardar
if ((isset($_POST['ir']))&&($_POST['ir']=="write"))
{
include("../archivos/conexion.inc");
$query1="SELECT * from motorista";
$result1=mysql_query($query1);
$registros=mysql_num_rows($result1);
    $codigo="100".$registros+1; 
	echo "<script language='javascript'>";
    echo "alert('Se va guardar voluntario $nombre con Codigo:$codigo')";
echo "</script>";


//consulta para verificar que el login del usuario no exista
$consul = mysql_query("SELECT numero FROM motorista WHERE trim(numero)=trim('$_POST[numero_tipo]') ",$conexion);
//si encuentra un login igual:
if( $row = mysql_fetch_array($consul))
{
echo " <script language='javascript'>";
echo "alert('Ya existe ese nombre de usuario, cambielo por favor');"; //manda el mensaje
echo "document.formulario2.numero_tipo.value='';";
//borra el login ingresado y recupera el resto de campos sin incluir las contraseñas
echo "document.formulario2.user.value='$_POST[user]';"; 
//echo "document.formulario2.nombre.value='$_POST[nombre]';";
echo "document.formulario2.apellido.value='$_POST[apellido]';";
echo "document.formulario2.tel.value='$_POST[tel]';";
echo "document.formulario2.direccion.value='$_POST[direccion]';";
echo "document.formulario2.genero.value='$_POST[genero]';";
echo "document.formulario2.tipo_doc.value='$_POST[tipo_doc]';";

echo "document.formulario2.licencia.value='$_POST[licencia]';";
echo "</script>";
}
else
{
//sino al login igual se procede a registrar al nuevo usaurio
$inserr2=mysql_query("INSERT INTO motorista(id_motorista,nombre,apellido,direccion,telefono,estado_civil,sexo,codigo)VALUES(NULL,'$_POST[user]','$_POST[apellido]','$_POST[direccion]','$_POST[tel]','$_POST[estado_civil]','$_POST[genero]',$codigo)",$conexion);

# recupero el id_motorista del registro recien agregado
$id_motorista=$registros+1;

$inserr= mysql_query("INSERT INTO tipo_documento_motorista (id_doc_motorista,id_motorista,numero,nombre_documento_motorista,numero_licencia) VALUES(NULL,$id_motorista,'$_POST[numero_tipo]','$_POST[tipo_doc]','$_POST[licencia]')",$conexion);


echo " <script language='javascript'>";
echo "alert('Sus datos han sido guardados');"; //mensaje aviasndo que los datos fueron guardados


echo"location.href='registro_motoristas.php';"; //redireccionando a registro_emp.php, donde se mostrará el nuevo registro
echo "</script>";
}
}
?>