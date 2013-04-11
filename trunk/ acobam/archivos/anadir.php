<?php
session_start();
if($_POST['accion']=='guardar'){
    include 'bd.php';
    $id_res_transporte=$_POST['id_res_transporte'];
     $nombre_r=$_POST['nombre_r'];
	 $apellido_r=$_POST['apellido_r'];
   $tipo_r=$_POST['tipo_r'];
   $tel_r=$_POST['tel_r'];
   if($nombre_r=='' || $apellido_r=='' || $tipo_r=='' || $tel_r==''){
       echo "Error: Algunos campos obligatorios no han sido llenados";
   }
   else{
       $con=mysql_connect($server, $username, $password);;
       mysql_select_db('acoban',$con);
       $query="
        INSERT INTO referencia_cliente
        VALUES(NULL,'$nombre_r','$apellido_r','$tipo_r','$tel_r,
            $id_res_transporte'
        )
        ";
       $result=mysql_query($query, $con);
       if(!$result){
           echo "

               Ocurrio un error al guardar los datos

            ";
       }
       else{
           echo "

               Datos Guardados Exitosamente

            ";
       }
       mysql_close($con);
   }
}

if($_POST['accion']=='borrar'){
    include 'bd.php';
    $i=$_POST['boton'];
    $id=$_POST['id'.$i];
    $nombre=$_POST['nombre'.$i];
	$apellido=$_POST['apellido'.$i];
    $tipo=$_POST['tipo'.$i];
    $tel=$_POST['tel'.$i];
    $con=mysql_connect($server, $username, $password);
    mysql_select_db('acoban',$con);
    $query="DELETE FROM referencia_cliente 
            WHERE nombre,apellido LIKE '$nombre','$apellido' AND tipo_contacto LIKE '$tipo'
            AND telefono LIKE '$tel'";
    $return = mysql_query($query,$con);
    if(!$return){}
    else{
    echo "
            <script type='text/javascript'>
            document.solicitud.nombre$i.disabled=true;
			document.solicitud.apellido$i.disalibre=true;
            document.solicitud.tipo$i.disabled=true;
            document.solicitud.tel$i.disabled=true;
            document.solicitud.elimina$i.disabled=true;
            </script>
        ";
    }
    $mysql_close($con);
}
if($_POST['accion']=='anadir'){  
    $nombre_r=$_POST['nombre_r'];
	$apellido_r=$_POST['apellido_r'];
    $tipo_r=$_POST['tipo_r'];
    $tel_r=$_POST['tel_r'];
    $_SESSION['ref'][$_SESSION['contador']][0]=$nombre_r;
	$_SESSION['ref'][$_SESSION['contador']][1]=$apellido_r;
    $_SESSION['ref'][$_SESSION['contador']][2]=$tipo_r;
    $_SESSION['ref'][$_SESSION['contador']][3]=$tel_r;
    $_SESSION['contador']=$_SESSION['contador']+1;
    echo "
    <table style='width: 80%;margin: auto;border_width: 1px;border-style: solid;border-color: #e1e5e8;border-collapse: collapse'>
        <tr>
            <th style='border-bottom: 1px solid #e1e5e8 collapse'>Nombre </th>
			<th style='border-bottom: 1px solid #e1e5e8 collapse'>Apellido </th>
            <th style='border-bottom: 1px solid #e1e5e8 collapse'>Tipo Contacto</th>
            <th style='border-bottom: 1px solid #e1e5e8 collapse'>Tel&oacute;fono</th>
        </tr>";
    for($i=0;$i<$_SESSION['contador'];$i++){
    echo "
     <tr>
        <td>".$_SESSION['ref'][$i][0]."</td>
        <td>".$_SESSION['ref'][$i][1]."</td>
        <td>".$_SESSION['ref'][$i][2]."</td>
		<td>".$_SESSION['ref'][$i][3]."</td>
     </tr>
    ";
    } 
    echo "</table>";
    echo "
    <script>
    document.solicitud.nombre_r.value='';
	  document.solicitud.apellido_r.value='';
    document.solicitud.tipo_r.value='';
    document.solicitud.tel_r.value='';
    </script>
    ";
}
?>
