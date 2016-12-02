<?php
include_once("../../login/check.php");
$l=$_POST['l'];
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");
?>
<tr>
    <td class="text-right"><?php echo $l?></td>
    <td><?php campo("r[$l][codcategoria]","select",$cat,"form-control codcategoria c$l",0,"",0,array("rel"=>"$l"))?></td>
    <td><?php campo("r[$l][codsubcategoria]","select",$subcat,"form-control codsubcategoria sc$l",0,"",0,array("rel"=>"$l"))?></td>
    <td><?php campo("r[$l][codproducto]","select",$pro,"form-control codproducto p$l",0,"",0,array("rel"=>"$l"))?></td>
    <td id="r<?php echo $l?>embalajeprincipal"></td>
    <td id="r<?php echo $l?>embalajesecundario"></td>
    <td id="r<?php echo $l?>codigo"></td>
    <td id="r<?php echo $l?>unidad"></td>
    <td id="r<?php echo $l?>preciounitario"></td>
    <td id="r<?php echo $l?>preciocf" class="text-right"></td>
    <td id="r<?php echo $l?>preciosf" class="text-right"></td>
    <td id="r<?php echo $l?>cantidade" class="text-right"></td>
    <td><input name="r[<?php echo $l?>][cantidadrecarga]" class="form-control text-right " type="number" ></td>
    <td><input name="r[<?php echo $l?>][detalle]" class="form-control" type="text" ></td>
    <td><a href="" class="btn btn-danger btn-xs eliminarfila"><i class="fa fa-close"></i></a></td>
</tr>