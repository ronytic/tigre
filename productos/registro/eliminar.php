<?php
include_once("../../login/check.php");
include_once("../../class/producto.php");
$Cod=$_GET['Cod'];
$producto=new producto;
$producto->eliminarRegistro("codproducto=".$Cod);
?>