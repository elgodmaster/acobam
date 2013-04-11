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
<h1>MODIFICACI&Oacute;N DE TARIFAS<br />
</h1>
<form name="buscar" method="post" >
<input type="hidden" name="accion" value="buscar" />
<!-- Primer Cuadrito -->
    <div style="text-align: center">
        <label>Id de Tarifa</label>
        <input type="text" size="5" maxlength="5" name="id_tarifa" />
        <input type="submit" class="curvita" value="Buscar" />
        <a href="../archivos/tarifas.php" target="_blank"><input type="button" class="curvita" value="Ver" /></a>
    </div>
<!-- fin del Primer Cuadrito -->
</form>
<br />
<form name="form" method="post">
    <input type="hidden" name="id_tarifa" />
       <input type="hidden" name="accion" value="actualizar" />

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
			<input type="text" name="municipio" size="25"   maxlength="9"onblur="vnombre(this.form.municipio.value,this.form.municipio)" tabindex="5"  alt="MUnicipio" title="Municipio" ></td>
		</tr>
	        
		<tr>
			<td class="label"><label>Precio</label></td>
			<td class="control">$
			<input type="text" name="precio" size="10"  maxlength="25" placeholder="00">
			D&oacute;lares 
	        </td>
		</tr>
      
		<tr>
			<td colspan="2">
			<p align="center"><input type="submit" value="Guardar" class="curvita" name="boton" onclick="validarvacios()" tabindex="9" ></td>
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


<?php include '../archivos/actualizar _tarifa.php'; ?>