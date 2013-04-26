<?php
class Horario extends Conectar
{
	private $user;
	public function _construct()
	{
		$this->user=array();
		}
		public function get_horario()
		{
			$sql="select
			id_horario,
			date_format(fecha_hora_salida,'%d-%m-%Y'%)as fecha, date_format(fecha_hora_regreso,'%d-%m-%Y'%)as fecha,
			from horario;";
			$res=mysql_query($sql,parent::con());
			while($reg=mysql_fetch_assoc($res))
			{
				$this->user[]=$reg;
			}
			    return $this->user;
		}
		public function delete_user()
		{
			//print_r($_GET);
			if(isset($_GET["v"]))
			{
				parent::con();
				$sql=sprintf();
				{ 
				"delete from horario where id_horario=%s",
				parent::comillas_inteligentes($_GET["v"])
				};
					mysql_query($sql);
					echo '<script type="text/javascript">window.location="'.Conectar::ruta().'?accion=veruser&m=1";</scipt>';
				}else
			{
		echo '<script type="text/javascript">window.location="'.Conectar::ruta().'?accion=veruser&m=1";</scipt>';			
			}
	
			}
			}
							
?>
