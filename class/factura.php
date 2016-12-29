<?php
include_once("bd.php");
class factura extends bd{
	var $tabla="factura";

	function ObtenerNFactura($NumeroAutorizacion){
        $this->campos=array("MAX(NFactura) +1 AS NFacturaActual");        
        return $this->getRecords("NumeroAutorizacion =  '$NumeroAutorizacion' and activo=1");
    }
}
?>