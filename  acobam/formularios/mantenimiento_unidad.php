<!DOCTYPE html>
<html>
<head>
<title>Mantenimiento de Unidad</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<link rel="stylesheet" type="text/css" href="../css/blitzer/jquery-ui-1.8.16.custom.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../js/calendario/calendar-green.css" title="win2k-cold-1" />

<style>
	 table.form{width: 100%}		
    td.label{text-align: left;width: 40%}
    td.control{text-align: left;width: 60%}   
</style>
<!-- JAVASCRIPT -->
<script src="../js/jquery-1.6.2.min.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.form.js"></script>
<!-- librería principal del calendario -->
<script type="text/javascript" src="../js/calendario/calendar.js"></script>

<!-- librería para cargar el lenguaje deseado -->
<script type="text/javascript" src="../js/calendario/lang/calendar-es.js"></script>

<!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código -->
<script type="text/javascript" src="../js/calendario/calendar-setup.js"></script>
<!-- agrege estos para las validaciones..  -->
<script src="../js/validaciones.js" type="text/javascript"></script>

<script type="text/javascript">

$(function()
{
    $('.date-pick').datepicker({
        maxDate: "+0D",
      changeMonth: true,
      changeYear: true,
      showOn: "button",
      buttonImage: "../imagenes/calendar.gif",
      buttonImageOnly: true
    });
    $(".accordion").accordion({
    	autoHeight: false,
	navigation: true	
    });
    $(".dialog").dialog({
        autoOpen: false,
        height: 500,
        width: 800,
        modal: true,
        buttons:{
            Aceptar: function(){
            $(this).dialog("close");
            }
        }
    });
    $(".abrir")
        .button()
        .click(function(){
            $(".dialog").dialog("open");
    });
    var opcion={target: "#turno"}
    $("#buscar").ajaxForm(opcion);
});


</script>
</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
    
<h1>MANTENIMIENTO DE UNIDAD</h1>
<br />

<form id="buscar" name="buscar" >
    <fieldset style="width: 50%;margin: auto">
      <!-- Primer Cuadrito -->
<div style="text-align: center">
<tr>
		<td align="right" height="24" width="160">Fecha:</td>
		<td height="24"><input type="text" id="campo_f" name="fecha" size="12" value= <?php echo (date('d/m/Y')); ?> readonly ><input type="button" value="..." name="fe" id="muestrac"></td>
      </tr>
      </div>
    </fieldset>
</form>
<br/>
<br/>
<form name="form" >
  <!-- Primer cuadrito -->
    <div class="accordion" style="width: 53%;margin: auto;font-size: 13px;">
    <h3>Datos </h3>
    <div>
        <table class="form">
         <tr>
                <td class="label"><label>Tipo Unidad</label></td> 
                <td class="control"><select name="unidad">
                
        							<option value="MB">Microbus</option>
        							<option value="PI">Pickup</option>
        							<option value="TA">Taxi</option>
        							</select>
          </tr>
        <tr>
        <td class="label"><label>Placa:</label>
        <td class="control"><input type="text" size="10" name="placa" maxlength="10" onBlur="vdui(this.form.dui.value,this.form.dui)" title="P999-999" placeholder="P999-999" />
		  <tr>
           <tr>
        <td class="label"><label>Matricula:</label>
        <td class="control"><input type="text" size="10" name="matricula" maxlength="10" onBlur="vdui(this.form.dui.value,this.form.dui)" title="P999-999" placeholder="P999-999" />
		  <tr>
           <tr>
        <td class="label"><label>Tarjeta de Circulaci&oacute;n:</label>
        <td class="control"><input type="text" size="10" name="tarjeta" maxlength="10" onBlur="vdui(this.form.dui.value,this.form.dui)" title="P999999-9999" placeholder="P999999-9999" />
		  <tr>
                <td class="label"><label>Tipo de Mantenimiento:</label></td> 
                <td class="control"><select name="tipmantenimiento">
                
        							<option value="EL">Electrico</option>
        							<option value="EP">Enderezado y Pintura</option>
        							<option value="ME">Mecanico</option>
                                    <option value="TP">Tapiceria</option>
        							</select>
          </tr>
          
        <tr>
        <td class="label"><label>Descripci&oacute;n: </label>
        <td class="control"><textarea rows="3" cols="25" name="dir"></textarea>
        <tr>
        <td class="label">Nombre del Taller:<td class="control"><input type="text" name="nom" size="60" maxlength="50" onBlur="vnombre(this.form.nom.value,this.form.nom)"/>
        <tr>
        <td class="label"><label>Tel&eacute;fono:</label>
        <td class="control"><input type="text" name="tf" size="9" onBlur="vtel(this.form.tf.value,this.form.tf)" maxlength="9" alt="2999-9999" title="2999-9999" placeholder="2999-9999"/>
          <br /><br />

        <tr>
        <td class="label"><label>Ubicaci&oacute;n:</label>
        <td class="control"><textarea rows="3" cols="25" name="dir"></textarea>
        </table>
   	 
   		<div>
		    <input type="button"  value="Guardar" name="boton"  onClick="validarvaciosrecursos()" />
			 <div style="float: right"><a onClick="location.href='plantillaA.php'"><input type="button" value="Salir" /></a></div>
		</div>
</div>

</form>
</body>
</html>
<script type="text/javascript">
Calendar.setup({
inputField : "campo_f", // id del campo de texto
ifFormat : "%d/%m/%Y", // formato de la fecha que se escriba en el campo de texto
button : "muestrac" // el id del botón que lanzará el calendario
});
</script>	
