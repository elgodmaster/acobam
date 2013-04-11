<?php
require_once("model/unidadModel.php");
$u =new unidad();
$datos = $u-> get_unidad();
require_once("view/verunidad.phtml");
?>