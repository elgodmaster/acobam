<?php
class pasajero extends Conectar 
{
	
	public function __construct ()
	{
		$this->unidad=array();
	}
	public function get_depto()
	{
		$sql="select * from departamento";
		$res=mysql_query($sql, parent::con());
		while($reg=mysql_fetch_array($res))
		{
          $this->unidad[]=$reg;
		}
		return $this->unidad;
	}
	public function search_unidad()
	{	
		if(isset($_GET["i"])){
            parent :: con();
            $sql=sprintf(

                "select * from unidad where id_unidad_vehiculo=%s",
                parent :: comillas_inteligentes($_GET["i"])
            	);
            $reg+mysql_query($sql);
            $this->unidad[]=$reg;}
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
	public function add_mpasajero()
	{
		$i=1;
		$j=0;
		IF((isset($_POST["nom".$i]))&&(isset($_POST["ape".$i]))&&(isset($_POST["fec".$i]))&&(isset($_POST["sx".$i]))){
			parent :: con();
			WHILE((isset($_POST["nom".$i]))&&(isset($_POST["ape".$i]))&&(isset($_POST["fec".$i]))&&(isset($_POST["sx".$i]))){

        $sql="INSERT INTO pasajeros(nombre,apellido,sexo,fec_nac) values('".$_POST["nom".$i]."','".$_POST["ape".$i]."','".$_POST["sx".$i]."','".$_POST["fec".$i]."')";
		$res=mysql_query($sql) or die(mysql_error());
        $i++;
        $j++;
		}
        $sql2="UPDATE reservacion_transporte SET costo = (SELECT F_COSTO_RES($j)),num_personas=$j WHERE id_reservacion = (SELECT F_ID_RES())";
        $res2=mysql_query($sql2) or die (mysql_error());
         if($res2){
         	$sql3="SELECT F_ID_RES()";
         	 $res3=mysql_query($sql3) or die (mysql_error());
         	 $req=mysql_fetch_array($res3);
            echo '<script type="text/javascript">window.location="'.Conectar :: ruta().'?addreservacion&idres="'.$req["F_ID_RES"].'"; </script>';
		}else{
			echo '<script type="text/javascript">window.location="'.Conectar :: ruta().'?addreservacion"; </script>';
		}
	    
	    }
		
		
		
}
	}

?>