<?php
    session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
<title>La Unión</title>
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
<h1>Control de Tarifa La Unión</h1>
<div id="formulario" class="paramarcos">
<table border="1" width="100%">
<tr>
	<td>C&oacute;digo</td>
	<td>Departamento</td>
	<td>Municipio</td>
	<td>Precio</td>
      </tr>
<?php
    include "../archivos/bd.php";
    $con=  mysql_connect($server, $username, $password);
    mysql_select_db('acoban', $con);
    $query="SELECT id_tarifa,departamento,municipio,precio
FROM tarifa
WHERE departamento='LA UNION';
            ";
    $result=mysql_query($query, $con);
    $i=0;
    while($row=  mysql_fetch_array($result)){
        echo "
            <tr>
			 <td>$row[id_tarifa]</td>
            <td>$row[departamento]</td>
            <td>$row[municipio]</td>
            <td>$row[precio]</td>
            </tr>
            ";
        $i++;
    }
    mysql_free_result($result);
    mysql_close($con);
?>
</table>
</div>
</body>
</html>