<?php
include_once("../../login/check.php");
extract($_POST);
$codcategoria=$codcategoria==""?"%":$codcategoria;
$codsubcategoria=$codsubcategoria==""?"%":$codsubcategoria;
$codproducto=$codproducto==""?"%":$codproducto;
$codsucursal=$codsucursal==""?"%":$codsucursal;
$fecharecarga=$fecharecarga==""?"%":$fecharecarga;
$existencia=$existencia=="1"?"stock>0":"stock=0";
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/producto.php");
$producto=new producto;
include_once("../../class/inventario.php");
$inventario=new inventario;

include_once("../../class/sucursal.php");
$sucursal=new sucursal;

$inv=$inventario->mostrarTodoRegistro("fecharecarga LIKE '$fecharecarga' and codsucursal LIKE '$codsucursal' and codcategoria LIKE '$codcategoria' and codsubcategoria LIKE '$codsubcategoria' and codproducto LIKE '$codproducto' and $existencia",1,"");
$i=0;
foreach($inv as $in){$i++;
    $s=$sucursal->mostrarRegistro($in['codsucursal']);
    $s=array_shift($s);
    $c=$categoria->mostrarRegistro($in['codcategoria']);
    $c=array_shift($c);
    $sc=$subcategoria->mostrarRegistro($in['codsubcategoria']);
    $sc=array_shift($sc);
    $p=$producto->mostrarRegistro($in['codproducto']);
    $p=array_shift($p);
    $dat[$i]['codproducto']=$p['codproducto'];
    $dat[$i]['codsucursal']=$s['nombre'];
    $dat[$i]['codsubcategoria']=$sc['nombre'];
    $dat[$i]['codcategoria']=$c['nombre'];
    $dat[$i]['dimension']=$p['dimension'];
    $dat[$i]['unidad']=$p['unidad'];
    $dat[$i]['embalajeprincipal']=$p['embalajeprincipal'];
    $dat[$i]['embalajesecundario']=$p['embalajesecundario'];
    $dat[$i]['preciounitario']=$p['preciounitario'];
    $dat[$i]['preciocf']=$p['preciocf'];
    $dat[$i]['preciosf']=$p['preciosf'];
    $dat[$i]['cantidadrecarga']=$in['cantidadrecarga'];
    $dat[$i]['stock']=$in['stock'];
    if($in['cantidadrecarga']==$in['stock']){
    $dat[$i]['botones']='<a href="eliminar.php?Cod='.$in['codinventario'].'" class="btn btn-xs btn-danger eliminar" title="" data-original-title="Eliminar">
                	<i class="fa fa-trash"></i>
                </a>';}
}
?><div class="alert alert-danger">Por seguridad, Solo se puede eliminar cuando la cantidad recargada es igual al Stock.</div>
<strong>Fecha de Recarga:</strong> <?php echo fecha2Str($fecharecarga)?>
<?php
listadotabla(array("codsucursal"=>"Sucursal","codcategoria"=>"Categoria","codsubcategoria"=>"Subcategoria","dimension"=>"Dimensión","unidad"=>"Unidad","embalajeprincipal"=>"Embalaje Principal","embalajesecundario"=>"Embalaje Secundario","preciounitario"=>"Precio Unitario","preciocf"=>"Precio C/F","preciosf"=>"Precio S/F","cantidadrecarga"=>"Cantidad Recarga","stock"=>"Stock","botones"=>""),$dat,1,"","","");
?>