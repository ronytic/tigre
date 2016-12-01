<?php
include_once("../../login/check.php");
extract($_POST);
$codcategoria=$codcategoria==""?"%":$codcategoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
$subcat=$subcategoria->mostrarTodoRegistro("codcategoria LIKE '$codcategoria' and nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'");
listadotabla(array("nombre"=>"Nombre","descripcion"=>"Descripción"),$subcat,1,"","modificar.php","eliminar.php");
?>