<?php
include_once("../../login/check.php");
include_once("../../class/categoria.php");
$Cod=$_GET['Cod'];
$categoria=new categoria;
$categoria->eliminarRegistro("codcategoria=".$Cod);
?>