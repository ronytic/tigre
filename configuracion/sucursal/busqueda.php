<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
$suc=$sucursal->mostrarTodoRegistro("nombre LIKE '$nombre%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","direccion"=>"Dirección","telefono"=>"Teléfono"),$suc,1,"","modificar.php","eliminar.php");
?>