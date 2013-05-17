<?php
require_once("model/unidadModel.php");
$u= new unidad();
$datos= $u-> add_unidad();
require_once("view/menutp.phtml");
require_once("view/addunidad.phtml");
?>