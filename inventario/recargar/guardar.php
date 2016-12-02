<?php
include_once("../../login/check.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
//print_r($_POST);
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/producto.php");
$producto=new producto;

include_once("../../class/inventario.php");
$inventario=new inventario;
$s=$sucursal->mostrarRegistro($codsucursal);
$s=array_shift($s);
$mensajes[]="<strong>Sucursal:</strong> ".$s['nombre'];
foreach($r as $p){
    $c=$categoria->mostrarRegistro($p['codcategoria']);
    $c=array_shift($c);
   
    $sc=$subcategoria->mostrarRegistro($p['codsubcategoria']);
    $sc=array_shift($sc);
    $pr=$producto->mostrarRegistro($p['codproducto']);
    $pr=array_shift($pr);
    
    $valores=array( "codcategoria"=>"'".$p['codcategoria']."'",
                "codsubcategoria"=>"'".$p['codsubcategoria']."'",
                "codproducto"=>"'".$p['codproducto']."'",
                "codsucursal"=>"'$codsucursal'",
                "fecharecarga"=>"'$fecharecarga'",
                "cantidadrecarga"=>"'".$p['cantidadrecarga']."'",
                "stock"=>"'".$p['cantidadrecarga']."'",
                "detalle"=>"'".$p['detalle']."'",
            );
    $inventario->insertarRegistro($valores);
    $mensajes[]="<ul><li><strong>Categoria:</strong> ".$c['nombre']."</li><li><strong>Subcategoria:</strong> ".$sc['nombre']."</li> <li><strong>Producto:</strong> ".$pr['dimension']."</li><li><strong>Unidad:</strong> ".$pr['unidad']."</li><li><strong>Embalaje Principal:</strong> ".$pr['embalajeprincipal']."</li><li><strong>Embalaje Secundario:</strong> ".$pr['embalajesecundario']."</li><li><strong>Cantidad Recargada:</strong> ".$p['cantidadrecarga']."</li><li><strong>Detalle de Recarga:</strong> ".$p['detalle']."</li></ul><br>";
    /*echo "<pre>";
    print_r($valores);
    echo "</pre>";*/
}

$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=0;
$listar=0;
$botones=array("Nueva Recarga"=>array("index.php","info"),"Ver Recargas"=>array("listar.php","success"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>