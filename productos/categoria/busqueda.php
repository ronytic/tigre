<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=$categoria->mostrarTodoRegistro("nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'");
listadotabla(array("nombre"=>"Nombre","descripcion"=>"Descripción"),$cat,1,"","modificar.php","eliminar.php");
?>