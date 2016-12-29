<?php
include_once("../../login/check.php");
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/producto.php");
$producto=new producto;
?>
<table class="table table-bordered table-striped table-condensed table-hover">
    <thead>
        <tr>
            <th>N</th>
            <th>Item</th>
            <th>Cant</th>
            <th>P/U</th>
            <th>C/F</th>
            <th>S/F</th>
            
        </tr>
    </thead>
    <?php foreach($_SESSION['productos'] as $p){$i++;
        $pro=$producto->mostrarRegistro($p);
        $pro=array_shift($pro);
        $subcat=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
        $subcat=array_shift($subcat);
        $cat=$categoria->mostrarRegistro($pro['codcategoria']);
        $cat=array_shift($cat);
       ?>
       <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $cat['nombre']?> - <?php echo $subcat['nombre']?> <br>    <?php echo $pro['dimension']?></td>
            <td><input type="number" min="0" class="form-control text-right"></td>
            <td class="text-right"><?php echo $pro['preciounitario'];?></td>
            <td class="text-right"><?php echo $pro['preciocf'];?></td>
            <td class="text-right"><?php echo $pro['preciosf'];?></td>
            
        </tr>
       <?php 
    }?>
    <?php echo $total;?>
    <?php //print_r($_SESSION['productos']);?>
    
</table>