<?php
class reservacion extends Conectar 
{
	
	public function __construct ()
	{
		$this->reserv=array();
	}
	public function get_cliente()
	{
		$sql="select * from clientes where id_cliente = 1";
		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res)){
        $this->reserv[]=$reg;
		}
		return $this->reserv;
		
	}
		public function get_reservacion()
	{
		//if(isset($_REQUEST["idres"])){
		//	$ires=$_REQUEST["idres"];
		$sql="SELECT rt.id_reservacion,d.Destino,d.Precio,d.`Fecha salida` AS f_salida,d.`fecha regreso` AS f_regreso,rt.fecha_hora_reserva,rt.num_personas,rt.costo,e.nombre 
FROM destinos d, reservacion_transporte rt,estado_reservacion e
WHERE d.id_destino=rt.id_destino AND
rt.id_estado = e.id_estado_rsv";
if(isset($_REQUEST["idres"])){
$ires=$_REQUEST["idres"];
$l="AND rt.id_reservacion=".$ires;
$sql=$sql.$l;
}ELSE{
	$l=" ORDER BY rt.id_reservacion DESC";
	$sql = $sql.$l;
}

		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res)){
        $this->reserv[]=$reg;
		}
		return $this->reserv;
		//}
	}
		public  function get_acompanante()
	{
		//if(isset($_REQUEST["idres"])){
		//	$ires=$_REQUEST["idres"];
		$sql="SELECT p.nombre, p.apellido,p.sexo,(year(now()) - year(p.fec_nac)) AS edad
        FROM pasajeros p, pasajero_reservacion pr,reservacion_transporte rt
        WHERE pr.id_pasajero_rsv = p.id_pasajero AND
        pr.id_reservacion = rt.id_reservacion AND
        rt.id_reservacion=8";

		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res)){
        $this->reserv[]=$reg;
		}
		return $this->reserv;
		//}
	}
	function cancelar_reservacion()
	{	
		if(isset($_REQUEST["cid"])){
            parent :: con();
            $sql="UPDATE reservacion_transporte SET id_estado = 3 where id_reservacion=".$_GET["cid"];
            $reg=mysql_query($sql);
           if ($reg) {
           echo "<script type='text/javascript'>window.location='".Conectar :: ruta()."?accion=verreservacion&ires='".$_GET["cid"]."'</script>"; 	
           }}
	}
	public function delete_unidad()
	{
		if(isset($_GET["i"])){
            parent :: con();
            $sql=sprintf(

                "delete from unidad where id_unidad_vehiculo=%s",
                parent :: comillas_inteligentes($_GET["i"])
            	);
            mysql_query($sql);
           echo "<script type='text/javascript'>window.location='view/menu.phtml'</script>";
		}else{

		echo "<script type='text/javascript'>window.location='view/menu.phtml'</script>";
            
		}
	}
	public function add_reservacion()
	{
		if((isset($_POST["dst"]))&&(isset($_POST["nombre"]))&&(isset($_POST["apellido"]))){
		parent :: con();
		$sql="CALL PA_DDRVN('".$_POST["apellido"]."','".$_POST["dst"]."','".$_POST["nombre"]."')";
		$res=mysql_query($sql) or die(mysql_error());
		if($res){
		}else{
			echo '<script type="text/javascript">window.location="'.Conectar :: ruta().'?verreservacion; </script>';
		}
}
	}

}
?>