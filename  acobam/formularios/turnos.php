
<!DOCTYPE html>
<html>
<head>
<title>Control de Servicio</title>
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
<script src="../js/validaciones.js"></script>
<script src="../js/jquery-1.6.2.min.js"></script>
<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/jquery.form.js"></script>
<script src="../../../taxis3/js/validaciones.js"></script>
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
<form id="turno" name="turno" method="POST" action="../bd/bd_turnos.php">
    <input type="hidden" name="accion" />
    <h1>RESERVACIONES</h1>
    <div class="accordion" style="width: 80%;margin: auto;font-size: 13px;">
        <h3><a href="#">Encabezado</a></h3>
        <div>
            ACOBAN de R.L
            
        </div>
        <h3><a href="#">Datos Personales</a></h3>
        <div>
            <table class="form">
            <tr>
                <td class="label"><label>Nombres:</label> </td>
                <td class="control"><input name="nombre" type="text" size="25" maxlength="35" /> &nbsp; </td>
            </tr>
            </table>
            <div id="horas">
            <table class="form">
            <tr>
                <td class="label"><label>Apellidos:</label> </td>
                <td class="control"><input name="apellido" type="text"
                                                                                            title="Apellidos" size="25" maxlength="35" /></td>
            </tr>
            <tr>
                <td class="label"><label>Hora:</label></td> 
                <td class="control"><input name="hora" type="time" pattern="[0-2]{1}[0-9]{1}[:]{1}[0-5]{1}[0-9]{1}" 
                                                                                            title="Ej. 22:10" size="5" maxlength="5" /></td>
            </tr>
            </table>
            </div>
            <table class="form">
            <tr>
                <td class="label"><label>Id_tarifa:</label> </td>
                <td class="control"><input name="id_tarifa" type="text" size="10" maxlength="10" /> &nbsp;
                                      <a href="../formularios/servicios.php" target="_blank"> 
                                      <input type="button" class="curvita" value="ver lista" />
                                      </a>
                                      <input type="submit" name="cargar_vol" value="Cargar" 
                                             onclick="document.turno.accion.value='buscar_vol';salida='#vol'" /></td>
            </tr>
            </table>
            <div id="vol">
            <table class="form">
            <tr>
			<td  ><label>Departamento</label></td>
			<td class="label">
			<input type="text" name="departamento" size="25" tabindex="4" disabled></td>
		
        		<tr>
			<td width="250"  height="24" class="der"><label>Municipio</label></td>
			<td width="330" height="24">
			<input type="text" name="municipio" size="25"   maxlength="9"  tabindex="5"  alt="MUnicipio" title="Municipio"  disabled></td>
	        
		<tr>
			<td class="label"><label>Precio</label></td>
			<td class="control">$
			<input type="text" name="precio" size="10"  maxlength="25" placeholder="00" disabled>
			D&oacute;lares 
	        </td>
		</tr>
            </table>
            </div>
            <table class="form">
            
            <tr>
                    <td colspan="2" style="text-align: center"><input type="submit" class="curvita" value="A&ntilde;adir"
                                                                      onclick="document.turno.accion.value='anadir_vol';                                     salida='#voluntarios'
  document.turno.depto.disabled=false 
 document.turno.municipio.disabled=false
  document.turno.precio.disabled=false"/> &nbsp; &nbsp; 
                             <input type="button" class="curvita" value="Limpiar" />				
            </table>
        <br/><br/>
            <div id="voluntarios">
            <table border="1">
            <tr>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Hora</td>
            <td>Departamento</td>
            <td>Municipio</td>
            <td>Precio</td>
             </tr>
            </table>
            </div>
        </div>
        <h3><a href="#">Referencias personales</a></h3>
	<div>
	<!--    <input type="hidden" name="id_vol" />-->
	    <fieldset>
	        <legend>Referencias Personales</legend>
	        <input type="text" size="40" maxlength="40" name="nombre_r" placeholder="Nombres" />
          <input type="text" size="40" maxlength="40" name="apellido_r" placeholder="Apellidos" />
          <input type="text" size="40" name="dir_r" placeholder="Parentesco" />
	        <input type="text" size="9" maxlength="9" name="tel_r" placeholder="Telefono" />
            
            <input type="submit" class="curvita" value="A&ntilde;adir"
                                                                      onclick="document.turno.accion.value='anadir';                                     salida='#refe'" /><br /><br />
	     </fieldset>
	    <br />
	    <div id="refe">
	        <table style="width: 80%;margin: auto;border-width: 1px;border-style: solid;border-color: #e1e5e8;border-collapse: collapse">
	            <tr>
	                <th>Nombres</th>
                    <th>Apellidos</th>
	                <th>Direcci&oacute;n</th>
	                <th>Tel&oacute;fono</th>
	            </tr>
	        </table>
	    </div>
	</div>
        <h3><a href="#">Acompa&ntilde;ates</a></h3>
      <div>
        <table class="form">
            <tr>
                <td class="label"><label>Nombres:</label> </td>
                <td class="control"><input name="acompa&ntilde;ante" type="text" size="25" maxlength="35" /> &nbsp; </td>
            </tr>
            </table>
        <table class="form">
            
          <tr>
                    <td colspan="2" style="text-align: center"><input type="submit" class="curvita" value="A&ntilde;adir"
                                                                      onclick="document.turno.accion.value='anadir_acom';                                     salida='#acom'
  "/> &nbsp; &nbsp; 
                             <input type="button" class="curvita" value="Limpiar" />				
        </table>
        <br/><br/>
            <div id="acom">
            <table border="1">
            <tr>
            <td>No.</td>
            <td>Nombre Acompa&ntilde;ante</td>
           
             </tr>
            </table>
            </div>
      </div>  
        
        <h3><a href="#">Equipaje</a></h3>    
    <div>
  <table class="form">
            <tr>
                <td class="label"><label>Peso en Libras</label></td>
                <td class="control"><input name="peso_libra"  />&nbsp; &nbsp; </td>			
            </tr>
                        <tr>
                <td class="label"><label>Tipo de equipaje</label></td>
                <td class="control"><select name="equipaje">
                           <option value="elija">Elija Tipo de Equipaje</option>
                           <option value="f">Fragil</option>
                           <option value="r">Resistente</option>
                          </select></td>			
            </tr>		
             <tr>
                <td class="label"><label>Cantidad</label></td>
                <td class="control"><input name="cantidad"  /> </td>			
            </tr>	
            </table>  
    
    
    
    </div> 
    <h3><a href="#">Informacion Adicional de Procedencia</a></h3>
             <!-- cuarto cuadrito -->
        <div>
            <table>
                <tr>
                    <td class="label"><label>Aerolinea</label></td>
                <td class="control"><input type="text" size="40"  name="aerolinia" 
                                           onBlur="vnombre(this.form.aerolinia.value,this.form.aerolinia)" maxlength="80" /></td>
                </tr>
                <tr>
                    <td class="label"><label>Clase Vuelo</label></td>
                <td class="control"><input type="text" size="40"  name="clasevuelo" 
                                           onBlur="vnombre(this.form.clasevuelo.value,this.form.clasevuelo)" maxlength="80" /></td>
                </tr>
                <tr>
                    <td class="label"><label>Origen</label></td>
                <td class="control"><input type="text" size="40"  name="origen" 
                                           onBlur="vnombre(this.form.origen.value,this.form.origen)" maxlength="80" /></td>
                </tr>
                <tr>
                <td class="label"><label>Hora de Salida</label></td>
                <td class="control"><input type="text" size="5" name="horasalida" 
                                           onBlur="CheckTime(this)" maxlength="5" alt="HH:MM" 
                                           title="HH:MM" placeholder="HH:MM"/><br /></td>
                </tr>
            </table>
        </div>
        <h3><a href="#">Guardar o Salir</a></h3>
        <div>
            <table class="form">
            <tr>
                    <td class="label"><label>Observaciones:</label> 
                    <td class="control"><textarea name="observaciones" rows="3" cols="50"></textarea>
            </table>
            <div style="text-align: center">	
            <input type="submit" class="curvita" value="Guardar" onClick="document.turno.accion.value='guardar';
                                                                          salida='#estado'" />
            <input type="button" class="curvita" value="Salir" onClick="location.href='plantillaC.php'" />
            </div>
        </div>
    </div>
</form>
</body>
</html>