<?php
include_once("../../login/check.php");
include_once("../../class/inventario.php");
$Cod=$_GET['Cod'];
$inventario=new inventario;
$inventario->eliminarRegistro("codinventario=".$Cod);
?>