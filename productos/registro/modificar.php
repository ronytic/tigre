<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Producto";
$Cod=$_GET['Cod'];
include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarRegistro($Cod);
$pro=array_shift($pro);

include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");

include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
$subcat=todoLista($subcategoria->mostrarTodoRegistro("codcategoria=1",1,"nombre"),"codsubcategoria","nombre");

//print_r($subcat);


include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
$(document).on("ready",function(){
    $("select[name=codcategoria]").change(buscar);
   // buscar(event);
});
function buscar(e){
   e.preventDefault();
   
   var codcategoria=$("select[name=codcategoria]").val();
   $.post("subcategoria.php",{"codcategoria":codcategoria},function(datos){
       $("select[name=codsubcategoria]").html(datos)
   });
   //alert(codcategoria);
}
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right col-lg-6">Categoria</td>
            <td><?php campo("codcategoria","select",$cat,"form-control",1,"",0,"",$pro['codcategoria'])?></td>
        </tr>
        <tr>
            <td class="text-right">Subcategoria</td>
            <td><?php campo("codsubcategoria","select",$subcat,"form-control",1,"",0,"",$pro['codsubcategoria'])?></td>
        </tr>
        <tr>
            <td class="text-right">Dimensión</td>
            <td><input type="text" name="dimension" class="form-control" autofocus value="<?php echo $pro['dimension']?>" required></td>
        </tr>
        <tr>
            <td class="text-right">Código</td>
            <td><input type="text" name="codigo" class="form-control"  value="<?php echo $pro['codigo']?>" ></td>
        </tr>
        <tr>
            <td class="text-right">Embalaje Principal</td>
            <td><input type="text" name="embalajeprincipal" class="form-control" value="<?php echo $pro['embalajeprincipal']?>" required></td>
        </tr>
        <tr>
            <td class="text-right">Embalaje Secundario</td>
            <td><input type="text" name="embalajesecundario" class="form-control" value="<?php echo $pro['embalajesecundario']?>"></td>
        </tr>
        <tr>
            <td class="text-right">Unidad</td>
            <td><input type="text" name="unidad" class="form-control" value="<?php echo $pro['unidad']?>" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Unitario</td>
            <td><input type="number" name="preciounitario" class="form-control text-right" value="<?php echo $pro['preciounitario']?>" min="0" step="0.01" placeholder="0" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Con/Factura</td>
            <td><input type="number" name="preciocf" class="form-control text-right" value="<?php echo $pro['preciocf']?>" min="0" step="0.01" placeholder="0" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Sin/Factura</td>
            <td><input type="number" name="preciosf" class="form-control text-right" value="<?php echo $pro['preciosf']?>" min="0" step="0.01" placeholder="0" required></td>
        </tr>
        <tr>
            <td class="text-right">Especial</td>
            <td><textarea name="especial" class="form-control"><?php echo $pro['especial']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>