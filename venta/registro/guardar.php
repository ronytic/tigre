<?php
include_once("../../login/check.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$pro=$_POST['p'];
$codsucursal=$_POST['codsucursal'];
$fecha=$_POST['fecha'];
$nombre=$_POST['nombre'];
$nit=$_POST['nit'];
$pagado=$_POST['pagado'];
$devolucion=$_POST['devolucion'];
$totalt=$_POST['totalt'];
$observacion=$_POST['observacion'];
$NFactura=$_POST['NFactura'];
include_once("../../class/categoria.php");
$categoria=new categoria;
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
include_once("../../class/inventario.php");
$inventario=new inventario;
include_once("../../class/producto.php");
$producto=new producto;
include_once("../../class/venta.php");
$venta=new venta;
include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
include_once("../../class/factura.php");
$factura=new factura;
include_once("../../class/facturadetalle.php");
$faturadetalle=new facturadetalle;

$valoresventa=array("fechaventa"=>"'$fecha'",
"nombre"=>"'$nombre'",
"nit"=>"'$nit'",
"pagado"=>"'$pagado'",
"devolucion"=>"'$devolucion'",
"total"=>"'$totalt'",
"observacion"=>"'$observacion'",
					);
$valoresfactura=array("fechaventa"=>"'$fecha'",
"nombre"=>"'$nombre'",
"nit"=>"'$nit'",
"pagado"=>"'$pagado'",
"devolucion"=>"'$devolucion'",
"total"=>"'$totalt'",
"observacion"=>"'$observacion'",
					);
$venta->insertarRegistro($valoresventa);
$codventa=$venta->ultimo();
$factura->insertarRegistro($valoresfactura);
$codfactura=$factura->ultimo();

foreach($pro as $prod){
	if($prod['codproducto']==""){
		continue;	
	}
	$codproducto=$prod['codproducto'];
	$cantidad=$prod['cantidad'];
	$cantidadventatotal=$prod['cantidad'];
	$preciounitario=$prod['preciounitario'];
	$total=$prod['total'];
	
	//$fecha=date("Y-m-d");
	$totalproducto=0;
	$inv=$inventario->cantidadStock($codproducto,$codsucursal);
	$inv=array_shift($inv);
	$totalproducto=$inv['stock'];
	//echo $totalproducto."<br>";
    
    
    
	//echo $totalproducto;
	$pr=array_shift($producto->mostrarRegistro($codproducto));
	$nombreproducto=$pr['nombre'];
	$c=$categoria->mostrarRegistro($pr['codcategoria']);
    $c=array_shift($c);
   
    $sc=$subcategoria->mostrarRegistro($pr['codsubcategoria']);
    $sc=array_shift($sc);
    
	if($totalproducto<$cantidad){
		$mensaje[]="No Existe en Inventario la Cantidad que Solicita<hr><strong><br>Nombre Producto: $nombreproducto<br>Cantidad de Inventario: $totalproducto<br>Cantidad de Solicitada: $cantidad</strong>";
	}else{
        $inventario->campos=array("*");
		foreach($inventario->mostrarTodoRegistro("codproducto=$codproducto and stock>0 and codsucursal=$codsucursal",1,"fecharecarga") as $inv){
			if((float)$cantidad<=(float)$inv['stock']){
				//echo "si";
				$mensajes[]="<ul><li><strong>Categoria:</strong> ".$c['nombre']."</li><li><strong>Subcategoria:</strong> ".$sc['nombre']."</li> <li><strong>Producto:</strong> ".$pr['dimension']."</li><li><strong>Unidad:</strong> ".$pr['unidad']."</li><li><strong>Embalaje Principal:</strong> ".$pr['embalajeprincipal']."</li><li><strong>Embalaje Secundario:</strong> ".$pr['embalajesecundario']."</li><li><strong>Cantidad Vendida:</strong> ".$cantidadventatotal."</li><li><strong>Precio Unitario:</strong> ".$preciounitario."</li><li><strong>Total:</strong> ".$total."</li></ul><br>";
				$id=$idventa;
				$cantidad=$inv['stock']-$cantidad;
				$valores=array("stock"=>"$cantidad","fechaventa"=>"'$fecha'");
				$inventario->actualizarRegistro($valores,"codinventario=".$inv["codinventario"]." and codsucursal=$codsucursal");
				
				$valores=array(	"codventa"=>"'$codventa'",
					"codproducto"=>"'$codproducto'",
					"cantidad"=>"'$cantidadventatotal'",
					"preciounitario"=>"'$preciounitario'",
					"total"=>"'$total'",
					"observacion"=>"'$observacion'",
					);
                    $valoresf=array(	"codfactura"=>"'$codfactura'",
					"codproducto"=>"'$codproducto'",
					"cantidad"=>"'$cantidadventatotal'",
					"preciounitario"=>"'$preciounitario'",
					"total"=>"'$total'",
					"observacion"=>"'$observacion'",
					);
                    /*echo "<pre>";
                    print_r($valores);
                    echo "</pre>";*/
				$ventadetalle->insertarRegistro($valores);
                $faturadetalle->insertarRegistro($valoresf);
	
				break;	
			}else{
				//echo $cantidadsalida;
				$cantidad=$cantidad-$inv['stock'];
				$valores=array("stock"=>0,"fechaventa"=>"'$fecha'");
				$inventario->actualizarRegistro($valores,"codinventario=".$inv["codinventario"]." and codsucursal=$codsucursal");
			}
		}
	}
	
}

/*Registo de Factura*/
$codfactura=$codventa;

include_once("../../class/config.php");
$config=new config;
$NumeroAutorizacion=$config->mostrarConfig("NumeroAutorizacion",1);
$LlaveDosificacion=$config->mostrarConfig("LlaveDosificacion",1);
$LeyendaPiePagina=$config->mostrarConfig("LeyendaPiePagina",1);
$LeyendaPiePagina2=$config->mostrarConfig("LeyendaPiePagina2",1);
$FechaLimiteEmision=$config->mostrarConfig("FechaLimiteEmision",1);


$Nit=$nit;
$NFactura=$NFactura;
$FechaFactura=$fecha;
$TotalBs=$totalt;
$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
	
include_once("../../factura/codigocontrol.class.php");
$CodigoControl=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$CodigoControl->generar();

$CodigoControl2=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl2=$CodigoControl2->generar();
if($TxtCodigoDeControl==$TxtCodigoDeControl2){
    $TxtCodigoDeControl=$TxtCodigoDeControl;    
}
else{
    if(strlen($TxtCodigoDeControl)<strlen($TxtCodigoDeControl2)){
        $TxtCodigoDeControl=$TxtCodigoDeControl;
    }else{
        $TxtCodigoDeControl=$TxtCodigoDeControl2;
    }
}
/*echo "NA:".$NumeroAutorizacion."<br>";
echo "NF:".$NFactura."<br>";
echo "N:".$Nit."<br>";
echo "FC:".$FechaCodigo."<br>";
echo "T:".$TotalBsCodigo."<br>";
echo "LL:".$LlaveDosificacion."<br>";
echo "TXT:".$TxtCodigoDeControl."<br>";*/
$valoractualizar=array("NFactura"=>"'$NFactura'",
                    "NumeroAutorizacion"=>"'$NumeroAutorizacion'",
                    "FechaLimiteEmision"=>"'$FechaLimiteEmision'",
                    "TxtCodigoDeControl"=>"'$TxtCodigoDeControl'",
                    "LeyendaPiePagina"=>"'".mysql_escape_string($LeyendaPiePagina)."'",
                    "LeyendaPiePagina2"=>"'".mysql_escape_string($LeyendaPiePagina2)."'",
                    "LlaveDosificacion"=>"'".mysql_escape_string($LlaveDosificacion)."'",
                    "Estado"=>"'Valido'"
                    );
/*echo "<pre>";
print_r($valoractualizar);
echo "</pre>";*/
//$codfactura=4;
$factura->actualizarRegistro($valoractualizar,"codfactura=".$codfactura);
// exit();
/*Fin de Registro de Factura*/
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=0;
$listar=0;
$botones=array("Realizar Nueva Venta"=>array("index.php","info"),"Ver Factura"=>array("verfactura.php?codfactura=$codfactura","success"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>