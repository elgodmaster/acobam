<?php
class unidad extends Conectar 
{
	private $unidad;
	private $idunidad;
	private $placa;
	private $disp;
	private $idtunidad;
	private $mat;
	private $tcirc;



	public function __construct ()
	{
		$this->unidad=array();
	}
	public function get_unidad()
	{
		$sql="select * from unidad";
		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res))
		{
          $this->unidad[]=$reg;
		}
		return $this->unidad;
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
	public function add_unidad()
	{
		if((isset($_POST["c1"]))&&(isset($_POST["c2"]))&&(isset($_POST["c3"]))&&(isset($_POST["c4"]))&&(isset($_POST["c5"]))){
		parent :: con();
		$sql="INSERT INTO unidad(placa,disponibilidad,id_tipo_unidad,matricula,tarjeta_circulacion) values('".$_POST["c1"]."','".$_POST["c2"]."','1','".$_POST["c4"]."','".$_POST["c5"]."')";
		$res=mysql_query($sql) or die(mysql_error());
		if($res){
echo "<script type='text/javascript'>window.location='view/menu.phtml'</script>";
		}else{
			echo '<script type="text/javascript">window.location="'.Conectar :: ruta().'?verunidad&m=3"; </script>';
		}
}
	}

}
?>