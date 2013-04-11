<!DOCTYPE html>
<html>
    <head>
        <title>EMPLEADOS</title>
        <style>
            th.id_empleado{
                width: 10%;
                border-right:rgb(255,255,255) solid;
                border-bottom:rgb(255,255,255) solid;
            }
            th.usuario{
                width: 40%;
				border-right:rgb(255,255,255) solid;
			    border-bottom:rgb(255,255,255) solid;
            }
			th.nombre{
				 width: 60%;
                border-bottom:rgb(255,255,255) solid;
				}
            td.id_empleado{
                width: 10%;
                font-family: 'Comic Sans MS',Arial;
                border-right:rgb(255,255,255) solid;
            }
            td.usuario{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
				  border-right:rgb(255,255,255) solid;
				            }
			td.nombre{
                width: 20%;
                font-family: 'Comic Sans MS',Arial;
            }
        </style>
    </head>
    <body background="../imagenes/Imagen fondo aurora celeste.png">
        <?php
        include 'bd.php';
        $con=mysql_connect($server, $username, $password);
        mysql_select_db('acobam', $con);
//        Consulta de motorista
       $query="
            SELECT id_empleado,nombre,usuario FROM empleado ";
        $result=  mysql_query($query, $con);
        if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
    }

        $contador1=0;
        while($row=  mysql_fetch_array($result)){
            $id_empleado[$contador1]=$row['id_empleado'];
			$usuario[$contador1]=$row['usuario'];
            $nombre[$contador1]=$row['nombre'];
			          $contador1++;
        }
        mysql_free_result($result);
        mysql_close($con);
        ?>
        <h1 style="font-family: 'Comic Sans MS', Arial; text-align: center"><font color="#FFFFFF">EMPLEADOS</font></h1>
        <table style="width: 70%;border-color:rgb(255,255,255);border-style: solid;margin: auto; border-collapse: collapse">
            <tr>
           <th class="id_empleado">Id_empleado</th>
                  <th class="usuario">Usuario</th>
                <th class="nombre">Nombre</th>
                
            </tr>
            <?php
            for($i=0;$i<$contador1;$i++){
            echo "<tr>
                    <td class='id_empleado'>".$id_empleado[$i]."
					<td class='usuario'>".$usuario[$i]."
                    <td class='nombre'>".$nombre[$i]."
					
                  </tr>";
            }
            ?>
        </table>
    </body>
</html>