<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/factura.php");
$factura=new factura;
$valores=array("Estado"=>"'$estado'");
$factura->actualizarRegistro($valores,"codfactura=".$codfactura);
?>