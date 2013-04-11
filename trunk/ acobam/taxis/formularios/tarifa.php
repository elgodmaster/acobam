<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Ingreso de Tarifas</title>
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


jQuery(function($){
	$("#codigo").mask("aa99999");   //formato de carnet
	
	$.mask.definitions['~']='[27]';
	$("#telefono").mask("~999-9999"); //formato de telefono
	
	$("#dui").mask("99999999-9"); //formato de DUI

});



</script>

</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1>INGRESO DE TARIFAS<br />
</h1>
<form name="formulario2" id="formulario2" method="POST" action="<?php $PHP_SELF ?>">
<input type=hidden name="ir">
	<div  class="accordion" style="margin: auto; width: 50%; font-size: 13px;"  >
    <h3><a href="#">Tarifas</a></h3>
         <div >
        <table  class=" form" >
		<tr>
			<td  ><label>Departamento</label></td>
			<td class="label">
			<input type="text" name="depto" size="25" onblur="vnombre(this.form.depto.value,this.form.depto)" tabindex="4"></td>
		</tr>
        		<tr>
			<td width="250"  height="24" class="der"><label>Municipio</label></td>
			<td width="330" height="24">
			<input type="text" name="municipio" size="25"   maxlength="50"onblur="vnombre(this.form.municipio.value,this.form.municipio)" tabindex="5"  alt="MUnicipio" title="Municipio" ></td>
		</tr>
	        
		<tr>
			<td class="label"><label>Precio</label></td>
			<td class="control">$
			<input type="text" name="precio" size="10"  maxlength="25" placeholder="00">
			Dolares 
	        </td>
		</tr>
      
		<tr>
			<td colspan="2">
			<p align="center"><input type="button" value="Guardar" class="curvita" name="boton" onclick="validarvacios()" tabindex="9" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<a href="plantillaA.php" class="otro">Regresar</a></td>
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
$query1="SELECT * from tarifa";
$result1=mysql_query($query1);
$registros=mysql_num_rows($result1);
$codigo="100".$registros+1; 

//consulta para verificar que el login del usuario no exista
$consul = mysql_query("SELECT municipio FROM tarifa WHERE trim(municipio)=trim('$_POST[municipio]') ",$conexion);
//si encuentra un login igual:
if( $row = mysql_fetch_array($consul) )
{
echo " <script language='javascript'>";
echo "alert('Ya existe ese nombre de usuario, cambielo por favor');"; //manda el mensaje
echo "document.formulario2.municipio.value='';"; //borra el login ingresado y recupera el resto de campos sin incluir las contraseñas
echo "document.formulario2.depto.value='$_POST[depto]';";
echo "document.formulario2.precio.value='$_POST[precio]';";
echo "</script>";
}
else
{
//sino al login igual se procede a registrar al nuevo usaurio

$inserr2=mysql_query("INSERT INTO tarifa(id_tarifa,departamento,municipio,precio,id_res_transporte) VALUES(NULL,'$_POST[depto]','$_POST[municipio]','$_POST[precio]',NULL)",$conexion);



echo " <script language='javascript'>";
echo "alert('Sus datos han sido guardados');"; //mensaje aviasndo que los datos fueron guardados


echo"location.href='tarifa.php';"; //redireccionando a listadoclientes.php, donde se mostrará el nuevo registro
echo "</script>";
}
}
?>