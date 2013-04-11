<?php
include 'bd.php';
if((isset($_POST['accion']))&&($_POST['accion']=="buscar")){
    #formulario cliente
    $id_empleado=$_POST['id_empleado'];
    # Me conecto a la Base de datos
    $con=mysql_connect($server, $username, $password);
    mysql_select_db('acoban',$con);
    # Busco los datos que corresponden a tabla motorista
    $query="SELECT * FROM empleado WHERE id_empleado LIKE '$id_empleado'";
    $result=mysql_query($query, $con);
    while($row=  mysql_fetch_array($result)){
        $id_empleado=$row['id_empleado'];
        echo "
            <script language='javascript'>
			document.form.id_empleado.value='$id_empleado';
			document.form.nombre.value='$row[nombre]';
			document.form.apellido.value='$row[apellido]';
			document.form.direccion.value='$row[direccion]'
			document.form.edad.value='$row[edad]';
			document.form.tel.value='$row[telefono]';
			document.form.genero.value='$row[sexo]';
			document.form.user.value='$row[usuario]';
            document.form.passwrd1.value='$row[clave]';
			document.form.nivel.value='$row[nivel]';
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

    $id_cliente=$_POST['id_empleado']; //añadir como hidden
    $nomb=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $dir=$_POST['direccion'];
   $ed=$_POST['edad'];
	$telo=$_POST['tel'];
    $sex=$_POST['genero'];
	$usua=$_POST['user'];
	$cla=$_POST['passwrd1'];
	$ni=$_POST['nivel']; 
    
    # abro conexion con la base de datos
    $con=  mysql_connect($server, $username, $password);
    mysql_select_db("acoban", $con);

    # Actualizo los valores correspondientes a empleado
    $query2="
        UPDATE empleado
        SET     nombre='$nomb',apellido='$ape',direccion='$dir',edad='$ed',telefono='$telo',sexo='$sex',usuario='$usua',clave='$cla',nivel='$ni'
        WHERE
        id_empleado LIKE '$id_empleado'
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
        echo "alert('Empleado Actualizado Exitosamente')";
        echo "</script>";
    }

    # cierro la conexion
    mysql_close($con);
}
?>