<?php
include_once("../../login/check.php");
$codproducto=$_POST['codproducto'];
include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarRegistro($codproducto);
$pro=array_shift($pro);
//print_r($pro);
$pro['cantidade']=10;
echo json_encode($pro);
?>