<?php
include 'bd.php';
if($_POST['accion']=="buscar"){
    #formulario cliente
    $id_cliente=$_POST['id_cliente'];
    # Me conecto a la Base de datos
    $con=mysql_connect($server, $username, $password);
    mysql_select_db('acoban',$con);
    # Busco los datos que corresponden a tabla motorista
    $query="SELECT * FROM cliente WHERE id_cliente LIKE '$id_cliente'";
    $result=mysql_query($query, $con);
    while($row=  mysql_fetch_array($result)){
        $id_cliente=$row['id_cliente'];
        echo "
            <script language='javascript'>
			document.form.id_cliente.value='$id_cliente';
			document.form.nombre.value='$row[nombre]';
			document.form.apellido.value='$row[apellido]';
			document.form.tel.value='$row[telefono]';
			document.form.direccion.value='$row[direccion]'
			document.form.genero.value='$row[sexo]';
			document.form.sangre.value='$row[tiposangre]';
		   document.form.email.value='$row[correo]';
			document.form.fecha_nacimiento.value='$row[fecha_nacimiento]';
			document.form.user.value='$row[usuario]';
            document.form.passwrd1.value='$row[clave]';
                  ";
        echo "
            </script>
        ";
    }
    
    mysql_free_result($result);
    # Cerrar conexion
    mysql_close($con);
}

if($_POST['accion']=="actualizar"){

    $id_cliente=$_POST['id_cliente']; //añadir como hidden
    $nomb=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $dir=$_POST['direccion'];
    $telo=$_POST['tel'];
    $sex=$_POST['genero'];
	$tiposa=$_POST['sangre'];
	$corr=$_POST['email'];
    $fecha=$_POST['fecha_nacimiento'];
	$usua=$_POST['user'];
	$cla=$_POST['passwrd1'];
	 
    
    # abro conexion con la base de datos
    $con=  mysql_connect($server, $username, $password);
    mysql_select_db("acoban", $con);

    # Actualizo los valores correspondientes a motorista
    $query2="
        UPDATE cliente
        SET     nombre='$nomb',apellido='$ape',telefono='$telo',direccion='$dir',sexo='$sex',
        tiposangre='$tiposa',correo='$corr',fecha_nacimiento='$fecha',usuario='$usua',clave='$cla'
        WHERE
        id_cliente LIKE '$id_cliente'
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
        echo "alert('Cliente Actualizado Exitosamente')";
        echo "</script>";
    }

    # cierro la conexion
    mysql_close($con);
}
?>