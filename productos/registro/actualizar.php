<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/producto.php");
$producto=new producto;

$valores=array( "codcategoria"=>"'$codcategoria'",
                "codsubcategoria"=>"'$codsubcategoria'",
                "dimension"=>"'$dimension'",
                "codigo"=>"'$codigo'",
                "embalajeprincipal"=>"'$embalajeprincipal'",
                "embalajesecundario"=>"'$embalajesecundario'",
                "unidad"=>"'$unidad'",
                "preciounitario"=>"'$preciounitario'",
                "preciocf"=>"'$preciocf'",
                "preciosf"=>"'$preciosf'",
                "especial"=>"'$especial'",
            );
/*if($_FILES['imagen']['name']!=""){
    copy($_FILES['imagen']['tmp_name'],"../../imagenes/subcategoria/".$_FILES['imagen']['name']);
    $imagen=$_FILES['imagen']['name'];
    $valores["imagen"]="'$imagen'";
}*/

$producto->actualizarRegistro($valores,"codproducto=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>