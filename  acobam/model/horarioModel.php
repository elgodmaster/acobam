<?php
class horario extends Conectar 
{
	
	public function __construct ()
	{
		$this->unidad=array();
	}
	public function get_horario()
	{
		$sql="SELECT * from horario Order by id_horario DESC";
		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res))
		{
          $this->unidad[]=$reg;
		}
		return $this->unidad;
	}
	public function search_municipio()
	{	
		if(isset($_GET["i"])){
            parent :: con();
            $sql=sprintf(

                "select * from municipios where id_municipio=%s",
                parent :: comillas_inteligentes($_GET["i"])
            	);
            $reg=mysql_query($sql);
            $this->departamento[]=$reg;}
		return $this->departamento;
	}
	public function delete_municipio()
	{
		if(isset($_GET["i"])){
            parent :: con();
            $sql=sprintf(

                "delete from municipios where id_municipio=%s",
                parent :: comillas_inteligentes($_GET["i"])
            	);
            mysql_query($sql);
           echo "<script type='text/javascript'>window.location='view/menutp.phtml'</script>";
		}else{

		echo "<script type='text/javascript'>window.location='view/menutp.phtml'</script>";
            
		}
	}
	public function add_municipio()
	{
		if((isset($_POST["c1"]))&&(isset($_POST["c2"]))&&(isset($_POST["c3"]))){
		parent :: con();
		$sql="INSERT INTO municipios(nombre,descripcion,id_depto) values('".$_POST["c1"]."','".$_POST["c2"]."','".$_POST["c3"]."')";
		$res=mysql_query($sql);
		if($res){
echo "<script type='text/javascript'>window.location='<?php echo parent :: ruta();?>?accion=addmunicipio&m=3'</script>";
		}else{
			echo "<script type='text/javascript'>window.location='<?php echo parent :: ruta();?>?accion=addmunicipio'</script>";
		}
}
	}

}
?>