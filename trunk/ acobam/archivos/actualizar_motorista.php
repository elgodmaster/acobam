<?php
include 'bd.php';
if((isset($_POST['accion']))&&($_POST['accion']=="buscar")){
    #formulario motorista
    $codigo=$_POST['codigo'];
    # Me conecto a la Base de datos
    $con=mysql_connect($server, $username, $password);
    mysql_select_db('acoban',$con);
    # Busco los datos que corresponden a tabla motorista
    $query="SELECT * FROM motorista WHERE codigo LIKE '$codigo'";
    $result=mysql_query($query, $con);
    while($row=  mysql_fetch_array($result)){
        $id_motorista=$row['id_motorista'];
        echo "
            <script language='javascript'>
			document.form.id_motorista.value='$id_motorista';
			document.form.user.value='$row[nombre]';
			document.form.apellido.value='$row[apellido]';
			document.form.direccion.value='$row[direccion]'
			document.form.tel.value='$row[telefono]';
			document.form.estado_civil.value='$row[estado_civil]';
			document.form.genero.value='$row[sexo]';
            document.form.codigo.value='$row[codigo]';
			         
                    
                    ";
        echo "
            </script>
        ";
    }
    mysql_free_result($result);
    # Busco los datos que corresponden a tipo_documento
    $query="SELECT * FROM tipo_documento_motorista WHERE id_motorista LIKE '$id_motorista'";
    $result=mysql_query($query, $con);
    while($row=  mysql_fetch_array($result)){
        echo "
            <script language='javascript'>
			document.form.tipo_doc.value='$row[nombre_documento_motorista]';
           document.form.numero_tipo.value='$row[numero]';
         document.form.licencia.value='$row[numero_licencia]';
          
            </script>
        ";
    }
    mysql_free_result($result);
    # Cerrar conexion
    mysql_close($con);
}

if((isset($_POST['accion']))&&($_POST['accion']=="actualizar")){

    $codigo=$_POST['codigo']; //añadir como hidden
    $id_motorista=$_POST['id_motorista']; //añadir como hidden
    $nomb=$_POST['user'];
    $ape=$_POST['apellido'];
    $dir=$_POST['direccion'];
    $telo=$_POST['tel'];
    $estado_ci=$_POST['estado_civil'];
    $sex=$_POST['genero'];
	 $nombre_tipo_moto=$_POST['tipo_doc'];
    $numerotipo=$_POST['numero_tipo'];
    $numero_licencia_moto=$_POST['licencia'];
    
    # abro conexion con la base de datos
    $con=  mysql_connect($server, $username, $password);
    mysql_select_db("acoban", $con);

    # Actualizo los valores correspondientes a motorista
    $query2="
        UPDATE motorista
        SET     nombre='$nomb',apellido='$ape',direccion='$dir',telefono='$telo',
        estado_civil='$estado_ci',sexo='$sex'
        
        WHERE
        codigo LIKE '$codigo'
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
        echo "alert('Motorista Actualizado Exitosamente')";
        echo "</script>";
    }

    # Actualizo los valores de la tabla tipo_documento_motorista
    $query3="
        UPDATE tipo_documento_motorista
        SET
        numero='$numerotipo',nombre_documento_motorista='$nombre_tipo_moto',
        numero_licencia='$numero_licencia_moto'
        
        WHERE
        id_motorista LIKE '$id_motorista'
        ";

    $result3=mysql_query($query3, $con);
    if(!$result3){
        $error=mysql_error();
        echo "<script language='javascript'>";
        echo "alert('No se pudieron actualizar algunos datos de Motorista')";
        echo "</script>";
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('Datos de Motorista, Actualizados')";
        echo "</script>";    
    }

    # cierro la conexion
    mysql_close($con);
}
?>