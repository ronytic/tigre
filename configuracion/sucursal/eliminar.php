<?php
include_once("../../login/check.php");
include_once("../../class/sucursal.php");
$Cod=$_GET['Cod'];
$sucursal=new sucursal;
$sucursal->eliminarRegistro("codsucursal=".$Cod);
?>