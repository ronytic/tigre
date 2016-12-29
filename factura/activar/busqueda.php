<?php
include_once("../../login/check.php");
//extract($_POST);
//print_r($_POST);
$NumeroAutorizacion=$_POST['NumeroAutorizacion'];
$Nit=$_POST['Nit'];
$NFactura=$_POST['NFactura'];
$FechaFactura=$_POST['FechaFactura'];
$TotalBs=$_POST['TotalBsCodigo'];
$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
$LlaveDosificacion=stripslashes($_POST['LlaveDosificacion']);
//echo $LlaveDosificacion;

include_once("../../factura/codigocontrol.class.php");
$CodigoControl=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$CodigoControl->generar();

$CodigoControl2=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl2=$CodigoControl2->generar();
?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>Número de Autorización</th>
        <th>Nº Factura</th>
        <th>Nit</th>
        <th>Fecha de Factura</th>
        <th>Total de Bs</th>
        <th width="400">Llave de Dosificación</th>
        <th width="400">Código de Control</th>
        <th width="400">Código de Control N 2</th>
    </tr>
</thead>
<tr>
    <td><?php echo $NumeroAutorizacion?></td>
    <td><?php echo $NFactura?></td>
    <td><?php echo $Nit?></td>
    <td><?php echo $FechaCodigo?></td>
    <td><?php echo $TotalBsCodigo?></td>
    <td><small><?php echo $LlaveDosificacion?></small></td>
    <td><?php echo $TxtCodigoDeControl?></td>
    <td><?php echo $TxtCodigoDeControl2?></td>
</tr>
<?php

    

//listadotabla(array("nombre"=>"Factura A","nit"=>"Nit","fechaventa"=>"Fecha de Factura","NFactura"=>"Nº Factura","total"=>"Total","pagado"=>""),$datos,1,"","","",array("../../impresion/factura/facturaticket.php"=>"Ver Factura"),"","_blank");
?>

</table>