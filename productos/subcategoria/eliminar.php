<?php
include_once("../../login/check.php");
include_once("../../class/subcategoria.php");
$Cod=$_GET['Cod'];
$subcategoria=new subcategoria;
$subcategoria->eliminarRegistro("codsubcategoria=".$Cod);
?>