<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Registro de clientes</title>
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
function chequear()
 {
 	if (document.formulario2.k2.checked)
 	{
 	 document.formulario2.boton.disabled  = false;
 	 }
    else
      {
	   document.formulario2.boton.disabled  = true;
	  }

  }
function validarvacios()
{

 	if(confirm('Desea registrar los datos'))
 	{
	document.formulario2.ir.value="write";
   	document.formulario2.submit();
	}
  }


jQuery(function($){
	$("#codigo").mask("aa99999");   //formato de carnet
	
	$.mask.definitions['~']='[27]';
	$("#telefono").mask("~999-9999"); //formato de telefono
	
	$("#dui").mask("99999999-9"); //formato de DUI

});



</script>

</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1>REGISTRO DE CLIENTES<br />
</h1>
<form name="formulario2" id="formulario2" method="POST" action="<?php $PHP_SELF ?>">
<input type=hidden name="ir">
	<div  class="accordion" style="margin: auto; width: 50%; font-size: 13px;"  >
    <h3><a href="#">Datos de la Cuenta</a></h3>
    <div >
		
		<table class=" form" >
				<tr>
			<td  class="label"><label>Escoge login de usuario</label></td>
			<td class="control">
			<input type="text" name="user"   size="20" onblur="vusuario(this.form.user.value,this.form.user)" tabindex="1"></td>
		</tr>
		<tr>
			<td  class="label"><label>Escoge contrase&ntilde;a</label></td>
			<td  class="control">
			<input type="password" name="passwrd1" size="20" onblur="vcontra(this.form.passwrd1.value,this.form.passwrd1)" tabindex="2"></td>
		</tr>
		<tr>
			<td class="label" ><label>Verifica contrase&ntilde;a</label></td>
			<td class="control">
			<input type="password" name="passwrd2" size="20" onblur="vcontra1(this.form.passwrd2.value,this.form.passwrd2,this.form.passwrd1.value,this.form.passwrd1)" tabindex="3"></td>
		</tr>
        </table>
        </div>
         <h3><a href="#"> Datos Personales</a></h3>
        <div >
        <table  class=" form" >
		<tr>
			<td  ><label>Nombre</label></td>
			<td class="label">
			<input type="text" name="nombre" size="40" onblur="vnombre(this.form.nombre.value,this.form.nombre)" tabindex="4"></td>
		</tr>
        <tr>
			<td width="580" class="der" ><label>Apellido</label></td>
			<td width="580">
			<input type="text" name="apellido" size="40" onblur="vnombre(this.form.apellido.value,this.form.apellido)" tabindex="4"></td>
		</tr>
		<tr>
			<td width="580"  height="24" class="der"><label>Tel&eacute;fono</label></td>
			<td width="580" height="24">
			<input type="text" name="tel" size="22" id="telefono"  maxlength="9" onblur="vtel(this.form.tel.value,this.form.tel)" tabindex="5" lt="(2/7)999-9999" title="(2/7)999-9999" placeholder="(2/7)999-9999"></td>
		</tr>
		<tr>
			<td width="580" class="der"><label>Direcci&oacute;n</label></td>
			<td width="580"><textarea rows="2" name="direccion" cols="29" tabindex="6"></textarea></td>
		</tr>
        <tr>
        <td class="label"><label>Genero</label></td>
        <td class="control"><select name="genero">
        							<option value="m">Masculino</option>
        							<option value="f">Femenino</option>
        							</select></td>
                                    </tr>
		<tr>
			<td class="label"><label>E-mail</label></td>
			<td class="control">
			<input type="text" name="email" size="30" onblur="vemail(this.form.email.value,this.form.email)" maxlength="25" title="ejemplo555@hotmail.com" placeholder="ejemplo555@hotmail.com">
            
                    
            </td>
		</tr>
        <tr>
          <td class="label"><label>Tipo de Documento</label></td>
          <td class="control">
            <input type="radio" value="d" name="tipo_doc" onclick="document.formulario2.dui.disabled=false;
                                                                                             document.formulario2.pasaporte.disabled=true"/>
            <label>DUI</label>
          <td colspan="2" style="text-align:left ;width: 50%">
            <input type="radio" value="p" name="tipo_doc" onclick="document.formulario2.pasaporte.disabled=false;
           document.formulario2.dui.disabled=true"/>
              <label>PASAPORTE</label>
              
          <tr>        
        <td class="label"><label>Numero de documento</label></td>
        <td class="control"><input type="text" name="dui" onBlur="vdui(this.form.dui.value,this.form.dui)" title="99999999-9" placeholder="99999999-9" disabled /></td>
        <td class="control"><input type="text" name="pasaporte" disabled /></td>
        </tr>                       
		<tr>
			<td width="580" colspan="2" class="accordion"><input type="checkbox" name="k2" value="ON"  tabindex="8"  onClick ="chequear()">Declaro que la información es verídica</td>
		</tr>
		<tr>
			<td colspan="2">
			<p align="center"><input type="button" value="Registrarse" name="boton" onclick="validarvacios()" tabindex="9" disabled></td>
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
if ((isset($_POST['ir']))&&($_POST['ir']=="write"))
{
include("../archivos/conexion.inc");
$query1="SELECT * from cliente";
$result1=mysql_query($query1);
$registros=mysql_num_rows($result1);
$codigo="100".$registros+1; 



//consulta para verificar que el login del usuario no exista
$consul = mysql_query("SELECT usuario FROM cliente WHERE trim(usuario)=trim('$_POST[user]') ",$conexion);

if($consul === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
//si encuentra un login igual:
if( $row = mysql_fetch_array($consul) )
{
echo " <script language='javascript'>";
echo "alert('Ya existe ese nombre de usuario, cambielo por favor');"; //manda el mensaje
echo "document.formulario2.user.value='';"; //borra el login ingresado y recupera el resto de campos sin incluir las contraseñas
echo "document.formulario2.nombre.value='$_POST[nombre]';";
echo "document.formulario2.apellido.value='$_POST[apellido]';";
echo "document.formulario2.tel.value='$_POST[tel]';";
echo "document.formulario2.direccion.value='$_POST[direccion]';";
echo "document.formulario2.genero.value='$_POST[genero]';";
echo "document.formulario2.email.value='$_POST[email]';";
echo "document.formulario2.fecha_nacimiento.value='$_POST[fecha_nacimiento]';";
echo "document.formulario2.sangre.value='$_POST[sangre]';";
echo "document.formulario2.tipo_doc.value='$_POST[tipo_doc]';";
echo "document.formulario2.dui.value='$_POST[dui]';";
echo "document.formulario2.pasaporte.value='$_POST[pasaporte]';";
echo "</script>";
}
else
{
//sino al login igual se procede a registrar al nuevo usaurio

$inserr2=mysql_query("INSERT INTO cliente(id_cliente,nombre,apellido,telefono,direccion,sexo,tiposangre,correo,fecha_nacimiento,usuario,clave) VALUES('$_POST[user]','$_POST[nombre]','$_POST[apellido]','$_POST[tel]','$_POST[direccion]','$_POST[genero]','$_POST[sangre]','$_POST[email]','$_POST[fecha_nacimiento]','$_POST[user]','$_POST[passwrd1]')",$conexion);


# recupero el id_cliente del registro recien agregado
$id_cliente=$registros+1;

$inserr3= mysql_query("INSERT INTO tipo_documento(id_tipo_documento,id_cliente,id_empleado,numero,dui,pasaporte) VALUES(NULL,$id_cliente,NULL,'$_POST[tipo_doc]','$_POST[dui]','$_POST[pasaporte]')",$conexion);

echo " <script language='javascript'>";
echo "alert('Sus datos han sido guardados');"; //mensaje aviasndo que los datos fueron guardados


echo"location.href='registro.php';"; //redireccionando a listadoclientes.php, donde se mostrará el nuevo registro
echo "</script>";
}
}
?>