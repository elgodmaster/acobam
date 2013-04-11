<!DOCTYPE html>
<html>
    <head>
        <title>Tarifas</title>
        <style>
            th.id_tarifa{
                width: 20%;
                border-right:rgb(0,0,153) solid;
                border-bottom: rgb(0,0,153) solid;
            }
            th.departamento{
                width: 30%;
				border-right:rgb(0,0,153) solid;
			    border-bottom:rgb(0,0,153) solid;
            }
			th.municipio{
				 width: 40%;
				 border-right:rgb(0,0,153) solid;
                border-bottom: rgb(0,0,153) solid;
				}
			th.precio{
				 width: 40%;
                border-bottom: rgb(0,0,153) solid;
				}
            td.id_tarifa{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
                border-right: rgb(0,0,153) solid;
            }
            td.departamento{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
				  border-right: rgb(0,0,153) solid;
				            }
			td.municipio{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
				border-right: rgb(0,0,153) solid;
            }
			td.precio{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
            }
        </style>
    </head>
    <body>
        <?php
        include 'bd.php';
        $con=mysql_connect($server, $username, $password);
        mysql_select_db('acoban', $con);
//        Consulta de rifas
        $query="
            SELECT id_tarifa,departamento,municipio,precio FROM tarifa ";
        $result=  mysql_query($query, $con);
        $contador1=0;
        while($row=  mysql_fetch_array($result)){
            $id_tarifa[$contador1]=$row['id_tarifa'];
            $departamento[$contador1]=$row['departamento'];
			$municipio[$contador1]=$row['municipio'];
			$precio[$contador1]=$row['precio'];
            $contador1++;
        }
        mysql_free_result($result);
        mysql_close($con);
        ?>
        <h1 style="font-family: 'Comic Sans MS', Arial; text-align: center"><font color="#000066">TARIFAS</font></h1>
        <table style="width: 70%;border-color: rgb(0,0,153);border-style: solid;margin: auto; border-collapse: collapse">
            <tr>
                <th class="id_tarifa">Codigo</th>
                <th class="departamento">Departamento</th>
                <th class="municipio">Municipio</th>
                <th class="precio">Precio</th>
            </tr>
            <?php
            for($i=0;$i<$contador1;$i++){
            echo "<tr>
                    <td class='id_tarifa'>".$id_tarifa[$i]."
                    <td class='departamento'>".$departamento[$i]."
					<td class='municipio'>".$municipio[$i]."
					<td class='precio'>".$precio[$i]."
                  </tr>";
            }
            ?>
        </table>
    </body>
</html>