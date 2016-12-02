<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Sucursal";

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right col-lg-6">Nombre de Sucursal</td>
            <td><input type="text" name="nombre" class="form-control" autofocus></td>
        </tr>
        <tr>
            <td class="text-right">Dirección</td>
            <td><textarea name="direccion" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td class="text-right">Teléfono de Sucursal</td>
            <td><input name="telefono" class="form-control" type="text" ></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>