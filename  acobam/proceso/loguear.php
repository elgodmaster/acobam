<?php

include("controlgenerico.php");

if(isset($_POST['accion'])&&($_POST['accion']== '1')){
	
	  $_POST['rol'] = trim($_POST['rol']);
      $_POST['pass'] = trim($_POST['pass']);
		$res=mysql_query("SELECT nivel,clave FROM empleado WHERE nivel='".$_POST['rol']."'");
		if(mysql_num_rows($res)>0){
			if(mysql_result($res,0,"clave")==$_POST['pass']){
				  if($_POST['rol']=="nivel3"){
				  		$_SESSION["idpu657_user"] =$_POST['rol'];
                  		$_SESSION["idpu657_logeado"] = $_POST['rol'];
                 		 echo "
                    		   <script language='javascript'>
							   			alert('Bienvenida secretaria ');
                      		             top.location.href='plantillaS1.php';
                      		 </script>
                  		";
				  }//fin secretaria 1
				  else{
					  if($_POST['rol']=="nivel4"){
						  $_SESSION["idpu657_user"] =$_POST['rol'];
						  $_SESSION["idpu657_logeado"] = $_POST['rol'];
                 		 echo "
                    		   <script language='javascript'>
							  			 alert('Bienvenidos Empleados');
                      		             top.location.href='plantillaE.php';
                      			 </script>
                  			";
						  
						  }//fin if secretaria dos
						  else{
							  if($_POST['rol']=="nivel1"){
									$_SESSION["idpu657_user"] =$_POST['rol'];
									$_SESSION["idpu657_logeado"] = $_POST['rol'];
							 		echo "
								   		<script language='javascript'>
												alert('Bienvenido Administrador');
												top.location.href='plantillaA.php';
								 		</script>
									";
				  			}//fin 
							else{
								if($_POST['rol']=="nivel2"){
									$_SESSION["idpu657_user"] =$_POST['rol'];
									$_SESSION["idpu657_logeado"] = $_POST['rol'];
							 		echo "
								   		<script language='javascript'>
												alert('Bienvenido Gerente');
												top.location.href='plantillaG.php';
								 		</script>
									";
				  				}//fin
																
							}//fin
							
						  }//fin 
					  
					  }//fin 
					  
				
		}//fin mysql_result
			else{
					echo "
                    		  <script language='javascript'>
                      		             alert('La contraseña no es valida para el rol ingresado');
                      		 </script>
                  		";
				}//fin else mysql_result
					
		}//fin if mysql_num_rows
		else{
				echo "
                    		  <script language='javascript'>
                      		             alert('No hay resultado en la elección. Pongase en contacto con su administrador');
                      		 </script>
                  		";
			}//fin else mysql_num_rows
	
	}//fin if accion


if(isset($_POST['accion'])&&($_POST['accion']== '2'))
{
	
      $_POST['pass'] = trim($_POST['pass']);
		$res=mysql_query("SELECT nivel,clave FROM empleado WHERE nivel='".$_SESSION["idpu657_user"]."'");
		if(mysql_num_rows($res)>0){
			if(mysql_result($res,0,"clave")==$_POST['pass']){
				$_SESSION["idpu657_user"] ="";
				$_SESSION["idpu657_logeado"] = "";  
				echo "
                    		  <script language='javascript'>
                      		             alert('Sesión Cerrada Satisfactoriamente');
										 top.location.href='../index.html';
                      		 </script>
                  		";
			}//fin mysql_result
			else{
					echo "
                    		  <script language='javascript'>
                      		             alert('La contraseña no es valida para el rol ingresado');
                      		 </script>
                  		";
				}//fin else mysql_result
					
		}//fin if mysql_num_rows
		else{
				echo "
                    		  <script language='javascript'>
                      		             alert('No hay resultado en la elección. Pongase en contacto con su administrador');
                      		 </script>
                  		";
			}//fin else mysql_num_rows
	
}//fin if accion 2

if(isset($_POST['accion'])&&($_POST['accion']== '3')){
	 $_POST['rol'] = trim($_POST['rol']);
      $_POST['pass'] = trim($_POST['pass']);
		$res=mysql_query("SELECT nivel,clave FROM empleado WHERE nivel='".$_POST['rol']."'");
		if(mysql_num_rows($res)>0){
			if(mysql_result($res,0,"clave")==$_POST['pass']){
				  if($_POST['rol']=="nivel1"){
				  		$_SESSION["idpu657_user"] =$_POST['rol'];
                  		$_SESSION["idpu657_logeado"] = $_POST['rol'];
                 		 echo "
                    		   <script language='javascript'>
							   			alert('Bienvenido administrador');
                      		             top.location.href='plantillaA.php';
                      		 </script>
                  		";
				  }//fin if 
				  			}//fin mysql_result
		else{
					echo "
                    		  <script language='javascript'>
                      		             alert('La contraseña no es valida para el rol ingresado');
                      		 </script>
                  		";
				}//fin else mysql_result
					
		}//fin if mysql_num_rows
		else{
				echo "
                    		  <script language='javascript'>
                      		             alert('No hay resultado en la elección. Pongase en contacto con su administrador');
                      		 </script>
                  		";
			}//fin else mysql_num_rows
	
}//fin if accion 2



?>
