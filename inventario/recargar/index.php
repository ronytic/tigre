<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Recarga de Inventario";

include_once("../../class/sucursal.php");
$sucursal=new sucursal;
$suc=todoLista($sucursal->mostrarTodoRegistro("",1,"nombre"),"codsucursal","nombre");
include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
var l=1;
$(document).on("ready",function(){
    $("#aumentar").click(aumentar);
    aumentar(event);
    $(document).on("change",".codcategoria",buscarsubcategoria);
    $(document).on("change",".codsubcategoria",buscarproducto);
    $(document).on("change",".codproducto",buscardatos);
    $(document).on("click",".eliminarfila",function(e){
        e.preventDefault();
        if(confirm("¿Desea Eliminar esta Recarga?")){
            ($(this).parent().parent().remove());    
        }
    });
    
});
function aumentar(e) {
    e.preventDefault();
    $.post("aumentar.php",{l:l},function(datos){
        $("#marca").before(datos);
        l++;
    });
}
function buscarsubcategoria(e){
   e.preventDefault();
   var codcategoria=$(this).val();
   var r=$(this).attr("rel");
   $.post("subcategoria.php",{"codcategoria":codcategoria,"s":1},function(datos){
       $(".sc"+r).html(datos)
       //alert(datos);
   });
}
function buscarproducto(e){
   e.preventDefault();
   var codsubcategoria=$(this).val();
   var r=$(this).attr("rel");
   $.post("producto.php",{"codsubcategoria":codsubcategoria,"s":1},function(datos){
       $(".p"+r).html(datos)
       //alert(datos);
   });
}
function buscardatos(e){
   e.preventDefault();
   var codproducto=$(this).val();
   var r=$(this).attr("rel");
   var codsucursal=$("input[name=codsucursal]").val();
   $.post("datos.php",{"codproducto":codproducto,"codsucursal":codsucursal},function(datos){
       $("#r"+r+"embalajeprincipal").html(datos.embalajeprincipal)
       $("#r"+r+"embalajesecundario").html(datos.embalajesecundario)
       $("#r"+r+"codigo").html(datos.codigo)
       $("#r"+r+"unidad").html(datos.unidad)
       $("#r"+r+"preciounitario").html(datos.preciounitario)
       $("#r"+r+"preciocf").html(datos.preciocf)
       $("#r"+r+"preciosf").html(datos.preciosf)
       $("#r"+r+"cantidade").html(datos.cantidade)
       //alert(datos);
   },"json");
}
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sucursal</th>
                <th>Fecha de Recarga</th>
            </tr>
        </thead>
        <tr>
            <td class="col-lg-6"><?php campo("codsucursal","select",$suc,"form-control",1)?></td>
            <td class="col-lg-6"><input type="date" name="fecharecarga" class="form-control" value="<?php echo date("Y-m-d");?>" required></td>
        </tr>
    </table>
    
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <th>N</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th class="">Dimensión</th>
            <th>Emb. Principal</th>
            <th>Emb. Sec.</th>
            <th>Código</th>
            <th>Unidad</th>
            <th>Precio U</th>
            <th>Precio C/F</th>
            <th>Precio S/F</th>
            <th>Cant. Existente</th>
            <th>Cant. a Recargar</th>
            <th>Detalle de Recarga</th>
            <th></th>
        </thead>
        
        <tr id="marca">
            <td><a href="#" class="btn btn-warning" id="aumentar"><i class="fa fa-plus"></i></a></td>
            <td colspan="14" class="text-center"><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>