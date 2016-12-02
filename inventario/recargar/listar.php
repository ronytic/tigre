<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Recargas";
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
$suc=todoLista($sucursal->mostrarTodoRegistro("",1,"nombre"),"codsucursal","nombre");
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");
include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">

$(document).on("ready",function(){
    $(document).on("change",".codcategoria",buscarsubcategoria);
    $(document).on("change",".codsubcategoria",buscarproducto);
});

function buscarsubcategoria(e){
   e.preventDefault();
   var codcategoria=$(this).val();
   var r=$(this).attr("rel");
   $.post("subcategoria.php",{"codcategoria":codcategoria,"s":1},function(datos){
       $(".codsubcategoria").html(datos)
   });
}
function buscarproducto(e){
   e.preventDefault();
   var codsubcategoria=$(this).val();
   var r=$(this).attr("rel");
   $.post("producto.php",{"codsubcategoria":codsubcategoria,"s":1},function(datos){
       $(".codproducto").html(datos)
   });
}
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center">Sucursal
                <?php campo("codsucursal","select",$suc,"form-control")?>
            </td>
            <td class="text-center">Categoria
                <?php campo("codcategoria","select",$cat,"form-control codcategoria")?>
            </td>
            <td class="text-center">Subcategoria
                <?php campo("codsubcategoria","select","","form-control codsubcategoria")?>
            </td>
            <td class="text-center">Producto
                <?php campo("codproducto","select","","form-control codproducto")?>
            </td>
            <td class="text-center text-bold">Fecha de Recarga<br><input type="date" name="fecharecarga" class="form-control" value="" ></td>
            <td class="text-center">¿En Existencia?<br><select name="existencia" class="form-control"><option value="1" selected>Si</option><option value="0">No</option></select> </td>
            <td><br><input type="submit" value="Buscar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
        </div>
        </div>
    </div>
</div>
<div class="hpanel">
    <div class="panel-heading">
    </div>

    <div class="panel-body">
        <div class="row">
        <div class="col-lg-12" id="respuestaformulario">
    
        </div>
<?php include_once("../../pie.php");?>