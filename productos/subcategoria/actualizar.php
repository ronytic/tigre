<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;

$valores=array( "codcategoria"=>"'$codcategoria'",
                "nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
               
            );
if($_FILES['imagen']['name']!=""){
    copy($_FILES['imagen']['tmp_name'],"../../imagenes/subcategoria/".$_FILES['imagen']['name']);
    $imagen=$_FILES['imagen']['name'];
    $valores["imagen"]="'$imagen'";
}

$subcategoria->actualizarRegistro($valores,"codsubcategoria=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>