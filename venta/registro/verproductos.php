<?php
$codcategoria=$_POST['codcategoria'];
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=$categoria->mostrarTodoRegistro("codcategoria=".$codcategoria);
$cat=array_shift($cat);
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
$subcat=$subcategoria->mostrarTodoRegistro("codcategoria=".$codcategoria);
include_once("../../class/producto.php");
$producto=new producto;

include_once("../../class/inventario.php");
$inventario=new inventario;

?>
<h4><?php echo $cat['nombre']?></h4>
<?php foreach($subcat as $sc){?>

<table class="table table-bordered table-striped table-hover table-condensed">
    <tr>
        <th>Item</th><th colspan="11"><?php echo $sc['nombre']?></th>
    </tr>
    <tr><th>Dimensión</th><th>Emb. Prin.</th><th>Emb. Sec</th><th>Unidad</th><th>Ext. Cala.</th><th>Ext. El Alto</th><!--<th>Cód</th>--><th>P/U</th><th>C/F</th><th>S/F</th><th></th>
    </tr>
    
    <?php $pro=$producto->mostrarTodoRegistro("codsubcategoria=".$sc['codsubcategoria']);
    foreach($pro as $p){
       $invc=$inventario->cantidadStock($p['codproducto'],1);
       $invc=array_shift($invc);
       $invea=$inventario->cantidadStock($p['codproducto'],2);
       $invea=array_shift($invea);
       $excalacoto=$invc['stock']?$invc['stock']:0;
       $exelalto=$invea['stock']?$invea['stock']:0;
    ?>
        <tr>
            <td><?php echo $p['dimension']?></td>
            <td><?php echo $p['embalajeprincipal']?></td>
            <td><?php echo $p['embalajesecundario']?></td>
            <td><?php echo $p['unidad']?></td>
            <td class="text-right <?php echo ($excalacoto==0)?'danger':''?>"><?php echo $excalacoto?></td>
            <td class="text-right <?php echo ($exelalto==0)?'danger':''?>"><?php echo $exelalto?></td>
            <!--<td><small><?php echo $p['codigo']?></small></td>-->
            <td class="text-right"><?php echo $p['preciounitario']?></td>
            <td class="text-right"><?php echo $p['preciocf']?></td>
            <td class="text-right"><?php echo $p['preciosf']?></td>
            <!--<td><?php echo $p['especial']?></td>-->
    <td><a href="" class="btn btn-default adicionar" rel="<?php echo $p['codproducto']?>"><i class="fa fa-chevron-circle-right"></i></a></td>
        </tr>
    <?php }?>
</table>
<?php }?>