<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Sucursal";
$Cod=$_GET['Cod'];
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
$suc=$sucursal->mostrarRegistro($Cod);
$suc=array_shift($suc);
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right col-lg-6">Nombre de Sucursal</td>
            <td><input type="text" name="nombre" class="form-control" autofocus value="<?php echo $suc['nombre']?>"></td>
        </tr>
        <tr>
            <td class="text-right">Dirección</td>
            <td><textarea name="direccion" class="form-control"><?php echo $suc['direccion']?></textarea></td>
        </tr>
        <tr>
            <td class="text-right">Teléfono de Sucursal</td>
            <td><input name="telefono" class="form-control" type="text" value="<?php echo $suc['telefono']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>