<!DOCTYPE html>
<html>
<head>
<title>Control de Servicio</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
<link rel="stylesheet" type="text/css" href="../css/blitzer/jquery-ui-1.8.16.custom.css"/>
<style>
	 table.form{width: 100%}		
    td.label{text-align: left;width: 40%}
    td.control{text-align: left;width: 60%}   
</style>
<!-- JAVASCRIPT -->
<script src="../js/validaciones.js"></script>
<script src="../js/jquery-1.6.2.min.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.form.js"></script>
<script src="../js/validaciones.js"></script>
<script type="text/javascript">
var salida;
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
    $('#turno').submit(function(){
        $(this).ajaxSubmit({
            target: salida
        });
        
        return false;
    });
});
</script>
</head>
<body background="../imagenes/Imagen fondo aurora celeste.png">
    <div id="estado" style="text-align: center">
        
    </div>
<!-- Comienza el formulario -->
<form id="turno" name="turno"  >
  <h1>Mantenimiento de Perfiles</h1>
    <div class="accordion " style="width: 46%;margin: auto;font-size: 13px;">
      
      <h3>Perfiles</h3>
        <div>
                     
            </div>
            <table class="form">
            <tr>
            <td class="label"><label>Nombre del Perfil:</label>
           <td class="control"><input name="n_paciente" type="text" size="38" maxlength="80" onBlur="vnombre(document.turno.n_paciente.value,document.turno.n_paciente)"/>
            <tr>
                <td class="label"><label>Descripci&oacute;n:</label>
                <td class="control"><textarea name="atencion" rows="3" cols="40"></textarea>
            <tr>
                <td colspan="2" style="text-align: center"><input type="submit"  value="A&ntilde;adir"
                                                          onclick="document.turno.accion.value='anadir_caso';
                                                                    salida='#casos';
                                                                    document.turno.caso.disabled=false"/> &nbsp; &nbsp; 
                 <input type="button"  value="Limpiar" />
            </table>
            <div id="casos">
            <table border="1">
            <tr>
            <td>Nombre de Perfil</td>
            <td>Descripci&oacute;n</td>
           </tr>
            </table>
            </div>
       
            </table>
            <div style="text-align: center">	
            <input type="submit"  value="Guardar" onClick="document.turno.accion.value='guardar';
                                                                          salida='#estado'" />
            <input type="button"  value="Salir" onClick="location.href='plantillaA.php'" />
            </div>
        </div>
    </div>
</form>
</body>
</html>