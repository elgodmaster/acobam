<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Destinos</title>
<link rel="stylesheet" type="text/css" href="estilos/estilo.css" /><!-- para llamar al estilo css -->
</head >
<body> 
     <div style="margin: auto;width: 79%;font-size: 13px;"  >
     <br><br>
      <h3><center><font color=black>SERVICIOS</font></center></h3>
    <div>
<!-- Con esto hacemos un mapa de enlaces en la imagen -->
<map name="menu"><area shape="rect" coords="260,190,286,258" href="tarifa_cuscatlan.php" alt="Cuscatlan">
<area shape="rect" coords="222,187,247,332" href="tarifa_san_salvador.php" alt="San Salvador">
<area shape="rect" coords="301,199,400,249"  href="tarifa_cabanas.php" alt="Caba&ntilde;as">
<area shape="circle" coords="476,376,43" href="tarifa_san_miguel.php" alt="San Miguel">
<area shape="rect" coords="85,242,140,350"  href="tarifa_sonsonate.php" alt="Sonsonate">
<area shape="rect" coords="19,163,82,286"  href="tarifa_ahuachapan" alt="Ahuachapan">
<area shape="circle" coords="395,409,43" href="tarifa_usulutan.php" alt="Usulutan">
<!-- con area definimos los enlaces shape="rect poly circle" coords="coordenadas" href="ruta"  -->
<area shape="rect" coords="473,194,537,317"  href="tarifa_morazan.php" alt="Morazan">
<area shape="circle" coords="347,301,43,88" href="tarifa_san_vicente.php" alt="San Vicente">
<area shape="rect" coords="177,183,216,372" href="tarifa_la_libertad.php" alt="La Libertad">
<area shape="rect" coords="114,10,174,219" href="tarifa_santa_ana.php" alt="Santa Ana">
<area shape="circle" coords="252,99,50"  href="tarifa_chalatenango.php" alt="Chalatenango">
<area shape="circle" coords="284,360,38"  href="tarifa_la_paz.php" alt="La Paz">
<area shape="rect" coords="544,241,589,424" href="tarifa_la_union.php" alt="La Union">
</map>
<!-- Aki termina el mapa de imagenes -->
<div id="contenedor"> <!-- dentro de contenedor va el contenido de la pagina -->
	<div id="caja" align="center"> <!-- en este div se muestra la imagen principal -->
		<!-- A la imagen se le añade usemap y se le indica el nombre del mapa 
				definido con anterioridad -->
    
    <fieldset style="width: 90%;margin: auto">
      
		<img src="../imagenes/mapa.gif" width="600" height="500" alt="Menu" usemap="#menu" />	
        </fieldset>
	</div>
	<div id="abajo" ><!-- Este div es el pie de página --> 
    <marquee behavior="alternate"><font color=black>ACOBAM de R.L&copy;</font></marquee>
	</div>
</div>
</body>
</html>
