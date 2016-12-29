<?php
include_once("../../login/check.php");
$titulo="Ver Factura";
$folder="../../";
$codfactura=$_GET['codfactura'];
$url="../../impresion/factura/facturaticket.php?codfactura=".$codfactura;
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<a href="<?php echo $url?>" target="_blank" class="btn btn-info">Ver Factura</a>
<iframe width="100%" height="750" src="<?php echo $url;?>" frameborder="0"></iframe>
<?php include_once("../../pie.php");?>