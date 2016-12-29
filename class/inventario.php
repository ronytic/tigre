<?php
include_once("bd.php");
class inventario extends bd{
	var $tabla="inventario";
    function cantidadStock($CodProducto,$codsucursal){
        $this->campos=array("sum(stock) as stock,sum(cantidadrecarga) as recarga");
        return $this->mostrarTodoRegistro("CodProducto=".$CodProducto." and codsucursal=".$codsucursal);
    }
	
}
?>