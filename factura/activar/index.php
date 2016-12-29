<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Activación de Facturación con Servicio de Impuestos";

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
            <td class="text-center text-bold">Número de Autorización<br><input type="text" name="NumeroAutorizacion" class="form-control"  value="2104001833598"></td>
            <td class="text-center text-bold">Nº de Factura<br><input type="text" name="NFactura" class="form-control text-right"  value="4"></td>
            <td class="text-center text-bold">Nit<br><input type="text" name="Nit" class="form-control"  value="6060424"></td>
            <td class="text-center text-bold">Fecha de Factura<br><input type="date" name="FechaFactura" class="form-control" autofocus value="<?php echo date("Y-m-d")?>" required></td>
            
            <td class="text-center text-bold">Total en Bs<br><input type="text" name="TotalBsCodigo" class="form-control text-right"  value="956.85"></td>
            <td class="text-center text-bold">Llave de Dosificación<br><input type="text" name="LlaveDosificacion" class="form-control"  value="WxX8gD]Q3QgC9\y##E3z7Z\neTgxv2YED*$RmdFC[@Cr32M$c85Q@DHUmy(J2uEp"></td>
            <td><br><input type="submit" value="Generar" class="btn btn-info"></td>
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