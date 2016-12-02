<?php
include_once("../../login/check.php");
extract($_POST);
//print_r($_POST);
include_once("../../class/producto.php");
$producto=new producto;
/*if($_FILES['imagen']['name']!=""){
    copy($_FILES['imagen']['tmp_name'],"../../imagenes/subcategoria/".$_FILES['imagen']['name']);
    $imagen=$_FILES['imagen']['name'];
}*/
$valores=array( "codcategoria"=>"'$codcategoria'",
                "codsubcategoria"=>"'$codsubcategoria'",
                "dimension"=>"'$dimension'",
                "embalajeprincipal"=>"'$embalajeprincipal'",
                "embalajesecundario"=>"'$embalajesecundario'",
                "unidad"=>"'$unidad'",
                "preciounitario"=>"'$preciounitario'",
                "preciocf"=>"'$preciocf'",
                "preciosf"=>"'$preciosf'",
                "especial"=>"'$especial'",
            );
//$producto->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>