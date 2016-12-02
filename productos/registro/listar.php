<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Productos";
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");
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
   $.post("subcategoria.php",{"codcategoria":codcategoria,"s":1},function(datos){
       $("select[name=codsubcategoria]").html(datos)
   });
   //alert(codcategoria);
}
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center">Categoria
                <?php campo("codcategoria","select",$cat,"form-control")?>
            </td>
            <td class="text-center">Subcategoria
                <?php campo("codsubcategoria","select","","form-control")?>
            </td>
            <td class="text-center text-bold">Dimensión<br><input type="text" name="dimension" class="form-control" autofocus></td>
            <td class="text-center">Embalaje Principal<br><input type="text" name="embalajeprincipal" class="form-control"></td>
            <td class="text-center">Embalaje Secundario<br><input type="text" name="embalajesecundario" class="form-control"></td>
            <td class="text-center">Unidad<br><input type="text" name="unidad" class="form-control"></td>
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