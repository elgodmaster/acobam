<!DOCTYPE html>
<html>
    <head>
        <title>Motoristas</title>
        <style>
            th.codigo{
                width: 20%;
                border-right:rgb(255,255,255) solid;
                border-bottom:rgb(255,255,255) solid;
            }
            th.nombre{
                width: 40%;
				border-right:rgb(255,255,255) solid;
			    border-bottom:rgb(255,255,255) solid;
            }
			th.apellido{
				 width: 60%;
                border-bottom:rgb(255,255,255) solid;
				}
            td.codigo{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
                border-right:rgb(255,255,255) solid;
            }
            td.nombre{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
				  border-right:rgb(255,255,255) solid;
				            }
			td.apellido{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
            }
        </style>
    </head>
    <body background="../imagenes/Imagen fondo aurora celeste.png">
        <?php
        include 'bd.php';
        $con=mysql_connect($server, $username, $password);
        mysql_select_db('acoban', $con);
//        Consulta de motorista
        $query="
            SELECT codigo,nombre,apellido FROM motorista ";
        $result=  mysql_query($query, $con);
        $contador1=0;
        while($row=  mysql_fetch_array($result)){
            $codigo[$contador1]=$row['codigo'];
            $nombre[$contador1]=$row['nombre'];
			$apellido[$contador1]=$row['apellido'];
            $contador1++;
        }
        mysql_free_result($result);
        mysql_close($con);
        ?>
        <h1 style="font-family: 'Comic Sans MS', Arial; text-align: center"><font color="#FFFFFF">MOTORISTAS</font></h1>
        <table style="width: 70%;border-color:rgb(255,255,255);border-style: solid;margin: auto; border-collapse: collapse">
            <tr>
                <th class="codigo">C&oacute;digo</th>
                <th class="nombre">Nombre</th>
                <th class="apellido">Apellido</th>
            </tr>
            <?php
            for($i=0;$i<$contador1;$i++){
            echo "<tr>
                    <td class='codigo'>".$codigo[$i]."
                    <td class='nombre'>".$nombre[$i]."
					<td class='apellido'>".$apellido[$i]."
                  </tr>";
            }
            ?>
        </table>
    </body>
</html>