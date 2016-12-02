<?php
include_once("../../login/check.php");
extract($_POST);
$codcategoria=$codcategoria==""?"%":$codcategoria;
$codsubcategoria=$codsubcategoria==""?"%":$codsubcategoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/producto.php");
$producto=new producto;

$pro=$producto->mostrarTodoRegistro("codcategoria LIKE '$codcategoria' and codsubcategoria LIKE '$codsubcategoria' and dimension LIKE '$dimension%' and embalajeprincipal LIKE '$embalajeprincipal%' and embalajesecundario LIKE '$embalajesecundario%' and unidad LIKE '$unidad%'",1,"dimension,unidad,embalajeprincipal,codcategoria,codsubcategoria");
$i=0;
foreach($pro as $p){$i++;
    $c=$categoria->mostrarRegistro($p['codcategoria']);
    $c=array_shift($c);
    $sc=$subcategoria->mostrarRegistro($p['codsubcategoria']);
    $sc=array_shift($sc);
    
    $dat[$i]['codproducto']=$p['codproducto'];
    $dat[$i]['codsubcategoria']=$sc['nombre'];
    $dat[$i]['codcategoria']=$c['nombre'];
    $dat[$i]['dimension']=$p['dimension'];
    $dat[$i]['unidad']=$p['unidad'];
    $dat[$i]['embalajeprincipal']=$p['embalajeprincipal'];
    $dat[$i]['embalajesecundario']=$p['embalajesecundario'];
    $dat[$i]['preciounitario']=$p['preciounitario'];
    $dat[$i]['preciocf']=$p['preciocf'];
    $dat[$i]['preciosf']=$p['preciosf'];
}
listadotabla(array("codcategoria"=>"Categoria","codsubcategoria"=>"Subcategoria","dimension"=>"Dimensión","unidad"=>"Unidad","embalajeprincipal"=>"Embalaje Principal","embalajesecundario"=>"Embalaje Secundario","preciounitario"=>"Precio Unitario","preciocf"=>"Precio C/F","preciosf"=>"Precio S/F"),$dat,1,"","modificar.php","eliminar.php");
?>