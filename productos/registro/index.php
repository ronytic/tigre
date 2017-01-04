<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Nuevo Producto";
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");
//print_r($cat);
include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
$(document).on("ready",function(){
    $("select[name=codcategoria]").change(buscar);
    buscar(event);
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
    <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right col-lg-6">Categoria</td>
            <td><?php campo("codcategoria","select",$cat,"form-control",1)?></td>
        </tr>
        <tr>
            <td class="text-right">Subcategoria</td>
            <td><?php campo("codsubcategoria","select","","form-control",1)?></td>
        </tr>
        <tr>
            <td class="text-right">Dimensión</td>
            <td><input type="text" name="dimension" class="form-control" autofocus required></td>
        </tr>
        <tr>
            <td class="text-right">Código</td>
            <td><input type="text" name="codigo" class="form-control"  value="" ></td>
        </tr>
        <tr>
            <td class="text-right">Embalaje Principal</td>
            <td><input type="text" name="embalajeprincipal" class="form-control" required></td>
        </tr>
        <tr>
            <td class="text-right">Embalaje Secundario</td>
            <td><input type="text" name="embalajesecundario" class="form-control" ></td>
        </tr>
        <tr>
            <td class="text-right">Unidad</td>
            <td><input type="text" name="unidad" class="form-control" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Unitario</td>
            <td><input type="number" name="preciounitario" class="form-control text-right" value="" min="0" step="0.01" placeholder="0" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Con/Factura</td>
            <td><input type="number" name="preciocf" class="form-control text-right" value="" min="0" step="0.01" placeholder="0" required></td>
        </tr>
        <tr class="danger">
            <td class="text-right">Precio Sin/Factura</td>
            <td><input type="number" name="preciosf" class="form-control text-right" value="" min="0" step="0.01" placeholder="0" required></td>
        </tr>
         <tr>
            <td class="text-right">Precio Especial</td>
            <td><input type="number" name="especial" class="form-control text-right" value="" placeholder="0" min="0" step="0.01" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>