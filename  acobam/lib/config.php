<?php
class Conectar
{
	public function con()
	{
		$con=mysql_connect("localhost","u272862170_acobam","123456");
		mysql_query("SET NAMES 'UTF8'");
		mysql_select_db("u272862170_acobam");
		return $con;
	}
	public static function ruta()
	{
		return "http://localhost/acobam/";
	}
	public static function ruta2()
	{
		return "http://localhost/acobam/view/menu.phtml";
	}
	public function comillas_inteligentes($valor)
	{
		if(get_magic_quotes_gpc()){
			$valor=stripcslashes($valor);
		}
		if(!is_numeric($valor)){
			$valor="'".mysql_real_escape_string($valor)."'";
		}
		return $valor;
	}
}
?>