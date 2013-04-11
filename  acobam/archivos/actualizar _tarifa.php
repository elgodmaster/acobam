<?php
include 'bd.php';
if((isset($_POST['accion']))&&($_POST['accion']=="buscar")){
    #formulario tarifa
    $id_tarifa=$_POST['id_tarifa'];
    # Me conecto a la Base de datos
    $con=mysql_connect($server, $username, $password);
    mysql_select_db('acoban',$con);
    # Busco los datos que corresponden a tabla motorista
    $query="SELECT * FROM tarifa WHERE id_tarifa LIKE '$id_tarifa'";
    $result=mysql_query($query, $con);
    while($row=  mysql_fetch_array($result)){
        $id_tarifa=$row['id_tarifa'];
        echo "
            <script language='javascript'>
			document.form.id_tarifa.value='$id_tarifa';
			document.form.depto.value='$row[departamento]';
			document.form.municipio.value='$row[municipio]';
			document.form.precio.value='$row[precio]'
	               ";
        echo "
            </script>
        ";
    }
    
    mysql_free_result($result);
    # Cerrar conexion
    mysql_close($con);
}

if((isset($_POST['accion']))&&($_POST['accion']=="actualizar")){

    $id_tarifa=$_POST['id_tarifa']; //añadir como hidden
    $dep=$_POST['depto']; //añadir como hidden
    $mun=$_POST['municipio'];
    $pre=$_POST['precio'];
        
    # abro conexion con la base de datos
    $con=  mysql_connect($server, $username, $password);
    mysql_select_db("acoban", $con);

    # Actualizo los valores correspondientes a motorista
    $query2="
        UPDATE tarifa
        SET     departamento='$dep',municipio='$mun',precio='$pre'
        
        WHERE
        id_tarifa LIKE '$id_tarifa'
        ";

    $result2=mysql_query($query2, $con);
    if(!$result2){
        $error=mysql_error();
        echo "<script language='javascript'>";
        echo "alert('No se pudieron actualizar los datos')";
        echo "</script>";
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('Tarifa Actualizada Exitosamente')";
        echo "</script>";
    }

   
   # cierro la conexion
    mysql_close($con);
}
?>