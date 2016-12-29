<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Configuración General del Sistema";

include_once("../../class/config.php");
$config=new config;
$Titulo=$config->mostrarConfig("Titulo",1);
$NitEmisor=$config->mostrarConfig("NitEmisor",1);
$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);
$LeyendaPiePagina=$config->mostrarConfig("LeyendaPiePagina",1);
$NombreEmpresa=$config->mostrarConfig("NombreEmpresa",1);
$Sucursal=$config->mostrarConfig("Sucursal",1);
$Direccion=$config->mostrarConfig("Direccion",1);
$TelFax=$config->mostrarConfig("TelFax",1);
$Lugar=$config->mostrarConfig("Lugar",1);
$LeyendaPiePagina2=$config->mostrarConfig("LeyendaPiePagina2",1);

$NumeroAutorizacion=$config->mostrarConfig("NumeroAutorizacion",1);
$LlaveDosificacion=$config->mostrarConfig("LlaveDosificacion",1);
$FechaLimiteEmision=$config->mostrarConfig("FechaLimiteEmision",1);

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right col-lg-3">Titulo del Sistema</td>
            <td><input type="text" name="Titulo" class="form-control" autofocus value="<?php echo $Titulo?>" required></td>
        </tr>
        <tr>
            <td colspan="2"><h3 class="text-center">Facturación</h3>
                <div class="alert alert-danger">Estos datos deben de ser modificados cada ves que se solicite nueva dosificación</div>
            </td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Nit del Emisor</td>
            <td><input type="text" name="NitEmisor" class="form-control" autofocus value="<?php echo $NitEmisor?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Actividad Económica</td>
            <td><input type="text" name="ActividadEconomica" class="form-control" autofocus value="<?php echo $ActividadEconomica?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Leyenda Pie Página</td>
            <td><input type="text" name="LeyendaPiePagina" class="form-control" autofocus value="<?php echo $LeyendaPiePagina?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Leyenda Pie Página 2</td>
            <td><input type="text" name="LeyendaPiePagina2" class="form-control" autofocus value="<?php echo $LeyendaPiePagina2?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Número de Autorización</td>
            <td><input type="text" name="NumeroAutorizacion" class="form-control" autofocus value="<?php echo $NumeroAutorizacion?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Llave de Dosificación</td>
            <td><input type="text" name="LlaveDosificacion" class="form-control" autofocus value="<?php echo $LlaveDosificacion?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Fecha Límite de Emisión</td>
            <td><input type="date" name="FechaLimiteEmision" class="form-control" autofocus value="<?php echo $FechaLimiteEmision?>" required></td>
        </tr>
        <tr>
            <td colspan="2"><h3 class="text-center">Datos de la Empresa para la Factura</h3></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Nombre de la Empresa</td>
            <td><input type="text" name="NombreEmpresa" class="form-control" autofocus value="<?php echo $NombreEmpresa?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Sucursal</td>
            <td><input type="text" name="Sucursal" class="form-control" autofocus value="<?php echo $Sucursal?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Direccion</td>
            <td><input type="text" name="Direccion" class="form-control" autofocus value="<?php echo $Direccion?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Teléfono/Fax</td>
            <td><input type="text" name="TelFax" class="form-control" autofocus value="<?php echo $TelFax?>" required></td>
        </tr>
        <tr>
            <td class="text-right col-lg-3">Lugar</td>
            <td><input type="text" name="Lugar" class="form-control" autofocus value="<?php echo $Lugar?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>