<?php
include_once("../../login/check.php");
extract($_POST);
//print_r($_POST);
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
if($_FILES['imagen']['name']!=""){
    copy($_FILES['imagen']['tmp_name'],"../../imagenes/subcategoria/".$_FILES['imagen']['name']);
    $imagen=$_FILES['imagen']['name'];
}
$valores=array( "codcategoria"=>"'$codcategoria'",
                "nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
                "imagen"=>"'$imagen'"
            );
$subcategoria->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>