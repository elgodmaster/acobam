<?php
	session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Mantenimiento de Motoristas</title>

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

 

jQuery(function($){

	$.mask.definitions['~']='[27]';
	$("#telefono").mask("~999-9999"); //formato de telefono
	
	$("#dui").mask("99999999-9"); //formato de DUI

});



</script>

</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
<h1>MANTENIMIENTO DE MOTORISTAS<br />
</h1>
<form name="buscar" method="post" >
<input type="hidden" name="accion" value="buscar" />
<!-- Primer Cuadrito -->
    <div style="text-align: center">
        <label>Codigo de Motorista</label>
        <input type="text" size="5" maxlength="5" name="codigo" />
        <input type="submit" class="curvita" value="Buscar" />
        <a href="../archivos/motoristas.php" target="_blank"><input type="button" class="curvita" value="Ver" /></a>
    </div>
<!-- fin del Primer Cuadrito -->
</form>
<br />
<form name="form" method="post">
    <input type="hidden" name="codigo" />
    <input type="hidden" name="id_motorista" />
    <input type="hidden" name="accion" value="actualizar" />
    
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
        <td class="label"><label>Estado Civil</label></td>
        <td class="control"><select name="estado_civil">
        							<option value="s">Soltero(a)</option>
        							<option value="c">Casado(a)</option>
                                   <option value="a">Acompa&ntilde;ado(a)</option>
        							<option value="v">Viudo(a)</option>
                                    <option value="d">Divorciado(a)</option>
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
        <td class="control"><input type="text" name="numero_tipo" onBlur="vdui(this.form.numero_tipo.value,this.form.numero_tipo)" title="99999999-9" placeholder="99999999-9" /></td>
        </tr>   
        <tr>        
        <td class="label"><label>Numero de Licencia</label></td>
        <td class="control"><input type="text" name="licencia" /></td>
        </tr>                            
		     		<tr>
			<td colspan="2">
			<p align="center"><input type="submit" class="curvita" value="Guardar" name="boton"  onClick="validarvaciosmoto()"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<a  href="plantillaA.php" class="otro">Regresar</a></td>
		</tr>

		</table>
        
        </div>
  </div>
</form>

</body>

</html>

<?php include '../archivos/actualizar_motorista.php'; ?>

