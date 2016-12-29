<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Facturas";

include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
$(document).on("ready",function(){
    $(document).on("change",".Estado",function(){
       var codfactura=$(this).attr("rel");
       var estado=$(this).val();
       $.post("actualizar.php",{"codfactura":codfactura,"estado":estado},function(){
            $(".formulariobusqueda")   .submit();
        });
    });
});
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold">Fecha Desde<br><input type="date" name="FechaDesde" class="form-control" autofocus value="<?php echo date("Y-m-d")?>" required></td>
            <td class="text-center">Fecha Hasta<input type="date" name="FechaHasta" class="form-control" value="<?php echo date("Y-m-d")?>"></td>
            <td class="text-center">Estado de Factura<select name="Estado" class="form-control">
                <option value="%">Todos</option>
                <option value="Valido">Valido</option>
                <option value="Anulado">Anulado</option>
                </select></td>
                <td class="text-center text-bold">Nit<br><input type="search" name="Nit" class="form-control"  value=""></td>
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