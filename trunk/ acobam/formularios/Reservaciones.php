<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Reservacion</title>

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


<!-- agrege estos para las validaciones..  -->
<script src="../js/validaciones.js" type="text/javascript"></script>

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
    
<h1>Reservaci&oacute;n</h1><br />

<form id="turno" name="turno" method="POST" action="../archivos/guardar_reserva.php">
    <input type="hidden" name="accion" />
      <!-- Primer Cuadrito -->

<br/>
<br/>
<form name="form" >
  <!-- Primer cuadrito -->
    <div class="accordion" style="width: 53%;margin: auto;font-size: 13px;">
    <h3><a href="#">Datos generales</a></h3>
         <div>
            
            <table class="form">
            <tr>
                <td class="label"><label>Fecha de la reservaci&oacute;n</label></td>
                <td class="control"><input name="fecha" required type="text" class="date-pick" /> </td>			
            </tr>
            <tr>
                <td class="label"><label>Hora de Servicio</label> </td>
                <td class="control"><input name="hora_servicio"  type="time" pattern="[0-2]{1}[0-9]{1}[:]{1}[0-5]{1}[0-9]{1}" title="Ej. 22:10" size="5" maxlength="5"  placeholder="HH:MM"/></td>
            </tr>
            <tr>
                <td class="label"><label>Nombre</label></td>
  <td class="control"><input name="n_reserva" type="text" size="30" maxlength="80"   onblur="vnombre(document.turno.n_reserva.value,document.turno.n_reserva)"/></td>
            </tr>
            <tr>
           <td class="label"><label>Apellido</label></td>
  <td class="control"><input name="n_apellido" type="text" size="30" maxlength="80"  onblur="vnombre(document.turno.n_apellido.value,document.turno.n_apellido)"/></td>
            </tr>
            </table>
            <table class="form">
            <tr>
                <td class="label"><label>Codigo:</label> </td>
                <td class="control"><input name="id_tarifa" type="text" size="10" maxlength="10" /> &nbsp;
                                      <a href="servicios.php" target="_blank"> 
                                      <input type="button" class="curvita" value="ver lista" />
                                      </a>
                                      <input type="submit" name="cargar_tarifa" value="Cargar" 
                                             onclick="document.turno.accion.value='buscar_tarifa';salida='#tari'" /></td>
            </tr>
                  </table>
                  <div id="tari">
            <table class="form">
            <tr>
 <td class="label"><label>Departamento</label></td>
  <td class="control"><input name="departamento" type="text" size="30" maxlength="80"   disabled/></td>
            </tr>
            <tr>
           <td class="label"><label>Municipio</label></td>
  <td class="control"><input name="municipio" type="text" size="30" maxlength="80"  disabled/></td>
          </tr>
          <td class="label"><label>Precio</label></td>
  <td class="control"><input name="precio" type="text" size="30" maxlength="80"    disabled/></td>
            </tr>
            </table>
               </div> 
               <table class="form"> 
       <tr>
                <td class="label"><label>observaciones</label></td>
                <td class="control"><textarea name="observaciones" rows="3" cols="30"></textarea></td>
                </tr>
                  </table>     
        </div>
        <!-- Fin del primer cuadrito -->
        
       

        <h3><a href="#">Otros Datos</a></h3>
         <!-- Segundo cuadrito -->
         <div>
           <table class="form">
            
              <tr>
                    <td class="label"><label>Ingrese acompa&ntilde;antes:</label>
                    <td class="control"><input name="n_paciente" type="text" size="50" maxlength="80" 
                                               onblur="vnombre(document.turno.n_paciente.value,document.turno.n_paciente)"/>
            
            </table>
            
            <table class="form">
            
                     <tr>
                <td colspan="2" style="text-align: center"><input type="submit" class="curvita" value="A&ntilde;adir"
                                                          onclick="document.turno.accion.value='anadir_caso';
                                                                    salida='#casos';
                                                                    document.turno.caso.disabled=false"/> &nbsp; &nbsp; 
                 <input type="button" class="curvita" value="Limpiar" />
           </table>
            <div id="casos">
            <table border="1">
            <tr>
            <td>N&ordm;</td>
            <td>Nombre del acompa&ntilde;ante</td>
            </tr>
            </table>
            </div>
        </div>
         
         <!-- fin del segundo cuadrito -->
         
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
         
         
               	<h3><a href="#">Referencias personales</a></h3>
	<div>
	<!--    <input type="hidden" name="id_vol" />-->
	    <fieldset>
	        <legend>Referencias Personales</legend>
	        <input type="text" size="40" maxlength="40" name="nombre_r" placeholder="Nombres" />
	        <input type="text" size="40" name="dir_r" placeholder="Apellidos" />
            <input type="text" size="40" name="tipo_con" placeholder="Parentesco" />
	        <input type="text" size="9" maxlength="9" name="tel_r" placeholder="Telefono" />
	        <input type="submit" class="curvita" value="A&ntilde;adir" 
	               onclick="document.solicitud.action='../bd/anadir_ref';
	                        document.solicitud.accion.value='anadir'" /><br /><br />
	     </fieldset>
	    <br />
	    <div id="refe">
	        <table style="width: 80%;margin: auto;border-width: 1px;border-style: solid;border-color: #e1e5e8;border-collapse: collapse">
	            <tr>
	                <th>Nombres</th>
	                <th>Apellidos</th>
	                <th>Parentesco</th>
                    <th>Tel&oacute;fono</th>
	            </tr>
	        </table>
	    </div>
	</div>
    <!-- fin del tecer cuadrito -->
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
        <input type="button"  value="Guardar" name="boton"  
               onClick="document.form.fecha.disabled=false;validarvacios()"/>
        <div style="float: right"><input type="button"  value="Salir" 
                                         onclick="location.href='plantillaC.php'" /></div>
        </div>
        <!-- fin del tercer cuadrito -->
  
    </div>
</form>
<br />
</body>
</html>
<script type="text/javascript">
Calendar.setup({
inputField : "campo_f", // id del campo de texto
ifFormat : "%d/%m/%Y", // formato de la fecha que se escriba en el campo de texto
button : "muestrac" // el id del botón que lanzará el calendario
});
</script>	
