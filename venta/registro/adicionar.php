<?php
include_once("../../login/check.php");
$codproducto=$_POST['codproducto'];
$tipo=$_POST['tipo'];
$codsucursal=$_POST['codsucursal'];
$l=$_POST['l'];
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/producto.php");
$producto=new producto;
if($codproducto!=0){
    $pro=$producto->mostrarRegistro($codproducto);
    $pro=array_shift($pro);
    $subcat=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
    $subcat=array_shift($subcat);
    $cat=$categoria->mostrarRegistro($pro['codcategoria']);
    $cat=array_shift($cat);
}else{
    $cat['nombre']="Otro Producto";
    $subcat['nombre']="";
    $pro['dimension']="";
}
?>

 <tr>
    <td><?php echo $l;?> <input type="hidden" name="tipo" value="<?php echo $tipo?>">
 <input type="hidden" name="codsucursal" value="<?php echo $codsucursal?>">
 <input type="hidden" name="p[<?php echo $l?>][codproducto]" value="<?php echo $codproducto?>">
    </td>
    <td><?php echo $cat['nombre']?> - <?php echo $subcat['nombre']?> <br>    <?php echo $pro['dimension']?></td>
    <td><input type="number" min="0" class="form-control text-right cantidad" value="0" name="p[<?php echo $l?>][cantidad]" rel="<?php echo $l?>"></td>
    
    <?php /*<td><input type="text" class="form-control text-right preciounitario" value="<?php echo $pro['preciounitario'];?>" readonly name="preciounitario" rel="<?php echo $l?>"></td>
    */?>
    <?php if($tipo=="cf"){?>
    <td><input type="text" class="form-control text-right pu preciounitario<?php echo $l?>" value="<?php echo number_format($pro['preciocf'],2);?>" <?php echo $codproducto==0?'':'readonly'?> name="p[<?php echo $l?>][preciounitario]" rel="<?php echo $l?>"></td>
    <?php }else{?>
    <td><input type="text" class="form-control text-right pu preciounitario<?php echo $l?>" value="<?php echo number_format($pro['preciosf'],2);?>" <?php echo $codproducto==0?'':'readonly'?> name="p[<?php echo $l?>][preciounitario]" rel="<?php echo $l?>"></td>
    <?php }?>
    <td><input type="text" class="form-control text-right total" value="0" readonly name="p[<?php echo $l?>][total]" rel="<?php echo $l?>"></td>
    <td><a href="" class="eliminar btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
</tr>