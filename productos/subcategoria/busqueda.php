<?php
include_once("../../login/check.php");
extract($_POST);
$codcategoria=$codcategoria==""?"%":$codcategoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/categoria.php");
$categoria=new categoria;
$subcat=$subcategoria->mostrarTodoRegistro("codcategoria LIKE '$codcategoria' and nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'",1,"nombre");
$i=0;
foreach($subcat as $sc){$i++;
    $c=$categoria->mostrarRegistro($sc['codcategoria']);
    $c=array_shift($c);
    $dat[$i]['codsubcategoria']=$sc['codsubcategoria'];
    $dat[$i]['codcategoria']=$c['nombre'];
    $dat[$i]['nombre']=$sc['nombre'];
    $dat[$i]['descripcion']=$sc['descripcion'];
}
listadotabla(array("codcategoria"=>"Categoria","nombre"=>"Nombre","descripcion"=>"Descripción"),$dat,1,"","modificar.php","eliminar.php");
?>