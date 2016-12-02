<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
/*if($_FILES['imagen']['name']!=""){
    copy($_FILES['imagen']['tmp_name'],"../../imagenes/categoria/".$_FILES['imagen']['name']);
    $imagen=$_FILES['imagen']['name'];
}*/
$valores=array("nombre"=>"'$nombre'",
                "direccion"=>"'$direccion'",
                "telefono"=>"'$telefono'"
            );
$sucursal->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>