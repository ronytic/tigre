<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/config.php");
$config=new config;

foreach($_POST as $k=>$v){

$config->actualizarConfig(array("Valor"=>"'$v'"),$k)  ;

}
header("Location:index.php");
//$config->actualizarConfig(array("Valor"=>"'$v'"),)
//print_r($valores);
exit();
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>