<?php

require_once("model/userModel.php");
$u=new Horario();

$datos=$u->get_horario();
require_once("view/veruser.phtml")

?>